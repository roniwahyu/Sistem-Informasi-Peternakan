<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Orderbebas_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('orderbebas', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($Faktur) {
        $this->db->where('Faktur', $Faktur);
        $result = $this->db->get('orderbebas');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function save() {
           $data = array(
        
            'Tgl' => $this->input->post('Tgl', TRUE),
           
            'Kepada' => $this->input->post('Kepada', TRUE),
           
            'Alamat' => $this->input->post('Alamat', TRUE),
           
            'Sopir' => $this->input->post('Sopir', TRUE),
           
            'Mobil' => $this->input->post('Mobil', TRUE),
           
            'Barang' => $this->input->post('Barang', TRUE),
           
            'User' => $this->input->post('User', TRUE),
           
            'Time' => $this->input->post('Time', TRUE),
           
            'Status' => $this->input->post('Status', TRUE),
           
            'cNoJrn' => $this->input->post('cNoJrn', TRUE),
           
            'lVoid' => $this->input->post('lVoid', TRUE),
           
            'lPosted' => $this->input->post('lPosted', TRUE),
           
        );
        $this->db->insert('orderbebas', $data);
    }

    function update($Faktur) {
        $data = array(
        'Faktur' => $this->input->post('Faktur',TRUE),
       'Tgl' => $this->input->post('Tgl', TRUE),
       
       'Kepada' => $this->input->post('Kepada', TRUE),
       
       'Alamat' => $this->input->post('Alamat', TRUE),
       
       'Sopir' => $this->input->post('Sopir', TRUE),
       
       'Mobil' => $this->input->post('Mobil', TRUE),
       
       'Barang' => $this->input->post('Barang', TRUE),
       
       'User' => $this->input->post('User', TRUE),
       
       'Time' => $this->input->post('Time', TRUE),
       
       'Status' => $this->input->post('Status', TRUE),
       
       'cNoJrn' => $this->input->post('cNoJrn', TRUE),
       
       'lVoid' => $this->input->post('lVoid', TRUE),
       
       'lPosted' => $this->input->post('lPosted', TRUE),
       
        );
        $this->db->where('Faktur', $Faktur);
        $this->db->update('orderbebas', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($Faktur) {
        $this->db->where('Faktur', $Faktur);
        $this->db->delete('orderbebas'); 
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select Faktur, '.$value.' from orderbebas order by Faktur asc');
        $result[0]="-- Pilih Urutan Faktur --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->Faktur]= $row->$value;
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
