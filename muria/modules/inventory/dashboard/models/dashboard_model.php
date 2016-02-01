<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Dashboard_model extends CI_Model {

	public function get_total_blanja()
	{
		$result = $this->db->get('00-03-view-blanja-total');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
	}
	public function get_trealisasi_blanja()
    {
        $result = $this->db->get('00-05-view-total-realisasi-blanja');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    public function get_rekening_program($id=null)
    {
        if($id!=null):
          $this->db->where('id_struktur',$id);
        endif;
        
        $result = $this->db->get('00-01-view-pengguna-anggaran');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    public function get_user_struktur($id=null)
    {
        if($id!=null):
          $this->db->where('id_users',$id);
        endif;
        
        $result = $this->db->get('00-01-view-user-struktur');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    public function get_pengguna_anggaran($id=null)
    {
        if($id!=null):
          $this->db->where('id_struktur',$id);
        endif;
        $this->db->order_by('id_dppa','asc');
        $result = $this->db->get('00-01-view-pengguna-anggaran');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    public function get_kegiatan_program($id=null)
    {
        if($id!=null):
          $this->db->where('kdprogram',$id);
        endif;
        $this->db->order_by('id_dppa','asc');
        $result = $this->db->get('00-03-view-program-kegiatan');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    public function get_realisasi($rekening=null)
	{
        if($rekening!=null):
		  $this->db->where_in('kdrekening',$rekening);
        endif;
        $this->db->order_by('kdrekening','asc');
        $result = $this->db->get('00-04-view-prosen-realisasi-anggaran');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
	}
}

/* End of file dashboard_model.php */
/* Location: ./ */

 ?>