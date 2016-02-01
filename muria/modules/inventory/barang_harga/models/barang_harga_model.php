<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Barang_harga_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('barang_harga', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('barang_harga');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function getharga($id) {
        $this->db->where('id_barang', $id);
        $result = $this->db->get('barang_harga');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function getsatuan($id){
        $this->db->where('id_barang', $id);
        $result = $this->db->get('barang_satuan');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function save() {
           $data = array(
        
            'id_barang' => $this->input->post('id_barang', TRUE),
           
            'markup' => $this->input->post('markup', TRUE),
           
            'hb1' => $this->input->post('hb1', TRUE),
           
            'hb2' => $this->input->post('hb2', TRUE),
           
            'hb3' => $this->input->post('hb3', TRUE),
           
            'hj1r' => $this->input->post('hj1r', TRUE),
           
            'hj2r' => $this->input->post('hj2r', TRUE),
           
            'hj3r' => $this->input->post('hj3r', TRUE),
           
            'hj1u' => $this->input->post('hj1u', TRUE),
           
            'hj2u' => $this->input->post('hj2u', TRUE),
           
            'hj3u' => $this->input->post('hj3u', TRUE),
           
            'hj2p' => $this->input->post('hj2p', TRUE),
           
            'hj3p' => $this->input->post('hj3p', TRUE),
           
            'hn1' => $this->input->post('hn1', TRUE),
           
            'hn2' => $this->input->post('hn2', TRUE),
           
            'hn3' => $this->input->post('hn3', TRUE),
           
            'max' => $this->input->post('max', TRUE),
           
            'datetime' => date('Y-m-d H:i:s'),
           
        );
        $this->db->insert('barang_harga', $data);
    }

    function update($id) {
        $data = array(
        'id' => $this->input->post('id',TRUE),
       'id_barang' => $this->input->post('id_barang', TRUE),
       
       'markup' => $this->input->post('markup', TRUE),
       
       'hb1' => $this->input->post('hb1', TRUE),
       
       'hb2' => $this->input->post('hb2', TRUE),
       
       'hb3' => $this->input->post('hb3', TRUE),
       
       'hj1r' => $this->input->post('hj1r', TRUE),
       
       'hj2r' => $this->input->post('hj2r', TRUE),
       
       'hj3r' => $this->input->post('hj3r', TRUE),
       
       'hj1u' => $this->input->post('hj1u', TRUE),
       
       'hj2u' => $this->input->post('hj2u', TRUE),
       
       'hj3u' => $this->input->post('hj3u', TRUE),
       
       'hj2p' => $this->input->post('hj2p', TRUE),
       
       'hj3p' => $this->input->post('hj3p', TRUE),
       
       'hn1' => $this->input->post('hn1', TRUE),
       
       'hn2' => $this->input->post('hn2', TRUE),
       
       'hn3' => $this->input->post('hn3', TRUE),
       
       'max' => $this->input->post('max', TRUE),
       
       'datetime' => date('Y-m-d H:i:s'),
       
        );
        $this->db->where('id', $id);
        $this->db->update('barang_harga', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('barang_harga'); 
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id, '.$value.' from barang_harga order by id asc');
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
