<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class bukti extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->model('bukti_model','buktidb',TRUE);
        $this->session->set_userdata('lihat','bukti');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;

  
        
        $this->template->add_js('datatables.js');
        $this->template->add_js('muria.js');
        $this->template->add_js('crud.js');
        $this->template->set_layout('dashboard');
    }

    public function index() {
        $this->template->set_title('Kelola Bukti');
        
        $this->template->add_js('var baseurl="'.base_url().'bukti/";','embed');  
        

        //<!-- $this->template->add_js('datepicker.js'); -->
        
        $this->template->load_view('bukti_view',array(
                        'title'=>'Kelola Data Bukti',
                        'subtitle'=>'Pengelolaan Bukti',
                        'breadcrumb'=>array(
                            'Bukti'),
                        ));
        
    }

     
     //<!-- Start Primary Key -->
    

    public function getdatatables(){
        if($this->isadmin()==1):
            $this->datatables->select('id,kode_bukti,Keterangan,parent,user_id,datetime,')
                            ->from('bukti');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('bukti/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>

                <a href='#outside' data-toggle='tooltip' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='$1'><i class='glyphicon glyphicon-edit'></i></a>
                <button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger'id='$1'><i class='glyphicon glyphicon-remove'></i></button>
                </div>" , 'id');
            $this->datatables->unset_column('id');

        else:
            $this->datatables->select('id,kode_bukti,Keterangan,parent,user_id,datetime,')
                            ->from('bukti');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('bukti/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a></div>" , 'id');
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
    function detail_bukti($kode_bukti,$id){

    }
    function load_bukti($kode_bukti){
        switch ($kode_bukti) {
            case 'SAW':
                $get='rekening_saldo';
            break;
            case 'KK':
                // $this->buktidb->get_view('00-00-10-04-view-bukti-kas-keluar');
                $get='00-00-10-04-view-bukti-kas-keluar';
            break;
            case 'KM':
                // $this->buktidb->get_view('00-00-10-04-view-bukti-kas-keluar');
                $get='00-00-10-03-view-bukti-kas-masuk';
            break;
            case 'BM':
                // $this->buktidb->get_view('00-00-10-01-view-bukti-bank-masuk');
                $get='00-00-10-01-view-bukti-bank-masuk';
            break;
            case 'BK':
                // $this->buktidb->get_view('00-00-10-02-view-bukti-bank-keluar');
                $get='00-00-10-02-view-bukti-bank-keluar';
            break;
            case 'PT':
                // $this->buktidb->get_view('00-00-10-05-view-bukti-pt');
                $get='00-00-10-05-view-bukti-pt';
            break;
            case 'PR':
                // $this->buktidb->get_view('00-00-10-06-view-bukti-purchase-return');
                $get='00-00-10-06-view-bukti-purchase-return';
            break;
            case 'ST':
                $get='00-00-10-07-view-bukti-sales-trx';
            break; 
            case 'SR':
                $get='00-00-10-08-view-bukti-sales-return';
            break; 
            case 'RA':
                $get='00-00-10-09-view-bukti-recording-ayam';
            break;
            case 'RT':
                $get='00-00-10-10-view-bukti-recording-telur';
            break;
            case 'RP':
                $get='00-00-10-11-view-bukti-recording-pakan';
            break;
            case 'RM':
                $get='00-00-10-12-view-bukti-recording-medis';
            break;

            default:
                $get='00-00-10-01-view-bukti-bank-masuk';
            
            break;
        }


            $this->datatables->select('id,bukti,akun')
                            ->from($get);
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' data-dismiss='modal' href='#modal-id' data-load-remote='".base_url('bukti/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>
                <a href='#' data-dismiss='modal' id='$1' data-bukti='$2' data-akun='$3' class='usethis btn btn-primary btn-xs'><i class='fa fa-check-circle'></i> Gunakan</a></div>" , 'id,bukti,akun');
            $this->datatables->unset_column('id');
            echo $this->datatables->generate();

    }
    function forms(){
        
       

        $this->load->view('bukti_form_inside');
           
    }

    public function get($id=null){
        if($id!==null){
            echo json_encode($this->buktidb->get_one($id));
        }
    }
    function tables(){
        $this->load->view('bukti_data');
    }

    function getone($id=null){
        if($id!==null){
            $data=$this->buktidb->get_one($id);
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
            $this->buktidb->update($this->input->post('id'));
          }else{
            $this->buktidb->save();
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id')){
                $this->buktidb->update($this->input->post('id'));
              }else{
                $this->buktidb->save();
              }
          }
        }
    }

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->buktidb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
    

}

/** Module bukti Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
