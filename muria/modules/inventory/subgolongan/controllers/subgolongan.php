<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class subgolongan extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->library(array('Datatables','Ion_auth/Ion_auth'));
        $this->load->model('subgolongan_model','subgolongandb',TRUE);
        $this->load->helper(array('form','url'));
        $this->session->set_userdata('lihat','subgolongan');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;
    }

    public function index() {
        $this->template->set_title('Kelola Subgolongan');
        $this->template->set_layout('dashboard');
        $this->template->add_js('var baseurl="'.base_url().'subgolongan/";','embed');  
        $this->template->add_js('modules/subgolongan.js');
        $this->template->add_js('crud.js');
        $this->template->add_js('plugins/dataTables/jquery.dataTables.js');
        $this->template->add_js('plugins/dataTables/dataTables.bootstrap.js');
        $this->template->add_js('plugins/dataTables/dataTables.responsive.js');
        $this->template->add_css('plugins/datapicker/datepicker3.css');
        $this->template->add_js('plugins/datapicker/bootstrap-datepicker.js');
        $this->template->add_js('datepicker.js');
        
        $this->ckeditor();
        $this->template->load_view('subgolongan_view',array(
                        'title'=>'Kelola Data Subgolongan',
                        'subtitle'=>'Pengelolaan Subgolongan',
                        'breadcrumb'=>array(
                            'Subgolongan'),
                        ));
        
    }
     
    public function ckeditor(){
        session_start();
            $_SESSION['KCFINDER']=array();
            $_SESSION['kcfinder'] = FALSE;
            $_SESSION['KCFINDER']['disabled'] = false;
            $_SESSION['KCFINDER']['uploadURL'] = "../uploads";
            // $this->template->load_view('ckeditor/admin');

    }
    //<!-- Start Primary Key -->
    

}

/** Module subgolongan Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
