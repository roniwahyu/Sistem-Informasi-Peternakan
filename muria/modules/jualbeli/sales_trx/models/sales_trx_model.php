<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Sales_trx_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('sales_trx', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('sales_trx');
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

        $result=$this->db->get('sales_trx');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array('faktur'=>'');
        }
    }
    function getorder_customer($idcustomer){

        $this->db->select('id,faktur,tgl,kdcustomer,namacustomer,grandtotal,idcustomer');
        $this->db->where('idcustomer',$idcustomer);
        $this->db->order_by('id','DESC');
        

        $result=$this->db->get('00-00-19-00-view-sales-order');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function getorderdetail($faktur){

        $this->db->where('faktur',$faktur);
        $this->db->order_by('id_detail','DESC');
        

        $result=$this->db->get('00-00-19-01-view-sales-order-detail');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function get_total($faktur=null){

        $this->db->select('total');
        $this->db->order_by('faktur','DESC');
        $this->db->where('faktur',$faktur);
        $this->db->limit(1);

        $result=$this->db->get('00-00-19-02-view-sales-trx-total');
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
           
            'id_so' => $this->input->post('id_so', TRUE),
           
            'termin' => $this->input->post('termin', TRUE),
           
            'id_customer' => $this->input->post('id_customer', TRUE),
           
            'id_sales' => $this->input->post('id_sales', TRUE),
           
            'akun_piutang' => $this->input->post('akun_piutang', TRUE),
           
            'keterangan' => $this->input->post('keterangan', TRUE),
           
            'ref' => $this->input->post('ref', TRUE),
            'sisa' => $this->input->post('sisa', TRUE),
           
            'id_shipping' => $this->input->post('id_shipping', TRUE),
           
            'id_bayar' => $this->input->post('id_bayar', TRUE),
           
            'totalbayar' => $this->input->post('total', TRUE),
           
            'uangmuka' => $this->input->post('uangmuka', TRUE),
           
            'biayakirim' => $this->input->post('biayakirim', TRUE),
           
            'ppn' => $this->input->post('ppn', TRUE),
           
            'grandtotal' => $this->input->post('grandtotal', TRUE),
           
            'status' => $this->input->post('status', TRUE),
           
            'is_trx' => $this->input->post('is_trx', TRUE),
           
            'is_void' => $this->input->post('is_void', TRUE),
           
            'is_jrnl' => $this->input->post('is_jrnl', TRUE),
           
            'is_post' => $this->input->post('is_post', TRUE),
           
            'date_posted' => $this->input->post('date_posted', TRUE),
           
            'id_user' => userid(),
           
            'datetime' => now(),
           
        );
        $this->db->insert('sales_trx', $data);
    }
    function save_detail($data){
        $this->db->insert('sales_trx_detail',$data);
    }
    function save_batch($data){
        $this->db->insert_batch('sales_trx_detail',$data);
    }
    function update($id) {
        $data = array(
        'id' => $this->input->post('id',TRUE),
       'faktur' => $this->input->post('faktur', TRUE),
       
       'tgl' => $this->input->post('tgl', TRUE),
       
       'id_so' => $this->input->post('id_so', TRUE),
       
       'termin' => $this->input->post('termin', TRUE),
       
       'id_customer' => $this->input->post('id_customer', TRUE),
       
       'id_sales' => $this->input->post('id_sales', TRUE),
       
       'akun_piutang' => $this->input->post('akun_piutang', TRUE),
       
       'keterangan' => $this->input->post('keterangan', TRUE),
       
       'ref' => $this->input->post('ref', TRUE),
       'sisa' => $this->input->post('sisa', TRUE),
       
       'id_shipping' => $this->input->post('id_shipping', TRUE),
       
       'id_bayar' => $this->input->post('id_bayar', TRUE),
       
       'totalbayar' => $this->input->post('total', TRUE),
       
       'uangmuka' => $this->input->post('uangmuka', TRUE),
       
       'biayakirim' => $this->input->post('biayakirim', TRUE),
       
       'ppn' => $this->input->post('ppn', TRUE),
       
       'grandtotal' => $this->input->post('grandtotal', TRUE),
       
       'status' => $this->input->post('status', TRUE),
       
       'is_trx' => $this->input->post('is_trx', TRUE),
       
       'is_void' => $this->input->post('is_void', TRUE),
       
       'is_jrnl' => $this->input->post('is_jrnl', TRUE),
       
       'is_post' => $this->input->post('is_post', TRUE),
       
       'date_posted' => $this->input->post('date_posted', TRUE),
       
       'id_user' => userid(),
       
       'datetime' => now(),
       
        );
        $this->db->where('id', $id);
        $this->db->update('sales_trx', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('sales_trx'); 
       
    }
    function delete_detail($id=null) {
        $this->db->where('id_detail', $id);
      
        $this->db->delete('sales_trx_detail'); 
       
    } 
    function delete_by_bukti($bukti=null) {
        $this->db->where('faktur', $bukti);
        $this->db->delete('sales_trx_detail');

         
      
       
    }
    function dropdown_customer(){
        $result = array();
        $array_keys_values = $this->db->query('select id,Kode,Nama,Wilayah from `customer` where golongan!="MT" order by id asc');
        $result[0]="-- Pilih Customer --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id]= $row->Nama." (".$row->Kode.")";
        }
        return $result;
    }
     function dropdown_barang($id_supplier=null){
        $result = array();
        if(!empty($id_supplier)):
            $array_keys_values = $this->db->query('select id,Kode,Nama from `00-00-01-05-drop-barang-supplier` where id_supplier='.$id_supplier.' order by id asc');
        else:
            $array_keys_values = $this->db->query('select id,Kode,Nama from `00-00-01-05-drop-barang-supplier` order by id asc');
        endif;
        $result[0]="-- Pilih Barang --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id]= $row->Kode." (".$row->Nama.")";
        }
        return $result;
    } 
    function dropdown_pembayaran(){
        $result = array();
        $array_keys_values = $this->db->query('select id,jenis_pembayaran from jenis_pembayaran order by id asc');
        $result[0]="-- Pilih Metode Pembayaran --"; 
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id]= $row->jenis_pembayaran;
        }
        return $result;
    }
    function dropdown_kandang($mitra=null){
        $result = array();
        if(!empty($mitra)):
            $array_keys_values = $this->db->query('select id,kode,NmMitra from kandang where Mitra="'.$mitra.'" order by id asc');
        endif;
        $result[0]="-- Pilih Kandang --";
        if(!empty($array_keys_values)):
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id]= $row->kode." (".$row->NmMitra.")";
        }
        else:
            $result=array('0'=>'-- Data Kandang --');
        endif;
        return $result;
    }
    function dropdown_mitra(){
        $result = array();
        $array_keys_values = $this->db->query('select id,kode,Nama from customer where golongan="MT" order by id asc');
        $result[0]="-- Pilih Mitra --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->kode]= $row->kode." (".$row->Nama.")";
        }
        return $result;
    }
    function dropdown_gudang($mitra=null){
        $result = array();
        if(!empty($mitra)):
        $array_keys_values = $this->db->query('select id,kd_gudang,nama from gudang where kode_mitra="'.$mitra.'" order by id asc');
        else:
        $array_keys_values = $this->db->query('select id,kd_gudang,nama from gudang order by id asc');
        endif;
        $result[0]="-- Pilih Gudang --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id]= $row->kd_gudang." (".$row->nama.")";
        }
        return $result;
    }
    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id, '.$value.' from sales_trx order by id asc');
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
