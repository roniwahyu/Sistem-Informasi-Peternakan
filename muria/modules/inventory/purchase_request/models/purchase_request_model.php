<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Purchase_request_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('purchase_request', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('purchase_request');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function save() {
           $data = array(
        
            'faktur' => $this->input->post('faktur', TRUE),
           
            'tanggal' => $this->input->post('tanggal', TRUE),
           
            'tanggal_tempo' => $this->input->post('tanggal_tempo', TRUE),
           
            'id_mitra' => $this->input->post('id_mitra', TRUE),
           
            'id_gudang' => $this->input->post('id_gudang', TRUE),
           
            'id_kandang' => $this->input->post('id_kandang', TRUE),
           
            'keterangan' => $this->input->post('keterangan', TRUE),
           
            'catatan' => $this->input->post('catatan', TRUE),
           
            'user_id' => $this->input->post('user_id', TRUE),
           
            'is_approved' => $this->input->post('is_approved', TRUE),
           
            'datetime' => $this->input->post('datetime', TRUE),
           
        );
        $this->db->insert('purchase_request', $data);
    }
    function save_detail($data){
        $this->db->insert('purchase_request_detail',$data);
    }
    function update($id) {
        $data = array(
        'id' => $this->input->post('id',TRUE),
       'faktur' => $this->input->post('faktur', TRUE),
       
       'tanggal' => $this->input->post('tanggal', TRUE),
       
       'tanggal_tempo' => $this->input->post('tanggal_tempo', TRUE),
       
       'id_mitra' => $this->input->post('id_mitra', TRUE),
       
       'id_gudang' => $this->input->post('id_gudang', TRUE),
       
       'id_kandang' => $this->input->post('id_kandang', TRUE),
       
       'keterangan' => $this->input->post('keterangan', TRUE),
       
       'catatan' => $this->input->post('catatan', TRUE),
       
       'user_id' => $this->input->post('user_id', TRUE),
       
       'is_approved' => $this->input->post('is_approved', TRUE),
       
       'datetime' => $this->input->post('datetime', TRUE),
       
        );
        $this->db->where('id', $id);
        $this->db->update('purchase_request', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('purchase_request'); 
       
    }
    function delete_detail($id=null) {
        $this->db->where('id_detail', $id);
      
        $this->db->delete('purchase_request_detail'); 
       
    } 
    function delete_by_bukti($bukti=null) {
        $this->db->where('faktur', $bukti);
        $this->db->delete('purchase_request_detail');

         
      
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id, '.$value.' from purchase_request order by id asc');
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
