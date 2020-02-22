<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class About_us extends MX_Controller
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
        $data['news'] = $this->_get('about_us.id desc');
        $data['view_file'] = 'news';
        $this->load->module('template');
        $this->template->admin($data);
    }

    function create() {
        $update_id = $this->uri->segment(4);
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
        $where['about_us.id'] = $update_id;
        $query = $this->_get_by_arr_id($where);
        foreach ($query->result() as
                $row) {
            $data['id'] = $row->id;
            $data['title'] = $row->title;
            $data['description'] = $row->description;
            $data['image'] = $row->image;
            $data['status'] = $row->status;
        }
        if(isset($data))
            return $data;
    }
    
    function _get_data_from_post() {
        $data['title'] = $this->input->post('title');
        $data['description'] = $this->input->post('description');
        return $data;
    }

    function submit() {
            $update_id = $this->uri->segment(4);
            $data = $this->_get_data_from_post();
            // print_r($data);exit();

            $user_data = $this->session->userdata('user_data');
            if ($update_id != 0) {
                $itemInfo = $this->_getItemById($update_id);
                $actual_img_old = FCPATH . 'uploads/about_us/actual_images/' . $itemInfo->image;
                $medium_img_old = FCPATH . 'uploads/about_us/medium_images/' . $itemInfo->image;
                $large_img_old = FCPATH . 'uploads/about_us/large_images/' . $itemInfo->image;
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
            }
            else
            {
                $id = $this->_insert($data);
                $this->upload_image($id);
            }
                $this->session->set_flashdata('message', 'about_us'.' '.DATA_SAVED);
		        $this->session->set_flashdata('status', 'success');
            redirect(ADMIN_BASE_URL . 'about_us');
    }


    function delete() {
        $delete_id = $this->input->post('id');
        $itemInfo = $this->_getItemById($delete_id);
        $file = $itemInfo->image;
        unlink('./uploads/about_us/medium_images/' . $file);
        unlink('./uploads/about_us/large_images/' . $file);
        unlink('./uploads/about_us/actual_images/' . $file);
        $this->_delete($delete_id);
    }

    function set_publish() {
        $update_id = $this->uri->segment(4);
        $where['id'] = $update_id;
        $this->_set_publish($where);
        $this->session->set_flashdata('message', 'Post published successfully.');
        redirect(ADMIN_BASE_URL . 'about_us/manage/' . '');
    }

    function set_unpublish() {
        $update_id = $this->uri->segment(4);
        $where['id'] = $update_id;
        $this->_set_unpublish($where);
        $this->session->set_flashdata('message', 'Post un-published successfully.');
        redirect(ADMIN_BASE_URL . 'about_us/manage/' . '');
    }


    function upload_image($nId) {
        $upload_image_file = $this->input->post('hdn_image');
        if(isset($upload_image_file) && !empty($upload_image_file)){
            $upload_image_file = str_replace(' ', '_', $upload_image_file);
            $file_name = 'about_us_' . $nId . $upload_image_file;
        }
        else{
            $file_name = '';
        }
        $config['upload_path'] = './uploads/about_us/actual_images';
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
        $config['new_image'] = './uploads/about_us/large_images';
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
        $config['new_image'] = './uploads/about_us/medium_images';
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
        $config['new_image'] = './uploads/about_us/small_images';
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
   

    function change_status() {
        $id = $this->input->post('id');
        $status = $this->input->post('status');
        if ($status == PUBLISHED)
            $status = UN_PUBLISHED;
        else
            $status = PUBLISHED;
        $data = array('status' => $status);
        $status = $this->_update_id($id, $data);
        echo $status;
    }

    /////////////// for detail ////////////
    function detail() {
        $update_id = $this->input->post('id');
        $data['user'] = $this->_get_data_from_db($update_id);
        $this->load->view('detail', $data);
    }
	
    function _getItemById($id) {
        $this->load->model('mdl_about_us');
        return $this->mdl_about_us->_getItemById($id);
    }

    function _set_publish($arr_col) {
        $this->load->model('mdl_about_us');
        $this->mdl_about_us->_set_publish($arr_col);
    }

    function _set_unpublish($arr_col) {
        $this->load->model('mdl_about_us');
        $this->mdl_about_us->_set_unpublish($arr_col);
    }

    function _get($order_by) {
        $this->load->model('mdl_about_us');
        return $this->mdl_about_us->_get($order_by);
    }

    function _get_by_arr_id($arr_col) {
        $this->load->model('mdl_about_us');
        return $this->mdl_about_us->_get_by_arr_id($arr_col);
    }

    function _insert($data) {
        $this->load->model('mdl_about_us');
        return $this->mdl_about_us->_insert($data);
    }

    function _update($arr_col,$data) {
        $this->load->model('mdl_about_us');
        $this->mdl_about_us->_update($arr_col, $data);
    }

    function _update_id($id, $data) {
        $this->load->model('mdl_about_us');
        $this->mdl_about_us->_update_id($id, $data);
    }

    function _delete($arr_col) {       
        $this->load->model('mdl_about_us');
        $this->mdl_about_us->_delete($arr_col);
    }
}