<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Recording_telur_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('recording_telur', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('recording_telur');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function get_recording($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('00-00-13-00-view-rekam-telur');
        if ($result->num_rows() ==1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function get_recording_detail($faktur) {
        $this->db->where('faktur', $faktur);
        $result = $this->db->get('00-00-13-01-view-rekam-telur-detail');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function get_detail($faktur) {
        $this->db->where('faktur_recording', $faktur);
        $result = $this->db->get('recording_telur_detail');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function getrekap_hasil_bulanan() {
      
        // $result = $this->db->get('00-00-13-12-view-rekap-hasil-bulanan-kandang');
        $result = $this->db->get('00-00-13-13-view-rekap-hasil-bulanan-permitra');
        // $result = $this->db->get('00-00-13-09-view-rekap-hasil-bulanan');
        // $result = $this->db->get('00-00-13-10-view-matriks-hasil-bulanan');
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
            'keterangan' => $this->input->post('keterangan', TRUE),
            'reff' => $this->input->post('reff', TRUE),
            'jumlah' => $this->input->post('jumlah', TRUE),
           
            'is_trx' =>1,
           
            'is_void' => $this->input->post('is_void', TRUE),
           
            'is_jrnl' => $this->input->post('is_jrnl', TRUE),
           
            'is_post' => $this->input->post('is_post', TRUE),
           
            'date_posted' => $this->input->post('date_posted', TRUE),
           
            'id_user' => $this->session->userdata('user_id'),
           
            'datetime' => date('Y-m-d H:m:s'),
           
        );
        $this->db->insert('recording_telur', $data);
        return $this->db->insert_id();
    }
    function save_detail($data){
        $this->db->insert('recording_telur_detail',$data);
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
       'keterangan' => $this->input->post('keterangan', TRUE),
       'reff' => $this->input->post('reff', TRUE),
       'jumlah' => $this->input->post('jumlah', TRUE),
       
     
       
       'date_posted' => $this->input->post('date_posted', TRUE),
       
       'id_user' => $this->session->userdata('user_id'),
       
       'datetime' => date('Y-m-d H:m:s'),
       
        );
        $this->db->where('id', $id);
        $this->db->update('recording_telur', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('recording_telur'); 
       
    }
    function delete_detail($id=null) {
        $this->db->where('id_detail', $id);
      
        $this->db->delete('recording_telur_detail'); 
       
    } 
    function delete_by_bukti($bukti=null) {
        $this->db->where('faktur', $bukti);
        $this->db->delete('recording_telur_detail');
    }
    function get_last($type){

        $this->db->select('faktur');
           
                switch ($type) {
                    case 'hasil':
                        $this->db->where('id_recording','9');
                    break; 
                    case 'kumpul':
                        $this->db->where('id_recording','9');
                    break;
                    case 'stok':
                        $this->db->where('id_recording','10');
                    break;
                    case 'pilah':
                        $this->db->where('id_recording','10');
                    break;
                    case 'pakai':
                        $this->db->where('id_recording','11');
                    break;
                    case 'rusak':
                        $this->db->where('id_recording','12');
                    break;
                }
        $date=date('ym');
        $this->db->where('blnthnfaktur',$date);            
            
            
        $this->db->order_by('faktur','DESC');
        $this->db->limit(1);

        $result=$this->db->get('00-00-13-00-view-rekam-telur');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
        // print $result->result_array();
    }
    function get_total($faktur=null){

        $this->db->select('total,jumlah');
        $this->db->order_by('faktur','DESC');
        $this->db->where('faktur',$faktur);
        $this->db->limit(1);

        $result=$this->db->get('00-00-13-02-view-rekam-telur-total');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function get_telur(){

        $this->db->select('id,Kode,Nama');
        $this->db->order_by('id','ASC');
        $this->db->where('id_golongan','01');

        
        $result=$this->db->get('barang');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }


    function dropdown_telur(){
        $result = array();
       
            $array_keys_values = $this->db->query('select id,kode,Nama from barang where id_golongan="01" order by Kode asc');
        $result[0]="-- Pilih Telur --";
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
        $array_keys_values = $this->db->query('select id,kd_gudang,nama from gudang where kode_mitra="'.$mitra.'" order by id asc');
        else:
        $array_keys_values = $this->db->query('select id,kd_gudang,nama from gudang order by id asc');
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
        $array_keys_values = $this->db->query('select id, '.$value.' from recording_telur order by id asc');
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
