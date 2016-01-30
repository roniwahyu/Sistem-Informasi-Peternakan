<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class groups extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->library(array('Datatables','Ion_auth/Ion_auth'));
        $this->load->model('groups_model','groupsdb',TRUE);
        $this->load->helper(array('form','url'));
        $this->session->set_userdata('lihat','groups');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;
    }

    public function index() {
        $this->template->set_title('Kelola Groups');
        $this->template->set_layout('default');
        $this->template->add_js('var baseurl="'.base_url().'groups/";','embed');  
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
        $this->template->add_js('modules/groups.js');
        $this->template->add_js('crud.js');
        
        $this->ckeditor();
        $this->template->load_view('groups_view',array(
                        'title'=>'Kelola Data Groups',
                        'subtitle'=>'Pengelolaan Groups',
                        'breadcrumb'=>array(
                            'Groups'),
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
        $this->datatables->select('id,name,description,')
                        ->from('groups');
        $this->datatables->add_column('edit',"<div class='btn-group'>
            <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('supplier/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>
            <a href='#outside' data-toggle='tooltip' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='$1'><i class='glyphicon glyphicon-edit'></i></a>
            <button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger'id='$1'><i class='glyphicon glyphicon-remove'></i></button>
            </div>" , 'id');
        $this->datatables->unset_column('id');
        echo $this->datatables->generate();
    }

   

    public function get($id=null){
        if($id!==null){
            echo json_encode($this->groupsdb->get_one($id));
        }
    }

    public function submit(){
        if ($this->input->post('ajax')){
          if ($this->input->post('id')){
            $this->groupsdb->update($this->input->post('id'));
          }else{
            $this->groupsdb->save();
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id')){
                $this->groupsdb->update($this->input->post('id'));
              }else{
                $this->groupsdb->save();
              }
          }
        }
    }

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->groupsdb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
    

}
