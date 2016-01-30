<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class campur extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->model('campur_model','campurdb',TRUE);
        $this->session->set_userdata('lihat','campur');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;

           
        
        $this->template->add_js('datatables.js');
        $this->template->add_js('muria.js');
        $this->template->add_js('crud.js');
        $this->template->set_layout('dashboard');
    }

    public function index() {
        $this->template->set_title('Kelola Campur');
        $this->template->add_js('var baseurl="'.base_url().'campur/";','embed');  
        $this->template->load_view('campur_view',array(
            'view'=>'',
            'title'=>'Kelola Data Campur',
            'subtitle'=>'Pengelolaan Campur',
            'breadcrumb'=>array(
            'Campur'),
        ));
    }
     public function baru() {
        $this->template->set_title('Kelola Campur');
        $this->template->add_js('var baseurl="'.base_url().'campur/";','embed');  
        $this->template->load_view('campur_view',array(
            'view'=>'',
            'title'=>'Kelola Data Campur',
            'subtitle'=>'Pengelolaan Campur',
            'breadcrumb'=>array(
            'Campur'),
        ));
        
    }
     
     //<!-- Start Primary Key -->
    

}

/** Module campur Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
