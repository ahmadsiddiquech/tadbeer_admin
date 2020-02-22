<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mdl_settings extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_table() {
        $table = "settings";
        return $table;
    }

    function _get_by_arr_id($arr_col) {
        $table = $this->get_table();
        $this->db->where($arr_col);
        return $this->db->get($table);
    }

    function _get($order_by) {
        $table = $this->get_table();
        $this->db->order_by($order_by);
        return $this->db->get($table);
    }

    function _update($arr_col, $data) {
        $table = $this->get_table();
        $this->db->where('id',$arr_col);
        $this->db->update($table, $data);
    }

    function _update_id($id, $data) {
        $table = $this->get_table();
        $this->db->where('id',$id);
        $this->db->update($table, $data);
    }

    function _getItemById($id) {
        $table = $this->get_table();
        $this->db->where('id',$id);
        $query = $this->db->get($table);
        return $query->row();
    }
}