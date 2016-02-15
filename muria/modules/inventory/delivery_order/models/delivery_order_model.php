<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Delivery_order_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('delivery_order', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('delivery_order');
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

        $result=$this->db->get('delivery_order');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array('faktur'=>'');
        }
    }
    function save() {
           $data = array(
        
            'faktur' => $this->input->post('faktur', TRUE),
           
            'faktur_reff' => $this->input->post('faktur_reff', TRUE),
           
            'faktur_po' => $this->input->post('faktur_po', TRUE),
           
            'id_customer' => $this->input->post('id_customer', TRUE),
           
            'tanggal' => $this->input->post('tanggal', TRUE),
           
            'tanggal_kirim' => $this->input->post('tanggal_kirim', TRUE),
           
            'kirim_via' => $this->input->post('kirim_via', TRUE),
           
            'keterangan' => $this->input->post('keterangan', TRUE),
           
            'alamat_kirim' => $this->input->post('alamat_kirim', TRUE),
           
            'alamat_tagihan' => $this->input->post('alamat_tagihan', TRUE),
           
            'biaya_id' => $this->input->post('biaya_id', TRUE),
           
            'biaya_kirim' => $this->input->post('biaya_kirim', TRUE),
           
            'armada_id' => $this->input->post('armada_id', TRUE),
           
            'is_approved' => $this->input->post('is_approved', TRUE),
           
            'user_id' => userid(),
           
            'datetime' => now(),
           
        );
        $this->db->insert('delivery_order', $data);
    }
    function save_detail($data){
        $this->db->insert('delivery_order_detail',$data);
    }
    function update($id) {
        $data = array(
        'id' => $this->input->post('id',TRUE),
       'faktur' => $this->input->post('faktur', TRUE),
       
       'faktur_reff' => $this->input->post('faktur_reff', TRUE),
       
       'faktur_po' => $this->input->post('faktur_po', TRUE),
       
       'id_customer' => $this->input->post('id_customer', TRUE),
       
       'tanggal' => $this->input->post('tanggal', TRUE),
       
       'tanggal_kirim' => $this->input->post('tanggal_kirim', TRUE),
       
       'kirim_via' => $this->input->post('kirim_via', TRUE),
       
       'keterangan' => $this->input->post('keterangan', TRUE),
       
       'alamat_kirim' => $this->input->post('alamat_kirim', TRUE),
       
       'alamat_tagihan' => $this->input->post('alamat_tagihan', TRUE),
       
       'biaya_id' => $this->input->post('biaya_id', TRUE),
       
       'biaya_kirim' => $this->input->post('biaya_kirim', TRUE),
       
       'armada_id' => $this->input->post('armada_id', TRUE),
       
       'is_approved' => $this->input->post('is_approved', TRUE),
       
       'user_id' => userid(),
       
       'datetime' => now(),
       
        );
        $this->db->where('id', $id);
        $this->db->update('delivery_order', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('delivery_order'); 
       
    }
    function delete_detail($id=null) {
        $this->db->where('id_detail', $id);
      
        $this->db->delete('delivery_order_detail'); 
       
    } 
    function delete_by_bukti($bukti=null) {
        $this->db->where('faktur', $bukti);
        $this->db->delete('delivery_order_detail');

         
      
       
    }
    //Update 30122014 SWI
    //untuk Array Dropdown dari database yang lain
    function get_customer(){
        $result = array();
        $array_keys_values = $this->db->query('select id,Kode,Nama,Alamat from customer order by id asc');
        $result[0]="-- Pilih Customer --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id]= $row->Nama."(".$row->Kode.") - ".$row->Alamat;
        }
        return $result;
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id, '.$value.' from delivery_order order by id asc');
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
