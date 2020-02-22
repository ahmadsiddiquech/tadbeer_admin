<?php
if ( ! defined('BASEPATH')) 
    exit('No direct script access allowed');
class Dashboard extends MX_Controller
{

    function __construct() {
        parent::__construct();
        Modules::run('site_security/is_login');
    }

function index(){
        $data['view_file'] = 'home';
        $this->load->module('template');
        $config=array();
        $ci = & get_instance();

        $ci->load->library('session');
        $user_data = $ci->session->userdata('user_data');
        $data['organization'] = $user_data['user_name'];
        $data['service'] = $this->get_total_service()->num_rows();
        $data['provider'] = $this->get_total_provider()->num_rows();
        $data['package'] = $this->get_total_package()->num_rows();
        // $data['product'] = $this->get_total_product();
        // $data['income'] = $this->get_income();
        // $data['expense'] = $this->get_expense();
        $this->template->admin($data);
    }

    

//==========================helper=========================

    function get_total_service(){
    	$this->load->model('mdl_dash');
    	return $this->mdl_dash->get_total_service();
    }

    function get_total_provider(){
        $this->load->model('mdl_dash');
        return $this->mdl_dash->get_total_provider();
    }

    function get_total_package(){
    	$this->load->model('mdl_dash');
    	return $this->mdl_dash->get_total_package();
    }

}