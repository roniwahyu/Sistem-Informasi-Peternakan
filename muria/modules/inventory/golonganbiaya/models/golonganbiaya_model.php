<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Golonganbiaya_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('golonganbiaya', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($Kode) {
        $this->db->where('Kode', $Kode);
        $result = $this->db->get('golonganbiaya');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function save() {
           $data = array(
        
            'Keterangan' => $this->input->post('Keterangan', TRUE),
           
            'Rekening' => $this->input->post('Rekening', TRUE),
           
            'Status' => $this->input->post('Status', TRUE),
           
            'User' => $this->input->post('User', TRUE),
           
            'Time' => $this->input->post('Time', TRUE),
           
        );
        $this->db->insert('golonganbiaya', $data);
    }

    function update($Kode) {
        $data = array(
        'Kode' => $this->input->post('Kode',TRUE),
       'Keterangan' => $this->input->post('Keterangan', TRUE),
       
       'Rekening' => $this->input->post('Rekening', TRUE),
       
       'Status' => $this->input->post('Status', TRUE),
       
       'User' => $this->input->post('User', TRUE),
       
       'Time' => $this->input->post('Time', TRUE),
       
        );
        $this->db->where('Kode', $Kode);
        $this->db->update('golonganbiaya', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($Kode) {
        $this->db->where('Kode', $Kode);
        $this->db->delete('golonganbiaya'); 
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select Kode, '.$value.' from golonganbiaya order by Kode asc');
        $result[0]="-- Pilih Urutan Kode --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->Kode]= $row->$value;
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
