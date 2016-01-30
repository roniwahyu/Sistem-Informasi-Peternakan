<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class jenis_recording extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->model('jenis_recording_model','jenis_recordingdb',TRUE);
        $this->session->set_userdata('lihat','jenis_recording');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;

           
        
        $this->template->add_js('datatables.js');
        $this->template->add_js('muria.js');
        $this->template->add_js('crud.js');
        $this->template->set_layout('dashboard');
    }

    public function index() {
        $this->template->set_title('Kelola Jenis_recording');
        $this->template->add_js('var baseurl="'.base_url().'jenis_recording/";','embed');  
        $this->template->load_view('jenis_recording_view',array(
            'view'=>'',
            'title'=>'Kelola Data Jenis_recording',
            'subtitle'=>'Pengelolaan Jenis_recording',
            'breadcrumb'=>array(
            'Jenis_recording'),
        ));
        
     public function baru() {
        $this->template->set_title('Kelola Jenis_recording');
        $this->template->add_js('var baseurl="'.base_url().'jenis_recording/";','embed');  
        $this->template->load_view('jenis_recording_view',array(
            'view'=>'',
            'title'=>'Kelola Data Jenis_recording',
            'subtitle'=>'Pengelolaan Jenis_recording',
            'breadcrumb'=>array(
            'Jenis_recording'),
        ));
        
    }
     
     //<!-- Start Primary Key -->
    

    public function getdatatables(){
        if($this->isadmin()==1):
            $this->datatables->select('id,nama,akun_rekening,keterangan,user_id,datetime,')
                            ->from('jenis_recording');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('jenis_recording/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>

                <a href='#outside' data-toggle='tooltip' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='$1'><i class='glyphicon glyphicon-edit'></i></a>
                <button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger'id='$1'><i class='glyphicon glyphicon-remove'></i></button>
                </div>" , 'id');
            $this->datatables->unset_column('id');

        else:
            $this->datatables->select('id,nama,akun_rekening,keterangan,user_id,datetime,')
                            ->from('jenis_recording');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('jenis_recording/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a></div>" , 'id');
            $this->datatables->unset_column('id');
        endif;
        echo $this->datatables->generate();
    }
    function enkrip(){
        return md5($this->session->userdata('lihat').":".$this->getuser()."+".date('H:m'));
        // echo $this->session->userdata('jenis_recording');
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
        
       

        $this->load->view('jenis_recording_form_inside');
           
    }

    public function get($id=null){
        if($id!==null){
            echo json_encode($this->jenis_recordingdb->get_one($id));
        }
    }
    function tables(){
        $this->load->view('jenis_recording_data');
    }

    function getone($id=null){
        if($id!==null){
            $data=$this->jenis_recordingdb->get_one($id);
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
            $this->jenis_recordingdb->update($this->input->post('id'));
          }else{
            $this->jenis_recordingdb->save();
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id')){
                $this->jenis_recordingdb->update($this->input->post('id'));
              }else{
                $this->jenis_recordingdb->save();
              }
          }
        }
    }
    

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->jenis_recordingdb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
     public function delete_detail(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->jenis_recordingdb->delete_detail($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    } 
    private function gen_faktur(){
        $last=$this->jenis_recordingdb->get_last_pt();
        // print_r($last);
        if(!empty($last)):
            $first=substr($last['faktur_pt'],0,2);
            if($first==''||$first==null){
                $first=' ';
            }
            $left=substr($last['faktur_pt'],2,4);
            $right=substr($last['faktur_pt'],-5);
            $nopt=number_format($right); 
            
            
            $newpo=strval($nopt+1);
            $newpo2=substr(strval("00000$newpo"),-5);

        $tahun=substr($left,0,2);
        $bulan=substr($left,2,4);
        
            if($tahun<>date('y')):
                $tahun=date('y');
                if($bulan==date('m')):
                    $gen=strval($first.$tahun.$bulan."00001");
                elseif($bulan<>date('m')):
                    $bulan=date('m');
                    $gen=strval($first.$tahun.$bulan."00001");
                endif;
            elseif($tahun==date('y')):
                if(intval($bulan)<>date('m')):
                    $bulan=date('m');
                    $gen=strval($first.$tahun.$bulan."00001"); 
                elseif($bulan==date('m')):
                    $gen=strval($first.$tahun.$bulan.$newpo2);
                endif;
            endif;
        else:
            // $gen="PT151100001";
            $gen=" ".date('ym')."00001";
        endif;
        return $gen;
    }
     function get_new_faktur(){
        echo $this->gen_faktur();
    }

    

}

/** Module jenis_recording Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
