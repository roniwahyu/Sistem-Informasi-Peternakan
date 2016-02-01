<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class barang_satuan extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->model('barang_satuan_model','brgsatudb',TRUE);
        $this->session->set_userdata('lihat','barang_satuan');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;

      
       
        
        $this->template->add_js('datatables.js');
        $this->template->add_js('muria.js');
        $this->template->add_js('crud.js');
        $this->template->set_layout('dashboard');
    }

    public function index() {
        $this->template->set_title('Kelola Barang_satuan');
        
        $this->template->add_js('var baseurl="'.base_url().'barang_satuan/";','embed');  
        

        //<!-- $this->template->add_js('datepicker.js'); -->
        
        $this->template->load_view('barang_satuan_view',array(
                        'title'=>'Kelola Data Barang_satuan',
                        'subtitle'=>'Pengelolaan Barang_satuan',
                        'breadcrumb'=>array(
                            'Barang_satuan'),
                        ));
        
    }
     
     //<!-- Start Primary Key -->
    

    public function getdatatables(){
        if($this->isadmin()==1):
            $this->datatables->select('id,id_barang,kode,Isi2,Isi3,Satuan1,Satuan2,Satuan3,Max,SatuanMax,Min,SatuanMin,StKon,User,datetime,')
                            ->from('barang_satuan');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('barang_satuan/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>

                <a href='#outside' data-toggle='tooltip' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='$1'><i class='glyphicon glyphicon-edit'></i></a>
                <button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger'id='$1'><i class='glyphicon glyphicon-remove'></i></button>
                </div>" , 'id');
            $this->datatables->unset_column('id');

        else:
            $this->datatables->select('id,id_barang,kode,Isi2,Isi3,Satuan1,Satuan2,Satuan3,Max,SatuanMax,Min,SatuanMin,StKon,User,datetime,')
                            ->from('barang_satuan');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('barang_satuan/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a></div>" , 'id');
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
    function satuan_barangxx($id){
        echo $id;
        $satuan=$this->brgsatudb->get_satuan($id);
        // print_r($satuan);
        $id="";
    }
    
    function satuan_barang($id=null){
       
        // echo $id;
        if(!empty($id) || $id!=0 ||  $id!=null):
            $satuan=$this->brgsatudb->get_satuan($id);
            if(!empty($satuan)):
            $this->load->view('form_satuan',array(
                'default'=>$satuan,
                'opt_satuan'=>$this->brgsatudb->get_dropdown_satuan(),
                ));
            else:
                $barang=$this->brgsatudb->getbarang($id);
                // print_r($barang);
                $satuan['id_barang']=$id;
                $satuan['kode']=$barang['Kode'];
                $satuan['nmbarang']=$barang['Nama'];
                // print_r($satuan);
                $this->load->view('form_satuan',array(
                    'default'=>$satuan,
                    'opt_satuan'=>$this->brgsatudb->get_dropdown_satuan(),
                ));
            endif;

        
        else:?>
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong><i class="fa fa-warning"></i> Perhatian!</strong> Barang belum dipilih, silakan pilih Nama Barang terlebih dahulu
            </div>
        <?php
         $this->load->view('form_satuan',array(
            'default'=>'',
            'opt_satuan'=>$this->brgsatudb->get_dropdown_satuan(),
            ));
        endif;


        
    }
    function forms(){
        $this->load->view('barang_satuan_form_inside');
           
    }

    public function get($id=null){
        if($id!==null){
            echo json_encode($this->brgsatudb->get_one($id));
        }
    }
    public function getsatuan($id=null){
        if($id!==null){
            echo json_encode($this->brgsatudb->getsatuan($id));
        }
    }
    function tables(){
        $this->load->view('barang_satuan_data');
    }

    function getone($id=null){
        if($id!==null){
            $data=$this->brgsatudb->get_one($id);
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
            $this->brgsatudb->update($this->input->post('id'));
          }else{
            $this->brgsatudb->save();
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id')){
                $this->brgsatudb->update($this->input->post('id'));
              }else{
                $this->brgsatudb->save();
              }
          }
        }
    }

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->brgsatudb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
    

}

/** Module barang_satuan Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
