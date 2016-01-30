<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class banks extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->model('banks_model','banksdb',TRUE);
        $this->session->set_userdata('lihat','banks');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;

       
       
        
        $this->template->add_js('datatables.js');
        $this->template->add_js('muria.js');
        $this->template->add_js('crud.js');
        $this->template->set_layout('dashboard');
    }

    public function index() {
        $this->template->set_title('Kelola Banks');
        
        $this->template->add_js('var baseurl="'.base_url().'banks/";','embed');  
        

        //<!-- $this->template->add_js('datepicker.js'); -->
        
        $this->template->load_view('banks_view',array(
                        'title'=>'Kelola Data Banks',
                        'subtitle'=>'Pengelolaan Banks',
                        'breadcrumb'=>array(
                            'Banks'),
                        ));
        
    }
     
     //<!-- Start Primary Key -->
    

    public function getdatatables(){
        if($this->isadmin()==1):
            $this->datatables->select('id,Kode,Rekening,Keterangan,User,Time,')
                            ->from('banks');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('banks/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>

                <a href='#outside' data-toggle='tooltip' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='$1'><i class='glyphicon glyphicon-edit'></i></a>
                <button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger'id='$1'><i class='glyphicon glyphicon-remove'></i></button>
                </div>" , 'id');
            $this->datatables->unset_column('id');

        else:
            $this->datatables->select('id,Kode,Rekening,Keterangan,User,Time,')
                            ->from('banks');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('banks/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a></div>" , 'id');
            $this->datatables->unset_column('id');
        endif;
        echo $this->datatables->generate();
    }
    public function getbanks(){
       
            $this->datatables->select('id,Kode,Rekening,Keterangan')
                            ->from('banks');
            $this->datatables->edit_column('Kode',"<a data-toggle='modal' href='#modal-id' data-dismiss='modal' data-load-remote='".base_url('banks/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i></a> $2" , 'id,Kode');
            $this->datatables->add_column('edit',"<a href='#' data-dismiss='modal' data-id='$1' data-rek-bank='$3' data-kode-bank='$2' data-keterangan='$4' class='use_rek_bank btn btn-success btn-xs'><i class='fa fa-check-circle'></i> Gunakan</a>" , 'id,Kode,Rekening,Keterangan');
            $this->datatables->unset_column('id');
        
        echo $this->datatables->generate();
    }

    function isadmin(){
       return $this->ion_auth->is_admin();
    }
    function getuser(){
        if ($this->ion_auth->logged_in()):
            $user = $this->ion_auth->user()->row();
            if (!empty($user)):
                $userid=$user->id;
                return $userid;
            else:
                return array();
            endif;
        endif;
    }
    function forms(){
        
       

        $this->load->view('banks_form_inside');
           
    }

    public function get($id=null){
        if($id!==null){
            echo json_encode($this->banksdb->get_one($id));
        }
    }
    function tables(){
        $this->load->view('banks_data');
    }

    function getone($id=null){
        if($id!==null){
            $data=$this->banksdb->get_one($id);
            $jml=count($data);
            // print_r($jml);
            // print_r($data);
            $div='';
            $div.="<table class='table table-condensed table-striped table-bordered'>";
            $i=0;
            foreach ($data as $key => $value) {
                # code...
                
                
                    $div.="<tr>";
                
                $div.="<td>".$key."</td>";
                $div.="<td>".$value."</td>";
                    $div.="</tr>";
                
                $i++;

            }
            $div.="</table>";
           echo $div;
      
        }
      
    }

    public function submit(){
        if ($this->input->post('ajax')){
          if ($this->input->post('id')){
            $this->banksdb->update($this->input->post('id'));
          }else{
            $this->banksdb->save();
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id')){
                $this->banksdb->update($this->input->post('id'));
              }else{
                $this->banksdb->save();
              }
          }
        }
    }

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->banksdb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
    

}

/** Module banks Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
