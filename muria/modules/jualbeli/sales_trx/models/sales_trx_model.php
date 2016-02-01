<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Sales_trx_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('sales_trx', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('sales_trx');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function save() {
           $data = array(
        
            'faktur' => $this->input->post('faktur', TRUE),
           
            'tgl' => $this->input->post('tgl', TRUE),
           
            'id_so' => $this->input->post('id_so', TRUE),
           
            'termin' => $this->input->post('termin', TRUE),
           
            'id_customer' => $this->input->post('id_customer', TRUE),
           
            'id_sales' => $this->input->post('id_sales', TRUE),
           
            'akun_piutang' => $this->input->post('akun_piutang', TRUE),
           
            'keterangan' => $this->input->post('keterangan', TRUE),
           
            'ref' => $this->input->post('ref', TRUE),
           
            'id_shipping' => $this->input->post('id_shipping', TRUE),
           
            'id_bayar' => $this->input->post('id_bayar', TRUE),
           
            'totalbayar' => $this->input->post('totalbayar', TRUE),
           
            'uangmuka' => $this->input->post('uangmuka', TRUE),
           
            'biayakirim' => $this->input->post('biayakirim', TRUE),
           
            'ppn' => $this->input->post('ppn', TRUE),
           
            'grandtotal' => $this->input->post('grandtotal', TRUE),
           
            'status' => $this->input->post('status', TRUE),
           
            'is_trx' => $this->input->post('is_trx', TRUE),
           
            'is_void' => $this->input->post('is_void', TRUE),
           
            'is_jrnl' => $this->input->post('is_jrnl', TRUE),
           
            'is_post' => $this->input->post('is_post', TRUE),
           
            'date_posted' => $this->input->post('date_posted', TRUE),
           
            'id_user' => $this->input->post('id_user', TRUE),
           
            'datetime' => $this->input->post('datetime', TRUE),
           
        );
        $this->db->insert('sales_trx', $data);
    }

    function update($id) {
        $data = array(
        'id' => $this->input->post('id',TRUE),
       'faktur' => $this->input->post('faktur', TRUE),
       
       'tgl' => $this->input->post('tgl', TRUE),
       
       'id_so' => $this->input->post('id_so', TRUE),
       
       'termin' => $this->input->post('termin', TRUE),
       
       'id_customer' => $this->input->post('id_customer', TRUE),
       
       'id_sales' => $this->input->post('id_sales', TRUE),
       
       'akun_piutang' => $this->input->post('akun_piutang', TRUE),
       
       'keterangan' => $this->input->post('keterangan', TRUE),
       
       'ref' => $this->input->post('ref', TRUE),
       
       'id_shipping' => $this->input->post('id_shipping', TRUE),
       
       'id_bayar' => $this->input->post('id_bayar', TRUE),
       
       'totalbayar' => $this->input->post('totalbayar', TRUE),
       
       'uangmuka' => $this->input->post('uangmuka', TRUE),
       
       'biayakirim' => $this->input->post('biayakirim', TRUE),
       
       'ppn' => $this->input->post('ppn', TRUE),
       
       'grandtotal' => $this->input->post('grandtotal', TRUE),
       
       'status' => $this->input->post('status', TRUE),
       
       'is_trx' => $this->input->post('is_trx', TRUE),
       
       'is_void' => $this->input->post('is_void', TRUE),
       
       'is_jrnl' => $this->input->post('is_jrnl', TRUE),
       
       'is_post' => $this->input->post('is_post', TRUE),
       
       'date_posted' => $this->input->post('date_posted', TRUE),
       
       'id_user' => $this->input->post('id_user', TRUE),
       
       'datetime' => $this->input->post('datetime', TRUE),
       
        );
        $this->db->where('id', $id);
        $this->db->update('sales_trx', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('sales_trx'); 
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id, '.$value.' from sales_trx order by id asc');
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
