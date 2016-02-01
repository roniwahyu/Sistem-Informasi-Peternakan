<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Purchase_return_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('purchase_return', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }  
    function get_return_detail($pr) {

        $result = $this->db->get('00-00-07-01-view-detail-return',$pr);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('purchase_return');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function get_transaction($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('00-00-06-00-view-transaksi-beli');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function get_last_pr(){

        $this->db->select('id,faktur_pr');
        $this->db->order_by('id','DESC');
        $this->db->limit(1);

        $result=$this->db->get('purchase_return');
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

    function save() {
           $data = array(
        
            'faktur_pr' => $this->input->post('faktur_pr', TRUE),
           
            'id_pt' => $this->input->post('id_pt', TRUE),
           
            'tgl_pr' => $this->input->post('tgl_pr', TRUE),
           
            'tipe_retur' => $this->input->post('tipe_retur', TRUE),
           
            'id_supplier' => $this->input->post('id_supplier', TRUE),
           
            'totalretur' => $this->input->post('totalretur', TRUE),
           
            'bayar' => $this->input->post('bayar', TRUE),
           
            'biayakirim' => $this->input->post('biayakirim', TRUE),
           
            'grandtotal' => $this->input->post('grandtotal', TRUE),
           
            'keterangan' => $this->input->post('keterangan', TRUE),
           
            'id_user' => $this->session->userdata('user_id'),
           
            'datetime' => date('Y-m-d H:i:s'),
           
        );
        $this->db->insert('purchase_return', $data);
    }

    function update($id) {
        $data = array(
        'id' => $this->input->post('id',TRUE),
       'faktur_pr' => $this->input->post('faktur_pr', TRUE),
       
       'id_pt' => $this->input->post('id_pt', TRUE),
       
       'tgl_pr' => $this->input->post('tgl_pr', TRUE),
       
       'tipe_retur' => $this->input->post('tipe_retur', TRUE),
       
       'id_supplier' => $this->input->post('id_supplier', TRUE),
       
       'totalretur' => $this->input->post('totalretur', TRUE),
       
       'bayar' => $this->input->post('bayar', TRUE),
       
       'biayakirim' => $this->input->post('biayakirim', TRUE),
       
       'grandtotal' => $this->input->post('grandtotal', TRUE),
       
       'keterangan' => $this->input->post('keterangan', TRUE),
       
       'id_user' => $this->session->userdata('user_id'),
       
       'datetime' => date('Y-m-d H:i:s'),
        );
        $this->db->where('id', $id);
        $this->db->update('purchase_return', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('purchase_return'); 
       
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

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id, '.$value.' from purchase_return order by id asc');
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
