<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Purchase_order_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('purchase_order', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('purchase_order');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function save($data) {
           
        $this->db->insert('purchase_order', $data);
    }
    function transfer_detail_po($data){
         $this->db->insert_batch('purchase_order_detail', $data);
         $this->db->truncate('purchase_order_detail_temp');
         return $this->db->insert_id();
    }
    function get_last_po(){

        $this->db->select('id,faktur_po');
        $this->db->order_by('id','DESC');
        $this->db->limit(1);

        $result=$this->db->get('purchase_order');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function save_temp($data) {
          
        $this->db->insert('purchase_order_detail_temp', $data);
    }
   
    function delete_temp($id_detail) {
        $this->db->where('id_detail', $id_detail);
        $this->db->delete('purchase_order_detail_temp'); 
       
    }
    function reset_temp() {
        $this->db->truncate('purchase_order_detail_temp'); 
       
    }
    function getdetail_po_temp() {

        $result = $this->db->get('00-00-03-03-view-detail-po-temp');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function get_po_temp($id_po) {
        $this->db->where('id_po',$id_po);
        $result = $this->db->get('purchase_order_detail_temp');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function update($id) {
        $data = array(
        'id' => $this->input->post('id',TRUE),
       'faktur_po' => $this->input->post('faktur_po', TRUE),
       'tgl_po' => $this->input->post('tgl_po', TRUE),
       'id_supplier' => $this->input->post('id_supplier', TRUE),
       'keterangan' => $this->input->post('keterangan', TRUE),
       'ref_beli' => $this->input->post('ref_beli', TRUE),
       'id_stock_req' => $this->input->post('id_stock_req', TRUE),
       'id_bayar' => $this->input->post('id_bayar', TRUE),
       'totalbayar' => $this->input->post('totalbayar', TRUE),
       'uangmuka' => $this->input->post('uangmuka', TRUE),
       'grandtotal' => $this->input->post('grandtotal', TRUE),
       'biaya_kirim' => $this->input->post('biaya_kirim', TRUE),
       'status' => $this->input->post('status', TRUE),
       'tgl_kirim_po' => $this->input->post('tgl_kirim_po', TRUE),
       'tgl_kedaluarsa_po' => $this->input->post('tgl_kedaluarsa', TRUE),
       'id_user' => $this->input->post('id_user', TRUE),
       'datetime' => date('Y-m-d H:m:s'),
       
        );
        $this->db->where('id', $id);
        $this->db->update('purchase_order', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function get_po_total(){
        $result=$this->db->get('00-00-03-06-view-detail-po-temp-total');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
        
    }
    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('purchase_order'); 
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id, '.$value.' from purchase_order order by id asc');
        $result[0]="-- Pilih Urutan id --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id]= $row->$value;
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
    function dropdown_supplier(){
        $result = array();
        $array_keys_values = $this->db->query('select id,kode,nama from `00-00-02-02-view-supplier-kode` order by id asc');
        $result[0]="-- Pilih Supplier --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id]= $row->kode." (".$row->nama.")";
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
    function dropdown_satuan($id_barang){
        $result = array();
        $sql="select idsatuan,value,descrip,kode
            from(
            select id, id_barang,kode,'1' idsatuan,Satuan1 VALUE,'Satuan1' descrip from `00-00-01-05-view-barang-satuan` where id_barang='$id_barang'
            union all
            select id, id_barang,kode,'2' idsatuan,Satuan2 VALUE,'Satuan2' descrip from `00-00-01-05-view-barang-satuan` where id_barang='$id_barang'
            union all
            select id, id_barang,kode,'3' idsatuan,Satuan3 VALUE,'Satuan3' descrip from `00-00-01-05-view-barang-satuan` where id_barang='$id_barang'
            ) src group by descrip ";
        // $array_keys_values = $this->db->query('select id,Kode,Nama from supplier order by id asc');
        $array_keys_values = $this->db->query($sql);
        $result[0]="-- Pilih Supplier --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->idsatuan]= $row->value." (".$row->descrip.")";
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
