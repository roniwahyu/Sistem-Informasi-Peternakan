<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class jurnal extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->model('jurnal_model','jrdb',TRUE);
        $this->load->model('jurnal_detail/jurnal_detail_model','jrdetaildb',TRUE);
        $this->session->set_userdata('lihat','jurnal');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;

        $this->template->add_js('plugins/dataTables/jquery.dataTables.min.js');
        $this->template->add_js('plugins/dataTables/dataTables.bootstrap.min.js');
        $this->template->add_js('plugins/dataTables/dataTables.buttons.min.js');
 
        $this->template->add_css('plugins/dataTables/dataTables.bootstrap.min.css');
        $this->template->add_js('plugins/dataTables/dataTables.scroller.min.js');
        $this->template->add_css('plugins/dataTables/scroller.bootstrap.min.css');

       
        
        $this->template->add_js('datatables.js');
        $this->template->add_js('muria.js');
        $this->template->add_js('crud.js');
        $this->template->set_layout('dashboard');
    }

    public function index() {
        $this->template->set_title('Kelola Jurnal');
        
        $this->template->add_js('var baseurl="'.base_url().'jurnal/";','embed');  
        

        //<!-- $this->template->add_js('datepicker.js'); -->
        
        $this->template->load_view('jurnal_view',array(
            'view'=>'jurnal_data',
                        'title'=>'Kelola Data Jurnal',
                        'subtitle'=>'Pengelolaan Jurnal',
                        'breadcrumb'=>array(
                            'Jurnal'),
                        ));
        
    }
    public function baru() {
        $this->template->set_title('Kelola Jurnal');
        $this->session->set_userdata(md5('action'),array("baru"=>true,"edit"=>false,"actionid"=>md5("baru")));

        $this->template->add_js('accounting.min.js');  
        $this->template->add_js('var baseurl="'.base_url('jurnal').'/";','embed');  
        $this->template->add_js('var buktiurl="'.base_url('bukti').'/";','embed');  
        $this->template->add_js('modules/jurnal.js');  
        $data['no_jurnal']=$this->gen_new_jr();
        $this->template->load_view('jurnal_view',array(
            'filter_bukti'=>'',
            'opt_bukti'=>$this->jrdb->dropdown_bukti(),
            'default'=>$data,
            'view'=>'form_jurnal',
                        'title'=>'Kelola Data Jurnal',
                        'subtitle'=>'Tambah Jurnal Baru',
                        'breadcrumb'=>array(
                            'Jurnal'),
                        ));
        
    }
    public function edit($id) {
        $this->template->set_title('Kelola Jurnal');
        $this->session->set_userdata(md5('action'),array("baru"=>false,"edit"=>true,"actionid"=>md5("edit")));

        $this->template->add_js('accounting.min.js');  
        $this->template->add_js('var baseurl="'.base_url('jurnal').'/";','embed');  
        $this->template->add_js('var buktiurl="'.base_url('bukti').'/";','embed');  
        $this->template->add_js('modules/jurnal.js');  
        // $id=$this->input->get('id');
        $data=$this->jrdb->get_one($id);
        // print_r($data);
        // $data['no_jurnal']=$this->gen_new_jr();
        $this->template->load_view('jurnal_view',array(
            'filter_bukti'=>'',
            'opt_bukti'=>$this->jrdb->dropdown_bukti(),
            'default'=>$data,
            'view'=>'form_jurnal',
                        'title'=>'Kelola Data Jurnal',
                        'subtitle'=>'Tambah Jurnal Baru',
                        'breadcrumb'=>array(
                            'Jurnal'),
                        ));
        
    }
     
     //<!-- Start Primary Key -->
    

    public function getdatatables(){
        
            $this->datatables->select('id,no_jurnal,no_bukti,jurnal_group,tgl,ket,total_debet,total_kredit,status')
                            ->from('jurnal');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('jurnal/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>

                <a href='".base_url('jurnal/edit/$1')."' title='Edit' class='edite btn btn-xs btn-success' id='$1'><i class='glyphicon glyphicon-edit'></i></a>
                <button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger'id='$1'><i class='glyphicon glyphicon-remove'></i></button>
                </div>" , 'id');
            $this->datatables->unset_column('id');

     
        echo $this->datatables->generate();
    }
    public function getdetail($no_jurnal){
        
            $this->datatables->select('id_detail,id_jurnal,no_jurnal,akun_detail,ket_detail,debet,kredit')
                            ->from('00-00-11-01-view-jurnal-detail');
            $this->datatables->where('no_jurnal',$no_jurnal);
            $this->datatables->edit_column('debet','<div class="text-right">$1</div>','rp(debet)');
            $this->datatables->edit_column('kredit','<div class="text-right">$1</div>','rp(kredit)');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('jurnal_detail/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a></div>" , 'id');
            $this->datatables->unset_column('id_detail,id_jurnal,no_jurnal');
       
        echo $this->datatables->generate();
    }
    function getot_detail($no_jurnal){
        echo json_encode($this->jrdb->gettotal_detail($no_jurnal));

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
    private function gen_new_jr(){
        $last_jr=$this->jrdb->get_last_jr();
        // print_r($last_jr);
        if(!empty($last_jr)):
            $first=substr($last_jr['no_jurnal'],0,2);
            if($first==''||$first==null){
                $first='JR';
            }
            $left=substr($last_jr['no_jurnal'],2,4);
            $right=substr($last_jr['no_jurnal'],-5);
            $nopt=number_format($right); 
            
            
            $newpo=strval($nopt+1);
            $newpo2=substr(strval("00000$newpo"),-5);

        $tahun=substr($left,0,2);
        $bulan=substr($left,2,4);
        
            if($tahun<>date('y')):
                $tahun=date('y');
                if($bulan==date('m')):
                    $gen_bk=strval($first.$tahun.$bulan."00001");
                elseif($bulan<>date('m')):
                    $bulan=date('m');
                    $gen_bk=strval($first.$tahun.$bulan."00001");
                endif;
            elseif($tahun==date('y')):
                if(intval($bulan)<>date('m')):
                    $bulan=date('m');
                    $gen_bk=strval($first.$tahun.$bulan."00001"); 
                elseif($bulan==date('m')):
                    $gen_bk=strval($first.$tahun.$bulan.$newpo2);
                endif;
            endif;
        else:
            // $gen_bk="PT151100001";
            $gen_bk="JR".date('ym')."00001";
        endif;
        return $gen_bk;
    }
     function get_new_jr(){
        echo $this->gen_new_jr();
    }
    function forms(){
        
       

        $this->load->view('jurnal_form_inside');
           
    }

    public function get($id=null){
        if($id!==null){
            echo json_encode($this->jrdb->get_one($id));
        }
    }
    function tables(){
        $this->load->view('jurnal_data');
    }

    function getone($id=null){
        if($id!==null){
            $data=$this->jrdb->get_one($id);
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
            $this->jrdb->update($this->input->post('id'));
          }else{
            $this->jrdb->save();
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id')){
                $this->jrdb->update($this->input->post('id'));
              }else{
                $this->jrdb->save();
              }
          }
        }
    }
    public function submit_detail(){
        if ($this->input->post('ajax')){
          if ($this->input->post('id')){
            $this->jrdb->update($this->input->post('id'));
          }else{
            
            $data = array(
                   
            'no_jurnal' => $this->input->post('no_jurnal', TRUE),
           
            'akun_detail' => $this->input->post('akun_detail', TRUE),
           
            'tipe_detail' => $this->input->post('tipe_detail', TRUE),
           
            'ket_detail' => $this->input->post('ket_detail', TRUE),
           
            'nilai' => $this->input->post('nilai', TRUE),
           
       
            'user_id' => $this->getuser(),
           
            'datetime' =>date('Y-m-d H:m:s'),
            );
           
            $this->jrdb->save_detail($data);
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id')){
                $this->jrdb->update($this->input->post('id'));
              }else{
                $this->jrdb->save();
              }
          }
        }
    }

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->jrdb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
    

}

/** Module jurnal Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
