<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Settings extends MX_Controller
{

function __construct() {
parent::__construct();
Modules::run('site_security/is_login');
//Modules::run('site_security/has_permission');

}

    function index() {
        $this->manage();
    }

    function manage() {
        $data['news'] = $this->_get('settings.id desc');
        $data['view_file'] = 'news';
        $this->load->module('template');
        $this->template->admin($data);
    }

    function create() {
        $update_id = 1;
        if (is_numeric($update_id) && $update_id != 0) {
        $data['news'] = $this->_get_data_from_db($update_id);
        } else {
            $data['news'] = $this->_get_data_from_post();
        }
        $data['update_id'] = $update_id;
        $data['view_file'] = 'newsform';
        $this->load->module('template');
        $this->template->admin($data);
    }

    function _get_data_from_db($update_id) {
        $where['settings.id'] = $update_id;
        $query = $this->_get_by_arr_id($where);
        foreach ($query->result() as
                $row) {
            $data['id'] = $row->id;
            $data['image'] = $row->image;
            $data['slogan'] = $row->slogan;
            $data['fb_link'] = $row->fb_link;
            $data['twitter_link'] = $row->twitter_link;
            $data['instagram_link'] = $row->instagram_link;
            $data['linkdin_link'] = $row->linkdin_link;
            $data['pinterest_link'] = $row->pinterest_link;
            $data['phone'] = $row->phone;
            $data['fax'] = $row->fax;
            $data['email'] = $row->email;
            $data['address'] = $row->address;
            $data['google_lat'] = $row->google_lat;
            $data['google_lng'] = $row->google_lng;
            $data['title_map'] = $row->title_map;
            $data['description_map'] = $row->description_map;
        }
        if(isset($data))
            return $data;
    }
    
    function _get_data_from_post() {
        $data['slogan'] = $this->input->post('slogan');
        $data['fb_link'] = $this->input->post('fb_link');
        $data['twitter_link'] = $this->input->post('twitter_link');
        $data['instagram_link'] = $this->input->post('instagram_link');
        $data['linkdin_link'] = $this->input->post('linkdin_link');
        $data['pinterest_link'] = $this->input->post('pinterest_link');
        $data['phone'] = $this->input->post('phone');
        $data['fax'] = $this->input->post('fax');
        $data['email'] = $this->input->post('email');
        $data['address'] = $this->input->post('address');
        $data['google_lat'] = $this->input->post('google_lat');
        $data['google_lng'] = $this->input->post('google_lng');
        $data['title_map'] = $this->input->post('title_map');
        $data['description_map'] = $this->input->post('description_map');
        return $data;
    }

    function submit() {
        $update_id = $this->uri->segment(4);
        $data = $this->_get_data_from_post();
        $user_data = $this->session->userdata('user_data');
        if ($update_id != 0) {
            $itemInfo = $this->_getItemById($update_id);
            $actual_img_old = FCPATH . 'uploads/settings/actual_images/' . $itemInfo->image;
            $medium_img_old = FCPATH . 'uploads/settings/medium_images/' . $itemInfo->image;
            $large_img_old = FCPATH . 'uploads/settings/large_images/' . $itemInfo->image;
            if (isset($_FILES['news_file']['name']) && !empty($_FILES['news_file']['name'])) {
                if (file_exists($actual_img_old))
                    unlink($actual_img_old);
                if (file_exists($medium_img_old))
                    unlink($medium_img_old);
                if (file_exists($large_img_old))
                    unlink($large_img_old);
                $this->upload_image($update_id);
            }
            $this->_update($update_id, $data);
            $this->upload_image($id);
        }
        else
        {
            $id = $this->_insert($data);
        }
        $this->session->set_flashdata('message', 'settings'.' '.DATA_SAVED);
        $this->session->set_flashdata('status', 'success');
        redirect(ADMIN_BASE_URL . 'settings');
    }

    function upload_image($nId) {
        $upload_image_file = $this->input->post('hdn_image');
        if(isset($upload_image_file) && !empty($upload_image_file)){
            $upload_image_file = str_replace(' ', '_', $upload_image_file);
            $file_name = 'settings_' . $nId . $upload_image_file;
        }
        else{
            $file_name = '';
        }
        $config['upload_path'] = './uploads/settings/actual_images';
        $config['allowed_types'] = '*';
        $config['max_size'] = '20000';
        $config['max_width'] = '0';
        $config['max_height'] = '0';
        $config['file_name'] = $file_name;
        $this->load->library('upload');
        $this->upload->initialize($config);
        if (isset($_FILES['news_file'])) {
            $this->upload->do_upload('news_file');
        }
        $upload_data = $this->upload->data();

        /////////////// Large  Image ////////////////
        $config['source_image'] = $upload_data['full_path'];
        $config['image_library'] = 'gd2';
        $config['maintain_ratio'] = true;
        $config['width'] = 500;
        $config['height'] = 400;
        $config['new_image'] = './uploads/settings/large_images';
        $this->load->library('image_lib');
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
        $this->image_lib->clear();

        /////////////  Medium Size /////////////////// 
        $config['source_image'] = $upload_data['full_path'];
        $config['image_library'] = 'gd2';
        $config['maintain_ratio'] = true;
        $config['width'] = 300;
        $config['height'] = 200;
        $config['new_image'] = './uploads/settings/medium_images';
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
        $this->image_lib->clear();

        ////////////////////// Small Size ////////////////
        $config['source_image'] = $upload_data['full_path'];
        $config['image_library'] = 'gd2';
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 100;
        $config['height'] = 100;
        $config['new_image'] = './uploads/settings/small_images';
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
        $this->image_lib->clear();
        $data = array('image' => $file_name);
        // $where['id'] = $nId;
        $rsItem = $this->_update($nId, $data);
        if ($rsItem)
            return true;
        else
            return false;
    }
	
    function _getItemById($id) {
        $this->load->model('mdl_settings');
        return $this->mdl_settings->_getItemById($id);
    }

    function _get($order_by) {
        $this->load->model('mdl_settings');
        return $this->mdl_settings->_get($order_by);
    }

    function _get_by_arr_id($arr_col) {
        $this->load->model('mdl_settings');
        return $this->mdl_settings->_get_by_arr_id($arr_col);
    }

    function _update($arr_col,$data) {
        $this->load->model('mdl_settings');
        $this->mdl_settings->_update($arr_col, $data);
    }

    function _update_id($id, $data) {
        $this->load->model('mdl_settings');
        $this->mdl_settings->_update_id($id, $data);
    }
}