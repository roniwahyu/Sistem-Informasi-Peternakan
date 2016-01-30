<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class kas_masuk extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->model('kas_masuk_model','kasindb',TRUE);
        $this->session->set_userdata('lihat','kas_masuk');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;

       
          $this->template->add_css('plugins/datapicker/datepicker3.css');
        $this->template->add_js('plugins/datapicker/bootstrap-datepicker.js');
        $this->template->add_js('datepicker.js');
        
        $this->template->add_js('datatables.js');
          $this->template->add_js('accounting.min.js');
        $this->template->add_js('muria.js');
        $this->template->add_js('crud.js');
        $this->template->set_layout('dashboard');
        $this->template->add_js(' 
            var km=$("#faktur_kas").val();
            var Tbl_in=$(".table_kasin").DataTable({
                "ajax":{
                            "url":"'.base_url('kas_masuk/kas_masuk_detail').'/"+km,
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
                totalkas_masuk(km);
                $("body").on("click",".add_akun",function(e){
                    e.preventDefault();
                    $(".rek_kas").DataTable({
                    "ajax":{
                                "url":"'.base_url('kas_masuk/rek_kas').'",
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

                })
                
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
                    $.post( "'.base_url('kas_masuk/delete_detail/').'/"+idnya, { id:idnya,ajax:1} );
                        
                    Tbl_in.clear(0).draw(); 
                    totalkas_masuk(fakturkas);
                });
                $("body").on("click",".add_kas_masuk",function(e){
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
                                Tbl_in.clear(0).draw();
                                totalkas_masuk(fakturkas);
                                

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
                    window.location="'.base_url('kas_masuk').'";
                });



            }); //end of document ready
            function totalkas_masuk(faktur){
                Tbl_in.clear(0).draw(); 
                $.get(baseurl+"get_total_kas_masuk/"+faktur+"/", function(dt, status){
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
             function save_kas_masuk(enkrip){
                var kasmasuk = $("form#addform_kas").serializeArray();
                kasmasuk.push({name:"ajax",value:1});
                $(this).ready(function(){
                    $.ajax({
                        url:baseurl+"submit/"+enkrip,
                        data:kasmasuk,
                        type:"POST",

                        success:function(data){
                            var json = JSON.parse(data);
                            

                        }
                    });
                });
            }
           
            // console.clear();
        ','embed');
    }

    public function index() {
        $this->template->set_title('Kelola Kas Masuk');
        
        $this->template->add_js('var baseurl="'.base_url().'kas_masuk/";','embed');  
        

      
        
        $this->template->load_view('kas_masuk_view',array(
            'view'=>'kas_masuk_data',
            
                        'title'=>'Kelola Data Kas Masuk',
                        'subtitle'=>'Pengelolaan Kas Masuk',
                        'breadcrumb'=>array(
                            'Kas Masuk'),
                        ));
        
    }
    public function baru() {
        $this->template->set_title('Tambah Kas Masuk Baru');
        $this->template->add_css('plugins/select2/select2.min.css');
        $this->template->add_js('plugins/select2/select2.min.js');
        $this->template->add_js('
            var baseurl="'.base_url().'kas_masuk/";
            enkrip="'.$this->enkrip().'";
            $("body").on("click","#save_kas_masuk",function(e){
                    e.preventDefault();
                    save_kas_masuk(enkrip)

                });
            $(".select2").select2();
            ','embed');  
        

        //<!-- $this->template->add_js('datepicker.js'); -->
        $this->session->set_userdata(md5('action'),array("baru"=>true,"edit"=>false,"actionid"=>md5("baru")));
        $this->template->load_view('kas_masuk_view',array(
            'faktur_kas'=>$this->gen_new_km(),
            'opt_supplier'=>$this->kasindb->dropdown_customer(),
                        'view'=>'form_kas_masuk',
                        'title'=>'Kelola Data Kas Masuk',
                        'subtitle'=>'Pengelolaan Kas Masuk',
                        'breadcrumb'=>array(
                            'Kas Masuk'),
                        ));
        
    }
    public function edit($id) {
        $this->template->set_title('Tambah Kas Masuk Baru');
        $this->template->add_css('plugins/select2/select2.min.css');
        $this->template->add_js('plugins/select2/select2.min.js');
        $this->template->add_js('var baseurl="'.base_url().'kas_masuk/";
            $(".select2").select2();
            ','embed');  
        

        //<!-- $this->template->add_js('datepicker.js'); -->
        $this->session->set_userdata(md5('action'),array("baru"=>false,"edit"=>true,"actionid"=>md5("edit")));
        $this->template->load_view('kas_masuk_view',array(
            'faktur_kas'=>$this->gen_new_km(),
            'opt_supplier'=>$this->kasindb->dropdown_customer(),
                        'view'=>'form_kas_masuk',
                        'title'=>'Kelola Data Kas Masuk',
                        'subtitle'=>'Pengelolaan Kas Masuk',
                        'breadcrumb'=>array(
                            'Kas Masuk'),
                        ));
        
    }
     
     //<!-- Start Primary Key -->
    

    public function getdatatables(){
        if($this->isadmin()==1):
            $this->datatables->select('id,faktur_kas,tgl_kas,akun_kas,id_customer,ref,keterangan,nominal')
                            ->from('kas_masuk');
            $this->datatables->edit_column('nominal','<div class="text-right">$1</div>','rp(nominal)');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('kas_masuk/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>

                <a href='#outside' data-toggle='tooltip' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='$1'><i class='glyphicon glyphicon-edit'></i></a>
                <button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger'id='$1'><i class='glyphicon glyphicon-remove'></i></button>
                </div>" , 'id');
            $this->datatables->unset_column('id');

        else:
            $this->datatables->select('id,faktur_kas,tgl_kas,akun_kas,id_customer,ref,keterangan,nominal')
                            ->from('kas_masuk');
            $this->datatables->edit_column('nominal','<div class="text-right">$1</div>','rp(nominal)');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('kas_masuk/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a></div>" , 'id');
            $this->datatables->unset_column('id');
        endif;
        echo $this->datatables->generate();
    }
    public function kas_masuk_detail($faktur=null){
       
            $this->datatables->select('id_detail,id_kas_masuk,faktur_kas,faktur_lawan,no_perkiraan,keterangan,nominal')
                            ->from('kas_masuk_detail');
            $this->datatables->edit_column('faktur_kas',"<div class='text-center'>$1</div>",'faktur_kas');
            $this->datatables->edit_column('faktur_lawan',"<div class='text-left'><a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('kas_masuk_detail/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a> $1</div>",'faktur_lawan');
            $this->datatables->edit_column('no_perkiraan','<div class="text-center">$1</div>','no_perkiraan');
            $this->datatables->edit_column('nominal','<div class="text-right">$1</div>','rp(nominal)');
            $this->datatables->add_column('edit',"<div class='text-center'><div class='btn-group'>
                <a href='#' id='$1' class='del_detail btn btn-xs btn-danger'><i class='fa fa-minus'></i></a></div></div>" , 'id_detail');
            $this->datatables->unset_column('id_detail,id_kas_masuk');
        if(isset($faktur) || !empty($faktur)):
            $this->datatables->where('faktur_kas',$faktur);
        endif;
        // print_r($this->get_total_kas_masuk($faktur));
        echo $this->datatables->generate();
        // return $total;
        // return 
    }
    function get_total_kas_masuk($faktur=null){
       $total= $this->kasindb->get_total_kas_masuk($faktur);
       // print_r($total);
       echo json_encode($total);
    }
    function enkrip(){
        return md5($this->session->userdata('lihat').":".$this->getuser()."+".date('H:m'));
        // echo $this->session->userdata('purchase_order');
    }
    public function rek_kas(){
       
            $this->datatables->select('id,kdrekening,desc,parent')
                            ->from('00-00-04-06-view-rekening-kas');
            $this->datatables->add_column('edit',"<div class='text-center'><div class='btn-group'>
                <a href='#' data-rekening='$2' data-desc='$3' data-dismiss='modal' class='use_rek btn btn-xs btn-success'><i class='fa fa-check'></i></a></div></div>" , 'id,kdrekening,desc');
            $this->datatables->unset_column('id');
        
        echo $this->datatables->generate();
    }
    private function gen_new_km(){
        $last_km=$this->kasindb->get_last_km();
        // print_r($last_km);
        if(!empty($last_km)):
            $first=substr($last_km['faktur_kas'],0,2);
            if($first==''||$first==null){
                $first='KM';
            }
            $left=substr($last_km['faktur_kas'],2,4);
            $right=substr($last_km['faktur_kas'],-5);
            $nopt=number_format($right); 
            
            
            $newpo=strval($nopt+1);
            $newpo2=substr(strval("00000$newpo"),-5);

        $tahun=substr($left,0,2);
        $bulan=substr($left,2,4);
        
            if($tahun<>date('y')):
                $tahun=date('y');
                if($bulan==date('m')):
                    $gen_km=strval($first.$tahun.$bulan."00001");
                elseif($bulan<>date('m')):
                    $bulan=date('m');
                    $gen_km=strval($first.$tahun.$bulan."00001");
                endif;
            elseif($tahun==date('y')):
                if(intval($bulan)<>date('m')):
                    $bulan=date('m');
                    $gen_km=strval($first.$tahun.$bulan."00001"); 
                elseif($bulan==date('m')):
                    $gen_km=strval($first.$tahun.$bulan.$newpo2);
                endif;
            endif;
        else:
            // $gen_km="PT151100001";
            $gen_km="KM".date('ym')."00001";
        endif;
        return $gen_km;
    }
     function get_new_km(){
        echo $this->gen_new_km();
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
        
       

        $this->load->view('kas_masuk_form_inside');
           
    }

    public function get($id=null){
        if($id!==null){
            echo json_encode($this->kasindb->get_one($id));
        }
    }
    function tables(){
        $this->load->view('kas_masuk_data');
    }

    function getone($id=null){
        if($id!==null){
            $data=$this->kasindb->get_one($id);
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
            $this->kasindb->update($this->input->post('id'));
          }else{
            $this->kasindb->save();
            redirect('kas_masuk/');
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id')){
                $this->kasindb->update($this->input->post('id'));
              }else{
                $this->kasindb->save();
                 redirect('kas_masuk/');
              }
          }
        }
    }
    public function submit_detail(){
         $data = array(
        
            'id_kas_masuk' => $this->input->post('id_kas_masuk', TRUE),
           
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
            $this->kasindb->update($this->input->post('id'));
          }else{
            $this->kasindb->save_detail($data);
          }

        }
    }

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->kasindb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
    public function delete_detail(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->kasindb->delete_detail($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }

}

/** Module kas_masuk Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
