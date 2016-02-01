<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class purchase_transaction extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->model('purchase_transaction_model','ptdb',TRUE);
        $this->session->set_userdata('lihat','purchase_transaction');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;

        $this->template->add_js('plugins/dataTables/jquery.dataTables.min.js');
        $this->template->add_js('plugins/dataTables/dataTables.bootstrap.min.js');
        $this->template->add_js('plugins/dataTables/dataTables.buttons.min.js');
        $this->template->add_js('plugins/dataTables/buttons.bootstrap.min.js');
        $this->template->add_js('plugins/dataTables/buttons.flash.min.js');
        $this->template->add_js('plugins/dataTables/buttons.html5.min.js');
        $this->template->add_js('plugins/dataTables/buttons.print.min.js');
        $this->template->add_js('plugins/dataTables/pdfmake.min.js');
        $this->template->add_js('plugins/dataTables/jszip.min.js');
        $this->template->add_js('plugins/dataTables/build/vfs_fonts.js');
        $this->template->add_css('plugins/dataTables/dataTables.bootstrap.min.css');
        $this->template->add_js('plugins/dataTables/dataTables.scroller.min.js');
        // $this->template->add_css('plugins/dataTables/scroller.dataTables.min.css');
        $this->template->add_css('plugins/dataTables/scroller.bootstrap.min.css');
        $this->template->add_css('plugins/dataTables/buttons.dataTables.min.css');
        $this->template->add_css('plugins/dataTables/buttons.bootstrap.min.css');
        $this->template->add_css('plugins/datapicker/datepicker3.css');
        $this->template->add_js('plugins/datapicker/bootstrap-datepicker.js');
        $this->template->add_js('datepicker.js');
        
        $this->template->add_js('datatables.js');
        $this->template->add_js('muria.js');
        $this->template->add_js('crud.js');
        $this->template->set_layout('dashboard');
    }

    public function index() {
        $this->template->set_title('Kelola Transaksi Pembelian');
        
        $this->template->add_js('accounting.min.js');
        $this->template->add_js('var baseurl="'.base_url('purchase_transaction').'/";','embed');  
        $this->template->add_js('var pourl="'.base_url('purchase_oder').'/";','embed');  
        $this->template->add_js('var spurl="'.base_url('supplier').'/";','embed');  
        $this->template->add_js('var jnsbrgurl="'.base_url('jenis_barang').'/";','embed');  
        $this->template->add_js('var brgurl="'.base_url('barang').'/";','embed');  
        $this->template->add_js('var brgsatuurl="'.base_url('barang').'/";','embed');  
        $this->template->add_js('var enkrip="'.$this->enkrip().'";','embed');  
        
        $this->template->add_js('$("document").ready(function(){  
            var enkrip="'.$this->enkrip().'";
            var fakturpt=$("#faktur_pt").val();
           
            
            $("body").on("change","#id_tipe_beli",function(){
                if($(this).val()=="2"){
                    $(".panel_tambah").fadeOut(200);
                    $("#bypo").fadeIn(200);    
                }else{
                    $(".panel_tambah").fadeIn(200);
                    $("#bypo").fadeOut(200);
                }    
            });
          
            $("body").on("change","#id_supplier",function(){
                var trx=$("#id_tipe_beli");
                if(trx=="1"){
                    reset_barang(enkrip);
                }
            });

             $("#id_supplier").change(function(){
                            var that = this,
                            v = $(this).val();        
                            get_barang(v);
                    });  
                    $("#Kode").change(function(){
                            var that = this,
                            v = $(this).val();
                            get_satuan(v); 
                    });
            var Tabeltrx = $("#data").DataTable({
                        "ajax":{
                            "url":"'.base_url('purchase_transaction/pt_detail/').'/"+enkrip+"/"+fakturpt+"",
                            "dataType": "json"
                        },
                        "sServerMethod": "POST",
                        "bServerSide": true,
                         "paging":   false,
                        "deferRender": true,
                        "bFilter":false,
                         "ordering": false,  
                    });

                $("#modal-id").on("shown.bs.modal", function (e) {
                var Temptbl = $("#datax.tabelpo").DataTable({
                    "ajax":{
                        "url":"'.base_url('purchase_transaction/getdatapo/').'",
                        "dataType": "json"
                    },
                    "sServerMethod": "POST",
                    "bServerSide": true,
                    
                });

                // $("#modal-id").on("hidden.bs.modal", function (e) {
                    // alert("hide");
                // });
            });
            
            $("body").on("click","[data-load-faktur]",function(e) {
                e.preventDefault();
              
                var $this = $(this);
                var faktur = $this.data("load-faktur");
                var nofaktur = $this.data("faktur");
               
                var id=$(this).attr("id");
                var po_url="'.base_url('purchase_transaction/get_po_detail/').'/"+nofaktur+"/"+enkrip+"/";
               
                if(faktur) {
                    // $($this.data("faktur-target")).load(faktur);
                    $("#faktur_po").prop("value",nofaktur);
                    $("#faktur_po").prop("readonly",true);
                    $("#id_po").prop("value",id);

                    Tabeltrx.ajax.url(po_url).load();
                    
                    
                }
                 
                get_po(id);


            });
            $("body").on("click",".generate_pt",function(e){
                    e.preventDefault();
                    new_faktur();
                }); 
            $("body").on("click",".baru",function(e){
                    e.preventDefault();
                    new_faktur();
                }); 
            $("body").on("click","#save_supplier",function(e){
                    e.preventDefault();
                    save_supplier(enkrip);
                });
            $("body").on("click","#save_barang",function(e){
                    e.preventDefault();
                    save_barang(enkrip);
                    reset_barang(enkrip);
                });
            $("body").on("click",".gen_kdsp",function(e){
                    e.preventDefault();
                    
                    gen_kdsp(enkrip);
                    
                    
                });
            
            $("body").on("click",".refresh_barang",function(e){
                    e.preventDefault();
                    reset_barang();
            });
            
            $("#modal-form").on("shown.bs.modal", function (e) {
                        // alert("shown");
                        gen_kdsp(enkrip);
            }); 
            $("#modal-barang").on("shown.bs.modal", function (e) {
                        // alert("shown");
                        var idsp=$("#id_supplier").val();
                        // alert(idsp);
                        $.get("'.base_url('supplier/get/').'/"+idsp+"/"+enkrip, function(kdsp, status){
                            var sp = JSON.parse(kdsp);
                            // alert(sp.Kode);
                            $("form#form_barang #id_supplier" ).find( "option[value="+sp.Kode+"]" ).prop( {selected: true,disabled:false} ); 
                        });

                        // gen_kdbarang(enkrip);
            }); 
        
            $("body").on("change","#form_barang #id_golongan",function(e){
                e.preventDefault();
                var idgol=$("#form_barang #id_golongan").val();
                $.get("'.base_url('jenis_barang/get_new_jenis/').'/"+enkrip+"/"+idgol+"/", function(kd, status){
                    $("#form_barang #Kode").prop("value",kd);
                });    
            });
           
        }); //endof document ready
        function gen_kdsp(enkrip){
             $.get("'.base_url('purchase_transaction/get_sp_id/').'/"+enkrip, function(kdsp, status){
                        
                        // var kd=kdsp;
                        // alert(newfaktur);
                        // alert(kdsp);
                        $("#add_supplier_form #Kode").prop("value",kdsp);
                    });
        }
        function gen_kdbarang(enkrip){
             $.get("'.base_url('purchase_transaction/get_kdbarang/').'/"+enkrip, function(kdbarang, status){
                        
                        // var kd=kdbarang;
                        // alert(newfaktur);
                        // alert(kdbarang);
                        $("#form_barang #Kode").prop("value",kdbarang);
                    });
        }
        function generate_kdbarang(){
            var idsp=$("#form_barang #id_supplier").val();
        }
        function save_supplier(enkrip){
                var data_sp = $("form#add_supplier_form").serializeArray();
                data_sp.push({name:"ajax",value:1});
                $(this).ready(function(){
                    $.ajax({
                        url:"'.base_url('supplier/submit').'/"+enkrip,
                        data:data_sp,
                        type:"POST",

                        success:function(data){
                            var json = JSON.parse(data);
                            // alert(json.id_supplier);
                            $("#id_supplier").append($("<option></option>").val(json.id_supplier).html(json.Kode+" ("+json.Nama+")"));
                            $("#id_supplier" ).find( "option[value="+json.id_supplier+"]" ).prop( {selected: true,disabled:false} ); 
                            // $("#id_supplier").append($("<option></option>").val(data.id_supplier).html(data.Nama));
                            //get_supplier();
                        }
                    });
                });
            }
        function save_barang(enkrip){
                var data_sp = $("form#form_barang").serializeArray();
                data_sp.push({name:"ajax",value:1});
                $(this).ready(function(){
                    $.ajax({
                        url:"'.base_url('barang/submit').'/"+enkrip,
                        data:data_sp,
                        type:"POST",

                        success:function(data){
                            var json = JSON.parse(data);
                            // alert(json.id);
                            // $("#id_supplier").append($("<option></option>").val(json.id_supplier).html(json.Nama+" ("+json.Kode+")"));
                            $("#Kode" ).find( "option[value="+json.id+"]" ).prop( {selected: true,disabled:false} ); 
                            // $("#id_supplier").append($("<option></option>").val(data[id_supplier).html(data.Nama));
                            //get_supplier();

                        }
                    });
                });
            }
        function reset_barang(enkrip){
                var sp=$("#id_supplier").val();
                // alert(sp);
                get_barang(sp);
            }
        function get_barang(id){
                $("select#Kode option").remove();
                $.getJSON("'.base_url('purchase_order/get_drop_barang/').'/"+id, function (data) {
                         $.each(data, function (index, item) {
                             $("#Kode").append(
                                  $("<option></option>").val(index).html(item)
                              );
                         });
                     });
            }
        function get_satuan(id){
                $("select#Satuan option").remove();
                 $.getJSON("'.base_url('purchase_order/dropdown_satuan/').'/"+id, function (data) {
                         $.each(data, function (index, item) {
                             $("#Satuan").append(
                                  $("<option></option>").val(index).html(item)
                              );
                         });
                     });
            }
        function hitung() {

            // ((a < b) ? 2 : 3);
                    var ttotal=(accounting.unformat($("#totalbayarx").val())>0?accounting.unformat($("#totalbayarx").val()):0);
                    var ppn=($("#ppn").val()>0?$("#ppn").val():0);
                    var kirim=($("#biayakirim").val()>0?$("#biayakirim").val():0);
                    gtotalppn=parseFloat(ttotal) + parseFloat((ppn/100) * parseFloat(ttotal));
                    gtotal=gtotalppn + parseFloat(kirim);
                    $("#grandtotal").prop("value",gtotal);
                    $("#grandtotalx").prop("value",accounting.formatMoney(gtotal,"Rp",2));

                    //hitung UM dan Sisa
                     var um=($("#uangmuka").val()>0?$("#uangmuka").val():0);
                     var sisa=gtotal - parseFloat(um);
                     // alert(sisa);
                     $("#sisa").prop("value",accounting.formatMoney(sisa,"Rp",2));

        }
       
        function get_po(id){
            $.get("'.base_url('purchase_order/get/').'/"+id, function(data){
                    var json = JSON.parse(data);
                    var idsp=json.id_supplier;
                    
                    $("#id_supplier" ).find( "option[value="+idsp+"]" ).prop( {selected: true,disabled:false} ); 
                    // $("#id_supplier" ).find( "option[value="+idsp+"]" ).prop( "disabled", false ); 
                    $("#id_supplier option:not(:selected)").attr("disabled",true); 
                    
                    $("#totalbayar").prop("value",json.totalbayar);
                    $("#totalbayarx").prop("value",accounting.formatMoney(json.totalbayar,"Rp",2));

                });
        }
        function get_supplier(){
            $.get("'.base_url('purchase_transaction/get_dropdown_supplier/').'", function(data){
                $.each(data, function(i, datax){
                     $("#id_supplier").append($("<option></option>").val(i).html(datax));
               
                });
            });
        }
        function new_faktur(){
                 $.get("'.base_url('purchase_transaction/get_new_pt/').'", function(newpo, status){
                    $("#faktur_pt").prop("value",newpo);
                    var newfaktur=newpo;
                    // alert(newfaktur);
                });
            };
             


            ','embed');
        //<!-- $this->template->add_js('datepicker.js'); -->
        
        $this->template->load_view('purchase_transaction_view',array(
            'default'=>'',
            'faktur_pt'=>$this->generate_new_pt(),
                'opt_supplier'=>$this->ptdb->dropdown_supplier(),
                 'opt_barang'=>array(),
                'opt_satuan'=>array(),
                'opt_bayar'=>$this->ptdb->dropdown_pembayaran(),
                        'title'=>'Kelola Data Transaksi Pembelian',
                        'subtitle'=>'Pengelolaan Transaksi Pembelian',
                        'breadcrumb'=>array(
                            'Transaksi Pembelian'),
                        ));
        
    }
     
     //<!-- Start Primary Key -->
    

    public function getdatatables(){
      $enkrip=$this->enkrip();
            $this->datatables->select('id,faktur_pt,tgl_pt,jenis_beli,Nama,tgl_jatuh_tempo,totalbayar,ppn,grandtotal,po')
                            ->from('00-00-06-00-view-transaksi-beli');
            $this->datatables->edit_column('totalbayar','<div class="text-right">$1</div>','rp(totalbayar)');
            $this->datatables->edit_column('grandtotal','<div class="text-right">$1</div>','rp(grandtotal)');
            $this->datatables->edit_column('faktur_pt','<a class="btn-xs btn-info btn" href="#">#$1</a><br><a class="btn-xs btn-default btn" href="#">#$2</a>','faktur_pt,po');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('purchase_transaction/getonept/'.$enkrip.'/$1')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>

                <a href='#outside' data-toggle='tooltip' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='$1'><i class='glyphicon glyphicon-edit'></i></a>
                <button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger'id='$1'><i class='glyphicon glyphicon-remove'></i></button>
                </div>" , 'id');
            $this->datatables->unset_column('id,po');

      
        echo $this->datatables->generate();
    }
    public function getdatapo(){
        $enkrip=$this->enkrip();
        $this->datatables->select('faktur_po,tgl_po,namasupplier,totalbayar,status,jenis_pembayaran,idpo,md5id')
            ->from('00-00-03-00-view-purchase-order');
        $this->datatables->edit_column('status','<div class="text-center">$1</div>','status');           
        $this->datatables->edit_column('totalbayar','<div class="text-right">$1</div>','rp(totalbayar)');    
        $this->datatables->add_column('edit',"<div class='btn-group'>
                <a href='#' data-dismiss='modal' data-faktur-target='#data' data-load-faktur='".base_url('purchase_order/use_po/$1/'.$enkrip)."' title='Use' class='use_po btn btn-xs btn-success' id='$1' data-faktur='$2'><i class='fa fa-check'></i> Gunakan</a> 
                </div>" , 'idpo,faktur_po,md5id');
    

        $this->datatables->unset_column('idpo,md5id');
        echo $this->datatables->generate();
    } 
    public function pt_detail($enkrip=null,$pt=null){

        $enkrip=$this->enkrip();
        $this->datatables->select('faktur_pt,Kode,Nama,jumlah,satuan,harga_satuan,subtotal,id_pt,id_detail')
            ->from('00-00-06-00-view-transaksi-beli-detail');
        $this->datatables->where("faktur_pt",$pt);
        $this->datatables->edit_column('harga_satuan','<div class="text-center">$1</div>','rp(harga_satuan)');           
        $this->datatables->edit_column('subtotal','<div class="text-right">$1</div>','rp(subtotal)');    
        $this->datatables->add_column('edit',"<div class='btn-group'>
                <a href='#' data-faktur-target='#data' data-load-faktur='".base_url('purchase_order/use_po/$1/'.$enkrip)."' title='Use' class='use_po btn btn-xs btn-success' id='$1' data-faktur='$2'><i class='fa fa-check'></i> Gunakan</a> 
                </div>" , 'id_detail,faktur_pt,md5id');
    

        $this->datatables->unset_column('id_pt,id_detail');
        echo $this->datatables->generate();
    }
    private function po_detail($po=null){
               $this->datatables->select('id_detail,po,Kode,Nama,jumlah,satuan,harga,subtotal')
                            ->from('00-00-03-04-view-detail-po');
                $this->datatables->where("po",$po);
                $this->datatables->edit_column('harga','<div class="text-right harga">$1</div>','rp(harga)');
                $this->datatables->edit_column('subtotal','<div class="text-right subtotal">$1</div>','rp(subtotal)');
                $this->datatables->add_column('edit',"<div class='btn-group'>
               <button data-toggle='tooltip' data-placement='top' title='Hapus' class='disabled btn btn-xs btn-danger' id='$1'><i class='fa fa-minus'></i></button>
                </div>" , 'id_detail');
            $this->datatables->unset_column('id_detail');
        return $this->datatables->generate();
    }
    //get po detail dengan menggunakan enkripsi --> "id_user+Jam:Menit" saat ini
    function get_po_detail($po=null,$md5){
        if($md5==$this->enkrip()):
            echo $this->po_detail($po);
        endif;
    }

    function use_po($enkrip=null,$id){
        echo $id;
        /*$this->template->add_js('
            var Temptbl = $("#data").DataTable({
                    "ajax":{
                        "url":"'.base_url('purchase_transaction/getdatapo/').'",
                        "dataType": "json"
                    },
                    "sServerMethod": "POST",
                    "bServerSide": true,
                });
            ','embed');*/
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
        
       

        $this->load->view('purchase_transaction_form_inside');
           
    }
    function po_form(){
        $this->load->view('po_table');
           
    }
    function get_dropdown_supplier(){
        echo json_encode($this->ptdb->dropdown_supplier());
    }

    public function get($id=null){
        if($id!==null){
            echo json_encode($this->ptdb->get_one($id));
        }
    }
    function tables(){
        $this->load->view('purchase_transaction_data');
    }
    function getonept($enkrip=null,$id=null){
        $enkrip=$this->enkrip();
        if($id!=null){
            $data=$this->ptdb->getonept($id);
            // print_r($data);
            $div='';
            $div.='<div class="btn-group pull-right" style="margin-bottom:20px">';
            $div.='<a class="btn btn-success btn-md" href="'.base_url('purchase_transaction/cetak_pt/'.$enkrip.'/'.$id.'/').'"><i class="fa fa-print"></i> Cetak Order Pengiriman </a>';
            // $div.='<a class="btn btn-info btn-md" href="'.base_url('purchase_transaction/use_pt/'.$enkrip.'/'.$id.'/').'"> Proses Transaksi Pembelian <i class="fa fa-arrow-right"></i></a>';
            $div.='</div>';
            $div.='<table class="table table-condensed table-striped table-bordered">';
            $div.='<tbody>';
            // $div.='<tr>';
            $div.='<tr><th>Faktur PO:</th><td>'.$data['faktur_pt'].'</td><th>Tanggal PO</th><td>'.$data['tgl_pt'].'</td></tr>';
            $div.='<tr><th>Supplier:</th><td>'.$data['namasupplier'].' ('.$data['kdsupplier'].')</td><th>Tanggal Kirim</th><td>'.$data['tgl_kirim_pt'].'</td></tr>';
            $div.='<tr><th>Status PO:</th><td>'.$data['status'].'</td><td>Tanggal Kedaluarsa</td><td>'.$data['tgl_kedaluarsa_pt'].'</td></tr>';
            $div.='<tr><th>Total:</th><td>'.rp($data['totalbayar']).'</td><th>Pembayaran:</th><td>'.$data['jenis_pembayaran'].'</td></tr>';
     
            $div.="</tbody></table><table class='table table-condesed table-striped'><tbody>";
            $div.='<tr><th class="text-center">No</th><th class="text-center">Kode</th>
            <th class="text-center">Nama Barang</th>
            <th class="text-center">Jumlah</th>
            <th class="text-center">Satuan</th>
            <th class="text-center">Harga</th>
            <th class="text-center">Subtotal</th>
            </tr>';
            $detail=$this->ptdb->get_detail_pt($data['faktur_po']);
            // print_r($detail);
            $jdetail=count($detail);
            $j=1;
            for ($i=0; $i <$jdetail ; $i++) { 
                # code...
                
                $div.='<tr ><td class="text-center">'.$j.'</td><td class="text-center">'
                .$detail[$i]['Kode'].'</td><td>'
                .$detail[$i]['Nama'].'</td><td class="text-center">'
                .$detail[$i]['jumlah'].'</td><td class="text-center">'
                .$detail[$i]['satuan'].'</td><td class="text-right">'
                .rp($detail[$i]['harga']).'</td><td class="text-right">'
                .rp($detail[$i]['subtotal']).'</td></tr>';
            $j++;

            }
            $div.="<tr><td colspan='5'></td><th class='text-right'><h3>Total</h3></th><th class='text-right'><h3>".rp($data['totalbayar'])."</h3></th></tr>";
            
            $div.="</tbody></table>";
            echo $div;
        }
    }
    function getone($id=null){
        if($id!==null){
            $data=$this->ptdb->get_one($id);
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
            $this->ptdb->update($this->input->post('id'));
          }else{
            $idtipebeli=$this->input->post('id_tipe_beli');
            if($idtipebeli==1):
                $this->ptdb->save();
            else: 
                $idpt=$this->ptdb->save();
                $po=$this->input->post('faktur_po');
                // print_r($po);
                $detailpo=$this->ptdb->get_detail_po($po);
                print_r($detailpo);
                $jml=count($detailpo);
                for ($i=0; $i < $jml; $i++) { 
                    # code...
                    $datadetail[]=array(
                        'id_pt'=>$idpt,
                        'id_barang'=>$detailpo[$i]['idbarang'],
                        'jumlah'=>$detailpo[$i]['jumlah'],
                        'id_satuan'=>$detailpo[$i]['id_satuan'],
                        'id_user'=>$this->getuser(),
                        'datetime'=>date('Y-m-d H:m:s'),
                        );
                }
                $this->ptdb->save_batch($datadetail);
            endif;

          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id')){
                $this->ptdb->update($this->input->post('id'));
              }else{
                $this->ptdb->save();
              }
          }
        }
    }

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->ptdb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
     function cetak_pt($enkrip=null,$id=null){
        // $enkrip=$this->enkrip();
        if($id!=null){
            $data=$this->ptdb->getonept($id);
            // print_r($data);
            $div='';
            $div.='<table class="table table-condensed table-striped table-bordered">';
            $div.='<tbody>';
            // $div.='<tr>';
            $div.='<tr><th>Faktur PO:</th><td>'.$data['faktur_pt'].'</td><th>Tanggal PO</th><td>'.$data['tgl_pt'].'</td></tr>';
            $div.='<tr><th>Supplier:</th><td>'.$data['namasupplier'].' ('.$data['kdsupplier'].')</td><th>Tanggal Kirim</th><td>'.$data['tgl_kirim_pt'].'</td></tr>';
            $div.='<tr><th>Status PO:</th><td>'.$data['status'].'</td><td>Tanggal Kedaluarsa</td><td>'.$data['tgl_kedaluarsa_pt'].'</td></tr>';
            $div.='<tr><th>Total:</th><td>'.rp($data['totalbayar']).'</td><th>Pembayaran:</th><td>'.$data['jenis_pembayaran'].'</td></tr>';
     
            $div.="</tbody></table><table class='table table-condesed table-striped'><tbody>";
            $div.='<tr><th class="text-center">No</th><th class="text-center">Kode</th>
            <th class="text-center">Nama Barang</th>
            <th class="text-center">Jumlah</th>
            <th class="text-center">Satuan</th>
            <th class="text-center">Harga</th>
            <th class="text-center">Subtotal</th>
            </tr>';
            $detail=$this->ptdb->get_detail_pt($data['faktur_pt']);
            // print_r($detail);
            $jdetail=count($detail);
            $j=1;
            for ($i=0; $i <$jdetail ; $i++) { 
                # code...
                
                $div.='<tr ><td class="text-center">'.$j.'</td><td class="text-center">'
                .$detail[$i]['Kode'].'</td><td>'
                .$detail[$i]['Nama'].'</td><td class="text-center">'
                .$detail[$i]['jumlah'].'</td><td class="text-center">'
                .$detail[$i]['satuan'].'</td><td class="text-right">'
                .rp($detail[$i]['harga']).'</td><td class="text-right">'
                .rp($detail[$i]['subtotal']).'</td></tr>';
            $j++;

            }
            $div.="<tr><td colspan='5'></td><th class='text-right'><h3>Total</h3></th><th class='text-right'><h3>".rp($data['totalbayar'])."</h3></th></tr>";
            
            $div.="</tbody></table>";
            $this->template->set_layout('cetak');
            $this->template->load_view('cetak_pt_baru',array(
                'content'=>$div,
                'data'=>$data,
                'detail'=>$detail,
                ));
        }
    }
    function gen_sp_id(){
        $last_sp=$this->ptdb->get_last_sp();
        // print_r($last_sp);
        if(!empty($last_sp)):
            $first=substr($last_sp['Kode'],0,2);
            if($first==''||$first==null){
                $first='SP';
            }
            $right=substr($last_sp['Kode'],-4);
            $nosp=number_format($right); 
            
            
            $newsp=strval($nosp+1);
            $newsp2=substr(strval("00000$newsp"),-4);

            $gen="SP".$newsp2;
        else:
            $gen="SP0001";
        endif;
        return $gen;
        
    }
    function get_sp_id(){
        echo $this->gen_sp_id();
    }
    function gen_kdbarang(){
        $last_sp=$this->ptdb->get_last_sp();
        // print_r($last_sp);
        if(!empty($last_sp)):
            $first=substr($last_sp['Kode'],0,2);
            if($first==''||$first==null){
                $first='SP';
            }
            $right=substr($last_sp['Kode'],-4);
            $nosp=number_format($right); 
            
            
            $newsp=strval($nosp+1);
            $newsp2=substr(strval("00000$newsp"),-4);

            $gen="SP".$newsp2;
        else:
            $gen="SP0001";
        endif;
        return $gen;
        
    }
    function get_kdbarang(){
        echo $this->gen_kdbarang();
    }
    private function generate_new_pt(){
        $last_pt=$this->ptdb->get_last_pt();
        // print_r($last_pt);
        if(!empty($last_pt)):
            $first=substr($last_pt['faktur_pt'],0,2);
            if($first==''||$first==null){
                $first='PT';
            }
            $left=substr($last_pt['faktur_pt'],2,4);
            $right=substr($last_pt['faktur_pt'],-5);
            $nopt=number_format($right); 
            
            
            $newpo=strval($nopt+1);
            $newpo2=substr(strval("00000$newpo"),-5);

        $tahun=substr($left,0,2);
        $bulan=substr($left,2,4);
        
            if($tahun<>date('y')):
                $tahun=date('y');
                if($bulan==date('m')):
                    $gen_pt=strval($first.$tahun.$bulan."00001");
                elseif($bulan<>date('m')):
                    $bulan=date('m');
                    $gen_pt=strval($first.$tahun.$bulan."00001");
                endif;
            elseif($tahun==date('y')):
                if(intval($bulan)<>date('m')):
                    $bulan=date('m');
                    $gen_pt=strval($first.$tahun.$bulan."00001"); 
                elseif($bulan==date('m')):
                    $gen_pt=strval($first.$tahun.$bulan.$newpo2);
                endif;
            endif;
        else:
            // $gen_pt="PT151100001";
            $gen_pt="PT".date('ym')."00001";
        endif;
        return $gen_pt;
    }
     function get_new_pt(){
        echo $this->generate_new_pt();
    }
    

}

/** Module purchase_transaction Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
