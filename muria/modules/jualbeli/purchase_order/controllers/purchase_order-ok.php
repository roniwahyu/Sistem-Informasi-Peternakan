<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class purchase_order extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->model('purchase_order_model','podb',TRUE);
        $this->session->set_userdata('lihat','purchase_order');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;

        $this->template->add_css('plugins/datapicker/datepicker3.css');
        $this->template->add_js('plugins/datapicker/bootstrap-datepicker.js');
        $this->template->add_js('datepicker.js');
       
        
       
        $this->template->add_js('muria.js');
        $this->template->add_js('crud-muria.js');
        $this->template->set_layout('dashboard');
    }

    public function index() { 
        
        $this->template->add_js('datatables.js');
        $this->template->set_title('Kelola Order Pembelian (PO)');
        
        $this->template->add_js('var baseurl="'.base_url().'purchase_order/";','embed');  
        $this->template->add_js('var enkrip="'.$this->enkrip().'";','embed');  
        

        // $this->template->add_js('jquery.maskMoney.min.js');
        $this->template->add_js('accounting.min.js');

        
        $this->template->load_view('purchase_order_view',array(
            'view'=>'purchase_order_table',
            'title'=>'Kelola Data Order Pembelian (PO)',
            'subtitle'=>'Pengelolaan Order Pembelian (PO)',
            'breadcrumb'=>array(
                'Order Pembelian (PO)',),
            ));
        
    }
     
     //<!-- Start Primary Key -->
    

     public function getdatatables(){
        $enkrip=$this->enkrip();
        $this->datatables->select('faktur_po,tgl_po,namasupplier,totalbayar,status,jenis_pembayaran,idpo,md5id')
            ->from('00-00-03-00-view-purchase-order');
        $this->datatables->edit_column('status','<div class="text-center">$1</div>','status');           
        $this->datatables->edit_column('totalbayar','<div class="text-right">$1</div>','rp(totalbayar)');    
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('purchase_order/getonepo/$1')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>
                <a href='".base_url('purchase_order/edit/'.$enkrip.'/$1')."' title='Edit' class='edite btn btn-xs btn-success' id='$1' data-purchase='$2'><i class='glyphicon glyphicon-edit'></i></a>
                <button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger'id='$1'><i class='glyphicon glyphicon-remove'></i></button>
                
                </div>" , 'idpo,faktur_po,md5id');
    

        $this->datatables->unset_column('idpo,md5id');
        echo $this->datatables->generate();
    }
    function remd5($md5){
        $len=strlen($md5);
        $a=substr($md5,0,5);
        $b=substr($md5,5,15);
        $c=substr($md5,20,$len);
        echo $a."-".$b."-".$c;
    }
    function left($id){
        echo "<pre>";
        echo $id."<br>";
        echo strpos($id,"00")."<br>";
        $a=substr($id,0,1)."<br>";
        echo $a;
        echo "</pre>";
    }
    public function get_po_temp(){
               $this->datatables->select('id_detail,Kode,Nama,jumlah,satuan,harga,subtotal')
                            ->from('00-00-03-05-view-detail-po-temp');
                $this->datatables->edit_column('harga','<div class="text-right harga">$1</div>','rp(harga)');
                $this->datatables->edit_column('subtotal','<div class="text-right subtotal">$1</div>','rp(subtotal)');
                $this->datatables->add_column('edit',"<div class='btn-group'>
               <button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete_temp btn btn-xs btn-danger' id='$1'><i class='fa fa-minus'></i></button>
                </div>" , 'id_detail');
            // $this->datatables->unset_colum   n('id_detail');
        echo $this->datatables->generate();
    }
    private function po_detail($po=null){
               $this->datatables->select('id_detail,Kode,Nama,jumlah,satuan,harga,subtotal,po')
                            ->from('00-00-03-04-view-detail-po');
                $this->datatables->where("po",$po);
                $this->datatables->edit_column('harga','<div class="text-right harga">$1</div>','rp(harga)');
                $this->datatables->edit_column('subtotal','<div class="text-right subtotal">$1</div>','rp(subtotal)');
                $this->datatables->add_column('edit',"<div class='btn-group'>
               <button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete_temp btn btn-xs btn-danger' id='$1'><i class='fa fa-minus'></i></button>
                </div>" , 'id_detail');
            $this->datatables->unset_column('po');
        return $this->datatables->generate();
    }
    //get po detail dengan menggunakan enkripsi --> "id_user+Jam:Menit" saat ini
    function get_po_detail($po=null,$md5){
        if($md5==$this->enkrip()):
            echo $this->po_detail($po);
        endif;
    }

    function enkrip(){
        return md5($this->session->userdata('lihat').":".$this->getuser()."+".date('H:m'));
        // echo $this->session->userdata('purchase_order');
    }
    function get_session(){
        echo $this->session->userdata('lihat');
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
        
       

        $this->load->view('purchase_order_form');
           
    }

    public function get($id=null){
        if($id!==null){
            echo json_encode($this->podb->get_one($id));
        }
    }
    function tables(){
        $this->load->view('purchase_order_data');
    }
    function getonepo($id=null){
        $enkrip=$this->enkrip();
        if($id!=null){
            $data=$this->podb->getonepo($id);
            // print_r($data);
            $div='';
            $div.='<div class="btn-group pull-right" style="margin-bottom:20px">';
            $div.='<a class="btn btn-success btn-md" href="'.base_url('purchase_order/cetak_po/'.$enkrip.'/'.$id.'/').'"><i class="fa fa-print"></i> Cetak Order Pembelian </a>';
            $div.='<a class="btn btn-info btn-md" href="'.base_url('purchase_transaction/use_po/'.$enkrip.'/'.$id.'/').'"> Proses Transaksi Pembelian <i class="fa fa-arrow-right"></i></a>';
            $div.='</div>';
            $div.='<table class="table table-condensed table-striped table-bordered">';
            $div.='<tbody>';
            // $div.='<tr>';
            $div.='<tr><th>Faktur PO:</th><td>'.$data['faktur_po'].'</td><th>Tanggal PO</th><td>'.$data['tgl_po'].'</td></tr>';
            $div.='<tr><th>Supplier:</th><td>'.$data['namasupplier'].' ('.$data['kdsupplier'].')</td><th>Tanggal Kirim</th><td>'.$data['tgl_kirim_po'].'</td></tr>';
            $div.='<tr><th>Status PO:</th><td>'.$data['status'].'</td><td>Tanggal Kedaluarsa</td><td>'.$data['tgl_kedaluarsa_po'].'</td></tr>';
            $div.='<tr><th>Total:</th><td>'.rp($data['totalbayar']).'</td><th>Pembayaran:</th><td>'.$data['jenis_pembayaran'].'</td></tr>';
     
            $div.="</tbody></table><table class='table table-condesed table-striped'><tbody>";
            $div.='<tr><th class="text-center">No</th><th class="text-center">Kode</th>
            <th class="text-center">Nama Barang</th>
            <th class="text-center">Jumlah</th>
            <th class="text-center">Satuan</th>
            <th class="text-center">Harga</th>
            <th class="text-center">Subtotal</th>
            </tr>';
            $detail=$this->podb->get_detail_po($data['faktur_po']);
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
    function cetak_po($enkrip=null,$id=null){
        // $enkrip=$this->enkrip();
        if($id!=null){
            $data=$this->podb->getonepo($id);
            // print_r($data);
            $div='';
            $div.='<table class="table table-condensed table-striped table-bordered">';
            $div.='<tbody>';
            // $div.='<tr>';
            $div.='<tr><th>Faktur PO:</th><td>'.$data['faktur_po'].'</td><th>Tanggal PO</th><td>'.$data['tgl_po'].'</td></tr>';
            $div.='<tr><th>Supplier:</th><td>'.$data['namasupplier'].' ('.$data['kdsupplier'].')</td><th>Tanggal Kirim</th><td>'.$data['tgl_kirim_po'].'</td></tr>';
            $div.='<tr><th>Status PO:</th><td>'.$data['status'].'</td><td>Tanggal Kedaluarsa</td><td>'.$data['tgl_kedaluarsa_po'].'</td></tr>';
            $div.='<tr><th>Total:</th><td>'.rp($data['totalbayar']).'</td><th>Pembayaran:</th><td>'.$data['jenis_pembayaran'].'</td></tr>';
     
            $div.="</tbody></table><table class='table table-condesed table-striped'><tbody>";
            $div.='<tr><th class="text-center">No</th><th class="text-center">Kode</th>
            <th class="text-center">Nama Barang</th>
            <th class="text-center">Jumlah</th>
            <th class="text-center">Satuan</th>
            <th class="text-center">Harga</th>
            <th class="text-center">Subtotal</th>
            </tr>';
            $detail=$this->podb->get_detail_po($data['faktur_po']);
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
            $this->template->load_view('cetak_po_baru',array(
                'content'=>$div,
                'data'=>$data,
                'detail'=>$detail,
                ));
        }
    }
    function getone($id=null){
        if($id!==null){
            $data=$this->podb->get_one($id);
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

    public function submit($enkrip){
        if(!empty($enkrip)):
            if($enkrip==$this->enkrip()):
                if ($this->input->post('ajax')){
                  if ($this->input->post('id')){
                    $this->podb->update($this->input->post('id'));
                  }else{
                    $this->podb->save();
                  }

                }else{
                  if ($this->input->post('submit')){
                      if ($this->input->post('id')){
                        $this->podb->update($this->input->post('id'));
                      }else{
                        $this->podb->save();
                      }
                  }
                }
            endif;
        endif;
    }
    function edit($enkrip=null,$id){
            // $id --> md5(1)
            $po=$this->podb->get_one($id);
            // print_r($po);
             $this->template->add_js('var baseurl="'.base_url('purchase_order').'/";','embed');  
            $this->template->add_js('var enkrip="'.$this->enkrip().'";','embed');  
                    $this->template->add_js('accounting.min.js');

            $data=array(
                'id'=>$po['id'],
                'tgl_po'=>$po['tgl_po'],
                'tgl_kirim_po'=>$po['tgl_kirim_po'],
                'tgl_kedaluarsa'=>$po['tgl_kedaluarsa_po'],
                'id_supplier'=>$po['id_supplier'],
                'keterangan'=>$po['keterangan'],
                'id_stock_req'=>$po['id_stock_req'],
                'nopo'=>$po['faktur_po'],
                'totalbayar'=>$po['totalbayar'],
                'status'=>$po['status'],
                'id_bayar'=>$po['id_bayar'],
                );
            // .base_url('purchase_order/get_po_detail').'/"+po+"/"+"'.$this->enkrip().
            $this->template->add_js('
            $(document).ready(function(){
              
                    var po=$("#faktur_po").val();
                    $.get("'.base_url('purchase_order/get_po_detail_total/').'/"+po, 
                        function(datan, status){
                            if(datan>0){
                                $("#totalbayarx").val(accounting.formatMoney(datan,"Rp ",2,".",","));
                                $("#totalbayar").val(datan);
                            }else{
                                 $("#totalbayar").val(0);
                                 $("#totalbayarx").val(0);
                            }
                        }
                    );
                    
                    $("#id_supplier").change(function(){
                            var that = this,
                            v = $(this).val();        
                            get_barang(v);
                    });  
                    $("#Kode").change(function(){
                            var that = this,
                            v = $(this).val();
                            var urls="'.base_url('barang_satuan/getsatuan/').'/"+v+"/";
                            // alert(urls);
                            $("#addsatuan").attr("href",urls);
                            get_satuan(v); 
                    });
                    


                    $( "#id_supplier" ).find( "option[value='.$data['id_supplier'].']" ).prop( "selected", true ); 
                    // $("#id_supplier").attr("readonly","true");

                    $("#id_supplier option:not(:selected)").attr("disabled",true);
                    $( "#status" ).find( "option[value='.$data['status'].']" ).prop( "selected", true ); 
                    $( "#id_bayar" ).find( "option[value='.$data['id_bayar'].']" ).prop( "selected", true ); 

                    $("#modal-notif").on("hidden.bs.modal", function(){
                        $(this).data("modal", null);
                        // window.location.reload("'.base_url('purchase_order').'"); 
                        window.location="'.base_url('purchase_order').'";
                    });
                    
                    //  TempTbl.ajax.url("'.base_url('purchase_order_ajax/get_po_detail/').'/"+po).load();

                    var TempTbl=$(".tabletemp").DataTable({

                        "ajax":{
                            "url":"'.base_url('purchase_order/get_po_detail/'.$po['faktur_po'].'/'.$this->enkrip().'/').'",
                            "dataType": "json"
                        },
                        "sServerMethod": "POST",
                        "bServerSide": true,
                        "bAutoWidth": true,
                        // "lengthChange": true,
                        "SortClasses": true,
                        "bscrollCollapse": true,  
                        "paging":   false,
                        "deferRender": true,
                        "bFilter":false,
                         "ordering": false,  
                         
                    });
                $("body").on("click",".refresh_barang",function(e){
                    e.preventDefault();
                    reset_barang();
                }); 
              
                $("body").on("click",".btn-add",function(e){
                    e.preventDefault();
                    // alert(isedit);
                    var faktur = $("#faktur_po").val();
                    var kode = $("#Kode").val();
                    var qty = $("#Qty").val();
                    var satuan = $("#Satuan").val();
                    
                    var datax={id_barang:kode,jumlah:qty,id_satuan:satuan,faktur_po:$("#faktur_po").val(),ajax:1};
                    $(this).ready(function(){
                        $.ajax({
                            url:"'.base_url('purchase_order/submit_detail').'",
                            data:datax,
                            type:"POST",
                            success:function(msg){
                                $("#Kode").prop("value","");
                                $("#Qty").prop("value","");
                                $("#Satuan").prop("value","");
                                // $("#faktur_po").prop("value","");
                                $("#Satuan option").prop("selected", function() {
                                    return this.defaultSelected;
                                });
                                $("#Kode option").prop("selected", function() {
                                    return this.defaultSelected;
                                });
                                TempTbl.clear(0).draw();
                                gettotal();

                            } });
                        });
                });

                           
                $("body").on("click",".delete_temp",function(e){
                    e.preventDefault();
                    var del_data={id:$(this).attr("id"),ajax:1}
                    if(confirm("Anda Yakin Ingin Menghapus Item Ini?")){
                    $(this).ready(function(){
                            
                                $.ajax({
                                    url: "'.base_url('purchase_order/delete_detail').'",
                                    type: "POST",
                                    data: del_data,
                                    success:function(msg){
                                         // $(".tabletemp").DataTable().clear(0).draw();                      
                                         TempTbl.clear(0).draw();    
                                         gettotal();
                                    }
                                });
                            });
                        }
                });
                // gettotal();
                $("#modal-notif").on("hidden.bs.modal", function(){
                    $(this).data("modal", null);
                    // window.location.reload("'.base_url('purchase_order').'"); 
                    window.location="'.base_url('purchase_order').'";
                });
              

                
            
            });
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
            function gettotal(){
                var po=$("#faktur_po").val();
                $.get("'.base_url('purchase_order/get_po_detail_total/').'/"+po, 
                    function(datan, status){
                        if(datan>0){
                            $("#totalbayar").val(datan);
                            $("#totalbayarx").val(accounting.formatMoney(datan,"Rp ",2,".",","));
                        }else{
                             $("#totalbayar").val(0);
                             $("#totalbayarx").val(0);
                        }
                    }
                );
            };
            
            function reset_barang(){
                var supplier=$("#id_supplier").val();
                // alert(supplier);
                get_barang(supplier);
            }
                    ','embed');
             $this->template->load_view('purchase_order_view',array(
                    'nopo'=>$data['nopo'],
                    'opt_supplier'=>$this->podb->dropdown_supplier(),
                    'opt_barang'=>array(),
                    'opt_satuan'=>array(),
                    'opt_bayar'=>$this->podb->dropdown_pembayaran(),
                    'default'=>$data,
                    'view'=>'purchase_order_form',
                    'title'=>'Order Pembelian (PO) Baru',
                    'subtitle'=>'Order Pembelian (PO) Baru',
                ));
        
    }

    public function baru(){
         // $this->template->add_js('var baseurl="'.base_url().'purchase_order/";','embed');  
        
        $this->template->add_js('var enkrip="'.$this->enkrip().'";','embed');  
        
        $this->template->add_js('accounting.min.js');
         $this->template->add_js('
            $(document).ready(function(){
            
                $("#id_supplier").change(function(){
                    var that = this,
                    v = $(this).val();
                    
                    get_barang(v);
                });  
                $("#Kode").change(function(){
                    var that = this,
                    v = $(this).val();
                    var urls="'.base_url('barang_satuan/getsatuan/').'/"+v+"/";
                    $("#addsatuan").attr("href",urls);
                    get_satuan(v); 
                });
                var po = $("#faktur_po").val();
                var TempTbl=$(".tabletemp").DataTable({

                    "ajax":{
                        "url":"'.base_url('purchase_order/get_po_detail').'/"+po+"/"+"'.$this->enkrip().'",
                        "dataType": "json"
                    },
                    "sServerMethod": "POST",
                    "bServerSide": true,
                    "bAutoWidth": true,
                    // "lengthChange": true,
                    "SortClasses": true,
                    "bscrollCollapse": true,  
                    "paging":   false,
                    "deferRender": true,
                    "bFilter":false,
                     "ordering": false,  
                     
                });
                $("body").on("click",".generate_po",function(e){
                    e.preventDefault();
                    new_faktur();
                });
                $("body").on("click",".refresh_barang",function(e){
                    e.preventDefault();
                    reset_barang();
                });  
              
                $("body").on("click",".btn-add",function(e){
                    e.preventDefault();
                    // alert(isedit);
                    var faktur = $("#faktur_po").val();
                    var kode = $("#Kode").val();
                    var qty = $("#Qty").val();
                    var satuan = $("#Satuan").val();
                    
                    var datax={id_barang:kode,jumlah:qty,id_satuan:satuan,faktur_po:$("#faktur_po").val(),ajax:1};
                    $(this).ready(function(){
                        $.ajax({
                            url:"'.base_url('purchase_order/submit_detail').'",
                            data:datax,
                            type:"POST",
                            success:function(msg){
                                $("#Kode").prop("value","");
                                $("#Qty").prop("value","");
                                $("#Satuan").prop("value","");
                                // $("#faktur_po").prop("value","");
                                $("#Satuan option").prop("selected", function() {
                                    return this.defaultSelected;
                                });
                                $("#Kode option").prop("selected", function() {
                                    return this.defaultSelected;
                                });
                                TempTbl.clear(0).draw();
                                gettotal();

                            } });
                        });
                });
                $("body").on("click",".delete_temp",function(e){
                    e.preventDefault();
                    var del_data={id:$(this).attr("id"),ajax:1}
                    if(confirm("Anda Yakin Ingin Menghapus Item Ini?")){
                    $(this).ready(function(){
                            
                                $.ajax({
                                    url: "'.base_url('purchase_order/delete_detail').'",
                                    type: "POST",
                                    data: del_data,
                                    success:function(msg){
                                         // $(".tabletemp").DataTable().clear(0).draw();                      
                                         TempTbl.clear(0).draw();    
                                         gettotal();
                                    }
                                });
                            });
                        }
                });
                    gettotal();
                $("#modal-notif").on("hidden.bs.modal", function(){
                    $(this).data("modal", null);
                    // window.location.reload("'.base_url('purchase_order').'"); 
                    window.location="'.base_url('purchase_order').'";
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
                    e.preventDefault();gen_kdsp(enkrip);
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
        

                
    
                
            }); //end of document ready

                function gen_kdsp(enkrip){
                     $.get("'.base_url('purchase_transaction/get_sp_id/').'/"+enkrip, function(kdsp, status){
                                $("#add_supplier_form #Kode").prop("value",kdsp);
                            });
                }
                function gen_kdbarang(enkrip){
                     $.get("'.base_url('purchase_transaction/get_kdbarang/').'/"+enkrip, function(kdbarang, status){
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
            function gettotal(){
                var po=$("#faktur_po").val();
                $.get("'.base_url('purchase_order/get_po_detail_total/').'/"+po, 
                    function(datan, status){
                        if(datan>0){
                            $("#totalbayar").val(datan);
                            $("#totalbayarx").val(accounting.formatMoney(datan,"Rp ",2));
                        }else{
                             $("#totalbayar").val(0);
                             $("#totalbayarx").val(0);
                        }
                    }
                );
            };
            
            function reset_barang(){
                var supplier=$("#id_supplier").val();
                // alert(supplier);
                get_barang(supplier);
            }
            function new_faktur(){
                 $.get("'.base_url('purchase_order/get_new_po/').'", function(newpo, status){
                    $("#faktur_po").prop("value",newpo);
                    var newfaktur=newpo;
                    // alert(newfaktur);
                });
            };
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
            function get_barang(id){
                $("select#Kode option").remove();
                $.getJSON("'.base_url('purchase_order/get_drop_barang/').'/"+id, function (data) {
                         $.each(data, function (index, item) {
                             $("#Kode").append(
                                  $("<option></option>").val(index).html(item)
                              );
                         });
                     });
            }','embed');
        $this->template->add_js('var baseurl="'.base_url('purchase_order').'/"','embed');
        $this->template->load_view('purchase_order_view',array(
                'nopo'=>$this->generate_new_po(),
                'opt_supplier'=>$this->podb->dropdown_supplier(),
                'opt_barang'=>array(),
                'opt_satuan'=>array(),
                'opt_bayar'=>$this->podb->dropdown_pembayaran(),
                'view'=>'purchase_order_form',
                'title'=>'Order Pembelian (PO) Baru',
                'subtitle'=>'Order Pembelian (PO) Baru',
                'breadcrumb'=>array(
                    'Order Pembelian (PO)',),
            ));
    }
    private function generate_new_po(){
        $last_po=$this->podb->get_last_po();
        // print_r($last_po);
        if(!empty($last_po)):
            $first=substr($last_po['faktur_po'],0,2);
            if($first==''||$first==null){
                $first='PO';
            }
            $left=substr($last_po['faktur_po'],2,4);
            $right=substr($last_po['faktur_po'],-5);
            $nopo=number_format($right); 
            
            
            $newpo=strval($nopo+1);
            $newpo2=substr(strval("00000$newpo"),-5);

        $tahun=substr($left,0,2);
        $bulan=substr($left,2,4);
        
            if($tahun<>date('y')):
                $tahun=date('y');
                if($bulan==date('m')):
                    $gen_po=strval($first.$tahun.$bulan."00001");
                elseif($bulan<>date('m')):
                    $bulan=date('m');
                    $gen_po=strval($first.$tahun.$bulan."00001");
                endif;
            elseif($tahun==date('y')):
                if(intval($bulan)<>date('m')):
                    $bulan=date('m');
                    $gen_po=strval($first.$tahun.$bulan."00001"); 
                elseif($bulan==date('m')):
                    $gen_po=strval($first.$tahun.$bulan.$newpo2);
                endif;
            endif;
        else:
            // $gen_po="PO151100001";
             $gen_po="PO".date('ym')."00001";
        endif;
        return $gen_po;
    }
     function get_new_po(){
        echo $this->generate_new_po();
    }
    function get_po_detail_total($po=null){

        $total=$this->podb->get_detail_total($po);
        // print_r($total);
        if($total!=null):
            echo ($total['total']);
        else:
            echo "0";
        endif;
    }
    private function dropdown_barang($id_supplier=null){
        $result = array();
        if(!empty($id_supplier)):
            $array_keys_values = $this->db->query('select id,Kode,Nama from `00-00-01-05-drop-barang-supplier` where id_supplier='.$id_supplier.' order by Kode asc');
        else:
            $array_keys_values = $this->db->query('select id,Kode,Nama from `00-00-01-05-drop-barang-supplier` order by Kode asc');
        endif;
        $result[0]="-- Pilih Barang --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id]= $row->Kode." (".$row->Nama.")";
        }
      return json_encode($result);
    } 
    function get_drop_barang($id_supplier=null){
        echo $this->dropdown_barang($id_supplier);
    }
    function dropdown_satuan($id_barang){
        $result = array();
        $sql="select idsatuan,value,descrip,kode
            from(
            select id, id_barang,kode,'1' idsatuan,Satuan1 VALUE,'Satuan1' descrip from `00-00-01-05-view-barang-satuan` where id_barang='$id_barang'
            union all
            select id, id_barang,kode,'2' idsatuan,Satuan2 VALUE,'Satuan2' descrip from `00-00-01-05-view-barang-satuan` where id_barang='$id_barang'
            union all
            select id, id_barang,kode,'3' idsatuan,Satuan3 VALUE,'Satuan3' descrip from `00-00-01-05-view-barang-satuan` where id_barang='$id_barang'
            ) src group by descrip ";
        // $array_keys_values = $this->db->query('select id,Kode,Nama from supplier order by id asc');
        $array_keys_values = $this->db->query($sql);
        $result[0]="-- Pilih Satuan --";
        $i=1;
        // print_r($array_keys_values->result_array());
        // foreach ($array_keys_values->result_array() as $key => $row)
        foreach ($array_keys_values->result() as $row)
        {
            if($row->value!=null):
                /*$result=array(
                    $row['idsatuan']=>$row['value']." (".$row['descrip'].")",
                    );*/
                // $result[$i]=$row['value']." (".$row['descrip'].")";
                $result[$row->idsatuan]= $row->value." (".$row->descrip.")";
            endif;
            $i++;
        }
        echo json_encode($result);
    }
   function show_po($po=null){
       
        $this->template->set_layout('invoicing');
        $this->template->load_view('purchase_order',array(
            'po'=> $this->podb->get_detail_po($po),

            ));
    }
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->podb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
    public function submit_temp(){
         $data = array(
        
            'id_po' => $this->input->post('faktur_po', TRUE),
           
            'id_barang' => $this->input->post('id_barang', TRUE),
           
            'jumlah' => $this->input->post('jumlah', TRUE),
           
            'id_satuan' => $this->input->post('id_satuan', TRUE),
        
            'id_user' =>$this->getuser(),
           
            'datetime' => date('Y-m-d H:m:s'),
           
        );
        if ($this->input->post('ajax')){
          if ($this->input->post('id')){
            $this->podb->update($this->input->post('id'));
          }else{
            $this->podb->save_temp($data);
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id')){
                $this->podb->update($this->input->post('id'));
              }else{
                $this->podb->save_temp($data);
              }
          }
        }
    }
    public function submit_detail(){
         $data = array(
        
            'po' => $this->input->post('faktur_po', TRUE),
           
            'id_barang' => $this->input->post('id_barang', TRUE),
           
            'jumlah' => $this->input->post('jumlah', TRUE),
           
            'id_satuan' => $this->input->post('id_satuan', TRUE),
        
            'id_user' =>$this->getuser(),
           
            'datetime' => date('Y-m-d H:m:s'),
           
        );
        if ($this->input->post('ajax')){
          if ($this->input->post('id')){
            $this->podb->update($this->input->post('id'));
          }else{
            $this->podb->save_detail($data);
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id')){
                $this->podb->update($this->input->post('id'));
              }else{
                $this->podb->save_detail($data);
              }
          }
        }
    }

    public function delete_temp(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->podb->delete_temp($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    } 
    public function delete_detail(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->podb->delete_detail($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    } 
    public function reset_temp(){
        if(isset($_POST['ajax'])){
           
                $this->podb->reset_temp();
                echo "Form Reset";
           
        }
    }
    

}

/** Module purchase_order Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
