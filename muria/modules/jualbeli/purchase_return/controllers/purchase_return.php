<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class purchase_return extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->model('purchase_return_model','returdb',TRUE);
        $this->session->set_userdata('lihat','purchase_return');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;

        
       
        
        $this->template->add_js('datatables.js');
        $this->template->add_js('muria.js');
        $this->template->add_js('crud.js');
        $this->template->set_layout('dashboard');
        $this->template->add_js('
            var baseurl="'.base_url('purchase_return').'/"; 
            var pturl="'.base_url('purchase_transaction').'/"; 
            var pourl="'.base_url('purchase_order').'/"; 
            var spurl="'.base_url('supplier').'/"; 
            var jnsbrgurl="'.base_url('jenis_barang').'/"; 
            var brgurl="'.base_url('barang').'/"; 
            var brgsatuurl="'.base_url('barang_satuan').'/"; 
            var brgharga="'.base_url('barang_harga').'/"; 
            var satuanurl="'.base_url('barang_satuan').'/"; 
            var enkrip="'.$this->enkrip().'";
               var pr = $("#faktur_pr").val();
               var Tblretur=$(".tableretur").DataTable({

                        "ajax":{
                            "url":"'.base_url('purchase_return/get_return_detail/').'/"+pr,
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
           
            ','embed');
        $this->template->add_js('
            $("document").ready(function(){
                 $("body").on("change","#tipe_retur",function(){
                    if($(this).val()=="2"){
                        $(".panel_tambah").fadeOut(200);
                        $(".form_pt").fadeIn(200);
                        $(".form_pt").css("display","none");
                        $(".form_pt").removeAttr("style");
                        $("#id_supplier").attr("readonly",true);    
                        $("#id_ptx").focus();    
                    }else{
                        $("#id_supplier").attr("readonly",false);    
                        $("#id_supplier").focus();    
                        $(".panel_tambah").fadeIn(200);
                        $(".form_pt").fadeOut(200);
                        $(".form_pt").css("display","block");

                    }    
                });
            });
            ','embed');
    }

    public function indexx() {
        $this->template->set_title('Kelola Retur Pembelian');
        
        $this->template->add_js('var baseurl="'.base_url().'purchase_return/";','embed');  
        

        //<!-- $this->template->add_js('datepicker.js'); -->
        
        $this->template->load_view('purchase_return_view',array(
                        'title'=>'Kelola Data Retur Pembelian',
                        'subtitle'=>'Pengelolaan Retur Pembelian',
                        'breadcrumb'=>array(
                            'Retur Pembelian'),
                        ));
        
    }
    public function index() {
        $this->template->set_title('Kelola Retur Pembelian');
        
        $this->template->add_js('var baseurl="'.base_url().'purchase_return/";','embed');  
        

        //<!-- $this->template->add_js('datepicker.js'); -->
        
        $this->template->load_view('retur_pembelian_view',array(
                        'view'=>'purchase_return_data',
                        'title'=>'Kelola Data Retur Pembelian',
                        'subtitle'=>'Pengelolaan Retur Pembelian',
                        'breadcrumb'=>array(
                            'Retur Pembelian'),
                        ));
        
    }
    public function baru() {
        $this->template->set_title('Buka Retur Pembelian Baru');
        $this->template->add_js('accounting.min.js');
             
        $this->template->add_js('
            $("document").ready(function(){
               
                    $("#id_supplier").change(function(){
                            var that = this,
                            v = $(this).val();        
                            get_barang(v);
                    });  
                    $("#Kode").change(function(){
                            var that = this,
                            v = $(this).val();
                            var urls=brgsatuurl+"satuan_barang/"+v+"/";
                            var hrgurl=brgharga+"harga_barang/"+enkrip+"/"+v+"/";
                            // alert(urls);
                            $("#addsatuan").attr("data-load-satuan",urls);
                            $(".setup_harga").attr("data-load-harga",hrgurl);
                            $(".setup_harga").attr("data-id",v);
                            $("#addsatuan").attr("data-id",v);
                            get_satuan(v); 
                    });
                $("body").on("click",".load_pt",function(e){
                    e.preventDefault(); 
                    load_trx_beli();
                }); 
                $("body").on("click","#save_retur",function(e){
                    e.preventDefault(); 
                    save_retur(enkrip);
                });
                $("body").on("click",".use_pt",function(e){
                    e.preventDefault(); 
                    var $this = $(this);
                    var pt = $this.data("trx-beli");
                    var id=$this.attr("id");
                    //alert(pt);
                    var pturl=baseurl+"pt_detail/"+enkrip+"/"+pt;
                    if(pt){
                        Tblretur.ajax.url(pturl).load();
                        $.getJSON(baseurl+"get_pt/"+enkrip+"/"+id+"/", function(ptx, status){
                            // alert(JSON.parse(ptx));
                            $("#id_pt").prop("value",ptx.id);
                            $("#id_ptx").prop("value",ptx.faktur_pt);
                            $("#totalretur").val(ptx.totalbayar);
                            $("#totalreturx").val(accounting.formatMoney(ptx.totalbayar,"Rp ",2)).trigger("change");
                            $("#bayar").val(ptx.uangmuka);
                            $("#bayarx").val(accounting.formatMoney(ptx.uangmuka,"Rp ",2)).trigger("change");
                            $("#biayakirim").val(ptx.biayakirim);
                            $("#biayakirimx").val(accounting.formatMoney(ptx.biayakirim,"Rp ",2)).trigger("change");
                            $("#grandtotal").val(ptx.grandtotal);
                            $("#grandtotalx").val(accounting.formatMoney(ptx.grandtotal,"Rp ",2)).trigger("change");
                            $("#id_supplier").find("option[value="+ptx.id_supplier+"]").prop( {selected: true,disabled:false} ); 
                        });
                    }
                    
                });
                
                $("#modal-id").on("hidden.bs.modal",function(){
                    
                    $(".table_trx_beli").DataTable().destroy();

                });
               
            });
            function save_retur(enkrip){
                var returan = $("form#retur_form").serializeArray();
                returan.push({name:"ajax",value:1});
                $(this).ready(function(){
                    $.ajax({
                        url:baseurl+"submit/    "+enkrip,
                        data:returan,
                        type:"POST",

                        success:function(data){
                            var json = JSON.parse(data);
                            // alert(json.id);
                            // $("#id_supplier").append($("<option></option>").val(json.id_supplier).html(json.Nama+" ("+json.Kode+")"));
                            // $("#Kode" ).find( "option[value="+json.id+"]" ).prop( {selected: true,disabled:false} ); 
                            // $("#id_supplier").append($("<option></option>").val(data[id_supplier).html(data.Nama));
                            //get_supplier();

                        }
                    });
                });
            }
           
            function load_trx_beli(){
                // alert("ok");
                 var Tbltrx=$(".table_trx_beli").DataTable({
                    
                        "ajax":{
                            "url":"'.base_url('purchase_return/get_transaction/').'",
                            "dataType": "json"
                        },
                        "sServerMethod": "POST",
                        "bServerSide": true,
                        "bAutoWidth": true,
                        "SortClasses": true,
                       
                         
                    });
            }
            function reset_barang(enkrip){
                var sp=$("#id_supplier").val();
                // alert(sp);
                get_barang(sp);
            }
        function get_barang(id){
                $("select#Kode option").remove();
                $.getJSON(pourl+"get_drop_barang/"+enkrip+"/"+id, function (data) {
                         $.each(data, function (index, item) {
                             $("#Kode").append(
                                  $("<option></option>").val(index).html(item)
                              );
                         });
                     });
            }
        function get_satuan(id){
                $("select#Satuan option").remove();
                 $.getJSON(pourl+"dropdown_satuan/"+id, function (data) {
                         $.each(data, function (index, item) {
                             $("#Satuan").append(
                                  $("<option></option>").val(index).html(item)
                              );
                         });
                     });
            }
            ','embed');  
        

        //<!-- $this->template->add_js('datepicker.js'); -->
        $this->session->set_userdata('action',array('baru'=>true,'edit'=>false));
        $this->template->load_view('retur_pembelian_view',array(
            'faktur_pr'=>$this->generate_new_pr(),
            'opt_supplier'=>$this->returdb->dropdown_supplier(),
              'opt_barang'=>array(),
                'opt_satuan'=>array(),
                        'view'=>'form_retur',
                        'title'=>'Kelola Data Retur Pembelian',
                        'subtitle'=>'Pengelolaan Retur Pembelian',
                        'breadcrumb'=>array(
                            'Retur Pembelian'),
                        ));
        
    } 
    public function edit($enkrip=null,$id=null) {
        $this->template->set_title('Buka Retur Pembelian Baru');
        $this->template->add_js('var baseurl="'.base_url().'purchase_return/";','embed');  
        
        
        $this->session->set_userdata('action',array('baru'=>false,'edit'=>true));
        // print_r($this->session->userdata('action'));
        $retur=$this->returdb->get_one($id);
        //<!-- $this->template->add_js('datepicker.js'); -->
        // print_r($retur['id_pt']);
        $pt=$this->getpt($enkrip,$id);
        // print_r($pt);   
        // $this->template->add_js('$(".form_pt").removeAttr("style")','embed');  
        $this->template->load_view('retur_pembelian_view',array(
            'faktur_pr'=>$retur['faktur_pr'],
            'faktur_pt'=>$pt['faktur_pt'],
            'default'=>$retur,
            'opt_barang'=>array(),
                'opt_satuan'=>array(),
            'opt_supplier'=>$this->returdb->dropdown_supplier(),
                        'view'=>'form_retur',
                        'title'=>'Edit Retur Pembelian',
                        'subtitle'=>'Edit Retur Pembelian',
                        'breadcrumb'=>array(
                            'Edit Retur Pembelian'),
                        ));
        
    }
     
     //<!-- Start Primary Key -->
    

    public function getdatatables(){
        $enkrip=$this->enkrip();
        if($this->isadmin()==1):
            $this->datatables->select('id,faktur_pr,pt,tgl_pr,tipe_retur,Kode,Nama,totalretur,bayar,grandtotal,id_supplier')
                            ->from('00-00-07-00-view-purchase-return');
            $this->datatables->edit_column('faktur_pr','<a href="#">$1</a><br><a href="#">$2</a>','faktur_pr,pt');
            $this->datatables->edit_column('Nama','<a href="#">$1</a><br><a href="#">$2</a>','Nama,Kode');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('purchase_return/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>

                <a href='#outside' data-toggle='tooltip' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='$1'><i class='glyphicon glyphicon-edit'></i></a>
                <button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger'id='$1'><i class='glyphicon glyphicon-remove'></i></button>
                </div>" , 'id');
            $this->datatables->unset_column('id,pt,Kode,id_supplier');

        else:
            $this->datatables->select('id,faktur_pr,pt,tgl_pr,tipe_retur,Kode,Nama,totalretur,bayar,grandtotal,id_supplier')
                            ->from('00-00-07-00-view-purchase-return');
            $this->datatables->edit_column('faktur_pr','<a href="#">$1</a><br><a href="#">$2</a>','faktur_pr,pt');
            $this->datatables->edit_column('Nama',"
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('supplier/getone/$3/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'>$1 ($2)</a>",'Nama,Kode,id_supplier');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a href='".base_url('purchase_return/edit/'.$enkrip.'/$1')."' data-toggle='tooltip' data-placement='top' title='Edit' class='edite btn btn-xs btn-success' id='$1'><i class='glyphicon glyphicon-edit'></i></a>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('purchase_return/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a></div>" , 'id');
            $this->datatables->unset_column('id,pt,Kode,id_supplier');
        endif;
        echo $this->datatables->generate();
    }
    public function get_transaction(){
      // $enkrip=$this->enkrip();
            $this->datatables->select('id,faktur_pt,tgl_pt,jenis_beli,Nama,totalbayar,grandtotal,po')
                            ->from('00-00-06-00-view-transaksi-beli');
            $this->datatables->edit_column('totalbayar','<div class="text-right">$1</div>','rp(totalbayar)');
            $this->datatables->edit_column('grandtotal','<div class="text-right">$1</div>','rp(grandtotal)');
            $this->datatables->edit_column('faktur_pt','<a class="btn-xs btn-info btn" href="#">#$1</a><br><a class="btn-xs btn-default btn" href="#">#$2</a>','faktur_pt,po');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                    <a href='".base_url('purchase_return/usethis/$1/')."' data-dismiss='modal' data-trx-beli='$2' data-placement='top' title='Gunakan Faktur Ini' class='use_pt btn btn-xs btn-success' id='$1'> Gunakan Faktur Ini <i class='fa fa-check'></i></a>
                
                </div>" , 'id,faktur_pt');
            $this->datatables->unset_column('id,po');

      
        echo $this->datatables->generate();
    }
    public function get_return_detail($pr){
            $this->datatables->select('id_detail,faktur_pr,Nama,satuan,harga_beli,jumlah,subtotal,keterangan,')
                            ->from('00-00-07-01-view-detail-return');
            $this->datatables->where('faktur_pr',$pr);
            $this->datatables->edit_column('Nama','<div class="text-left">$1 ($2)</div>','satuan,Kode');
            $this->datatables->edit_column('satuan','<div class="text-center">$1</div>','satuan');
            $this->datatables->edit_column('harga_beli','<div class="text-right">$1</div>','rp(harga_beli)');
            $this->datatables->edit_column('jumlah','<div class="text-right">$1</div>','rp(jumlah)');
            $this->datatables->edit_column('subtotal','<div class="text-right">$1</div>','rp(subtotal)');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a href='#' data-toggle='tooltip' data-placement='top' title='Hapus' class='delete_detail btn btn-xs btn-danger'id='$1'><i class='glyphicon glyphicon-remove'></i></a>
                </div>" , 'id_detail');
            $this->datatables->unset_column('id_detail,Kode');

        echo $this->datatables->generate();

    }

    public function pt_detail($enkrip=null,$pt=null){

        $enkrip=$this->enkrip();
        $this->datatables->select('faktur_pt,Kode,Nama,satuan,harga_satuan,jumlah,subtotal,keterangan,id_pt,id_detail')
            ->from('00-00-06-00-view-transaksi-beli-detail');
        $this->datatables->where("faktur_pt",$pt);

        $this->datatables->edit_column('Nama','<div class="text-center">$1 ($2)</div>','Nama,Kode');           
        $this->datatables->edit_column('satuan','<div class="text-center">$1</div>','satuan');           
        $this->datatables->edit_column('harga_satuan','<div class="text-right">$1</div>','rp(harga_satuan)');           
        $this->datatables->edit_column('jumlah','<div class="text-right">$1</div>','jumlah');           
        $this->datatables->edit_column('subtotal','<div class="text-right">$1</div>','rp(subtotal)');    
        if($this->session->userdata('jenis_trx')==2):
            $style="disabled";
        else:
            $style="";
        endif;
        $this->datatables->add_column('edit',"<div class='btn-group'>
               <a href='#' data-toggle='tooltip' data-placement='top' title='Hapus' class='".$style." delete_temp btn btn-xs btn-danger' id='$1'><i class='fa fa-minus'></i></a>
               <a href='#' title='Edit Jumlah' class='editx btn btn-xs btn-info' id='$1'><i class='fa fa-pencil'></i></a>
                </div>" , 'id_detail');
        /*$this->datatables->add_column('edit',"<div class='btn-group'>
                <a href='#' data-faktur-target='#data' data-load-faktur='".base_url('purchase_order/use_po/$1/'.$enkrip)."' title='Use' class='use_po btn btn-xs btn-success' id='$1' data-faktur='$2'><i class='fa fa-check'></i> Gunakan</a> 
                </div>" , 'id_detail,faktur_pt,md5id');*/
    

        $this->datatables->unset_column('id_pt,id_detail,Kode');
       
            echo $this->datatables->generate();
        
    }
    function get_pt($enkrip=null,$id=null){
        echo json_encode($this->returdb->get_transaction($id));
    }
    function getpt($enkrip=null,$id=null){
        return $this->returdb->get_transaction($id);
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
        
       

        $this->load->view('purchase_return_form_inside');
           
    }

    public function get($id=null){
        if($id!==null){
            echo json_encode($this->returdb->get_one($id));
        }
    }
    function tables(){
        $this->load->view('purchase_return_data');
    }

    function getone($id=null){
        if($id!==null){
            $data=$this->returdb->get_one($id);
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
     private function generate_new_pr(){
        $last_pr=$this->returdb->get_last_pr();
        // print_r($last_pr);
        if(!empty($last_pr)):
            $first=substr($last_pr['faktur_pr'],0,2);
            if($first==''||$first==null){
                $first='PR';
            }
            $left=substr($last_pr['faktur_pr'],2,4);
            $right=substr($last_pr['faktur_pr'],-5);
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
            $gen_pr="PR".date('ym')."00001";
        endif;
        return $gen_pr;
    }
     function get_new_pr(){
        echo $this->generate_new_pr();
    }
    public function submit(){
        if ($this->input->post('ajax')){
          if ($this->input->post('id')){
            $this->returdb->update($this->input->post('id'));
          }else{
            $tiperetur=$this->input->post('tipe_retur');

            echo $tiperetur;
            $this->returdb->save();
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id')){
                $this->returdb->update($this->input->post('id'));
              }else{
                $this->returdb->save();
              }
          }
        }
    }

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->returdb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
    

}

/** Module purchase_return Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
