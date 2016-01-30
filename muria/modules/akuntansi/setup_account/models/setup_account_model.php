<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Setup_account_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('setup_account', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('setup_account');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function save() {
           $data = array(
        
            'id_siklus' => $this->input->post('id_siklus', TRUE),
           
            'id_rekening' => $this->input->post('id_rekening', TRUE),
           
            'nama_account' => $this->input->post('nama_account', TRUE),
           
            'parent' => $this->input->post('parent', TRUE),
           
            'user_id' => $this->input->post('user_id', TRUE),
           
            'datetime' => $this->input->post('datetime', TRUE),
           
        );
        $this->db->insert('setup_account', $data);
    }

    function update($id) {
        $data = array(
        'id' => $this->input->post('id',TRUE),
       'id_siklus' => $this->input->post('id_siklus', TRUE),
       
       'id_rekening' => $this->input->post('id_rekening', TRUE),
       
       'nama_account' => $this->input->post('nama_account', TRUE),
       
       'parent' => $this->input->post('parent', TRUE),
       
       'user_id' => $this->input->post('user_id', TRUE),
       
       'datetime' => $this->input->post('datetime', TRUE),
       
        );
        $this->db->where('id', $id);
        $this->db->update('setup_account', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('setup_account'); 
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id, '.$value.' from setup_account order by id asc');
        $result[0]="-- Pilih Urutan id --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id]= $row->$value;
        }
        return $result;
    }

    //Update 30122014 SWI
    //untuk Array Dropdown dari database yang lain
    function get_drop_array($db,$key,$value){
        $result = array();
        $array_keys_values = $this->db->query('select '.$key.','.$value.' from '.$db.' order by '.$key.' asc');
        $result[0]="-- Pilih ".$value." --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->$key]= $row->$value;
        }
        return $result;
    }
    
}
?>
