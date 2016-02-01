<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Receive_item_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('receive_item', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('receive_item');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function save() {
           $data = array(
        
            'faktur' => $this->input->post('faktur', TRUE),
           
            'faktur_reff' => $this->input->post('faktur_reff', TRUE),
           
            'faktur_do' => $this->input->post('faktur_do', TRUE),
           
            'id_supplier' => $this->input->post('id_supplier', TRUE),
           
            'tanggal' => $this->input->post('tanggal', TRUE),
           
            'tanggal_terima' => $this->input->post('tanggal_terima', TRUE),
           
            'kirim_via' => $this->input->post('kirim_via', TRUE),
           
            'keterangan' => $this->input->post('keterangan', TRUE),
           
            'alamat_terima' => $this->input->post('alamat_terima', TRUE),
           
            'id_cabang' => $this->input->post('id_cabang', TRUE),
           
            'id_mitra' => $this->input->post('id_mitra', TRUE),
           
            'id_kandang' => $this->input->post('id_kandang', TRUE),
           
            'id_gudang' => $this->input->post('id_gudang', TRUE),
           
            'nopol_pengirim' => $this->input->post('nopol_pengirim', TRUE),
           
            'nama_pengirim' => $this->input->post('nama_pengirim', TRUE),
           
            'is_approved' => $this->input->post('is_approved', TRUE),
           
            'user_id' => $this->input->post('user_id', TRUE),
           
            'datetime' => $this->input->post('datetime', TRUE),
           
        );
        $this->db->insert('receive_item', $data);
    }
    function save_detail($data){
        $this->db->insert('receive_item_detail',$data);
    }
    function update($id) {
        $data = array(
        'id' => $this->input->post('id',TRUE),
       'faktur' => $this->input->post('faktur', TRUE),
       
       'faktur_reff' => $this->input->post('faktur_reff', TRUE),
       
       'faktur_do' => $this->input->post('faktur_do', TRUE),
       
       'id_supplier' => $this->input->post('id_supplier', TRUE),
       
       'tanggal' => $this->input->post('tanggal', TRUE),
       
       'tanggal_terima' => $this->input->post('tanggal_terima', TRUE),
       
       'kirim_via' => $this->input->post('kirim_via', TRUE),
       
       'keterangan' => $this->input->post('keterangan', TRUE),
       
       'alamat_terima' => $this->input->post('alamat_terima', TRUE),
       
       'id_cabang' => $this->input->post('id_cabang', TRUE),
       
       'id_mitra' => $this->input->post('id_mitra', TRUE),
       
       'id_kandang' => $this->input->post('id_kandang', TRUE),
       
       'id_gudang' => $this->input->post('id_gudang', TRUE),
       
       'nopol_pengirim' => $this->input->post('nopol_pengirim', TRUE),
       
       'nama_pengirim' => $this->input->post('nama_pengirim', TRUE),
       
       'is_approved' => $this->input->post('is_approved', TRUE),
       
       'user_id' => $this->input->post('user_id', TRUE),
       
       'datetime' => $this->input->post('datetime', TRUE),
       
        );
        $this->db->where('id', $id);
        $this->db->update('receive_item', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('receive_item'); 
       
    }
    function delete_detail($id=null) {
        $this->db->where('id_detail', $id);
      
        $this->db->delete('receive_item_detail'); 
       
    } 
    function delete_by_bukti($bukti=null) {
        $this->db->where('faktur', $bukti);
        $this->db->delete('receive_item_detail');

         
      
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id, '.$value.' from receive_item order by id asc');
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
