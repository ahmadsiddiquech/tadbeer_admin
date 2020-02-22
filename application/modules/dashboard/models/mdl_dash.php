<?php
if ( ! defined('BASEPATH')) 
    exit('No direct script access allowed');

class Mdl_dash extends CI_Model {
    function __construct() {
        parent::__construct();
    }


    function get_total_service(){
        $table = 'services';
        return $this->db->get($table);
    }


    function get_total_provider(){
    	$table = 'news';
        return $this->db->get($table);
    }

    function get_total_package(){
        $table = 'packages';
        return $this->db->get($table);
    }

}