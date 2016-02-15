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
    function get_last(){

        $this->db->select('id,faktur');
        $this->db->order_by('id','DESC');
        $this->db->limit(1);

        $result=$this->db->get('sales_order');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array('faktur'=>'');
        }
    }
    function get_detail_total($faktur=null){
        if(!empty($faktur)):
            $this->db->where('faktur',$faktur);
        endif;
        $result=$this->db->get('00-00-19-02-view-sales-order-total');
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
           
            'totalbayar' => $this->input->post('total', TRUE),
           
            'pajak' => $this->input->post('pajak', TRUE),
           
            'total_pajak' => $this->input->post('total_pajak', TRUE),
           
            'grandtotal' => $this->input->post('grandtotal', TRUE),
            'uangmuka' => $this->input->post('uangmuka', TRUE),
            'sisa' => $this->input->post('sisa', TRUE),
          
           
            'biaya_lain' => $this->input->post('biayakirim', TRUE),
           
            'status' => $this->input->post('status', TRUE),
           
            'id_user' => userid(),
           
            'datetime' => now(),
           
        );
        $this->db->insert('sales_order', $data);
    }
    function save_detail($data){
        $this->db->insert('sales_order_detail',$data);
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
       
       'totalbayar' => $this->input->post('total', TRUE),
       
       'pajak' => $this->input->post('pajak', TRUE),
       
       'total_pajak' => $this->input->post('total_pajak', TRUE),
       
       'grandtotal' => $this->input->post('grandtotal', TRUE),
       'uangmuka' => $this->input->post('uangmuka', TRUE),
       'sisa' => $this->input->post('sisa', TRUE),
      
       
       'biaya_lain' => $this->input->post('biayakirim', TRUE),
       
       'status' => $this->input->post('status', TRUE),
       
       'id_user' => userid(),
       
       'datetime' => now(),
       
        );
        $this->db->where('id', $id);
        $this->db->update('sales_order', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('sales_order'); 
       
    }
    function delete_detail($id=null) {
        $this->db->where('id_detail', $id);
      
        $this->db->delete('sales_order_detail'); 
       
    } 
    function delete_by_bukti($bukti=null) {
        $this->db->where('faktur', $bukti);
        $this->db->delete('sales_order_detail');

         
      
       
    }
    function dropdown_barang($kategori=null){
        $result = array();
        if(!empty($kategori)):
            $array_keys_values = $this->db->query('select id,Kode,Nama from `00-00-01-06-view-barang-kategori` where id_golongan='.$kategori.' order by id asc');
        else:
            $array_keys_values = $this->db->query('select id,Kode,Nama from `00-00-01-06-view-barang-kategori` order by id asc');
        endif;
        $result[0]="-- Pilih Barang --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id]= $row->Kode." (".$row->Nama.")";
        }
        return $result;
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
