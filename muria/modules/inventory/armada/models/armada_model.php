<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Armada_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('armada', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('armada');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function save() {
           $data = array(
        
            'kendaraan_id' => $this->input->post('kendaraan_id', TRUE),
           
            'supir_id' => $this->input->post('supir_id', TRUE),
           
            'supplier_id' => $this->input->post('supplier_id', TRUE),
           
            'customer_id' => $this->input->post('customer_id', TRUE),
           
            'rute_id' => $this->input->post('rute_id', TRUE),
           
            'wilayah_id' => $this->input->post('wilayah_id', TRUE),
           
            'mitra_id' => $this->input->post('mitra_id', TRUE),
           
            'gudang_id' => $this->input->post('gudang_id', TRUE),
           
            'kandang_id' => $this->input->post('kandang_id', TRUE),
           
            'userid' => $this->input->post('userid', TRUE),
           
            'datetime' => $this->input->post('datetime', TRUE),
           
        );
        $this->db->insert('armada', $data);
    }
    function save_detail($data){
        $this->db->insert('armada_detail',$data);
    }
    function update($id) {
        $data = array(
        'id' => $this->input->post('id',TRUE),
       'kendaraan_id' => $this->input->post('kendaraan_id', TRUE),
       
       'supir_id' => $this->input->post('supir_id', TRUE),
       
       'supplier_id' => $this->input->post('supplier_id', TRUE),
       
       'customer_id' => $this->input->post('customer_id', TRUE),
       
       'rute_id' => $this->input->post('rute_id', TRUE),
       
       'wilayah_id' => $this->input->post('wilayah_id', TRUE),
       
       'mitra_id' => $this->input->post('mitra_id', TRUE),
       
       'gudang_id' => $this->input->post('gudang_id', TRUE),
       
       'kandang_id' => $this->input->post('kandang_id', TRUE),
       
       'userid' => $this->input->post('userid', TRUE),
       
       'datetime' => $this->input->post('datetime', TRUE),
       
        );
        $this->db->where('id', $id);
        $this->db->update('armada', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('armada'); 
       
    }
    function delete_detail($id=null) {
        $this->db->where('id_detail', $id);
      
        $this->db->delete('armada_detail'); 
       
    } 
    function delete_by_bukti($bukti=null) {
        $this->db->where('faktur', $bukti);
        $this->db->delete('armada_detail');

         
      
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id, '.$value.' from armada order by id asc');
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
