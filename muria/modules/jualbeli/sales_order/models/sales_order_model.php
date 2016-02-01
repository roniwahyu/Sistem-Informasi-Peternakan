<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Sales_order_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('sales_order', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('sales_order');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function get_last_so(){

        $this->db->select('id,faktur');
        $this->db->order_by('id','DESC');
        $this->db->limit(1);

        $result=$this->db->get('kas_keluar');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function save() {
           $data = array(
        
            'faktur' => $this->input->post('faktur', TRUE),
           
            'tgl' => $this->input->post('tgl', TRUE),
           
            'tgl_kedaluarsa' => $this->input->post('tgl_kedaluarsa', TRUE),
           
            'tgl_terima' => $this->input->post('tgl_terima', TRUE),
           
            'id_customer' => $this->input->post('id_customer', TRUE),
           
            'id_sales' => $this->input->post('id_sales', TRUE),
           
            'keterangan' => $this->input->post('keterangan', TRUE),
           
            'ref' => $this->input->post('ref', TRUE),
           
            'id_bayar' => $this->input->post('id_bayar', TRUE),
           
            'totalbayar' => $this->input->post('totalbayar', TRUE),
           
            'pajak' => $this->input->post('pajak', TRUE),
           
            'total_pajak' => $this->input->post('total_pajak', TRUE),
           
            'grandtotal' => $this->input->post('grandtotal', TRUE),
           
            'biaya_lain' => $this->input->post('biaya_lain', TRUE),
           
            'status' => $this->input->post('status', TRUE),
           
            'id_user' => $this->session->userdata('user_id'),
           
            'datetime' => date('Y-m-d H:i:s'),
           
        );
        $this->db->insert('sales_order', $data);
    }

    function update($id) {
        $data = array(
        'id' => $this->input->post('id',TRUE),
       'faktur' => $this->input->post('faktur', TRUE),
       
       'tgl' => $this->input->post('tgl', TRUE),
       
       'tgl_kedaluarsa' => $this->input->post('tgl_kedaluarsa', TRUE),
       
       'tgl_terima' => $this->input->post('tgl_terima', TRUE),
       
       'id_customer' => $this->input->post('id_customer', TRUE),
       
       'id_sales' => $this->input->post('id_sales', TRUE),
       
       'keterangan' => $this->input->post('keterangan', TRUE),
       
       'ref' => $this->input->post('ref', TRUE),
       
       'id_bayar' => $this->input->post('id_bayar', TRUE),
       
       'totalbayar' => $this->input->post('totalbayar', TRUE),
       
       'pajak' => $this->input->post('pajak', TRUE),
       
       'total_pajak' => $this->input->post('total_pajak', TRUE),
       
       'grandtotal' => $this->input->post('grandtotal', TRUE),
       
       'biaya_lain' => $this->input->post('biaya_lain', TRUE),
       
       'status' => $this->input->post('status', TRUE),
       
       'id_user' => $this->session->userdata('user_id'),
       
       'datetime' => date('Y-m-d H:i:s'),
       
        );
        $this->db->where('id', $id);
        $this->db->update('sales_order', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('sales_order'); 
       
    }
    function dropdown_customer(){
        $result = array();
        $array_keys_values = $this->db->query('select id,Kode,Nama,Wilayah from `customer` order by id asc');
        $result[0]="-- Pilih Customer --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id]= $row->Nama." (".$row->Kode.")";
        }
        return $result;
    }
    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id, '.$value.' from sales_order order by id asc');
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
