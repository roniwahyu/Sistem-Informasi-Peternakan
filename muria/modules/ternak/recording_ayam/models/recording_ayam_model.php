<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Recording_ayam_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('recording_ayam', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function get_lastx(){

        $this->db->select('id,faktur');
        $this->db->order_by('id','DESC');
        $this->db->limit(1);

        $result=$this->db->get('recording_ayam');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function get_last($type){

        $this->db->select('faktur');
           
                switch ($type) {
                    case 'isi':
                        $this->db->where('id_recording','1');
                    break;
                    case 'tambah':
                        $this->db->where('id_recording','2');
                    break;
                    case 'kosong':
                        $this->db->where('id_recording','8');
                    break;
                    case 'mati':
                        $this->db->where('id_recording','4');
                    break;
                    case 'afkir':
                        $this->db->where('id_recording','3');
                    break;
                   
                }
        $date=date('ym');
        $this->db->where('blnthnfaktur',$date);            
            
            
        $this->db->order_by('faktur','DESC');
        $this->db->limit(1);

        $result=$this->db->get('00-00-12-00-view-rekam-ayam');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
        // print $result->result_array();
    }
    function get_total($faktur=null){

        $this->db->select('total');
        $this->db->order_by('faktur','DESC');
        $this->db->where('faktur',$faktur);
        $this->db->limit(1);

        $result=$this->db->get('00-00-12-02-view-rekam-ayam-total');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function get_ayam(){

        $this->db->select('id,Kode,Nama');
        $this->db->order_by('id','ASC');
        $this->db->where('id_golongan','05');

        
        $result=$this->db->get('barang');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('recording_ayam');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function get_recording($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('00-00-12-00-view-rekam-ayam');
        if ($result->num_rows() ==1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function get_recording_detail($faktur) {
        $this->db->where('faktur', $faktur);
        $result = $this->db->get('00-00-12-01-view-rekam-ayam-detail');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function save() {
           $data = array(
        
            'faktur' => $this->input->post('faktur', TRUE),
            'reff' => $this->input->post('reff', TRUE),
           
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
           
            'id_user' =>  $this->session->userdata('user_id'),
           
            'datetime' => date('Y-m-d H:i:s'),
           
        );
        $this->db->insert('recording_ayam', $data);
    }
    function save_detail($data){
        $this->db->insert('recording_ayam_detail',$data);
    }
    function update($id) {
        $data = array(
        'id' => $this->input->post('id',TRUE),
       'faktur' => $this->input->post('faktur', TRUE),
       'reff' => $this->input->post('reff', TRUE),
       
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
       
       'id_user' => $this->session->userdata('user_id'),
       
       'datetime' => date('Y-m-d H:i:s'),
       
        );
        $this->db->where('id', $id);
        $this->db->update('recording_ayam', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('recording_ayam'); 
       
    }
    function delete_detail($id=null) {
        $this->db->where('id_detail', $id);
      
        $this->db->delete('recording_ayam_detail'); 
       
    } 
    function delete_by_bukti($bukti=null) {
        $this->db->where('faktur_recording', $bukti);
        $this->db->delete('recording_ayam_detail');
        echo $this->db->affected_rows();
    }

    function dropdown_ayam(){
        $result = array();
       
            $array_keys_values = $this->db->query('select id,kode,Nama from barang where id_golongan="05" order by Kode asc');
        $result[0]="-- Pilih Ayam --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id]= $row->kode." (".$row->Nama.")";
        }
           
        return $result;
    }
    function dropdown_kandang($mitra=null){
        $result = array();
        if(!empty($mitra)):
            $array_keys_values = $this->db->query('select id,kode,Keterangan,Gudang from kandang where Mitra="'.$mitra.'" order by id asc');
        endif;
        // $result[0]="-- Pilih Kandang --";
        if(!empty($array_keys_values)):
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id]= $row->kode." (".$row->Keterangan.")";
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
        $array_keys_values = $this->db->query('select id,kd_gudang,nama from gudang where kode_mitra="'.$mitra.'" order by id asc');
        else:
        $array_keys_values = $this->db->query('select id,kd_gudang,nama from gudang where id_mitra="0" order by id asc');
        endif;
        // $result[0]="-- Pilih Gudang --";
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
        $array_keys_values = $this->db->query('select id, '.$value.' from recording_ayam order by id asc');
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
