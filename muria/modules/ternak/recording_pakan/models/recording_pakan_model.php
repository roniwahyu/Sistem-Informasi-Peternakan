<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Recording_pakan_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('recording_pakan', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('recording_pakan');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function get_detail($faktur) {
        $this->db->where('faktur_recording', $faktur);
        $result = $this->db->get('recording_pakan_detail');
        if ($result->num_rows() >0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function get_rekaman($faktur) {
        $this->db->where('faktur', $faktur);
        $result = $this->db->get('00-00-14-02-view-rekam-pakan-total');
        if ($result->num_rows() ==1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function get_kandang($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('kandang');
        if ($result->num_rows() ==1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function get_mitra($kode) {
        $this->db->select('id,Kode,Nama');
        $this->db->where('Kode', $kode);
        $result = $this->db->get('customer');
        if ($result->num_rows() ==1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
     function get_last(){

        $this->db->select('id,faktur');
        $this->db->order_by('id','DESC');
        $this->db->limit(1);

        $result=$this->db->get('recording_pakan');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function get_total($faktur=null){

        $this->db->select('total');
        $this->db->order_by('faktur','DESC');
        $this->db->where('faktur',$faktur);
        $this->db->limit(1);

        $result=$this->db->get('00-00-14-02-view-rekam-pakan-total');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function get_pakan(){

        $this->db->select('id,Kode,Nama');
        $this->db->order_by('id','ASC');
        $this->db->where('id_golongan','02');

        
        $result=$this->db->get('barang');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function save() {
           $data = array(
        
            'faktur' => $this->input->post('faktur', TRUE),
           
            'tanggal' => $this->input->post('tanggal', TRUE),
           
            'id_kandang' => $this->input->post('id_kandang', TRUE),
           
            'id_gudang' => $this->input->post('id_gudang', TRUE),
           
            'id_mitra' => $this->input->post('id_mitra', TRUE),
           
            'id_recording' => $this->input->post('id_recording', TRUE),
           
            'akun_perkiraan' => $this->input->post('akun_perkiraan', TRUE),
           
            'total' => $this->input->post('total', TRUE),
           
            'tipe_stok' => $this->input->post('tipe_stok', TRUE),
           
            'is_trx' => $this->input->post('is_trx', TRUE),
           
            'is_void' => $this->input->post('is_void', TRUE),
           
            'is_jrnl' => $this->input->post('is_jrnl', TRUE),
           
            'is_post' => $this->input->post('is_post', TRUE),
           
            'date_posted' => $this->input->post('date_posted', TRUE),
           
            'id_user' => $this->input->post('id_user', TRUE),
           
            'datetime' => $this->input->post('datetime', TRUE),
           
        );
        $this->db->insert('recording_pakan', $data);
    }
    function save_detail($data){
        $this->db->insert('recording_pakan_detail',$data);
    }
    function update($id) {
        $data = array(
        'id' => $this->input->post('id',TRUE),
       'faktur' => $this->input->post('faktur', TRUE),
       
       'tanggal' => $this->input->post('tanggal', TRUE),
       
       'id_kandang' => $this->input->post('id_kandang', TRUE),
       
       'id_gudang' => $this->input->post('id_gudang', TRUE),
       
       'id_mitra' => $this->input->post('id_mitra', TRUE),
       
       'id_recording' => $this->input->post('id_recording', TRUE),
       
       'akun_perkiraan' => $this->input->post('akun_perkiraan', TRUE),
       
       'total' => $this->input->post('total', TRUE),
       
       'tipe_stok' => $this->input->post('tipe_stok', TRUE),
       
       'is_trx' => $this->input->post('is_trx', TRUE),
       
       'is_void' => $this->input->post('is_void', TRUE),
       
       'is_jrnl' => $this->input->post('is_jrnl', TRUE),
       
       'is_post' => $this->input->post('is_post', TRUE),
       
       'date_posted' => $this->input->post('date_posted', TRUE),
       
       'id_user' => $this->input->post('id_user', TRUE),
       
       'datetime' => $this->input->post('datetime', TRUE),
       
        );
        $this->db->where('id', $id);
        $this->db->update('recording_pakan', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('recording_pakan'); 
       
    }
    function delete_detail($id=null) {
        $this->db->where('id_detail', $id);
      
        $this->db->delete('recording_pakan_detail'); 
       
    } 
    function delete_by_bukti($bukti=null) {
        $this->db->where('faktur', $bukti);
        $this->db->delete('recording_pakan_detail');
  
      
       
    }
    function dropdown_barang($kategori=null){
        $result = array();
        if(!empty($kategori)):
            $array_keys_values = $this->db->query('select id,Kode,Nama from `00-00-01-06-view-barang-kategori` where id_golongan='.$kategori.' order by id asc');
        else:
            $array_keys_values = $this->db->query('select id,Kode,Nama from `00-00-01-06-view-barang-kategori` order by id asc');
        endif;
        $result[0]="-- Pilih Barang --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id]= $row->Kode." (".$row->Nama.")";
        }
        return $result;
    } 
    function dropdown_pakan(){
        $result = array();
       
            $array_keys_values = $this->db->query('select id,kode,Nama from barang where id_golongan="02" order by Kode asc');
        $result[0]="-- Pilih Pakan --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id]= $row->kode." (".$row->Nama.")";
        }
           
        return $result;
    }
    function dropdown_kandang($mitra=null){
        $result = array();
        if(!empty($mitra)):
            $array_keys_values = $this->db->query('select id,kode,NmMitra from kandang where Mitra="'.$mitra.'" order by id asc');
        endif;
        $result[0]="-- Pilih Kandang --";
        if(!empty($array_keys_values)):
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id]= $row->kode." (".$row->NmMitra.")";
        }
        else:
            $result=array('0'=>'-- Data Kandang --');
        endif;
        return $result;
    }
    function dropdown_mitra(){
        $result = array();
        $array_keys_values = $this->db->query('select id,kode,Nama from customer where golongan="MT" order by id asc');
        $result[0]="-- Pilih Mitra --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->kode]= $row->kode." (".$row->Nama.")";
        }
        return $result;
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

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id, '.$value.' from recording_pakan order by id asc');
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
