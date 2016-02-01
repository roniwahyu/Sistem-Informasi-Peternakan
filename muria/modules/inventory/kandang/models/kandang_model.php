<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Kandang_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('kandang', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('kandang');
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
           
            'Gudang' => $this->input->post('Gudang', TRUE),
           
            'NmGudang' => $this->input->post('NmGudang', TRUE),
           
            'Mitra' => $this->input->post('Mitra', TRUE),
           
            'NmMitra' => $this->input->post('NmMitra', TRUE),
           
            'StKandang' => $this->input->post('StKandang', TRUE),
           
            'Faktur' => $this->input->post('Faktur', TRUE),
           
            'Barang' => $this->input->post('Barang', TRUE),
           
            'Tgl' => $this->input->post('Tgl', TRUE),
           
            'Qty' => $this->input->post('Qty', TRUE),
           
            'Satuan' => $this->input->post('Satuan', TRUE),
           
            'Umur' => $this->input->post('Umur', TRUE),
           
            'Status' => $this->input->post('Status', TRUE),
           
            'User' => $this->input->post('User', TRUE),
           
            'Time' => $this->input->post('Time', TRUE),
           
        );
        $this->db->insert('kandang', $data);
    }
    function save_detail($data){
        $this->db->insert('kandang_detail',$data);
    }
    function update($id) {
        $data = array(
        'id' => $this->input->post('id',TRUE),
       'Kode' => $this->input->post('Kode', TRUE),
       
       'Keterangan' => $this->input->post('Keterangan', TRUE),
       
       'Gudang' => $this->input->post('Gudang', TRUE),
       
       'NmGudang' => $this->input->post('NmGudang', TRUE),
       
       'Mitra' => $this->input->post('Mitra', TRUE),
       
       'NmMitra' => $this->input->post('NmMitra', TRUE),
       
       'StKandang' => $this->input->post('StKandang', TRUE),
       
       'Faktur' => $this->input->post('Faktur', TRUE),
       
       'Barang' => $this->input->post('Barang', TRUE),
       
       'Tgl' => $this->input->post('Tgl', TRUE),
       
       'Qty' => $this->input->post('Qty', TRUE),
       
       'Satuan' => $this->input->post('Satuan', TRUE),
       
       'Umur' => $this->input->post('Umur', TRUE),
       
       'Status' => $this->input->post('Status', TRUE),
       
       'User' => $this->input->post('User', TRUE),
       
       'Time' => $this->input->post('Time', TRUE),
       
        );
        $this->db->where('id', $id);
        $this->db->update('kandang', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('kandang'); 
       
    }
    function delete_detail($id=null) {
        $this->db->where('id_detail', $id);
      
        $this->db->delete('kandang_detail'); 
       
    } 
    function delete_by_bukti($bukti=null) {
        $this->db->where('faktur', $bukti);
        $this->db->delete('kandang_detail');

         
      
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id, '.$value.' from kandang order by id asc');
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
