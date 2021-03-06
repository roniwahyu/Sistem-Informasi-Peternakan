<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class golonganbiaya extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->library(array('Datatables','Ion_auth/Ion_auth'));
        $this->load->model('golonganbiaya_model','golonganbiayadb',TRUE);
        $this->load->helper(array('form','url'));
        $this->session->set_userdata('lihat','golonganbiaya');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;
    }

    public function index() {
        $this->template->set_title('Kelola Golonganbiaya');
        $this->template->set_layout('dashboard');
        $this->template->add_js('var baseurl="'.base_url().'golonganbiaya/";','embed');  
        $this->template->add_js('modules/golonganbiaya.js');
        $this->template->add_js('crud.js');
        $this->template->add_js('plugins/dataTables/jquery.dataTables.js');
        $this->template->add_js('plugins/dataTables/dataTables.bootstrap.js');
        $this->template->add_js('plugins/dataTables/dataTables.responsive.js');
        $this->template->add_css('plugins/datapicker/datepicker3.css');
        $this->template->add_js('plugins/datapicker/bootstrap-datepicker.js');
        $this->template->add_js('datepicker.js');
        
        $this->ckeditor();
        $this->template->load_view('golonganbiaya_view',array(
                        'title'=>'Kelola Data Golonganbiaya',
                        'subtitle'=>'Pengelolaan Golonganbiaya',
                        'breadcrumb'=>array(
                            'Golonganbiaya'),
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
    

    public function getdatatables(){
        $this->datatables->select('Kode,Keterangan,Rekening,Status,User,Time,')
                        ->from('golonganbiaya');
        echo $this->datatables->generate();
    }

   

    public function get($Kode=null){
        if($Kode!==null){
            echo json_encode($this->golonganbiayadb->get_one($Kode));
        }
    }

    public function submit(){
        if ($this->input->post('ajax')){
          if ($this->input->post('Kode')){
            $this->golonganbiayadb->update($this->input->post('Kode'));
          }else{
            $this->golonganbiayadb->save();
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('Kode')){
                $this->golonganbiayadb->update($this->input->post('Kode'));
              }else{
                $this->golonganbiayadb->save();
              }
          }
        }
    }

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->golonganbiayadb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
    

}

/** Module golonganbiaya Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
