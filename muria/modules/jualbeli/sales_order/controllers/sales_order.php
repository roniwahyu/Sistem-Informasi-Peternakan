<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class sales_order extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->model('sales_order_model','sales_orderdb',TRUE);
        $this->session->set_userdata('lihat','sales_order');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;

       
        
        $this->template->add_js('datatables.js');
        $this->template->add_js('muria.js');
        $this->template->add_js('crud.js');
        $this->template->set_layout('dashboard');
    }

    public function index() {
        $this->template->set_title('Kelola Sales_order');
        
        $this->template->add_js('var baseurl="'.base_url().'sales_order/";','embed');  
        

        //<!-- $this->template->add_js('datepicker.js'); -->
        
        $this->template->load_view('sales_order_view',array(
            'view'=>'',
                        'title'=>'Kelola Data Sales_order',
                        'subtitle'=>'Pengelolaan Sales_order',
                        'breadcrumb'=>array(
                            'Sales_order'),
                        ));
        
    } 
    public function baru() {
        $this->template->set_title('Kelola Sales_order');
        
        

        $this->template->add_js('plugins/select2/select2.min.js');
        $this->template->add_css('plugins/select2/select2.min.css');
        $this->template->add_js('var baseurl="'.base_url().'sales_order/";
            $("#id_customer").select2();
            ','embed');  
        
        $this->template->add_js('modules/sales.js');
        $this->template->load_view('sales_order_view',array(
            'view'=>'form_so',
            'opt_customer'=>$this->sales_orderdb->dropdown_customer(),
                        'title'=>'Kelola Data Sales_order',
                        'subtitle'=>'Pengelolaan Sales_order',
                        'breadcrumb'=>array(
                            'Sales_order'),
                        ));
        
    }
     
     //<!-- Start Primary Key -->
    

    public function getdatatables(){
        if($this->isadmin()==1):
            $this->datatables->select('id,faktur,tgl,tgl_kedaluarsa,tgl_terima,id_customer,id_sales,keterangan,ref,id_bayar,totalbayar,pajak,total_pajak,grandtotal,biaya_lain,status,id_user,datetime,')
                            ->from('sales_order');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('sales_order/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>

                <a href='#outside' data-toggle='tooltip' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='$1'><i class='glyphicon glyphicon-edit'></i></a>
                <button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger'id='$1'><i class='glyphicon glyphicon-remove'></i></button>
                </div>" , 'id');
            $this->datatables->unset_column('id');

        else:
            $this->datatables->select('id,faktur,tgl,tgl_kedaluarsa,tgl_terima,id_customer,id_sales,keterangan,ref,id_bayar,totalbayar,pajak,total_pajak,grandtotal,biaya_lain,status,id_user,datetime,')
                            ->from('sales_order');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('sales_order/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a></div>" , 'id');
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
        
       

        $this->load->view('sales_order_form_inside');
           
    }

    public function get($id=null){
        if($id!==null){
            echo json_encode($this->sales_orderdb->get_one($id));
        }
    }
    function tables(){
        $this->load->view('sales_order_data');
    }

    function getone($id=null){
        if($id!==null){
            $data=$this->sales_orderdb->get_one($id);
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
            $this->sales_orderdb->update($this->input->post('id'));
          }else{
            $this->sales_orderdb->save();
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id')){
                $this->sales_orderdb->update($this->input->post('id'));
              }else{
                $this->sales_orderdb->save();
              }
          }
        }
    }

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->sales_orderdb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
    

}

/** Module sales_order Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
