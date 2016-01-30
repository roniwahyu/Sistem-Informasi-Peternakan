<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class kas_keluar extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->model('kas_keluar_model','kasoutdb',TRUE);
        $this->session->set_userdata('lihat','kas_keluar');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;

      
       $this->template->add_css('plugins/datapicker/datepicker3.css');
        $this->template->add_js('plugins/datapicker/bootstrap-datepicker.js');
        $this->template->add_js('datepicker.js');
        
        
        $this->template->add_js('datatables.js');
        $this->template->add_js('muria.js');
        $this->template->add_js('crud.js');
        $this->template->add_js(' 
            var kk=$("#faktur_kas").val();
            var Tbl_out=$(".table_kasout").DataTable({
                "ajax":{
                            "url":"'.base_url('kas_keluar/kas_keluar_detail').'/"+kk,
                            "dataType": "json"
                        },
                        "sServerMethod": "POST",
                        "bServerSide": true,
                        "bAutoWidth": true,
                        "SortClasses": true,
                        "bscrollCollapse": true,  
                        "paging":   false,
                        "deferRender": true,
                        "bFilter":false,
                         "ordering": false,  
                         
                    });
                $("document").ready(function(){
                    totalkas_keluar(kk);
                    $("body").on("click",".add_akun",function(e){
                        e.preventDefault();
                        $(".rek_kas").DataTable({
                        "ajax":{
                                    "url":"'.base_url('kas_keluar/rek_kas').'",
                                    "dataType": "json"
                                },
                                "sServerMethod": "POST",
                                "bServerSide": true,
                                "bAutoWidth": true,
                                "SortClasses": true,
                                "bscrollCollapse": true,  
                                "paging":   false,
                                "deferRender": true,
                                "bFilter":false,
                                 "ordering": false,  
                                 
                            });

                    });
                
                $("body").on("click",".use_rek",function(e){
                    e.preventDefault();
                    var $this=$(this);
                    var rek=$this.data("rekening");
                    var desc=$this.data("desc");
                    // alert(rek);
                    $("#akun_kas").val(rek);
                    $(".label_kas").html("Akun Kas: "+desc);
                    $("#akun_kas").attr("readonly",true);
                });
                $("body").on("click",".del_detail",function(e){
                    e.preventDefault();
                    var idnya=$(this).attr("id");
                    // alert(idnya
                    var fakturkas = $("#faktur_kas").val();                    
                    $.post( "'.base_url('kas_keluar/delete_detail/').'/"+idnya, { id:idnya,ajax:1} );
                        
                    // Tbl_out.clear(0).draw(); 
                    totalkas_keluar(fakturkas);
                });
                $("body").on("click",".add_kas_keluar",function(e){
                    e.preventDefault();
                    // alert(isedit);
                    var fakturkas = $("#faktur_kas").val();
                    var faktur = $("#faktur_lawan").val();
                    var no = $("#no_perkiraan").val();
                    var ket= $("#deskripsi").val();
                    var nom = $("#nilai").val();
                    
                    var datax={faktur_lawan:faktur,nominal:nom,no_perkiraan:no,keterangan:ket,faktur_kas:$("#faktur_kas").val(),ajax:1};
                    $(this).ready(function(){
                        $.ajax({
                            url:baseurl+"submit_detail/",
                            data:datax,
                            type:"POST",
                            success:function(msg){
                                //alert(msg);
                                $("#faktur_lawan").prop("value","");
                                $("#deskripsi").prop("value","");
                                $("#nilai").prop("value","");
                                $("#no_perkiraan").prop("value","");
                                Tbl_out.clear(0).draw();
                                totalkas_keluar(fakturkas);
                                

                            } });
                        });
                    console.clear();
                });
                $("#modal-kas").on("hidden.bs.modal",function(){
                    $(".rek_kas").DataTable().destroy();

                });

                $("#modal-notif").on("hidden.bs.modal", function(){
                    $(this).data("modal", null);
                    // window.location.reload("'.base_url('purchase_order').'"); 
                    window.location="'.base_url('kas_keluar').'";
                });



            }); //end of document ready
            function totalkas_keluar(faktur){
                // Tbl_out.clear(0).draw(); 
                $.get(baseurl+"get_total_kas_keluar/"+faktur+"/", function(dt, status){
                        d=JSON.parse(dt);
                        if(d.kas_total>0){
                            $("#nominal").val(d.kas_total).trigger("change");
                            $("#nominalx").val(accounting.formatMoney(d.kas_total,"Rp. ",2,".",",")).trigger("change");
                        }else{
                            $("#nominal").val(0);
                            $("#nominalx").val(0);

                        }
                    });
                
            }
             function save_kas_keluar(enkrip){
                var kaskeluar = $("form#addform_kas").serializeArray();
                kaskeluar.push({name:"ajax",value:1});
                $(this).ready(function(){
                    $.ajax({
                        url:baseurl+"submit/"+enkrip,
                        data:kaskeluar,
                        type:"POST",

                        success:function(data){
                            var json = JSON.parse(data);
                            

                        }
                    });
                });
            }
            // console.clear();
        ','embed');
        $this->template->set_layout('dashboard');

    }

    public function index() {
        $this->template->set_title('Kelola Kas Keluar');
        
        $this->template->add_js('var baseurl="'.base_url().'kas_keluar/";','embed');  
        

        //<!-- $this->template->add_js('datepicker.js'); -->
        
        $this->template->load_view('kas_keluar_view',array(
            'view'=>'kas_keluar_data',

                        'title'=>'Kelola Data Kas_keluar',
                        'subtitle'=>'Pengelolaan Kas_keluar',
                        'breadcrumb'=>array(
                            'Kas_keluar'),
                        ));
        
    }
    // private function __baru() {
    function baru() {
        $this->template->set_title('Tambah Kas Keluar');
         $this->template->add_js('accounting.min.js');  
        $this->template->add_js('
            var baseurl="'.base_url().'kas_keluar/";
             $("body").on("click","#save_kas_keluar",function(e){
                    e.preventDefault();
                    save_kas_keluar(enkrip)

                });
            ','embed');  
        $this->template->add_js('var enkrip="'.$this->enkrip().'";','embed');  
     
     
        

        //<!-- $this->template->add_js('datepicker.js'); -->
        $this->session->set_userdata('action',array("baru"=>true,"edit"=>false,"actionid"=>md5("baru")));
        $this->template->load_view('kas_keluar_view',array(
            'faktur_kas'=>$this->gen_new_kk(),
            'opt_supplier'=>$this->kasoutdb->dropdown_supplier(),
                'view'=>'form_kas_keluar',
                        'title'=>'Kelola Data Kas Keluar',
                        'subtitle'=>'Pengelolaan Kas Keluar',
                        'breadcrumb'=>array(
                            'Kas Keluar'),
                        ));
        
    }
    function do_action($action,$id=null){
        // echo md5($id);
        //c4ca4238a0b923820dcc509a6f75849b  --> 1
        $this->$action($id);
    }
    // private function __edit($id) {
    function edit($id) {
        $this->template->set_title('Tambah Kas Keluar');
        
        $this->template->add_js('var baseurl="'.base_url().'kas_keluar/";','embed');  
        $this->template->add_js('accounting.min.js');  
        $this->template->add_js(
            '//$("document").ready(function(){
           


            // });
        ','embed');  
        

        //<!-- $this->template->add_js('datepicker.js'); -->
        $this->session->set_userdata(md5('action'),array("baru"=>false,"edit"=>true,"actionid"=>md5("edit")));
        $this->template->load_view('kas_keluar_view',array(
            'faktur_kas'=>$this->gen_new_kk(),
            'opt_supplier'=>$this->kasoutdb->dropdown_supplier(),
                'view'=>'form_kas_keluar',
                        'title'=>'Kelola Data Kas Keluar',
                        'subtitle'=>'Pengelolaan Kas Keluar',
                        'breadcrumb'=>array(
                            'Kas Keluar'),
                        ));
        
    }
     
     //<!-- Start Primary Key -->
    

    public function getdatatables(){
        if($this->isadmin()==1):
            $this->datatables->select('id,faktur_kas,tgl_kas,akun_kas,id_supplier,ref,keterangan,nominal')
                            ->from('kas_keluar');
            $this->datatables->edit_column('nominal',"<div class='text-right'>$1</div>",'rp(nominal)');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('kas_keluar/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>

                <a href='#outside' data-toggle='tooltip' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='$1'><i class='glyphicon glyphicon-edit'></i></a>
                <button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger'id='$1'><i class='glyphicon glyphicon-remove'></i></button>
                </div>" , 'id');
            $this->datatables->unset_column('id');

        else:
            $this->datatables->select('id,faktur_kas,tgl_kas,akun_kas,id_supplier,ref,keterangan,nominal')
                            ->from('kas_keluar');
            $this->datatables->edit_column('nominal',"<div class='text-right'>$1</div>",'rp(nominal)');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('kas_keluar/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a></div>" , 'id');
            $this->datatables->unset_column('id');
        endif;
        echo $this->datatables->generate();
    }

     public function kas_keluar_detail($faktur=null){
       
            $this->datatables->select('id_detail,id_kas_keluar,faktur_kas,faktur_lawan,no_perkiraan,keterangan,nominal')
                            ->from('kas_keluar_detail');
            $this->datatables->edit_column('faktur_kas',"<div class='text-center'>$1</div>",'faktur_kas');
            $this->datatables->edit_column('faktur_lawan',"<div class='text-left'><a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('kas_masuk_detail/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a> $1</div>",'faktur_lawan');
            $this->datatables->edit_column('no_perkiraan','<div class="text-center">$1</div>','no_perkiraan');
            $this->datatables->edit_column('nominal','<div class="text-right">$1</div>','rp(nominal)');
            $this->datatables->add_column('edit',"<div class='text-center'><div class='btn-group'>
                <a href='#' id='$1' class='del_detail btn btn-xs btn-danger'><i class='fa fa-minus'></i></a></div></div>" , 'id_detail');
            $this->datatables->unset_column('id_detail,id_kas_keluar');
        if(isset($faktur) || !empty($faktur)):
            $this->datatables->where('faktur_kas',$faktur);
        endif;
        echo $this->datatables->generate();
    }
    public function rek_kas(){
       
            $this->datatables->select('id,kdrekening,desc,parent')
                            ->from('00-00-04-06-view-rekening-kas');
            $this->datatables->add_column('edit',"<div class='text-center'><div class='btn-group'>
                <a href='#' data-rekening='$2' data-desc='$3' data-dismiss='modal' class='use_rek btn btn-xs btn-success'><i class='fa fa-check'></i></a></div></div>" , 'id,kdrekening,desc');
            $this->datatables->unset_column('id');
        
        echo $this->datatables->generate();
    }
    function get_total_kas_keluar($faktur=null){
       $total= $this->kasoutdb->get_total_kas_keluar($faktur);
       // print_r($total);
       echo json_encode($total);
    }
    function enkrip(){
        return md5($this->session->userdata('lihat').":".$this->getuser()."+".date('H:m'));
        // echo $this->session->userdata('purchase_order');
    }
    function isadmin(){
       return $this->ion_auth->is_admin();
    }
    private function gen_new_kk(){
        $last_kk=$this->kasoutdb->get_last_kk();
        // print_r($last_kk);
        if(!empty($last_kk)):
            $first=substr($last_kk['faktur_kas'],0,2);
            if($first==''||$first==null){
                $first='KK';
            }
            $left=substr($last_kk['faktur_kas'],2,4);
            $right=substr($last_kk['faktur_kas'],-5);
            $nopt=number_format($right); 
            
            
            $newpo=strval($nopt+1);
            $newpo2=substr(strval("00000$newpo"),-5);

        $tahun=substr($left,0,2);
        $bulan=substr($left,2,4);
        
            if($tahun<>date('y')):
                $tahun=date('y');
                if($bulan==date('m')):
                    $gen_pr=strval($first.$tahun.$bulan."00001");
                elseif($bulan<>date('m')):
                    $bulan=date('m');
                    $gen_pr=strval($first.$tahun.$bulan."00001");
                endif;
            elseif($tahun==date('y')):
                if(intval($bulan)<>date('m')):
                    $bulan=date('m');
                    $gen_pr=strval($first.$tahun.$bulan."00001"); 
                elseif($bulan==date('m')):
                    $gen_pr=strval($first.$tahun.$bulan.$newpo2);
                endif;
            endif;
        else:
            // $gen_pr="PT151100001";
            $gen_pr="KK".date('ym')."00001";
        endif;
        return $gen_pr;
    }
     function get_new_kk(){
        echo $this->gen_new_kk();
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
        
       

        $this->load->view('kas_keluar_form_inside');
           
    }

    public function get($id=null){
        if($id!==null){
            echo json_encode($this->kasoutdb->get_one($id));
        }
    }
    function tables(){
        $this->load->view('kas_keluar_data');
    }

    function getone($id=null){
        if($id!==null){
            $data=$this->kasoutdb->get_one($id);
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
            $this->kasoutdb->update($this->input->post('id'));
          }else{
            $this->kasoutdb->save();
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id')){
                $this->kasoutdb->update($this->input->post('id'));
              }else{
                $this->kasoutdb->save();
              }
          }
        }
    }

    public function submit_detail(){
         $data = array(
        
            'id_kas_keluar' => $this->input->post('id_kas_keluar', TRUE),
           
            'faktur_kas' => $this->input->post('faktur_kas', TRUE),
           
            'faktur_lawan' => $this->input->post('faktur_lawan', TRUE),
           
            'no_perkiraan' => $this->input->post('no_perkiraan', TRUE),
           
            'keterangan' => $this->input->post('keterangan', TRUE),
           
            'nominal' => $this->input->post('nominal', TRUE),
           
            'user_id' =>$this->getuser(),
           
            'datetime' => date("Y-m-d H:m:s"),
           
        );
        if ($this->input->post('ajax')){
          if ($this->input->post('id')){
            $this->kasoutdb->update($this->input->post('id'));
          }else{
            $this->kasoutdb->save_detail($data);
          }

        }
    }
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->kasoutdb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
    public function delete_detail(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->kasoutdb->delete_detail($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
    

}

/** Module kas_keluar Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
