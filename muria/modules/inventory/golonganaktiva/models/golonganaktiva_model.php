<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Golonganaktiva_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('golonganaktiva', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($Kode) {
        $this->db->where('Kode', $Kode);
        $result = $this->db->get('golonganaktiva');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function save() {
           $data = array(
        
            'Keterangan' => $this->input->post('Keterangan', TRUE),
           
            'user' => $this->input->post('user', TRUE),
           
            'Time' => $this->input->post('Time', TRUE),
           
        );
        $this->db->insert('golonganaktiva', $data);
    }

    function update($Kode) {
        $data = array(
        'Kode' => $this->input->post('Kode',TRUE),
       'Keterangan' => $this->input->post('Keterangan', TRUE),
       
       'user' => $this->input->post('user', TRUE),
       
       'Time' => $this->input->post('Time', TRUE),
       
        );
        $this->db->where('Kode', $Kode);
        $this->db->update('golonganaktiva', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($Kode) {
        $this->db->where('Kode', $Kode);
        $this->db->delete('golonganaktiva'); 
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select Kode, '.$value.' from golonganaktiva order by Kode asc');
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
