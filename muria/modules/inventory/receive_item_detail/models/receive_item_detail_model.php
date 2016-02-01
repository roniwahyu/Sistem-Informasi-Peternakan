<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Receive_item_detail_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('receive_item_detail', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id_detail) {
        $this->db->where('id_detail', $id_detail);
        $result = $this->db->get('receive_item_detail');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function save() {
           $data = array(
        
            'faktur' => $this->input->post('faktur', TRUE),
           
            'faktur_reff' => $this->input->post('faktur_reff', TRUE),
           
            'faktur_do' => $this->input->post('faktur_do', TRUE),
           
            'id_barang' => $this->input->post('id_barang', TRUE),
           
            'id_satuan' => $this->input->post('id_satuan', TRUE),
           
            'jumlah' => $this->input->post('jumlah', TRUE),
           
            'jumlah_retur' => $this->input->post('jumlah_retur', TRUE),
           
            'id_mitra' => $this->input->post('id_mitra', TRUE),
           
            'id_gudang' => $this->input->post('id_gudang', TRUE),
           
            'id_kandang' => $this->input->post('id_kandang', TRUE),
           
            'keterangan' => $this->input->post('keterangan', TRUE),
           
            'user_id' => $this->input->post('user_id', TRUE),
           
            'datetime' => $this->input->post('datetime', TRUE),
           
        );
        $this->db->insert('receive_item_detail', $data);
    }
    function save_detail($data){
        $this->db->insert('receive_item_detail_detail',$data);
    }
    function update($id_detail) {
        $data = array(
        'id_detail' => $this->input->post('id_detail',TRUE),
       'faktur' => $this->input->post('faktur', TRUE),
       
       'faktur_reff' => $this->input->post('faktur_reff', TRUE),
       
       'faktur_do' => $this->input->post('faktur_do', TRUE),
       
       'id_barang' => $this->input->post('id_barang', TRUE),
       
       'id_satuan' => $this->input->post('id_satuan', TRUE),
       
       'jumlah' => $this->input->post('jumlah', TRUE),
       
       'jumlah_retur' => $this->input->post('jumlah_retur', TRUE),
       
       'id_mitra' => $this->input->post('id_mitra', TRUE),
       
       'id_gudang' => $this->input->post('id_gudang', TRUE),
       
       'id_kandang' => $this->input->post('id_kandang', TRUE),
       
       'keterangan' => $this->input->post('keterangan', TRUE),
       
       'user_id' => $this->input->post('user_id', TRUE),
       
       'datetime' => $this->input->post('datetime', TRUE),
       
        );
        $this->db->where('id_detail', $id_detail);
        $this->db->update('receive_item_detail', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id_detail) {
        $this->db->where('id_detail', $id_detail);
        $this->db->delete('receive_item_detail'); 
       
    }
    function delete_detail($id=null) {
        $this->db->where('id_detail', $id);
      
        $this->db->delete('receive_item_detail_detail'); 
       
    } 
    function delete_by_bukti($bukti=null) {
        $this->db->where('faktur', $bukti);
        $this->db->delete('receive_item_detail_detail');

         
      
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id_detail, '.$value.' from receive_item_detail order by id_detail asc');
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
