<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Standart_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('standart', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('standart');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function save() {
           $data = array(
        
            'Kode' => $this->input->post('Kode', TRUE),
           
            'Umur' => $this->input->post('Umur', TRUE),
           
            'Berat' => $this->input->post('Berat', TRUE),
           
            'Pakan' => $this->input->post('Pakan', TRUE),
           
        );
        $this->db->insert('standart', $data);
    }
    function save_detail($data){
        $this->db->insert('standart_detail',$data);
    }
    function update($id) {
        $data = array(
        'id' => $this->input->post('id',TRUE),
       'Kode' => $this->input->post('Kode', TRUE),
       
       'Umur' => $this->input->post('Umur', TRUE),
       
       'Berat' => $this->input->post('Berat', TRUE),
       
       'Pakan' => $this->input->post('Pakan', TRUE),
       
        );
        $this->db->where('id', $id);
        $this->db->update('standart', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('standart'); 
       
    }
    function delete_detail($id=null) {
        $this->db->where('id_detail', $id);
      
        $this->db->delete('standart_detail'); 
       
    } 
    function delete_by_bukti($bukti=null) {
        $this->db->where('faktur', $bukti);
        $this->db->delete('standart_detail');

         
      
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id, '.$value.' from standart order by id asc');
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
