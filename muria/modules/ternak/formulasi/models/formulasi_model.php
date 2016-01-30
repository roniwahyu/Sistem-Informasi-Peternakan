<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Formulasi_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('formulasi', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('formulasi');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function get_last(){

            $this->db->select('id,faktur');
            $this->db->order_by('id','DESC');
            $this->db->limit(1);

            $result=$this->db->get('formulasi');
            if ($result->num_rows() == 1) {
                return $result->row_array();
            } else {
                return array();
            }
        }
    function save() {
           $data = array(
        
            'tanggal' => $this->input->post('tanggal', TRUE),
           
            'nama' => $this->input->post('nama', TRUE),
            'faktur' => $this->input->post('faktur', TRUE),
           
            'keterangan' => $this->input->post('keterangan', TRUE),
           
            'id_mitra' => $this->input->post('id_mitra', TRUE),
           
            'id_kandang' => $this->input->post('id_kandang', TRUE),
           
            'id_gudang' => $this->input->post('id_gudang', TRUE),
           
            'id_layer' => $this->input->post('id_layer', TRUE),
           
            'id_strain' => $this->input->post('id_strain', TRUE),
           
            'id_grade' => $this->input->post('id_grade', TRUE),
           
            'jml_hasil_prediksi' => $this->input->post('jml_hasil_prediksi', TRUE),
           
            'jml_hasil_jadi' => $this->input->post('jml_hasil_jadi', TRUE),
           
            'satuan_jadi' => $this->input->post('satuan_jadi', TRUE),
           
            'umur' => $this->input->post('umur', TRUE),
           
            'user_id' => $this->input->post('user_id', TRUE),
           
            'datetime' => date('Y-m-d H:i:s'),
           
        );
        $this->db->insert('formulasi', $data);
    }
    function save_detail($data){
        $this->db->insert('formulasi_detail',$data);
    }
    function update($id) {
        $data = array(
        'id' => $this->input->post('id',TRUE),
       'tanggal' => $this->input->post('tanggal', TRUE),
       
       'nama' => $this->input->post('nama', TRUE),
       'faktur' => $this->input->post('faktur', TRUE),
       
       'keterangan' => $this->input->post('keterangan', TRUE),
       
       'id_mitra' => $this->input->post('id_mitra', TRUE),
       
       'id_kandang' => $this->input->post('id_kandang', TRUE),
       
       'id_gudang' => $this->input->post('id_gudang', TRUE),
       
       'id_layer' => $this->input->post('id_layer', TRUE),
       
       'id_strain' => $this->input->post('id_strain', TRUE),
       
       'id_grade' => $this->input->post('id_grade', TRUE),
       
       'jml_hasil_prediksi' => $this->input->post('jml_hasil_prediksi', TRUE),
       
       'jml_hasil_jadi' => $this->input->post('jml_hasil_jadi', TRUE),
       
       'satuan_jadi' => $this->input->post('satuan_jadi', TRUE),
       
       'umur' => $this->input->post('umur', TRUE),
       
       'user_id' => $this->input->post('user_id', TRUE),
       
      'datetime' => date('Y-m-d H:i:s'),
       
        );
        $this->db->where('id', $id);
        $this->db->update('formulasi', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('formulasi'); 
       
    }
    function delete_detail($id=null) {
        $this->db->where('id_detail', $id);
      
        $this->db->delete('formulasi_detail'); 
       
    } 
    function delete_by_bukti($bukti=null) {
        $this->db->where('faktur', $bukti);
        $this->db->delete('formulasi_detail');

         
      
       
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
        $array_keys_values = $this->db->query('select id, '.$value.' from formulasi order by id asc');
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
