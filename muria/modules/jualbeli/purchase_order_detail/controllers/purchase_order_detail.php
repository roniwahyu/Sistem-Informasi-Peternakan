<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class purchase_order_detail extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->model('purchase_order_detail_model','purchase_order_detaildb',TRUE);
        $this->session->set_userdata('lihat','purchase_order_detail');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;

              
        
        $this->template->add_js('datatables.js');
        $this->template->add_js('muria.js');
        $this->template->add_js('crud.js');
        $this->template->set_layout('dashboard');
    }

    public function index() {
        $this->template->set_title('Kelola Purchase_order_detail');
        
        $this->template->add_js('var baseurl="'.base_url().'purchase_order_detail/";','embed');  
        

        //<!-- $this->template->add_js('datepicker.js'); -->
        
        $this->template->load_view('purchase_order_detail_view',array(
                        'title'=>'Kelola Data Purchase_order_detail',
                        'subtitle'=>'Pengelolaan Purchase_order_detail',
                        'breadcrumb'=>array(
                            'Purchase_order_detail'),
                        ));
        
    }
     
     //<!-- Start Primary Key -->
    

    public function getdatatables(){
        if($this->isadmin()==1):
            $this->datatables->select('id_detail,po,id_barang,jumlah,id_satuan,diskon1,diskon2,id_user,datetime,')
                            ->from('purchase_order_detail');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('purchase_order_detail/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>

                <a href='#outside' data-toggle='tooltip' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='$1'><i class='glyphicon glyphicon-edit'></i></a>
                <button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger'id='$1'><i class='glyphicon glyphicon-remove'></i></button>
                </div>" , 'id');
            $this->datatables->unset_column('id_detail');

        else:
            $this->datatables->select('id_detail,po,id_barang,jumlah,id_satuan,diskon1,diskon2,id_user,datetime,')
                            ->from('purchase_order_detail');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('purchase_order_detail/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a></div>" , 'id');
            $this->datatables->unset_column('id_detail');
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
        
       

        $this->load->view('purchase_order_detail_form_inside');
           
    }

    public function get($id_detail=null){
        if($id_detail!==null){
            echo json_encode($this->purchase_order_detaildb->get_one($id_detail));
        }
    }
    function tables(){
        $this->load->view('purchase_order_detail_data');
    }

    function getone($id=null){
        if($id!==null){
            $data=$this->purchase_order_detaildb->get_one($id);
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
          if ($this->input->post('id_detail')){
            $this->purchase_order_detaildb->update($this->input->post('id_detail'));
          }else{
            $this->purchase_order_detaildb->save();
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id_detail')){
                $this->purchase_order_detaildb->update($this->input->post('id_detail'));
              }else{
                $this->purchase_order_detaildb->save();
              }
          }
        }
    }

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->purchase_order_detaildb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
    

}

/** Module purchase_order_detail Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
