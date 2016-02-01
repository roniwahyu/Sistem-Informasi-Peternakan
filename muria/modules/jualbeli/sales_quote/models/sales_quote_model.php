<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Sales_quote_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('sales_quote', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('sales_quote');
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
           
            'kedaluarsa' => $this->input->post('kedaluarsa', TRUE),
           
            'id_customer' => $this->input->post('id_customer', TRUE),
           
            'kepada' => $this->input->post('kepada', TRUE),
           
            'alamat' => $this->input->post('alamat', TRUE),
           
            'id_sales' => $this->input->post('id_sales', TRUE),
           
            'keterangan' => $this->input->post('keterangan', TRUE),
           
            'status' => $this->input->post('status', TRUE),
           
            'diskon1' => $this->input->post('diskon1', TRUE),
           
            'diskon2' => $this->input->post('diskon2', TRUE),
           
            'pajak1' => $this->input->post('pajak1', TRUE),
           
            'pajak2' => $this->input->post('pajak2', TRUE),
           
            'grandtotal' => $this->input->post('grandtotal', TRUE),
           
            'is_approved' => $this->input->post('is_approved', TRUE),
           
            'datetime' => $this->input->post('datetime', TRUE),
           
        );
        $this->db->insert('sales_quote', $data);
    }
    function save_detail($data){
        $this->db->insert('sales_quote_detail',$data);
    }
    function update($id) {
        $data = array(
        'id' => $this->input->post('id',TRUE),
       'faktur' => $this->input->post('faktur', TRUE),
       
       'tanggal' => $this->input->post('tanggal', TRUE),
       
       'kedaluarsa' => $this->input->post('kedaluarsa', TRUE),
       
       'id_customer' => $this->input->post('id_customer', TRUE),
       
       'kepada' => $this->input->post('kepada', TRUE),
       
       'alamat' => $this->input->post('alamat', TRUE),
       
       'id_sales' => $this->input->post('id_sales', TRUE),
       
       'keterangan' => $this->input->post('keterangan', TRUE),
       
       'status' => $this->input->post('status', TRUE),
       
       'diskon1' => $this->input->post('diskon1', TRUE),
       
       'diskon2' => $this->input->post('diskon2', TRUE),
       
       'pajak1' => $this->input->post('pajak1', TRUE),
       
       'pajak2' => $this->input->post('pajak2', TRUE),
       
       'grandtotal' => $this->input->post('grandtotal', TRUE),
       
       'is_approved' => $this->input->post('is_approved', TRUE),
       
       'datetime' => $this->input->post('datetime', TRUE),
       
        );
        $this->db->where('id', $id);
        $this->db->update('sales_quote', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('sales_quote'); 
       
    }
    function delete_detail($id=null) {
        $this->db->where('id_detail', $id);
      
        $this->db->delete('sales_quote_detail'); 
       
    } 
    function delete_by_bukti($bukti=null) {
        $this->db->where('faktur', $bukti);
        $this->db->delete('sales_quote_detail');

         
      
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id, '.$value.' from sales_quote order by id asc');
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
