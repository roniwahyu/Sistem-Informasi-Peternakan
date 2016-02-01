<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Stockin_request_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('stockin_request', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('stockin_request');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function save() {
           $data = array(
        
            'id_barang' => $this->input->post('id_barang', TRUE),
           
            'jml' => $this->input->post('jml', TRUE),
           
            'stok' => $this->input->post('stok', TRUE),
           
            'id_user' => $this->input->post('id_user', TRUE),
           
            'id_gudang' => $this->input->post('id_gudang', TRUE),
           
            'id_kandang' => $this->input->post('id_kandang', TRUE),
           
            'datetime' => $this->input->post('datetime', TRUE),
           
        );
        $this->db->insert('stockin_request', $data);
    }

    function update($id) {
        $data = array(
        'id' => $this->input->post('id',TRUE),
       'id_barang' => $this->input->post('id_barang', TRUE),
       
       'jml' => $this->input->post('jml', TRUE),
       
       'stok' => $this->input->post('stok', TRUE),
       
       'id_user' => $this->input->post('id_user', TRUE),
       
       'id_gudang' => $this->input->post('id_gudang', TRUE),
       
       'id_kandang' => $this->input->post('id_kandang', TRUE),
       
       'datetime' => $this->input->post('datetime', TRUE),
       
        );
        $this->db->where('id', $id);
        $this->db->update('stockin_request', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('stockin_request'); 
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id, '.$value.' from stockin_request order by id asc');
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
