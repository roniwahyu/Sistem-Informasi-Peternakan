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
        // else:
            // redirect($this->session->userdata('lihat'),'refresh');
        endif;
  /*      $this->template->add_js('plugins/dataTables/jquery.dataTables.js');
        $this->template->add_js('plugins/dataTables/dataTables.bootstrap.js');
        $this->template->add_css('plugins/dataTables/dataTables.bootstrap.css');
        $this->template->add_js('plugins/dataTables/dataTables.responsive.js');
        $this->template->add_css('plugins/dataTables/dataTables.responsive.css');
     */   
      /*  $this->template->add_js('plugins/dataTables/jquery.dataTables.min.js');
        $this->template->add_js('plugins/dataTables/dataTables.bootstrap.min.js');
        $this->template->add_js('plugins/dataTables/dataTables.buttons.min.js');
        $this->template->add_js('plugins/dataTables/buttons.bootstrap.min.js');
        $this->template->add_js('plugins/dataTables/buttons.flash.min.js');
        $this->template->add_js('plugins/dataTables/buttons.html5.min.js');
        $this->template->add_js('plugins/dataTables/buttons.print.min.js');
        $this->template->add_js('plugins/dataTables/pdfmake.min.js');
        $this->template->add_js('plugins/dataTables/jszip.min.js');
        $this->template->add_js('plugins/dataTables/build/vfs_fonts.js');
        $this->template->add_css('plugins/dataTables/dataTables.bootstrap.min.css');
        $this->template->add_js('plugins/dataTables/dataTables.scroller.min.js');
        // $this->template->add_css('plugins/dataTables/scroller.dataTables.min.css');
        $this->template->add_css('plugins/dataTables/scroller.bootstrap.min.css');
        $this->template->add_css('plugins/dataTables/buttons.dataTables.min.css');
        $this->template->add_css('plugins/dataTables/buttons.bootstrap.min.css');*/
     
        // $this->template->add_js('datatables.js');
        $this->template->add_js('crud.js');
        $this->template->set_layout('dashboard');

       }
    public function index(){
        $this->template->add_js('muria.js');
         $this->session->set_userdata("module",'inv');
        
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

        $this->template->load_view('dashboard_view',array(
                        'title'=>'Dashboard Gudang & Persediaan (Warehouse & Inventory)',
                        'subtitle'=>'Pengelolaan Gudang dan Persediaan',
                        'breadcrumb'=>array(
                            'Gudang dan Persediaan'),
            ));
        // redirect('site');

	}
   
   
   
}

/* End of file dashboard.php */
/* Location: ./ */

 ?>