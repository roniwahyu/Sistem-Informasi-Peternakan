<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Hutang_beli_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

 
    function get_one($id) {
        $this->db->where('idsp', $id);
        $result = $this->db->get('00-00-06-02-view-hutang-supplier');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
}

?>