<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Bank_giro_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('bank_giro', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('bank_giro');
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
           
            'tipe_tt_giro' => $this->input->post('tipe_tt_giro', TRUE),
           
            'no_tt_giro' => $this->input->post('no_tt_giro', TRUE),
           
            'tgl_tt_giro' => $this->input->post('tgl_tt_giro', TRUE),
           
            'nominal' => $this->input->post('nominal', TRUE),
           
            'keterangan' => $this->input->post('keterangan', TRUE),
           
            'user_id' => $this->input->post('user_id', TRUE),
           
            'datetime' => $this->input->post('datetime', TRUE),
           
        );
        $this->db->insert('bank_giro', $data);
    }

    function update($id) {
        $data = array(
        'id' => $this->input->post('id',TRUE),
       'id_trx_bank' => $this->input->post('id_trx_bank', TRUE),
       
       'bukti_bank' => $this->input->post('bukti_bank', TRUE),
       
       'tipe_tt_giro' => $this->input->post('tipe_tt_giro', TRUE),
       
       'no_tt_giro' => $this->input->post('no_tt_giro', TRUE),
       
       'tgl_tt_giro' => $this->input->post('tgl_tt_giro', TRUE),
       
       'nominal' => $this->input->post('nominal', TRUE),
       
       'keterangan' => $this->input->post('keterangan', TRUE),
       
       'user_id' => $this->input->post('user_id', TRUE),
       
       'datetime' => $this->input->post('datetime', TRUE),
       
        );
        $this->db->where('id', $id);
        $this->db->update('bank_giro', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('bank_giro'); 
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id, '.$value.' from bank_giro order by id asc');
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
