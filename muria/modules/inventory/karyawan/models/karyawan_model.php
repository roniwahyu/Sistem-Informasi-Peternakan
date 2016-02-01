<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Karyawan_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('karyawan', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($Kode) {
        $this->db->where('Kode', $Kode);
        $result = $this->db->get('karyawan');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function save() {
           $data = array(
        
            'Nama' => $this->input->post('Nama', TRUE),
           
            'Alamat' => $this->input->post('Alamat', TRUE),
           
            'TempatLahir' => $this->input->post('TempatLahir', TRUE),
           
            'TglLahir' => $this->input->post('TglLahir', TRUE),
           
            'JK' => $this->input->post('JK', TRUE),
           
            'Telepon' => $this->input->post('Telepon', TRUE),
           
            'Jabatan' => $this->input->post('Jabatan', TRUE),
           
            'NmJabatan' => $this->input->post('NmJabatan', TRUE),
           
            'TglMasuk' => $this->input->post('TglMasuk', TRUE),
           
            'Gapok' => $this->input->post('Gapok', TRUE),
           
            'Lembur' => $this->input->post('Lembur', TRUE),
           
            'TunjanganKeluarga' => $this->input->post('TunjanganKeluarga', TRUE),
           
            'TunjanganJabatan' => $this->input->post('TunjanganJabatan', TRUE),
           
            'Transport' => $this->input->post('Transport', TRUE),
           
            'Makan' => $this->input->post('Makan', TRUE),
           
            'Lain' => $this->input->post('Lain', TRUE),
           
            'Bonus' => $this->input->post('Bonus', TRUE),
           
            'Hutang' => $this->input->post('Hutang', TRUE),
           
            'NoAcc' => $this->input->post('NoAcc', TRUE),
           
            'User' => $this->input->post('User', TRUE),
           
            'Time' => $this->input->post('Time', TRUE),
           
        );
        $this->db->insert('karyawan', $data);
    }

    function update($Kode) {
        $data = array(
        'Kode' => $this->input->post('Kode',TRUE),
       'Nama' => $this->input->post('Nama', TRUE),
       
       'Alamat' => $this->input->post('Alamat', TRUE),
       
       'TempatLahir' => $this->input->post('TempatLahir', TRUE),
       
       'TglLahir' => $this->input->post('TglLahir', TRUE),
       
       'JK' => $this->input->post('JK', TRUE),
       
       'Telepon' => $this->input->post('Telepon', TRUE),
       
       'Jabatan' => $this->input->post('Jabatan', TRUE),
       
       'NmJabatan' => $this->input->post('NmJabatan', TRUE),
       
       'TglMasuk' => $this->input->post('TglMasuk', TRUE),
       
       'Gapok' => $this->input->post('Gapok', TRUE),
       
       'Lembur' => $this->input->post('Lembur', TRUE),
       
       'TunjanganKeluarga' => $this->input->post('TunjanganKeluarga', TRUE),
       
       'TunjanganJabatan' => $this->input->post('TunjanganJabatan', TRUE),
       
       'Transport' => $this->input->post('Transport', TRUE),
       
       'Makan' => $this->input->post('Makan', TRUE),
       
       'Lain' => $this->input->post('Lain', TRUE),
       
       'Bonus' => $this->input->post('Bonus', TRUE),
       
       'Hutang' => $this->input->post('Hutang', TRUE),
       
       'NoAcc' => $this->input->post('NoAcc', TRUE),
       
       'User' => $this->input->post('User', TRUE),
       
       'Time' => $this->input->post('Time', TRUE),
       
        );
        $this->db->where('Kode', $Kode);
        $this->db->update('karyawan', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($Kode) {
        $this->db->where('Kode', $Kode);
        $this->db->delete('karyawan'); 
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select Kode, '.$value.' from karyawan order by Kode asc');
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
