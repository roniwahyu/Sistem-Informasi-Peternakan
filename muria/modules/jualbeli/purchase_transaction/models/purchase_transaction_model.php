<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Purchase_transaction_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('purchase_transaction', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('purchase_transaction');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function getonepo($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('purchase_order');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function get_detail($id=null,$pt=null) {
        $this->db->where('id_pt', $id);
        $this->db->or_where('pt', $pt);
        $result = $this->db->get('purchase_transaction_detail');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function getonept($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('00-00-06-00-view-transaksi-beli');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function get_detail_po($id_po) {
        $this->db->where('po',$id_po);
        $result = $this->db->get('00-00-03-04-view-detail-po');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function get_detail_pt($id) {
        $this->db->where('id_pt',$id);
        $result = $this->db->get('00-00-06-00-view-transaksi-beli-detail');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function get_detail_total($pt=null){
        if(!empty($pt)):
            $this->db->where('faktur_pt',$pt);
        endif;
        $result=$this->db->get('00-00-06-01-view-trx-beli-detail-total');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
        
    }
    
     function get_last_pt(){

        $this->db->select('id,faktur_pt');
        $this->db->order_by('id','DESC');
        $this->db->limit(1);

        $result=$this->db->get('purchase_transaction');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function get_last_sp(){

        $this->db->select('id,Kode');
        $this->db->order_by('id','DESC');
        $this->db->limit(1);

        $result=$this->db->get('supplier');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function get_last_kdbarang($gol){

        $this->db->select('id,Kode,id_golongan');
        $this->db->where('id_golongan',$gol);
        $this->db->order_by('DESC');
        $this->db->limit(1);

        $result=$this->db->get('00-00-01-06-view-barang-kategori');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function getorder_supplier($idsupplier){

        // $this->db->select('idpo,faktur_po,tgl_po,kdsupplier,namasupplier,grandtotal,idsupplier');
        $this->db->select('idpo,faktur_po');
        $this->db->where('idsupplier',$idsupplier);
        $this->db->where('idpt',null);
        $this->db->order_by('idpo','DESC');
        

        $result=$this->db->get('00-00-03-01-view-po-trx');
        // $result=$this->db->get('00-00-03-00-view-purchase-order');
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
    function save() {
               // $gtotal_money = preg_replace('/,(\d{2})/', '.$1', $this->input->post('grandtotal', TRUE));
        // $gtotal_money = preg_replace('/[^\.]/', '',$this->input->post('grandtotal', TRUE));
           $data = array(
        
            'faktur_pt' => $this->input->post('faktur_pt', TRUE),
           
            'tgl_pt' => $this->input->post('tgl_pt', TRUE),
           
            'id_tipe_beli' => $this->input->post('id_tipe_beli', TRUE),
           
            'id_po' => $this->input->post('id_po', TRUE),
           
            'tgl_jatuh_tempo' => $this->input->post('tgl_jatuh_tempo', TRUE),
           
            'id_supplier' => $this->input->post('id_supplier', TRUE),
           
            'keterangan' => $this->input->post('keterangan', TRUE),
           
            'ref_beli' => $this->input->post('ref_beli', TRUE),
           
            'id_stock_req' => $this->input->post('id_stock_req', TRUE),
           
            'id_bayar' => $this->input->post('id_bayar', TRUE),
           
            'totalbayar' => $this->input->post('totalbayar', TRUE),
           
            'uangmuka' => $this->input->post('uangmuka', TRUE),
           
            'biayakirim' => $this->input->post('biayakirim', TRUE),
           
            'ppn' => $this->input->post('ppn', TRUE),
           
            'grandtotal' => $this->input->post('grandtotal', TRUE),
           
            'status' => $this->input->post('status', TRUE),
           
            'id_user' => $this->input->post('id_user', TRUE),
           
            'datetime' => date('Y-m-d H:m:s'),
           
        );
        $this->db->insert('purchase_transaction', $data);
        return $this->db->insert_id();
    }

    function save_batch($data) {
        $this->db->insert_batch('purchase_transaction_detail', $data);
        
        return $this->db->insert_id();

    }
     function save_detail($data) {
          
        $this->db->insert('purchase_transaction_detail', $data);
    }
    function update($id) {
               // $gtotal_money = preg_replace('/,(\d{2})/', '.$1', $this->input->post('grandtotal', TRUE));
        // $gtotal_money = preg_replace('/[^\.]/', '',$this->input->post('grandtotal', TRUE));
        $data = array(
        'id' => $this->input->post('id',TRUE),
       'faktur_pt' => $this->input->post('faktur_pt', TRUE),
       
       'tgl_pt' => $this->input->post('tgl_pt', TRUE),
       
       'id_tipe_beli' => $this->input->post('id_tipe_beli', TRUE),
       
       'id_po' => $this->input->post('id_po', TRUE),
       
       'tgl_jatuh_tempo' => $this->input->post('tgl_jatuh_tempo', TRUE),
       
       'id_supplier' => $this->input->post('id_supplier', TRUE),
       
       'keterangan' => $this->input->post('keterangan', TRUE),
       
       'ref_beli' => $this->input->post('ref_beli', TRUE),
       
       'id_stock_req' => $this->input->post('id_stock_req', TRUE),
       
       'id_bayar' => $this->input->post('id_bayar', TRUE),
       
       'totalbayar' => $this->input->post('totalbayar', TRUE),
       
       'uangmuka' => $this->input->post('uangmuka', TRUE),
       
       'biayakirim' => $this->input->post('biayakirim', TRUE),
       
       'ppn' => $this->input->post('ppn', TRUE),
       'grandtotal' => $this->input->post('grandtotal', TRUE),
       
       'status' => $this->input->post('status', TRUE),
       
       'id_user' => $this->input->post('id_user', TRUE),
       
       'datetime' => date('Y-m-d H:m:s'),
       
        );
        $this->db->where('id', $id);
        $this->db->update('purchase_transaction', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }
    function update_detail($pt,$id){
        $data=array(
            'id_pt'=>$id,
            );
        
        $this->db->where('pt', $pt);
        $this->db->update('purchase_transaction_detail', $data);
        return $this->db->affected_rows();
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('purchase_transaction'); 
       
    } 
    function delete_detail_pt($id=null,$pt=null) {
        $this->db->where('pt', $pt);
        $this->db->or_where('id_pt', $id);
        $this->db->delete('purchase_transaction_detail'); 
       
    }
    function delete_detail_id($id_detail) {
        $this->db->where('id_detail', $id_detail);
        $this->db->delete('purchase_transaction_detail'); 
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id, '.$value.' from purchase_transaction order by id asc');
        $result[0]="-- Pilih Urutan id --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id]= $row->$value;
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
