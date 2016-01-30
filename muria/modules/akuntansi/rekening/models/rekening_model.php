<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Rekening_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('rekening', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('rekening');
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
           
            'cJenis' => $this->input->post('cJenis', TRUE),
           
            'cGlobal' => $this->input->post('cGlobal', TRUE),
           
            'cKelompok' => $this->input->post('cKelompok', TRUE),
           
            'cJenisAcc' => $this->input->post('cJenisAcc', TRUE),
           
            'cType' => $this->input->post('cType', TRUE),
           
            'cGroup' => $this->input->post('cGroup', TRUE),
           
            'cLevel' => $this->input->post('cLevel', TRUE),
           
            'StTampil' => $this->input->post('StTampil', TRUE),
           
            'cParent' => $this->input->post('cParent', TRUE),
           
            'Awal' => $this->input->post('Awal', TRUE),
           
            'Debet' => $this->input->post('Debet', TRUE),
           
            'Kredit' => $this->input->post('Kredit', TRUE),
           
            'Akhir' => $this->input->post('Akhir', TRUE),
           
            'User' => $this->input->post('User', TRUE),
           
            'Time' => $this->input->post('Time', TRUE),
           
        );
        $this->db->insert('rekening', $data);
    }

    function update($id) {
        $data = array(
        'id' => $this->input->post('id',TRUE),
       'Kode' => $this->input->post('Kode', TRUE),
       
       'Keterangan' => $this->input->post('Keterangan', TRUE),
       
       'cJenis' => $this->input->post('cJenis', TRUE),
       
       'cGlobal' => $this->input->post('cGlobal', TRUE),
       
       'cKelompok' => $this->input->post('cKelompok', TRUE),
       
       'cJenisAcc' => $this->input->post('cJenisAcc', TRUE),
       
       'cType' => $this->input->post('cType', TRUE),
       
       'cGroup' => $this->input->post('cGroup', TRUE),
       
       'cLevel' => $this->input->post('cLevel', TRUE),
       
       'StTampil' => $this->input->post('StTampil', TRUE),
       
       'cParent' => $this->input->post('cParent', TRUE),
       
       'Awal' => $this->input->post('Awal', TRUE),
       
       'Debet' => $this->input->post('Debet', TRUE),
       
       'Kredit' => $this->input->post('Kredit', TRUE),
       
       'Akhir' => $this->input->post('Akhir', TRUE),
       
       'User' => $this->input->post('User', TRUE),
       
       'Time' => $this->input->post('Time', TRUE),
       
        );
        $this->db->where('id', $id);
        $this->db->update('rekening', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('rekening'); 
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id, '.$value.' from rekening order by id asc');
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
