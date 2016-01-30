<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Assembly_pakan_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('assembly_pakan', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('assembly_pakan');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function save() {
           $data = array(
        
            'faktur' => $this->input->post('faktur', TRUE),
           
            'tanggal' => $this->input->post('tanggal', TRUE),
           
            'id_gudang' => $this->input->post('id_gudang', TRUE),
           
            'id_recording' => $this->input->post('id_recording', TRUE),
           
            'id_formulasi' => $this->input->post('id_formulasi', TRUE),
           
            'akun_perkiraan' => $this->input->post('akun_perkiraan', TRUE),
           
            'total' => $this->input->post('total', TRUE),
           
            'is_trx' => $this->input->post('is_trx', TRUE),
           
            'is_void' => $this->input->post('is_void', TRUE),
           
            'is_jrnl' => $this->input->post('is_jrnl', TRUE),
           
            'is_post' => $this->input->post('is_post', TRUE),
           
            'date_posted' => $this->input->post('date_posted', TRUE),
           
            'id_user' => $this->input->post('id_user', TRUE),
           
            'datetime' => $this->input->post('datetime', TRUE),
           
        );
        $this->db->insert('assembly_pakan', $data);
    }
    function save_detail($data){
        $this->db->insert('assembly_pakan_detail',$data);
    }
    function update($id) {
        $data = array(
        'id' => $this->input->post('id',TRUE),
       'faktur' => $this->input->post('faktur', TRUE),
       
       'tanggal' => $this->input->post('tanggal', TRUE),
       
       'id_gudang' => $this->input->post('id_gudang', TRUE),
       
       'id_recording' => $this->input->post('id_recording', TRUE),
       
       'id_formulasi' => $this->input->post('id_formulasi', TRUE),
       
       'akun_perkiraan' => $this->input->post('akun_perkiraan', TRUE),
       
       'total' => $this->input->post('total', TRUE),
       
       'is_trx' => $this->input->post('is_trx', TRUE),
       
       'is_void' => $this->input->post('is_void', TRUE),
       
       'is_jrnl' => $this->input->post('is_jrnl', TRUE),
       
       'is_post' => $this->input->post('is_post', TRUE),
       
       'date_posted' => $this->input->post('date_posted', TRUE),
       
       'id_user' => $this->input->post('id_user', TRUE),
       
       'datetime' => $this->input->post('datetime', TRUE),
       
        );
        $this->db->where('id', $id);
        $this->db->update('assembly_pakan', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('assembly_pakan'); 
       
    }
    function delete_detail($id=null) {
        $this->db->where('id_detail', $id);
      
        $this->db->delete('assembly_pakan_detail'); 
       
    } 
    function delete_by_bukti($bukti=null) {
        $this->db->where('faktur', $bukti);
        $this->db->delete('assembly_pakan_detail');

         
      
       
    }
    function dropdown_gudang($mitra=null){
        $result = array();
        if(!empty($mitra)):
        $array_keys_values = $this->db->query('select id,kd_gudang,nama from gudang where kode_mitra="'.$mitra.'" or id_mitra="0" order by id asc');
        else:
        $array_keys_values = $this->db->query('select id,kd_gudang,nama from gudang where id_mitra="0" order by id asc');
        endif;
        $result[0]="-- Pilih Gudang --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id]= $row->kd_gudang." (".$row->nama.")";
        }
        return $result;
    }
    function dropdown_formulasi($mitra=null){
        $result = array();
      
        $array_keys_values = $this->db->query('select id,nama,tanggal from formulasi order by id asc');
     
        $result[0]="-- Pilih Hasil Formulasi--";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id]= $row->nama." (".$row->tanggal.")";
        }
        return $result;
    }
    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id, '.$value.' from assembly_pakan order by id asc');
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
