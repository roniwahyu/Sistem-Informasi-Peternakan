<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class gudang extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->library(array('Datatables','Ion_auth/Ion_auth'));
        $this->load->model('gudang_model','gudangdb',TRUE);
        $this->load->helper(array('form','url'));
        $this->session->set_userdata('lihat','gudang');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;
    }

    public function index() {
        $this->template->set_title('Kelola Gudang');
        $this->template->set_layout('dashboard');
        $this->template->add_js('var baseurl="'.base_url().'gudang/";','embed');  
        $this->template->add_js('modules/gudang.js');
        $this->template->add_js('crud.js');
        $this->template->add_js('plugins/dataTables/jquery.dataTables.js');
        $this->template->add_js('plugins/dataTables/dataTables.bootstrap.js');
        $this->template->add_js('plugins/dataTables/dataTables.responsive.js');
        $this->template->add_css('plugins/datapicker/datepicker3.css');
        $this->template->add_js('plugins/datapicker/bootstrap-datepicker.js');
        $this->template->add_js('datepicker.js');
        
        $this->ckeditor();
        $this->template->load_view('gudang_view',array(
                        'title'=>'Kelola Data Gudang',
                        'subtitle'=>'Pengelolaan Gudang',
                        'breadcrumb'=>array(
                            'Gudang'),
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
        $this->datatables->select('id,kd_gudang,nama,id_mitra,id_user,id_wilayah,status,datetime,')
                        ->from('gudang');
        echo $this->datatables->generate();
    }

   

    public function get($id=null){
        if($id!==null){
            echo json_encode($this->gudangdb->get_one($id));
        }
    }

    public function submit(){
        if ($this->input->post('ajax')){
          if ($this->input->post('id')){
            $this->gudangdb->update($this->input->post('id'));
          }else{
            $this->gudangdb->save();
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id')){
                $this->gudangdb->update($this->input->post('id'));
              }else{
                $this->gudangdb->save();
              }
          }
        }
    }

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->gudangdb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
    

}

/** Module gudang Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
