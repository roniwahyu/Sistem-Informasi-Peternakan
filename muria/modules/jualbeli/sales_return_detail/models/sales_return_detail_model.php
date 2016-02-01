<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Sales_return_detail_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('sales_return_detail', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id_detail) {
        $this->db->where('id_detail', $id_detail);
        $result = $this->db->get('sales_return_detail');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function save() {
           $data = array(
        
            'faktur_sr' => $this->input->post('faktur_sr', TRUE),
           
            'id_sr' => $this->input->post('id_sr', TRUE),
           
            'id_barang' => $this->input->post('id_barang', TRUE),
           
            'harga_jual' => $this->input->post('harga_jual', TRUE),
           
            'jumlah' => $this->input->post('jumlah', TRUE),
           
            'id_satuan' => $this->input->post('id_satuan', TRUE),
           
            'keterangan' => $this->input->post('keterangan', TRUE),
           
            'id_user' => $this->input->post('id_user', TRUE),
           
            'datetime' => $this->input->post('datetime', TRUE),
           
        );
        $this->db->insert('sales_return_detail', $data);
    }

    function update($id_detail) {
        $data = array(
        'id_detail' => $this->input->post('id_detail',TRUE),
       'faktur_sr' => $this->input->post('faktur_sr', TRUE),
       
       'id_sr' => $this->input->post('id_sr', TRUE),
       
       'id_barang' => $this->input->post('id_barang', TRUE),
       
       'harga_jual' => $this->input->post('harga_jual', TRUE),
       
       'jumlah' => $this->input->post('jumlah', TRUE),
       
       'id_satuan' => $this->input->post('id_satuan', TRUE),
       
       'keterangan' => $this->input->post('keterangan', TRUE),
       
       'id_user' => $this->input->post('id_user', TRUE),
       
       'datetime' => $this->input->post('datetime', TRUE),
       
        );
        $this->db->where('id_detail', $id_detail);
        $this->db->update('sales_return_detail', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id_detail) {
        $this->db->where('id_detail', $id_detail);
        $this->db->delete('sales_return_detail'); 
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id_detail, '.$value.' from sales_return_detail order by id_detail asc');
        $result[0]="-- Pilih Urutan id_detail --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id_detail]= $row->$value;
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
