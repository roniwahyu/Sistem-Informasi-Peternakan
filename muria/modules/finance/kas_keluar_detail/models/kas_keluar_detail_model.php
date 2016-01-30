<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Kas_keluar_detail_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('kas_keluar_detail', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id_detail) {
        $this->db->where('id_detail', $id_detail);
        $result = $this->db->get('kas_keluar_detail');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function save() {
           $data = array(
        
            'id_kas_masuk' => $this->input->post('id_kas_masuk', TRUE),
           
            'faktur_kas' => $this->input->post('faktur_kas', TRUE),
           
            'faktur_lawan' => $this->input->post('faktur_lawan', TRUE),
           
            'no_perkiraan' => $this->input->post('no_perkiraan', TRUE),
           
            'keterangan' => $this->input->post('keterangan', TRUE),
           
            'nominal' => $this->input->post('nominal', TRUE),
           
            'user_id' => $this->input->post('user_id', TRUE),
           
            'status_kas' => $this->input->post('status_kas', TRUE),
           
            'datetime' => $this->input->post('datetime', TRUE),
           
        );
        $this->db->insert('kas_keluar_detail', $data);
    }

    function update($id_detail) {
        $data = array(
        'id_detail' => $this->input->post('id_detail',TRUE),
       'id_kas_masuk' => $this->input->post('id_kas_masuk', TRUE),
       
       'faktur_kas' => $this->input->post('faktur_kas', TRUE),
       
       'faktur_lawan' => $this->input->post('faktur_lawan', TRUE),
       
       'no_perkiraan' => $this->input->post('no_perkiraan', TRUE),
       
       'keterangan' => $this->input->post('keterangan', TRUE),
       
       'nominal' => $this->input->post('nominal', TRUE),
       
       'user_id' => $this->input->post('user_id', TRUE),
       
       'status_kas' => $this->input->post('status_kas', TRUE),
       
       'datetime' => $this->input->post('datetime', TRUE),
       
        );
        $this->db->where('id_detail', $id_detail);
        $this->db->update('kas_keluar_detail', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id_detail) {
        $this->db->where('id_detail', $id_detail);
        $this->db->delete('kas_keluar_detail'); 
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id_detail, '.$value.' from kas_keluar_detail order by id_detail asc');
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
