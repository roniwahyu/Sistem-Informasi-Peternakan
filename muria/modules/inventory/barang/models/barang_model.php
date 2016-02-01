<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Barang_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('barang', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('barang');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function save() {
           $data = array(
        
            'Kode' => $this->input->post('Kode', TRUE),
           
            'Cabang' => $this->input->post('Cabang', TRUE),
           
            'Barcode' => $this->input->post('Barcode', TRUE),
           
            'Nama' => $this->input->post('Nama', TRUE),
           
            'Keterangan' => $this->input->post('Keterangan', TRUE),
           
            'id_golongan' => $this->input->post('id_golongan', TRUE),
           
            'Kemasan' => $this->input->post('Kemasan', TRUE),
           
            'Isi2' => $this->input->post('Isi2', TRUE),
           
            'Isi3' => $this->input->post('Isi3', TRUE),
           
            'StKon' => $this->input->post('StKon', TRUE),
           
            'id_supplier' => $this->input->post('id_supplier', TRUE),
           
            'User' => $this->input->post('User', TRUE),
           
            'datetime' => $this->input->post('datetime', TRUE),
           
        );
        $this->db->insert('barang', $data);
    }
    function save_detail($data){
        $this->db->insert('barang_detail',$data);
    }
    function update($id) {
        $data = array(
        'id' => $this->input->post('id',TRUE),
       'Kode' => $this->input->post('Kode', TRUE),
       
       'Cabang' => $this->input->post('Cabang', TRUE),
       
       'Barcode' => $this->input->post('Barcode', TRUE),
       
       'Nama' => $this->input->post('Nama', TRUE),
       
       'Keterangan' => $this->input->post('Keterangan', TRUE),
       
       'id_golongan' => $this->input->post('id_golongan', TRUE),
       
       'Kemasan' => $this->input->post('Kemasan', TRUE),
       
       'Isi2' => $this->input->post('Isi2', TRUE),
       
       'Isi3' => $this->input->post('Isi3', TRUE),
       
       'StKon' => $this->input->post('StKon', TRUE),
       
       'id_supplier' => $this->input->post('id_supplier', TRUE),
       
       'User' => $this->input->post('User', TRUE),
       
       'datetime' => $this->input->post('datetime', TRUE),
       
        );
        $this->db->where('id', $id);
        $this->db->update('barang', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('barang'); 
       
    }
    function delete_detail($id=null) {
        $this->db->where('id_detail', $id);
      
        $this->db->delete('barang_detail'); 
       
    } 
    function delete_by_bukti($bukti=null) {
        $this->db->where('faktur', $bukti);
        $this->db->delete('barang_detail');

         
      
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id, '.$value.' from barang order by id asc');
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
