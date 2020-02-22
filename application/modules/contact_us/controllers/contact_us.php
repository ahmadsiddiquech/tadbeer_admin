<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Contact_us extends MX_Controller
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
        $data['news'] = $this->_get('contact_us.id desc');
        $data['view_file'] = 'news';
        $this->load->module('template');
        $this->template->admin($data);
    }


    function _get_data_from_db($update_id) {
        $where['contact_us.id'] = $update_id;
        $query = $this->_get_by_arr_id($where);
        foreach ($query->result() as
                $row) {
            $data['id'] = $row->id;
            $data['name'] = $row->name;
            $data['email'] = $row->email;
            $data['subject'] = $row->subject;
            $data['message'] = $row->message;
            $data['date_time'] = $row->date_time;
            $data['status'] = $row->status;
        }
        if(isset($data))
            return $data;
    }
    
    function delete() {
        $delete_id = $this->input->post('id');
        $this->_delete($delete_id);
    }

    function set_publish() {
        $update_id = $this->uri->segment(4);
        $where['id'] = $update_id;
        $this->_set_publish($where);
        $this->session->set_flashdata('message', 'Post published successfully.');
        redirect(ADMIN_BASE_URL . 'contact_us/manage/' . '');
    }

    function set_unpublish() {
        $update_id = $this->uri->segment(4);
        $where['id'] = $update_id;
        $this->_set_unpublish($where);
        $this->session->set_flashdata('message', 'Post un-published successfully.');
        redirect(ADMIN_BASE_URL . 'contact_us/manage/' . '');
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
        $this->load->model('mdl_contact_us');
        return $this->mdl_contact_us->_getItemById($id);
    }

    function _set_publish($arr_col) {
        $this->load->model('mdl_contact_us');
        $this->mdl_contact_us->_set_publish($arr_col);
    }

    function _set_unpublish($arr_col) {
        $this->load->model('mdl_contact_us');
        $this->mdl_contact_us->_set_unpublish($arr_col);
    }

    function _get($order_by) {
        $this->load->model('mdl_contact_us');
        return $this->mdl_contact_us->_get($order_by);
    }

    function _get_by_arr_id($arr_col) {
        $this->load->model('mdl_contact_us');
        return $this->mdl_contact_us->_get_by_arr_id($arr_col);
    }

    function _update($arr_col,$data) {
        $this->load->model('mdl_contact_us');
        $this->mdl_contact_us->_update($arr_col, $data);
    }

    function _update_id($id, $data) {
        $this->load->model('mdl_contact_us');
        $this->mdl_contact_us->_update_id($id, $data);
    }

    function _delete($arr_col) {       
        $this->load->model('mdl_contact_us');
        $this->mdl_contact_us->_delete($arr_col);
    }
}