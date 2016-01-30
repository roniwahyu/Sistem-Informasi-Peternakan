<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class bank_giro extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->model('bank_giro_model','bank_girodb',TRUE);
        $this->session->set_userdata('lihat','bank_giro');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;

      
        
        $this->template->add_js('datatables.js');
        $this->template->add_js('muria.js');
        $this->template->add_js('crud.js');
        $this->template->set_layout('dashboard');
    }

    public function index() {
        $this->template->set_title('Kelola Bank_giro');
        
        $this->template->add_js('var baseurl="'.base_url().'bank_giro/";','embed');  
        

        //<!-- $this->template->add_js('datepicker.js'); -->
        
        $this->template->load_view('bank_giro_view',array(
                        'title'=>'Kelola Data Bank_giro',
                        'subtitle'=>'Pengelolaan Bank_giro',
                        'breadcrumb'=>array(
                            'Bank_giro'),
                        ));
        
    }
     
     //<!-- Start Primary Key -->
    

    public function getdatatables(){
        if($this->isadmin()==1):
            $this->datatables->select('id,id_trx_bank,bukti_bank,tipe_tt_giro,no_tt_giro,tgl_tt_giro,nominal,keterangan,user_id,datetime,')
                            ->from('bank_giro');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('bank_giro/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>

                <a href='#outside' data-toggle='tooltip' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='$1'><i class='glyphicon glyphicon-edit'></i></a>
                <button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger'id='$1'><i class='glyphicon glyphicon-remove'></i></button>
                </div>" , 'id');
            $this->datatables->unset_column('id');

        else:
            $this->datatables->select('id,id_trx_bank,bukti_bank,tipe_tt_giro,no_tt_giro,tgl_tt_giro,nominal,keterangan,user_id,datetime,')
                            ->from('bank_giro');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('bank_giro/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a></div>" , 'id');
            $this->datatables->unset_column('id');
        endif;
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
        
       

        $this->load->view('bank_giro_form_inside');
           
    }

    public function get($id=null){
        if($id!==null){
            echo json_encode($this->bank_girodb->get_one($id));
        }
    }
    function tables(){
        $this->load->view('bank_giro_data');
    }

    function getone($id=null){
        if($id!==null){
            $data=$this->bank_girodb->get_one($id);
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
            $this->bank_girodb->update($this->input->post('id'));
          }else{
            $this->bank_girodb->save();
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id')){
                $this->bank_girodb->update($this->input->post('id'));
              }else{
                $this->bank_girodb->save();
              }
          }
        }
    }

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->bank_girodb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
    

}

/** Module bank_giro Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
