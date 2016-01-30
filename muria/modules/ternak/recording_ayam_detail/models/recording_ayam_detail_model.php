<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Recording_ayam_detail_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('recording_ayam_detail', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id_detail) {
        $this->db->where('id_detail', $id_detail);
        $result = $this->db->get('recording_ayam_detail');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function save() {
           $data = array(
        
            'id_recording_ayam' => $this->input->post('id_recording_ayam', TRUE),
           
            'faktur_recording' => $this->input->post('faktur_recording', TRUE),
            'faktur_reff' => $this->input->post('faktur_reff', TRUE),
           
            'id_record' => $this->input->post('id_record', TRUE),
           
            'id_barang' => $this->input->post('id_barang', TRUE),
           
            'jumlah_satuan' => $this->input->post('jumlah_satuan', TRUE),
           
            'jumlah_total' => $this->input->post('jumlah_total', TRUE),
           
            'id_satuan' => $this->input->post('id_satuan', TRUE),
           
            'harga' => $this->input->post('harga', TRUE),
           
            'subtotal' => $this->input->post('subtotal', TRUE),
           
            'user_id' => $this->input->post('user_id', TRUE),
           
            'datetime' => $this->input->post('datetime', TRUE),
           
        );
        $this->db->insert('recording_ayam_detail', $data);
    }
    function save_detail($data){
        $this->db->insert('recording_ayam_detail_detail',$data);
    }
    function update($id_detail) {
        $data = array(
        'id_detail' => $this->input->post('id_detail',TRUE),
       'id_recording_ayam' => $this->input->post('id_recording_ayam', TRUE),
       
       'faktur_recording' => $this->input->post('faktur_recording', TRUE),
       'faktur_reff' => $this->input->post('faktur_reff', TRUE),
       
       'id_record' => $this->input->post('id_record', TRUE),
       
       'id_barang' => $this->input->post('id_barang', TRUE),
       
       'jumlah_satuan' => $this->input->post('jumlah_satuan', TRUE),
       
       'jumlah_total' => $this->input->post('jumlah_total', TRUE),
       
       'id_satuan' => $this->input->post('id_satuan', TRUE),
       
       'harga' => $this->input->post('harga', TRUE),
       
       'subtotal' => $this->input->post('subtotal', TRUE),
       
       'user_id' => $this->input->post('user_id', TRUE),
       
       'datetime' => $this->input->post('datetime', TRUE),
       
        );
        $this->db->where('id_detail', $id_detail);
        $this->db->update('recording_ayam_detail', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id_detail) {
        $this->db->where('id_detail', $id_detail);
        $this->db->delete('recording_ayam_detail'); 
       
    }
    function delete_detail($id=null) {
        $this->db->where('id_detail', $id);
      
        $this->db->delete('recording_ayam_detail_detail'); 
       
    } 
    function delete_by_bukti($bukti=null) {
        $this->db->where('faktur', $bukti);
        $this->db->delete('recording_ayam_detail_detail');

         
      
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id_detail, '.$value.' from recording_ayam_detail order by id_detail asc');
        $result[0]="-- Pilih Urutan id_detail --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id_detail]= $row->$value;
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
