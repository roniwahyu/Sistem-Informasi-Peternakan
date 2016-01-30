<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class bank extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->model('bank_model','bankdb',TRUE);
        $this->load->model('banks/banks_model','banksdb',TRUE);
        $this->session->set_userdata('lihat','bank');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;

      
       $this->template->add_css('plugins/datapicker/datepicker3.css');
        $this->template->add_js('plugins/datapicker/bootstrap-datepicker.js');
        $this->template->add_js('datepicker.js');
        
        
        $this->template->add_js('datatables.js');
        $this->template->add_js('muria.js');
        $this->template->add_js('crud.js');
        $this->template->set_layout('dashboard');
    }

    public function index() {
        $this->template->set_title('Kelola Bank');
        
        $this->template->add_js('var baseurl="'.base_url().'bank/";','embed');  
        

        //<!-- $this->template->add_js('datepicker.js'); -->
        
        $this->template->load_view('bank_view',array(
            'view'=>'bank_table',
                        'title'=>'Kelola Data Bank',
                        'subtitle'=>'Pengelolaan Bank',
                        'breadcrumb'=>array(
                            'Bank'),
                        ));
        
    }
    public function edit($enkrip=null,$id=null) {
        $this->template->set_title('Kelola Bank');
        $hash=strtoupper(md5(date('Y-m-d H:m')));
        // echo $hash;
        if($enkrip!=$hash){
            $this->template->add_js('alert("Session Expired");
                window.location="'.base_url('bank/edit/'.$hash.'/'.$id).'";
                ','embed');

        }
        $this->template->add_js('accounting.min.js');
        $this->template->add_js('plugins/select2/select2.min.js');
        $this->template->add_css('plugins/select2/select2.min.css');
        $this->template->add_js('
            $(".select2").select2();
            var baseurl="'.base_url('bank').'/";
            var girourl="'.base_url('bank_giro').'/";
            var banksurl="'.base_url('banks').'/";
             var bk="'.$this->gen_new_bk().'"; 
             var bm="'.$this->gen_new_bm().'";

             var bukti=$("#bukti_bank").val();','embed');
        $this->template->add_js('modules/banking.js');
        $bank=$this->bankdb->get_one($id);
        $banks=$this->banksdb->get_one($bank['id_bank']);
        // print_r($banks);
        $bank['banks']=$banks['Kode']." (".$banks['Keterangan'].")";
        // print_r($bank);
        $type=$bank['tipe_trx'];
        if($type!=null|| !empty($type)):
            if($type=='D'):
                $data['tipe_trx']='D';
               
            elseif($type=='K'):
                $data['tipe_trx']='K';
                
            endif;
        endif;
        $data=$bank;
        $this->session->set_userdata(md5('action'),array("baru"=>false,"edit"=>true,"actionid"=>md5("edit")));

        $this->template->load_view('bank_view',array(
            'view'=>'form_bank',
            'default'=>$data,
            
            'opt_supplier'=>$this->bankdb->dropdown_supplier(),
            'opt_customer'=>$this->bankdb->dropdown_customer(),
                        'title'=>'Kelola Data Bank',
                        'subtitle'=>'Pengelolaan Bank',
                        'breadcrumb'=>array(
                            'Bank'),
                        ));
    }

   
    public function baru($enkrip=null,$type=null) {
        $this->template->set_title('Kelola Bank');
        $hash=strtoupper(md5(date('Y-m-d H:m')));
        // echo $hash;
        if($enkrip!=$hash){
            $this->template->add_js('alert("Session Expired");
                window.location="'.base_url('bank/baru/'.$hash.'/D').'";
                ','embed');

        }
        $this->template->add_js('accounting.min.js');
        $this->template->add_js('plugins/select2/select2.min.js');
        $this->template->add_css('plugins/select2/select2.min.css');
        $this->template->add_js('
            $(".select2").select2();
            var baseurl="'.base_url('bank').'/";
            var girourl="'.base_url('bank_giro').'/";
            var banksurl="'.base_url('banks').'/";
             var bk="'.$this->gen_new_bk().'"; 
             var bm="'.$this->gen_new_bm().'";
             var bukti=$("#bukti_bank").val();','embed');  
        

        $this->template->add_js('modules/banking.min.js');
        if($type!=null|| !empty($type)):
            if($type=='D'):
                $data['tipe_trx']='D';
                $data['bukti_bank']=$this->gen_new_bm();
            elseif($type=='K'):
                $data['tipe_trx']='K';
                $data['bukti_bank']=$this->gen_new_bk();
            endif;
        else:
            $data=array();
        endif;
        $this->session->set_userdata(md5('action'),array("baru"=>true,"edit"=>false,"actionid"=>md5("baru")));

        $this->template->load_view('bank_view',array(
            'view'=>'form_bank',
            'default'=>$data,
            'opt_supplier'=>$this->bankdb->dropdown_supplier(),
            'opt_customer'=>$this->bankdb->dropdown_customer(),
                        'title'=>'Kelola Data Bank',
                        'subtitle'=>'Pengelolaan Bank',
                        'breadcrumb'=>array(
                            'Bank'),
                        ));
        
    }
    public function masuk() {
        $this->template->set_title('Kelola Bank');
        
        $this->template->add_js('
            var baseurl="'.base_url('bank').'/";
                var tbl_bank=$(".table_bank").DataTable({
                        "ajax":{
                                    "url":"'.base_url('bank/get_bank_masuk').'",
                                    "dataType": "json"
                                },
                                "sServerMethod": "POST",
                                "bServerSide": true,
                                "bAutoWidth": true,
                                "SortClasses": true,
                                "bscrollCollapse": true,  
                                "deferRender": true,
                              
                            });
                $("body").on("click",".del",function(e){
                    e.preventDefault();
                    var idnya=$(this).attr("id");
                    var del=$(this).attr("data-delete");
                    if(tbl_bank){
                        $.post( "'.base_url('bank/delete').'/"+idnya,{ id:idnya,ajax:1,bukti_bank:del},function(data,status){
                            if(status="success"){
                                tbl_bank.clear().draw(); 
                                
                            }
                        });
                    }
                });
             
            '

            ,'embed');  
        

        //<!-- $this->template->add_js('datepicker.js'); -->
        
        $this->template->load_view('bank_view',array(
            'view'=>'bank_data_masuk',
                        'title'=>'Kelola Data Bank',
                        'subtitle'=>'Pengelolaan Bank',
                        'breadcrumb'=>array(
                            'Bank'),
                        ));
        
    }
    public function keluar() {
        $this->template->set_title('Kelola Bank');
        
        $this->template->add_js('
            var baseurl="'.base_url('bank').'/";
                 var tbl_bank=$(".table_bank").DataTable({
                        "ajax":{
                                    "url":"'.base_url('bank/get_bank_keluar').'",
                                    "dataType": "json"
                                },
                                "sServerMethod": "POST",
                                "bServerSide": true,
                                "bAutoWidth": true,
                                "SortClasses": true,
                                "bscrollCollapse": true,  
                                "deferRender": true,
                            
                            });
           
                $("body").on("click",".del",function(e){
                    e.preventDefault();
                    var idnya=$(this).attr("id");
                    var del=$(this).attr("data-delete");
                    if(tbl_bank){
                        $.post( "'.base_url('bank/delete').'/"+idnya,{ id:idnya,ajax:1,bukti_bank:del},function(data,status){
                            if(status="success"){
                                tbl_bank.clear().draw(); 
                                
                            }
                        });
                    }
                });

            ','embed');  

        //<!-- $this->template->add_js('datepicker.js'); -->
        
        $this->template->load_view('bank_view',array(
                'view'=>'bank_data_keluar',
                        'title'=>'Kelola Data Bank',
                        'subtitle'=>'Pengelolaan Bank',
                        'breadcrumb'=>array(
                            'Bank'),
                        ));
        
    }
     
     //<!-- Start Primary Key -->
    
    public function getdatatables(){
        $hash=strtoupper(md5(date('Y-m-d H:m')));
            $this->datatables->select('id,bukti_bank,tipe_trx,akun_bank,kode_bank,customer,tgl_bank,ket_rek,total_bank')
                            ->from('00-00-09-03-view-bank');
            $this->datatables->edit_column('total_bank','<div class="text-right">$1</div>','rp(total_bank)');
            $this->datatables->edit_column('kode_bank','$1 - $2','kode_bank,ket_rek');

            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('bank/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>

                <a href='".base_url('bank/edit/'.$hash.'/$1')."' title='Edit' class='edite btn btn-xs btn-success' id='$1'><i class='glyphicon glyphicon-edit'></i></a>
                <button title='Hapus' data-delete='$2' class='del btn btn-xs btn-danger'id='$1'><i class='glyphicon glyphicon-remove'></i></button>
                </div>" , 'id,bukti_bank');
            $this->datatables->unset_column('id,ket_rek');

      
        echo $this->datatables->generate();
    }
    public function getdatatablesx(){
        if($this->isadmin()==1):
            $this->datatables->select('id,bukti_bank,tipe_trx,akun_bank,id_bank,id_supplier,id_customer,tgl_bank,keterangan,total_bank,total_giro,ref,user_id,datetime,')
                            ->from('bank');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('bank/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>

                <a href='#outside' data-toggle='tooltip' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='$1'><i class='glyphicon glyphicon-edit'></i></a>
                <button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger'id='$1'><i class='glyphicon glyphicon-remove'></i></button>
                </div>" , 'id');
            $this->datatables->unset_column('id');

        else:
            $this->datatables->select('id,bukti_bank,tipe_trx,akun_bank,id_bank,id_supplier,id_customer,tgl_bank,keterangan,total_bank,total_giro,ref,user_id,datetime,')
                            ->from('bank');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('bank/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a></div>" , 'id');
            $this->datatables->unset_column('id');
        endif;
        echo $this->datatables->generate();
    }
    public function get_bank_masuk(){
        $hash=strtoupper(md5(date('Y-m-d H:m')));
            $this->datatables->select('id,bukti_bank,akun_bank,kode_bank,customer,tgl_bank,ket_rek,total_bank')
                            ->from('00-00-09-03-view-bank');
            $this->datatables->where('tipe_trx','D');
            $this->datatables->edit_column('total_bank','<div class="text-right">$1</div>','rp(total_bank)');
            $this->datatables->edit_column('kode_bank','$1 - $2','kode_bank,ket_rek');

            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('bank/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>

                <a href='".base_url('bank/edit/'.$hash.'/$1')."' title='Edit' class='edite btn btn-xs btn-success' id='$1'><i class='glyphicon glyphicon-edit'></i></a>
                <button title='Hapus' data-delete='$2' class='del btn btn-xs btn-danger'id='$1'><i class='glyphicon glyphicon-remove'></i></button>
                </div>" , 'id,bukti_bank');
            $this->datatables->unset_column('id,tipe_trx,ket_rek');

      
        echo $this->datatables->generate();
    }
    public function get_bank_keluar(){
       $hash=strtoupper(md5(date('Y-m-d H:m')));
            $this->datatables->select('id,bukti_bank,akun_bank,kode_bank,supplier,tgl_bank,ket_rek,total_bank')
                            ->from('00-00-09-03-view-bank');
            $this->datatables->where('tipe_trx','K');
            $this->datatables->edit_column('kode_bank','$1 - $2','kode_bank,ket_rek');
            $this->datatables->edit_column('total_bank','<div class="text-right">$1</div>','rp(total_bank)');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('bank/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>

                <a href='".base_url('bank/edit/'.$hash.'/$1')."' title='Edit' class='edite btn btn-xs btn-success' id='$1'><i class='glyphicon glyphicon-edit'></i></a>
                <button title='Hapus' data-delete='$2' class='del btn btn-xs btn-danger'id='$1'><i class='glyphicon glyphicon-remove'></i></button>
                </div>" , 'id,bukti_bank');
            $this->datatables->unset_column('id,tipe_trx,ket_rek');

        
        echo $this->datatables->generate();
    }
    function get_bank_detail($bukti=null){
        $this->datatables->select('id_detail,bukti_bank,faktur_lawan,akun_lawan,keterangan_detail,nominal_detail')
                                    ->from('bank_detail');
        $this->datatables->where('bukti_bank',$bukti);
        $this->datatables->edit_column('bukti_bank',"<div class='text-center'>$1</div>",'bukti_bank');
        $this->datatables->edit_column('faktur_lawan',"<div class='text-center'>$1</div>",'faktur_lawan');
        $this->datatables->edit_column('akun_lawan',"<div class='text-center'>$1</div>",'akun_lawan');
        $this->datatables->edit_column('nominal_detail',"<div class='text-right'>$1</div>",'rp(nominal_detail)');
        $this->datatables->add_column('edit',"<div class='text-center'><a href='#' id='$1' data-delete='$1' class='del_detail btn btn-xs btn-danger'><i class='fa fa-minus'></i></a></div>",'id_detail');
        // $this->datatables->add_column('edit',"<div class='text-center'><div class='btn-group'>
        // <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('bank_detail/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a></div></div>" , 'id');
        $this->datatables->unset_column('id_detail');
        echo $this->datatables->generate();
       
    }
    public function get_tt_giro($faktur){
        
            $this->datatables->select('id,id_trx_bank,bukti_bank,tipe_tt_giro,no_tt_giro,tgl_tt_giro,nominal')
                            ->from('bank_giro');
            $this->datatables->where('bukti_bank',$faktur);
            $this->datatables->edit_column('nominal',"<div class='text-right'>$1</div>","rp(nominal)");
            $this->datatables->edit_column('tgl_tt_giro',"<div class='text-center'>$1</div>","tgl_tt_giro");
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('bank_giro/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>
                <a href='#' data-id='$1' id='$1' class='del_tt_giro btn btn-danger btn-xs'><i class='fa fa-remove'></i> </a></div>" , 'id');
            $this->datatables->unset_column('id,id_trx_bank,bukti_bank');
       
        echo $this->datatables->generate();
    }

    function get_total_detail($bukti=null){
        echo json_encode($this->bankdb->get_total_detail($bukti));
    }
    function get_total_giro($bukti=null){
        echo json_encode($this->bankdb->get_total_giro($bukti));
    }
    function enkrip(){
        return md5($this->session->userdata('lihat').":".$this->getuser()."+".date('H:m'));
        // echo $this->session->userdata('purchase_order');
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
        
       

        $this->load->view('bank_form_inside');
           
    }

    public function get($id=null){
        if($id!==null){
            echo json_encode($this->bankdb->get_one($id));
        }
    }
    function tables(){
        $this->load->view('bank_data');
    }
    private function gen_new_bk(){
        $last_bk=$this->bankdb->get_last_bk();
        // print_r($last_bk);
        if(!empty($last_bk)):
            $first=substr($last_bk['bukti_bank'],0,2);
            if($first==''||$first==null){
                $first='BK';
            }
            $left=substr($last_bk['bukti_bank'],2,4);
            $right=substr($last_bk['bukti_bank'],-5);
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
            $gen_bk="BK".date('ym')."00001";
        endif;
        return $gen_bk;
    }
     function get_new_bk(){
        echo $this->gen_new_bk();
    }
    private function gen_new_bm(){
        $last_bm=$this->bankdb->get_last_bm();
        // print_r($last_bm);
        if(!empty($last_bm)):
            $first=substr($last_bm['bukti_bank'],0,2);
            if($first==''||$first==null){
                $first='BM';
            }
            $left=substr($last_bm['bukti_bank'],2,4);
            $right=substr($last_bm['bukti_bank'],-5);
            $nopt=number_format($right); 
            
            
            $newpo=strval($nopt+1);
            $newpo2=substr(strval("00000$newpo"),-5);

        $tahun=substr($left,0,2);
        $bulan=substr($left,2,4);
        
            if($tahun<>date('y')):
                $tahun=date('y');
                if($bulan==date('m')):
                    $gen_bm=strval($first.$tahun.$bulan."00001");
                elseif($bulan<>date('m')):
                    $bulan=date('m');
                    $gen_bm=strval($first.$tahun.$bulan."00001");
                endif;
            elseif($tahun==date('y')):
                if(intval($bulan)<>date('m')):
                    $bulan=date('m');
                    $gen_bm=strval($first.$tahun.$bulan."00001"); 
                elseif($bulan==date('m')):
                    $gen_bm=strval($first.$tahun.$bulan.$newpo2);
                endif;
            endif;
        else:
            // $gen_bm="PT151100001";
            $gen_bm="BM".date('ym')."00001";
        endif;
        return $gen_bm;
    }
     function get_new_bm(){
        echo $this->gen_new_bm();
    }
    function getone($id=null){
        if($id!==null){
            $data=$this->bankdb->get_one($id);
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
            $this->bankdb->update($this->input->post('id'));
            $id=$this->input->post('id');
            $bukti=$this->input->post('bukti_bank', TRUE);
            $this->bankdb->update_giro($bukti,$id);
          }else{
            $id=$this->bankdb->save();
            $bukti=$this->input->post('bukti_bank', TRUE);
            $this->bankdb->update_giro($bukti,$id);
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id')){
                $this->bankdb->update($this->input->post('id'));
                 $id=$this->input->post('id');
                 $bukti=$this->input->post('bukti_bank', TRUE);
                $this->bankdb->update_giro($bukti,$id);
              }else{
                $id=$this->bankdb->save();
                $bukti=$this->input->post('bukti_bank', TRUE);
                $this->bankdb->update_giro($bukti,$id);
              }
          }
        }
    }
    function submit_detail() {
           $data = array(
        
            'id_trx_bank' => $this->input->post('id_trx_bank', TRUE),
           
            'bukti_bank' => $this->input->post('bukti_bank', TRUE),
           
            'akun_debet' => $this->input->post('akun_debet', TRUE),
           
            'akun_kredit' => $this->input->post('akun_kredit', TRUE),
           
            'faktur_lawan' => $this->input->post('faktur_lawan', TRUE),
           
            'akun_lawan' => $this->input->post('akun_lawan', TRUE),
           
            'nominal_detail' => $this->input->post('nominal_detail', TRUE),
           
            'keterangan_detail' => $this->input->post('keterangan_detail', TRUE),
           
            'status_detail' => $this->input->post('status_detail', TRUE),
           
            'user_id' => $this->getuser(),
           
            'datetime' => date('Y-m-d H:m:s'),

           
        );

       $this->bankdb->save_detail($data);
    }
    function submit_giro(){
        $data = array(
        
            'id_trx_bank' => $this->input->post('id_trx_bank', TRUE),
               
            'bukti_bank' => $this->input->post('bukti_bank', TRUE),
           
            'tipe_tt_giro' => $this->input->post('tipe_tt_giro', TRUE),
           
            'no_tt_giro' => $this->input->post('no_tt_giro', TRUE),
           
            'tgl_tt_giro' => $this->input->post('tgl_tt_giro', TRUE),
           
            'nominal' => $this->input->post('nominal', TRUE),
           
          
            'user_id' => $this->getuser(),
           
            'datetime' => date('Y-m-d H:m:s'),
           
        );
        $this->bankdb->save_tt_giro($data);
    }
    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->bankdb->delete($this->input->post('id'));
                $this->bankdb->delete_by_bukti($this->input->post('bukti_bank'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
    public function delete_detail(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->bankdb->delete_detail($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
    

}

/** Module bank Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
