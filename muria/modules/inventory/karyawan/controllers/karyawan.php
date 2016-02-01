<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class karyawan extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->model('karyawan_model','karyawandb',TRUE);
        $this->session->set_userdata('lihat','karyawan');
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
        $this->template->set_title('Kelola Karyawan');
        
        $this->template->add_js('var baseurl="'.base_url().'karyawan/";','embed');  
        

        //<!-- $this->template->add_js('datepicker.js'); -->
        
        $this->template->load_view('karyawan_view',array(
                        'title'=>'Kelola Data Karyawan',
                        'subtitle'=>'Pengelolaan Karyawan',
                        'breadcrumb'=>array(
                            'Karyawan'),
                        ));
        
    }
     
     //<!-- Start Primary Key -->
    

    public function getdatatables(){
        $this->datatables->select('Kode,Nama,Alamat,TempatLahir,TglLahir,JK,Telepon,Jabatan,NmJabatan,TglMasuk,Gapok,Lembur,TunjanganKeluarga,TunjanganJabatan,Transport,Makan,Lain,Bonus,Hutang,NoAcc,User,Time,')
                        ->from('karyawan');
        $this->datatables->add_column('edit',"<div class='btn-group'>
            <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('karyawan/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>

            <a href='#outside' data-toggle='tooltip' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='$1'><i class='glyphicon glyphicon-edit'></i></a>
            <button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger'id='$1'><i class='glyphicon glyphicon-remove'></i></button>
            </div>" , 'id');
        $this->datatables->unset_column('Kode');
        echo $this->datatables->generate();
    }

   

    public function get($Kode=null){
        if($Kode!==null){
            echo json_encode($this->karyawandb->get_one($Kode));
        }
    }
    function tables(){
        $this->load->view('karyawan_data');
    }

    function getone($id=null){
        if($id!==null){
            $data=$this->karyawandb->get_one($id);
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
          if ($this->input->post('Kode')){
            $this->karyawandb->update($this->input->post('Kode'));
          }else{
            $this->karyawandb->save();
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('Kode')){
                $this->karyawandb->update($this->input->post('Kode'));
              }else{
                $this->karyawandb->save();
              }
          }
        }
    }

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->karyawandb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
    

}

/** Module karyawan Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
