<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class mutasi_barang_detail extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->model('mutasi_barang_detail_model','mutasi_barang_detaildb',TRUE);
        $this->session->set_userdata('lihat','mutasi_barang_detail');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;

           
        
        $this->template->add_js('datatables.js');
        $this->template->add_js('muria.js');
        $this->template->add_js('crud.js');
        $this->template->set_layout('dashboard');
    }

    public function index() {
        $this->template->set_title('Kelola Mutasi_barang_detail');
        $this->template->add_js('var baseurl="'.base_url().'mutasi_barang_detail/";','embed');  
        $this->template->load_view('mutasi_barang_detail_view',array(
            'view'=>'',
            'title'=>'Kelola Data Mutasi_barang_detail',
            'subtitle'=>'Pengelolaan Mutasi_barang_detail',
            'breadcrumb'=>array(
            'Mutasi_barang_detail'),
        ));
    }
     public function baru() {
        $this->template->set_title('Kelola Mutasi_barang_detail');
        $this->template->add_js('var baseurl="'.base_url().'mutasi_barang_detail/";','embed');  
        $this->template->load_view('mutasi_barang_detail_view',array(
            'view'=>'',
            'title'=>'Kelola Data Mutasi_barang_detail',
            'subtitle'=>'Pengelolaan Mutasi_barang_detail',
            'breadcrumb'=>array(
            'Mutasi_barang_detail'),
        ));
        
    }
     
     //<!-- Start Primary Key -->
    

    public function getdatatables(){
        if($this->isadmin()==1):
            $this->datatables->select('id_detail,faktur,id_barang,id_satuan,jumlah,user_id,datetime,')
                            ->from('mutasi_barang_detail');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('mutasi_barang_detail/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>

                <a href='#outside' data-toggle='tooltip' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='$1'><i class='glyphicon glyphicon-edit'></i></a>
                <button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger'id='$1'><i class='glyphicon glyphicon-remove'></i></button>
                </div>" , 'id');
            $this->datatables->unset_column('id_detail');

        else:
            $this->datatables->select('id_detail,faktur,id_barang,id_satuan,jumlah,user_id,datetime,')
                            ->from('mutasi_barang_detail');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('mutasi_barang_detail/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a></div>" , 'id');
            $this->datatables->unset_column('id_detail');
        endif;
        echo $this->datatables->generate();
    }
    function enkrip(){
        return md5($this->session->userdata('lihat').":".$this->getuser()."+".date('H:m'));
        // echo $this->session->userdata('mutasi_barang_detail');
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
        
       

        $this->load->view('mutasi_barang_detail_form_inside');
           
    }

    public function get($id_detail=null){
        if($id_detail!==null){
            echo json_encode($this->mutasi_barang_detaildb->get_one($id_detail));
        }
    }
    function tables(){
        $this->load->view('mutasi_barang_detail_data');
    }

    function getone($id=null){
        if($id!==null){
            $data=$this->mutasi_barang_detaildb->get_one($id);
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
            $this->mutasi_barang_detaildb->update($this->input->post('id_detail'));
          }else{
            $this->mutasi_barang_detaildb->save();
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id_detail')){
                $this->mutasi_barang_detaildb->update($this->input->post('id_detail'));
              }else{
                $this->mutasi_barang_detaildb->save();
              }
          }
        }
    }
    

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->mutasi_barang_detaildb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
     public function delete_detail(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id_detail'])){
                $this->mutasi_barang_detaildb->delete_detail($this->input->post('id_detail'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    } 
    private function gen_faktur(){
        $last=$this->mutasi_barang_detaildb->get_last_pt();
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

/** Module mutasi_barang_detail Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
