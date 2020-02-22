<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Slider extends MX_Controller
{

function __construct() {
parent::__construct();
Modules::run('site_security/is_login');
//Modules::run('site_security/has_permission');

}
    
    
    function index() {
        // $this->load->library('ckeditor');
        // $this->load->library('ckfinder');



        // $this->ckeditor->basePath = STATIC_ADMIN_JS.'ckeditor/';
        // $this->ckeditor->config['toolbar'] = array(
        //                 array( 'Source', '-', 'Bold', 'Italic', 'Underline', '-','Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo','-','NumberedList','BulletedList' )
        //                                                     );
        // $this->ckeditor->config['language'] = 'it';
        // $this->ckeditor->config['width'] = '730px';
        // $this->ckeditor->config['height'] = '300px';            

        // //Add Ckfinder to Ckeditor
        // $this->ckfinder->SetupCKEditor($this->ckeditor,'../ckfinder/'); 
        $this->manage();

    }

    function manage() {
        $data['news'] = $this->_get('home_slider.id desc');
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
        $where['home_slider.id'] = $update_id;
        $query = $this->_get_by_arr_id($where);
        foreach ($query->result() as
                $row) {
            $data['id'] = $row->id;
            $data['title'] = $row->title;
            $data['description_1'] = $row->description_1;
            $data['description_2'] = $row->description_2;
            $data['button_text'] = $row->button_text;
            $data['button_link'] = $row->button_link;
            $data['image'] = $row->image;
            $data['status'] = $row->status;
        }
        if(isset($data))
            return $data;
    }
    
    function _get_data_from_post() {
        $data['title'] = $this->input->post('title');
        $data['description_1'] = $this->input->post('description_1');
        $data['description_2'] = $this->input->post('description_2');
        $data['button_text'] = $this->input->post('button_text');
        $data['button_link'] = $this->input->post('button_link');
        return $data;
    }

    function submit() {
            $update_id = $this->uri->segment(4);
            $data = $this->_get_data_from_post();
            // print_r($data);exit();

            $user_data = $this->session->userdata('user_data');
            if ($update_id != 0) {
                $itemInfo = $this->_getItemById($update_id);
                $actual_img_old = FCPATH . 'uploads/slider/actual_images/' . $itemInfo->image;
                $medium_img_old = FCPATH . 'uploads/slider/medium_images/' . $itemInfo->image;
                $large_img_old = FCPATH . 'uploads/slider/large_images/' . $itemInfo->image;
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
                $this->session->set_flashdata('message', 'slider'.' '.DATA_SAVED);
		        $this->session->set_flashdata('status', 'success');
            redirect(ADMIN_BASE_URL . 'slider');
    }


    function delete() {
        $delete_id = $this->input->post('id');
        $itemInfo = $this->_getItemById($delete_id);
        $file = $itemInfo->image;
        unlink('./uploads/slider/medium_images/' . $file);
        unlink('./uploads/slider/large_images/' . $file);
        unlink('./uploads/slider/actual_images/' . $file);
        $this->_delete($delete_id);
    }

    function set_publish() {
        $update_id = $this->uri->segment(4);
        $where['id'] = $update_id;
        $this->_set_publish($where);
        $this->session->set_flashdata('message', 'Post published successfully.');
        redirect(ADMIN_BASE_URL . 'slider/manage/' . '');
    }

    function set_unpublish() {
        $update_id = $this->uri->segment(4);
        $where['id'] = $update_id;
        $this->_set_unpublish($where);
        $this->session->set_flashdata('message', 'Post un-published successfully.');
        redirect(ADMIN_BASE_URL . 'slider/manage/' . '');
    }


    function upload_image($nId) {
        $upload_image_file = $this->input->post('hdn_image');
        if(isset($upload_image_file) && !empty($upload_image_file)){
            $upload_image_file = str_replace(' ', '_', $upload_image_file);
            $file_name = 'slider_' . $nId . $upload_image_file;
        }
        else{
            $file_name = '';
        }
        $config['upload_path'] = './uploads/slider/actual_images';
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
        $config['new_image'] = './uploads/slider/large_images';
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
        $config['new_image'] = './uploads/slider/medium_images';
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
        $config['new_image'] = './uploads/slider/small_images';
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
        $this->load->model('mdl_slider');
        return $this->mdl_slider->_getItemById($id);
    }

    function _set_publish($arr_col) {
        $this->load->model('mdl_slider');
        $this->mdl_slider->_set_publish($arr_col);
    }

    function _set_unpublish($arr_col) {
        $this->load->model('mdl_slider');
        $this->mdl_slider->_set_unpublish($arr_col);
    }

    function _get($order_by) {
        $this->load->model('mdl_slider');
        return $this->mdl_slider->_get($order_by);
    }

    function _get_by_arr_id($arr_col) {
        $this->load->model('mdl_slider');
        return $this->mdl_slider->_get_by_arr_id($arr_col);
    }

    function _insert($data) {
        $this->load->model('mdl_slider');
        return $this->mdl_slider->_insert($data);
    }

    function _update($arr_col,$data) {
        $this->load->model('mdl_slider');
        $this->mdl_slider->_update($arr_col, $data);
    }

    function _update_id($id, $data) {
        $this->load->model('mdl_slider');
        $this->mdl_slider->_update_id($id, $data);
    }

    function _delete($arr_col) {       
        $this->load->model('mdl_slider');
        $this->mdl_slider->_delete($arr_col);
    }
}