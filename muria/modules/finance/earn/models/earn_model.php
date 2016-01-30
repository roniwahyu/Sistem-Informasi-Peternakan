<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Earn_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('earn', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('earn');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function get_last_faktur(){

        $this->db->select('id,Faktur');
        $this->db->order_by('id','DESC');
        $this->db->limit(1);

        $result=$this->db->get('earn');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function save() {
           $data = array(
        
            'Faktur' => $this->input->post('Faktur', TRUE),
           
            'Tgl' => $this->input->post('Tgl', TRUE),
           
            'Kode' => $this->input->post('Kode', TRUE),
           
            'Keterangan' => $this->input->post('Keterangan', TRUE),
           
            'Rekening' => $this->input->post('Rekening', TRUE),
           
            'Ket' => $this->input->post('Ket', TRUE),
           
            'Jumlah' => $this->input->post('Jumlah', TRUE),
           
            'Status' => $this->input->post('Status', TRUE),
           
        );
        $this->db->insert('earn', $data);
    }

    function update($id) {
        $data = array(
        'id' => $this->input->post('id',TRUE),
       'Faktur' => $this->input->post('Faktur', TRUE),
       
       'Tgl' => $this->input->post('Tgl', TRUE),
       
       'Kode' => $this->input->post('Kode', TRUE),
       
       'Keterangan' => $this->input->post('Keterangan', TRUE),
       
       'Rekening' => $this->input->post('Rekening', TRUE),
       
       'Ket' => $this->input->post('Ket', TRUE),
       
       'Jumlah' => $this->input->post('Jumlah', TRUE),
       
       'Status' => $this->input->post('Status', TRUE),
       
        );
        $this->db->where('id', $id);
        $this->db->update('earn', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('earn'); 
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id, '.$value.' from earn order by id asc');
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
