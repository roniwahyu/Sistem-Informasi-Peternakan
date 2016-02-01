<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Beli_baru_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('beli_baru', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
}
?>
