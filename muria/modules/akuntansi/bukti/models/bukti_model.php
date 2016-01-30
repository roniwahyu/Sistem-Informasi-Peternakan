<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Bukti_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('bukti', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('bukti');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function save() {
           $data = array(
        
            'kode_bukti' => $this->input->post('kode_bukti', TRUE),
           
            'Keterangan' => $this->input->post('Keterangan', TRUE),
           
            'parent' => $this->input->post('parent', TRUE),
           
            'module' => $this->input->post('module', TRUE),
           
            'load_url' => $this->input->post('load_url', TRUE),
           
            'is_active' => $this->input->post('is_active', TRUE),
           
            'user_id' => $this->input->post('user_id', TRUE),
           
            'datetime' => $this->input->post('datetime', TRUE),
           
        );
        $this->db->insert('bukti', $data);
    }
    function save_detail($data){
        $this->db->insert('bukti_detail',$data);
    }
    function update($id) {
        $data = array(
        'id' => $this->input->post('id',TRUE),
       'kode_bukti' => $this->input->post('kode_bukti', TRUE),
       
       'Keterangan' => $this->input->post('Keterangan', TRUE),
       
       'parent' => $this->input->post('parent', TRUE),
       
       'module' => $this->input->post('module', TRUE),
       
       'load_url' => $this->input->post('load_url', TRUE),
       
       'is_active' => $this->input->post('is_active', TRUE),
       
       'user_id' => $this->input->post('user_id', TRUE),
       
       'datetime' => $this->input->post('datetime', TRUE),
       
        );
        $this->db->where('id', $id);
        $this->db->update('bukti', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('bukti'); 
       
    }
    function delete_detail($id=null) {
        $this->db->where('id_detail', $id);
      
        $this->db->delete('bukti_detail'); 
       
    } 
    function delete_by_bukti($bukti=null) {
        $this->db->where('faktur', $bukti);
        $this->db->delete('bukti_detail');

         
      
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id, '.$value.' from bukti order by id asc');
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
