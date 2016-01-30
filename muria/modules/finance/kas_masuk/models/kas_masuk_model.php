<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Kas_masuk_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('kas_masuk', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('kas_masuk');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function get_total_kas_masuk($faktur) {
        $this->db->where('faktur_kas', $faktur);
        $result = $this->db->get('00-00-08-01-view-kas-masuk-total');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function get_last_km(){

        $this->db->select('id,faktur_kas');
        $this->db->order_by('id','DESC');
        $this->db->limit(1);

        $result=$this->db->get('kas_masuk');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function save() {
           $data = array(
        
            'faktur_kas' => $this->input->post('faktur_kas', TRUE),
           
            'tgl_kas' => $this->input->post('tgl_kas', TRUE),
           
            'akun_kas' => $this->input->post('akun_kas', TRUE),
           
            'id_customer' => $this->input->post('id_customer', TRUE),
           
            'ref' => $this->input->post('ref', TRUE),
           
            'keterangan' => $this->input->post('keterangan', TRUE),
           
            'nominal' => $this->input->post('nominal', TRUE),
           
            'is_jurnal' => $this->input->post('is_jurnal', TRUE),
           
            'is_trx' => $this->input->post('is_trx', TRUE),
           
            'user_id' => $this->session->userdata('user_id'),
           
            'datetime' => date('Y-m-d H:i:s'),
           
        );
        $this->db->insert('kas_masuk', $data);
        $id=$this->db->insert_id();
        $data["id_kas_masuk"]=$id;
        // array_push($data,$data);
        echo json_encode($data);
    }
    function save_detail($data) {
          
        $this->db->insert('kas_masuk_detail', $data);
    }
    function update($id) {
        $data = array(
        'id' => $this->input->post('id',TRUE),
       'faktur_kas' => $this->input->post('faktur_kas', TRUE),
       
       'tgl_kas' => $this->input->post('tgl_kas', TRUE),
       
       'akun_kas' => $this->input->post('akun_kas', TRUE),
       
       'id_customer' => $this->input->post('id_customer', TRUE),
       
       'ref' => $this->input->post('ref', TRUE),
       
       'keterangan' => $this->input->post('keterangan', TRUE),
       
       'nominal' => $this->input->post('nominal', TRUE),
       
       'is_jurnal' => $this->input->post('is_jurnal', TRUE),
       
       'is_trx' => $this->input->post('is_trx', TRUE),
       
        'user_id' => $this->session->userdata('user_id'),
       
       'datetime' => date('Y-m-d H:i:s'),
       
        );
        $this->db->where('id', $id);
        $this->db->update('kas_masuk', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('kas_masuk'); 
       
    }

    function delete_detail($id=null) {
        $this->db->where('id_detail', $id);
      
        $this->db->delete('kas_masuk_detail'); 
       
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
        $array_keys_values = $this->db->query('select id, '.$value.' from kas_masuk order by id asc');
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
