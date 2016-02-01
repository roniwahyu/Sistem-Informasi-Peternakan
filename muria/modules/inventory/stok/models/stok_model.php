<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Stok_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('stok', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('stok');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function save() {
           $data = array(
        
            'id_barang' => $this->input->post('id_barang', TRUE),
           
            'stok_awal' => $this->input->post('stok_awal', TRUE),
           
            'stok_in' => $this->input->post('stok_in', TRUE),
           
            'stok_out' => $this->input->post('stok_out', TRUE),
           
            'stok_wip' => $this->input->post('stok_wip', TRUE),
           
            'stok_po' => $this->input->post('stok_po', TRUE),
           
            'stok_so' => $this->input->post('stok_so', TRUE),
           
            'stok_do' => $this->input->post('stok_do', TRUE),
           
            'stok_op' => $this->input->post('stok_op', TRUE),
           
            'keterangan' => $this->input->post('keterangan', TRUE),
           
            'id_user' => $this->input->post('id_user', TRUE),
           
            'datetime' => $this->input->post('datetime', TRUE),
           
        );
        $this->db->insert('stok', $data);
    }

    function update($id) {
        $data = array(
        'id' => $this->input->post('id',TRUE),
       'id_barang' => $this->input->post('id_barang', TRUE),
       
       'stok_awal' => $this->input->post('stok_awal', TRUE),
       
       'stok_in' => $this->input->post('stok_in', TRUE),
       
       'stok_out' => $this->input->post('stok_out', TRUE),
       
       'stok_wip' => $this->input->post('stok_wip', TRUE),
       
       'stok_po' => $this->input->post('stok_po', TRUE),
       
       'stok_so' => $this->input->post('stok_so', TRUE),
       
       'stok_do' => $this->input->post('stok_do', TRUE),
       
       'stok_op' => $this->input->post('stok_op', TRUE),
       
       'keterangan' => $this->input->post('keterangan', TRUE),
       
       'id_user' => $this->input->post('id_user', TRUE),
       
       'datetime' => $this->input->post('datetime', TRUE),
       
        );
        $this->db->where('id', $id);
        $this->db->update('stok', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('stok'); 
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id, '.$value.' from stok order by id asc');
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
