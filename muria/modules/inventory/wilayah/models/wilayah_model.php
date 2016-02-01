<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Wilayah_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('wilayah', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('wilayah');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function save() {
           $data = array(
        
            'kd_wilayah' => $this->input->post('kd_wilayah', TRUE),
           
            'wilayah' => $this->input->post('wilayah', TRUE),
           
            'propinsi' => $this->input->post('propinsi', TRUE),
           
            'keterangan' => $this->input->post('keterangan', TRUE),
           
            'id_user' => $this->input->post('id_user', TRUE),
           
            'status' => $this->input->post('status', TRUE),
           
            'datetime' => $this->input->post('datetime', TRUE),
           
        );
        $this->db->insert('wilayah', $data);
    }
    function save_detail($data){
        $this->db->insert('wilayah_detail',$data);
    }
    function update($id) {
        $data = array(
        'id' => $this->input->post('id',TRUE),
       'kd_wilayah' => $this->input->post('kd_wilayah', TRUE),
       
       'wilayah' => $this->input->post('wilayah', TRUE),
       
       'propinsi' => $this->input->post('propinsi', TRUE),
       
       'keterangan' => $this->input->post('keterangan', TRUE),
       
       'id_user' => $this->input->post('id_user', TRUE),
       
       'status' => $this->input->post('status', TRUE),
       
       'datetime' => $this->input->post('datetime', TRUE),
       
        );
        $this->db->where('id', $id);
        $this->db->update('wilayah', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('wilayah'); 
       
    }
    function delete_detail($id=null) {
        $this->db->where('id_detail', $id);
      
        $this->db->delete('wilayah_detail'); 
       
    } 
    function delete_by_bukti($bukti=null) {
        $this->db->where('faktur', $bukti);
        $this->db->delete('wilayah_detail');

         
      
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id, '.$value.' from wilayah order by id asc');
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
