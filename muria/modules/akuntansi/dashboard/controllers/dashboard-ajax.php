<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Dashboard extends MX_Controller {
	function __construct(){
		parent::__construct();
	    $this->load->model('dashboard_model','dashdb',TRUE);
        $this->lang->load('auth');
        if ( !$this->ion_auth->logged_in()): 
            redirect('../auth/login', 'refresh');
     
        endif;
        $this->template->set_layout('dashboard');

       }
	public function index(){
        // $this->template->add_js('var baseurl="'.base_url().'gudang/";','embed');  
        $this->template->add_js('var baseurl="'.base_url().'supplier/";','embed');  
      
        // $this->template->add_js('plugins/dataTables/datatables.min.js');
            $this->template->add_js('plugins/dataTables/jquery.dataTables.js');
            // $this->template->add_js('plugins/dataTables/dataTables.bootstrap.js');
            // $this->template->add_css('plugins/dataTables/dataTables.bootstrap.css');
           // $this->template->add_js('DataTables/datatables.min.js');
           // $this->template->add_css('../js/DataTables/datatables.min.css');
           // $this->template->add_js('DataTables/DataTables-1.10.9/js/jquery.dataTables.min.js');
            $this->template->add_js('plugins/dataTables/dataTables.responsive.js');
            $this->template->add_css('plugins/dataTables/dataTables.responsive.css');
            $this->template->add_js('plugins/dataTables/dataTables.tableTools.min.js');
            $this->template->add_css('plugins/dataTables/dataTables.tableTools.min.css');
            
            $this->template->add_js('DataTables/DataTables-1.10.9/js/dataTables.bootstrap.min.js');
            $this->template->add_css('../js/DataTables/DataTables-1.10.9/css/dataTables.bootstrap.min.css');
        $this->template->add_js('datepicker.js');
        $this->template->add_js('datatables.js');
        $this->template->add_js('crud.js');
        $this->template->add_js('muria.js');
        // $this->template->add_js('datatables.js');
        // $this->ion_auth->get_users_groups($user->id)->result()
        if ($this->ion_auth->logged_in()):
            $user = $this->ion_auth->user()->row();
                if ( ! empty($user)):
                    $userid=$user->id;
                    // $usergroup=$this->ion_auth->get_users_groups($user->id)->row()->id();
                    // $this->ion_auth->get_users_groups($userid)->row()->id
                    // echo $usergroup;

            endif;
        endif;
        
        if($this->ion_auth->in_group(array(1))):
            
        else:
        
        endif;

        $this->template->load_view('dashboard_view',array());
        // redirect('site');

	}
    public function getdatatables(){
        $this->datatables->select('id,Kode,Nama,Alamat,Kota,Telepon,Fax')
                        ->from('supplier');
        $this->datatables->edit_column('Nama',"<a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('supplier/get/$1/')."' data-remote-target='#modal-id .modal-body' class=''>$2 </a>",'id, Nama');             
        $this->datatables->add_column('edit',"<div class='btn-group'>
            <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('supplier/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>
            <a href='#outside' data-toggle='tooltip' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='$1'><i class='glyphicon glyphicon-edit'></i></a>
            <button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger'id='$1'><i class='glyphicon glyphicon-remove'></i></button>
            </div>" , 'id');
        $this->datatables->unset_column('id');
        echo $this->datatables->generate();
    }
   
}

/* End of file dashboard.php */
/* Location: ./ */

 ?>