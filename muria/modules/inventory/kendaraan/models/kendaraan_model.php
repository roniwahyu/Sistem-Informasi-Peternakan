<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Kendaraan_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('kendaraan', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('kendaraan');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function save() {
           $data = array(
        
            'nopol' => $this->input->post('nopol', TRUE),
           
            'nama' => $this->input->post('nama', TRUE),
           
            'kode' => $this->input->post('kode', TRUE),
           
            'akun_biaya' => $this->input->post('akun_biaya', TRUE),
           
            'akun_aktiva' => $this->input->post('akun_aktiva', TRUE),
           
            'akun_penyusutan' => $this->input->post('akun_penyusutan', TRUE),
           
            'daya_angkut' => $this->input->post('daya_angkut', TRUE),
           
            'id_wilayah' => $this->input->post('id_wilayah', TRUE),
           
            'jenis' => $this->input->post('jenis', TRUE),
           
            'kir_awal' => $this->input->post('kir_awal', TRUE),
           
            'kir_akhir' => $this->input->post('kir_akhir', TRUE),
           
            'user_id' => $this->input->post('user_id', TRUE),
           
            'datetime' => $this->input->post('datetime', TRUE),
           
        );
        $this->db->insert('kendaraan', $data);
    }
    function save_detail($data){
        $this->db->insert('kendaraan_detail',$data);
    }
    function update($id) {
        $data = array(
        'id' => $this->input->post('id',TRUE),
       'nopol' => $this->input->post('nopol', TRUE),
       
       'nama' => $this->input->post('nama', TRUE),
       
       'kode' => $this->input->post('kode', TRUE),
       
       'akun_biaya' => $this->input->post('akun_biaya', TRUE),
       
       'akun_aktiva' => $this->input->post('akun_aktiva', TRUE),
       
       'akun_penyusutan' => $this->input->post('akun_penyusutan', TRUE),
       
       'daya_angkut' => $this->input->post('daya_angkut', TRUE),
       
       'id_wilayah' => $this->input->post('id_wilayah', TRUE),
       
       'jenis' => $this->input->post('jenis', TRUE),
       
       'kir_awal' => $this->input->post('kir_awal', TRUE),
       
       'kir_akhir' => $this->input->post('kir_akhir', TRUE),
       
       'user_id' => $this->input->post('user_id', TRUE),
       
       'datetime' => $this->input->post('datetime', TRUE),
       
        );
        $this->db->where('id', $id);
        $this->db->update('kendaraan', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('kendaraan'); 
       
    }
    function delete_detail($id=null) {
        $this->db->where('id_detail', $id);
      
        $this->db->delete('kendaraan_detail'); 
       
    } 
    function delete_by_bukti($bukti=null) {
        $this->db->where('faktur', $bukti);
        $this->db->delete('kendaraan_detail');

         
      
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id, '.$value.' from kendaraan order by id asc');
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
