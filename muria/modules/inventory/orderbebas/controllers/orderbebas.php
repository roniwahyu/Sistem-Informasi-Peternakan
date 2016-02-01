<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class orderbebas extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->model('orderbebas_model','orderbebasdb',TRUE);
        $this->session->set_userdata('lihat','orderbebas');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;

        $this->template->add_js('plugins/dataTables/jquery.dataTables.js');
        $this->template->add_js('plugins/dataTables/dataTables.bootstrap.js');
        $this->template->add_css('plugins/dataTables/dataTables.bootstrap.css');
        $this->template->add_js('plugins/dataTables/dataTables.responsive.js');
        $this->template->add_css('plugins/dataTables/dataTables.responsive.css');
        
        $this->template->add_js('datatables.js');
        $this->template->add_js('muria.js');
        $this->template->add_js('crud.js');
        $this->template->set_layout('dashboard');
    }

    public function index() {
        $this->template->set_title('Kelola Orderbebas');
        
        $this->template->add_js('var baseurl="'.base_url().'orderbebas/";','embed');  
        

        //<!-- $this->template->add_js('datepicker.js'); -->
        
        $this->template->load_view('orderbebas_view',array(
                        'title'=>'Kelola Data Orderbebas',
                        'subtitle'=>'Pengelolaan Orderbebas',
                        'breadcrumb'=>array(
                            'Orderbebas'),
                        ));
        
    }
     
     //<!-- Start Primary Key -->
    

    public function getdatatables(){
        if($this->isadmin()==1):
            $this->datatables->select('Faktur,Tgl,Kepada,Alamat,Sopir,Mobil,Barang,User,Time,Status,cNoJrn,lVoid,lPosted,')
                            ->from('orderbebas');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('orderbebas/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>

                <a href='#outside' data-toggle='tooltip' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='$1'><i class='glyphicon glyphicon-edit'></i></a>
                <button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger'id='$1'><i class='glyphicon glyphicon-remove'></i></button>
                </div>" , 'id');
            $this->datatables->unset_column('Faktur');

        else:
            $this->datatables->select('Faktur,Tgl,Kepada,Alamat,Sopir,Mobil,Barang,User,Time,Status,cNoJrn,lVoid,lPosted,')
                            ->from('orderbebas');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('orderbebas/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a></div>" , 'id');
            $this->datatables->unset_column('Faktur');
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
   

    public function get($Faktur=null){
        if($Faktur!==null){
            echo json_encode($this->orderbebasdb->get_one($Faktur));
        }
    }
    function tables(){
        $this->load->view('orderbebas_data');
    }

    function getone($id=null){
        if($id!==null){
            $data=$this->orderbebasdb->get_one($id);
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
          if ($this->input->post('Faktur')){
            $this->orderbebasdb->update($this->input->post('Faktur'));
          }else{
            $this->orderbebasdb->save();
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('Faktur')){
                $this->orderbebasdb->update($this->input->post('Faktur'));
              }else{
                $this->orderbebasdb->save();
              }
          }
        }
    }

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->orderbebasdb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
    

}

/** Module orderbebas Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
