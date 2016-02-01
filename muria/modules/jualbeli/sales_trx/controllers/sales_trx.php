<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class sales_trx extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->model('sales_trx_model','sales_trxdb',TRUE);
        $this->session->set_userdata('lihat','sales_trx');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;

     
       
        
        $this->template->add_js('datatables.js');
        $this->template->add_js('muria.js');
        $this->template->add_js('crud.js');
        $this->template->set_layout('dashboard');
    }

    public function index() {
        $this->template->set_title('Kelola Sales_trx');
        
        $this->template->add_js('var baseurl="'.base_url().'sales_trx/";','embed');  
        

        //<!-- $this->template->add_js('datepicker.js'); -->
        
        $this->template->load_view('sales_trx_view',array(
                        'title'=>'Kelola Data Sales_trx',
                        'subtitle'=>'Pengelolaan Sales_trx',
                        'breadcrumb'=>array(
                            'Sales_trx'),
                        ));
        
    }
     
     //<!-- Start Primary Key -->
    

    public function getdatatables(){
        if($this->isadmin()==1):
            $this->datatables->select('id,faktur,tgl,id_so,termin,id_customer,id_sales,akun_piutang,keterangan,ref,id_shipping,id_bayar,totalbayar,uangmuka,biayakirim,ppn,grandtotal,status,is_trx,is_void,is_jrnl,is_post,date_posted,id_user,datetime,')
                            ->from('sales_trx');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('sales_trx/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>

                <a href='#outside' data-toggle='tooltip' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='$1'><i class='glyphicon glyphicon-edit'></i></a>
                <button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger'id='$1'><i class='glyphicon glyphicon-remove'></i></button>
                </div>" , 'id');
            $this->datatables->unset_column('id');

        else:
            $this->datatables->select('id,faktur,tgl,id_so,termin,id_customer,id_sales,akun_piutang,keterangan,ref,id_shipping,id_bayar,totalbayar,uangmuka,biayakirim,ppn,grandtotal,status,is_trx,is_void,is_jrnl,is_post,date_posted,id_user,datetime,')
                            ->from('sales_trx');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('sales_trx/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a></div>" , 'id');
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
        
       

        $this->load->view('sales_trx_form_inside');
           
    }

    public function get($id=null){
        if($id!==null){
            echo json_encode($this->sales_trxdb->get_one($id));
        }
    }
    function tables(){
        $this->load->view('sales_trx_data');
    }

    function getone($id=null){
        if($id!==null){
            $data=$this->sales_trxdb->get_one($id);
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
            $this->sales_trxdb->update($this->input->post('id'));
          }else{
            $this->sales_trxdb->save();
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id')){
                $this->sales_trxdb->update($this->input->post('id'));
              }else{
                $this->sales_trxdb->save();
              }
          }
        }
    }

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->sales_trxdb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
    

}

/** Module sales_trx Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
