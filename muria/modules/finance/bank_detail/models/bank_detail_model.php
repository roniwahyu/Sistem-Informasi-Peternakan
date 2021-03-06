<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Bank_detail_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('bank_detail', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id_detail) {
        $this->db->where('id_detail', $id_detail);
        $result = $this->db->get('bank_detail');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function save() {
           $data = array(
        
            'id_trx_bank' => $this->input->post('id_trx_bank', TRUE),
           
            'bukti_bank' => $this->input->post('bukti_bank', TRUE),
           
            'akun_debet' => $this->input->post('akun_debet', TRUE),
           
            'akun_kredit' => $this->input->post('akun_kredit', TRUE),
           
            'faktur_lawan' => $this->input->post('faktur_lawan', TRUE),
           
            'akun_lawan' => $this->input->post('akun_lawan', TRUE),
           
            'nominal_detail' => $this->input->post('nominal_detail', TRUE),
           
            'keterangan_detail' => $this->input->post('keterangan_detail', TRUE),
           
            'status_detail' => $this->input->post('status_detail', TRUE),
           
            'user_id' => $this->input->post('user_id', TRUE),
           
            'datetime' => $this->input->post('datetime', TRUE),
           
        );
        $this->db->insert('bank_detail', $data);
    }

    function update($id_detail) {
        $data = array(
        'id_detail' => $this->input->post('id_detail',TRUE),
       'id_trx_bank' => $this->input->post('id_trx_bank', TRUE),
       
       'bukti_bank' => $this->input->post('bukti_bank', TRUE),
       
       'akun_debet' => $this->input->post('akun_debet', TRUE),
       
       'akun_kredit' => $this->input->post('akun_kredit', TRUE),
       
       'faktur_lawan' => $this->input->post('faktur_lawan', TRUE),
       
       'akun_lawan' => $this->input->post('akun_lawan', TRUE),
       
       'nominal_detail' => $this->input->post('nominal_detail', TRUE),
       
       'keterangan_detail' => $this->input->post('keterangan_detail', TRUE),
       
       'status_detail' => $this->input->post('status_detail', TRUE),
       
       'user_id' => $this->input->post('user_id', TRUE),
       
       'datetime' => $this->input->post('datetime', TRUE),
       
        );
        $this->db->where('id_detail', $id_detail);
        $this->db->update('bank_detail', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id_detail) {
        $this->db->where('id_detail', $id_detail);
        $this->db->delete('bank_detail'); 
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id_detail, '.$value.' from bank_detail order by id_detail asc');
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
