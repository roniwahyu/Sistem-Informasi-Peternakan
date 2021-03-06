<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Sales_return_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('sales_return', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('sales_return');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function save() {
           $data = array(
        
            'faktur_sr' => $this->input->post('faktur_sr', TRUE),
           
            'id_st' => $this->input->post('id_st', TRUE),
           
            'tgl_sr' => $this->input->post('tgl_sr', TRUE),
           
            'tipe_retur' => $this->input->post('tipe_retur', TRUE),
           
            'id_customer' => $this->input->post('id_customer', TRUE),
           
            'akun_piutang' => $this->input->post('akun_piutang', TRUE),
           
            'totalretur' => $this->input->post('totalretur', TRUE),
           
            'bayar' => $this->input->post('bayar', TRUE),
           
            'biayakirim' => $this->input->post('biayakirim', TRUE),
           
            'grandtotal' => $this->input->post('grandtotal', TRUE),
           
            'keterangan' => $this->input->post('keterangan', TRUE),
           
            'is_trx' => $this->input->post('is_trx', TRUE),
           
            'is_void' => $this->input->post('is_void', TRUE),
           
            'is_jrnl' => $this->input->post('is_jrnl', TRUE),
           
            'is_post' => $this->input->post('is_post', TRUE),
           
            'date_posted' => $this->input->post('date_posted', TRUE),
           
            'id_user' => $this->input->post('id_user', TRUE),
           
            'datetime' => $this->input->post('datetime', TRUE),
           
        );
        $this->db->insert('sales_return', $data);
    }
    function save_detail($data){
        $this->db->insert('sales_return_detail',$data);
    }
    function update($id) {
        $data = array(
        'id' => $this->input->post('id',TRUE),
       'faktur_sr' => $this->input->post('faktur_sr', TRUE),
       
       'id_st' => $this->input->post('id_st', TRUE),
       
       'tgl_sr' => $this->input->post('tgl_sr', TRUE),
       
       'tipe_retur' => $this->input->post('tipe_retur', TRUE),
       
       'id_customer' => $this->input->post('id_customer', TRUE),
       
       'akun_piutang' => $this->input->post('akun_piutang', TRUE),
       
       'totalretur' => $this->input->post('totalretur', TRUE),
       
       'bayar' => $this->input->post('bayar', TRUE),
       
       'biayakirim' => $this->input->post('biayakirim', TRUE),
       
       'grandtotal' => $this->input->post('grandtotal', TRUE),
       
       'keterangan' => $this->input->post('keterangan', TRUE),
       
       'is_trx' => $this->input->post('is_trx', TRUE),
       
       'is_void' => $this->input->post('is_void', TRUE),
       
       'is_jrnl' => $this->input->post('is_jrnl', TRUE),
       
       'is_post' => $this->input->post('is_post', TRUE),
       
       'date_posted' => $this->input->post('date_posted', TRUE),
       
       'id_user' => $this->input->post('id_user', TRUE),
       
       'datetime' => $this->input->post('datetime', TRUE),
       
        );
        $this->db->where('id', $id);
        $this->db->update('sales_return', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('sales_return'); 
       
    }
    function delete_detail($id=null) {
        $this->db->where('id_detail', $id);
      
        $this->db->delete('sales_return_detail'); 
       
    } 
    function delete_by_bukti($bukti=null) {
        $this->db->where('faktur', $bukti);
        $this->db->delete('sales_return_detail');

         
      
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id, '.$value.' from sales_return order by id asc');
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
