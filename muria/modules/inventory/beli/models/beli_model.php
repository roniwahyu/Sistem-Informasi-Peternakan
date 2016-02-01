<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Beli_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('beli', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('beli');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function get_detail($faktur) {
        $this->db->where('faktur', $faktur);
        $result = $this->db->get('00-00-03-02-view-po-detail-2015');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    function get_last_po(){

        $this->db->select('id,Faktur');
        $this->db->order_by('id','DESC');
        $this->db->limit(1);

        $result=$this->db->get('00-00-03-02-view-po-detail-2015');
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
           
            'NmBarang' => $this->input->post('NmBarang', TRUE),
           
            'Qty' => $this->input->post('Qty', TRUE),
           
            'Satuan' => $this->input->post('Satuan', TRUE),
           
            'Harga' => $this->input->post('Harga', TRUE),
           
            'Discount' => $this->input->post('Discount', TRUE),
           
            'Discount2' => $this->input->post('Discount2', TRUE),
           
            'Promo' => $this->input->post('Promo', TRUE),
           
            'Jumlah' => $this->input->post('Jumlah', TRUE),
           
            'Status' => $this->input->post('Status', TRUE),
           
            'User' => $this->input->post('User', TRUE),
           
            'Time' => $this->input->post('Time', TRUE),
           
        );
        $this->db->insert('beli', $data);
    }

    function save_batch($data) {
           
        // $this->db->insert_batch('program_struktur', $data);
        $this->db->insert_batch('beli', $data);
        // return $this->db->affected_rows();
        return $this->db->insert_id();

    }
    function update($id) {
        $data = array(
        'id' => $this->input->post('id',TRUE),
       'Faktur' => $this->input->post('Faktur', TRUE),
       
       'Tgl' => $this->input->post('Tgl', TRUE),
       
       'Kode' => $this->input->post('Kode', TRUE),
       
       'NmBarang' => $this->input->post('NmBarang', TRUE),
       
       'Qty' => $this->input->post('Qty', TRUE),
       
       'Satuan' => $this->input->post('Satuan', TRUE),
       
       'Harga' => $this->input->post('Harga', TRUE),
       
       'Discount' => $this->input->post('Discount', TRUE),
       
       'Discount2' => $this->input->post('Discount2', TRUE),
       
       'Promo' => $this->input->post('Promo', TRUE),
       
       'Jumlah' => $this->input->post('Jumlah', TRUE),
       
       'Status' => $this->input->post('Status', TRUE),
       
       'User' => $this->input->post('User', TRUE),
       
       'Time' => $this->input->post('Time', TRUE),
       
        );
        $this->db->where('id', $id);
        $this->db->update('beli', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('beli'); 
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id, '.$value.' from beli order by id asc');
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
