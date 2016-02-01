<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Jenis_barang_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('jenis_barang', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('jenis_barang');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function get_last_jenis($gol){

        $this->db->select('id,Kode,id_golongan');
        $this->db->where('id_golongan',$gol);
        $this->db->order_by('id_golongan,Kode','DESC');
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
        
            'Kode' => $this->input->post('Kode', TRUE),
           
            'Keterangan' => $this->input->post('Keterangan', TRUE),
           
            'parent' => $this->input->post('parent', TRUE),
           
            'User' => $this->input->post('User', TRUE),
           
            'Time' => date('Y-m-d H:m:s'),
           
        );
        $this->db->insert('jenis_barang', $data);
    }

    function update($id) {
        $data = array(
        'id' => $this->input->post('id',TRUE),
       'Kode' => $this->input->post('Kode', TRUE),
       
       'Keterangan' => $this->input->post('Keterangan', TRUE),
       
       'parent' => $this->input->post('parent', TRUE),
       
       'User' => $this->input->post('User', TRUE),
       
       'Time' => date('Y-m-d H:m:s'),
       
        );
        $this->db->where('id', $id);
        $this->db->update('jenis_barang', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('jenis_barang'); 
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id, '.$value.' from jenis_barang order by id asc');
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
