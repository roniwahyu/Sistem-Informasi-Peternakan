<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class purchase_order_ajax extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->model('purchase_order_model','podb',TRUE);
        $this->session->set_userdata('lihat','purchase_order');
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
       
        
        // $this->template->add_js('datatables.js');
        // $this->template->add_js('muria.js');
        $this->template->add_js('crud.js');
        $this->template->add_js('accounting.min.js');
        $this->template->set_layout('dashboard');
    }

    public function index() {
        $this->template->set_title('Kelola Purchase_order');
        $this->template->add_css('plugins/datapicker/datepicker3.css');
        $this->template->add_js('plugins/datapicker/bootstrap-datepicker.js');
        // $this->template->add_css('plugins/select2/select2.min.css');
        // $this->template->add_css('select2-bootstrap.css');
        // $this->template->add_js('plugins/select2/select2.min.js');
        // $this->template->add_js("$('select').select2()",'embed');
        $this->template->add_js('datepicker.js');
        $this->template->add_js('var baseurl="'.base_url().'purchase_order_ajax/";','embed');  
        $this->template->add_js('
            $(function(){
               // tabletemp();
               tablepo();
            });
               
            function tablepo(){
                var oTable=$(".tablepo").DataTable({
                    "ajax":{
                        "url":"'.base_url('purchase_order_ajax/getdatatables').'",
                        "dataType": "json"
                    },
                    "sServerMethod": "POST",
                    "bServerSide": true,
                    "bAutoWidth": true,
                    "bDeferRender": true,
                    "bSortClasses": false,
                    "bscrollCollapse": true,
                    "processing":true,
                });
            }
            // function tabletemp(){
                var TempTbl=$(".tabletemp").DataTable({
                    "ajax":{
                        "url":"'.base_url('purchase_order_ajax/get_po_temp').'",
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
            // }

            function tabledetail(po){
                TempTbl=$(".tabledetail").DataTable({
                    "ajax":{
                        "url":"'.base_url('purchase_order_ajax/get_po_detail').'/"+po,
                        "dataType": "json"
                    },
                    "sServerMethod": "POST",
                    "bServerSide": true,
                                                          
                });
                // TempTbl.clear(0).draw();
            }
            // 

            //  TempTbl.clear(0).draw();

                 $("body").on("click",".btn-add",function(){
                    alert(isedit);
                    var faktur = $("#faktur_po").val();
                    var kode = $("#Kode").val();
                    var qty = $("#Qty").val();
                    var satuan = $("#Satuan").val();
                    
                    var datax={id_barang:kode,jumlah:qty,id_satuan:satuan,faktur_po:$("#faktur_po").val(),ajax:1};
                    $(this).ready(function(){
                        $.ajax({
                            url:"'.base_url('purchase_order_ajax/submit_temp').'",
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
                function gettotal(){
                    $.get("'.base_url('purchase_order_ajax/get_po_temp_total/').'", function(datan, status){
                   
                    // alert(datan);
                        // var totbayar=datan;
                    if(datan>0){
                        // $("#totalbayar").val(datan);
                        $("#totalbayar").val(accounting.formatMoney(datan, "Rp", 2, ".", ","));
                    }else{
                         $("#totalbayar").val(0);
                    }
                    
                    });
                }
                $("body").on("click",".delete_temp",function(e){
                    e.preventDefault();
                    var del_data={id:$(this).attr("id"),ajax:1}
                    if(confirm("Anda Yakin Ingin Menghapus Item Ini?")){
                    $(this).ready(function(){
                            
                                $.ajax({
                                    url: "'.base_url('purchase_order_ajax/delete_temp').'",
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
                $("body").on("click","#save",function(e){
                    e.preventDefault();
                    TempTbl.clear(0).draw();
                    // alert("reset tabledetail");
                });
                $("body").on("click","po_baru",function(e){
                    e.preventDefault();
                    TempTbl.clear(0).draw();
                    // alert("reset tabledetail");
                });

                $("#Kode").change(function(){
                    var that = this,
                    v = $(this).val();
                    // alert(value);
                    // $("#Satuan").html("");
                    // $("select#Satuan option").remove();
                    // $("select#Satuan").select2.("value","All");
                    get_satuan(v);
                   
                    
                });
            function get_satuan(id){
                $("select#Satuan option").remove();
                 $.getJSON("'.base_url('purchase_order_ajax/dropdown_satuan/').'/"+id, function (data) {
                         $.each(data, function (index, item) {
                             $("#Satuan").append(
                                  $("<option></option>").val(index).html(item)
                              );
                         });
                     });
            }
            function get_barang(id){
                $("select#Kode option").remove();
                $.getJSON("'.base_url('purchase_order_ajax/dropdown_barang/').'/"+id, function (data) {
                         $.each(data, function (index, item) {
                             $("#Kode").append(
                                  $("<option></option>").val(index).html(item)
                              );
                         });
                     });
            }
            function reset_barang(){
                var supplier=$("#id_supplier").val();
                // alert(supplier);
                get_barang(supplier);
            }
            $("body").on("click",".reset",function(e){
                e.preventDefault();
                var datax={ajax:1};
                $.post("'.base_url('purchase_order_ajax/reset_temp/').'",datax,function(data,status){
                    TempTbl.clear(0).draw();
                });
            });
            $("body").on("click",".generate_po",function(e){
                e.preventDefault();
                new_faktur();
            });
            $("body").on("click",".refresh_barang",function(e){
                e.preventDefault();
                reset_barang();
            }); 
            $("body").on("click",".edit",function(e){
                e.preventDefault();
                var $this = $(this);
                var po = $this.data("purchase");
                // $(".tabledetail").show();
                // $(".tabletemp").hide();
                // tabletemp();
                TempTbl.ajax.url("'.base_url('purchase_order_ajax/get_po_detail/').'/"+po).load();
             

                // $(this).attr("data-purchase");
                // // $(".tabletemp").hide();
                // // ();
                // $(this).ready(function(){
                //     var totalbayar=$("#totalbayar").val();
                   
                var isedit=1;

                // });
                return isedit;
            });

            $("body").on("click",".po_baru,.baru",function(e){
                e.preventDefault();
                new_faktur();
                reset_detail();
            });
            function new_faktur(){
                 $.get("'.base_url('purchase_order_ajax/get_new_po/').'", function(newpo, status){
                    $("#faktur_po").prop("value",newpo);
                    var newfaktur=newpo;
                    // alert(newfaktur);
                });
            };
            function reset_detail(){
                TempTbl.clear(0).draw();
            }


                $("#uangmuka").change(function(){
                    var that = this,
                    dp = $(this).val();
                    // alert(dp);
                    var totbayar=accounting.unformat($("#totalbayar").val(),",");
                    // alert(totbayar);
                    var sisa=(totbayar - dp);
                    $("#uangmuka").prop("value",accounting.formatMoney(dp, "Rp", 2, ".", ","))
                    $("#sisa").prop("value",accounting.formatMoney(sisa, "Rp", 2, ".", ","));
                });    
                
                $("#id_supplier").change(function(){
                    var that = this,
                    v = $(this).val();
                    // $("select#Kode option").remove();
                    // $("select#Kode").select2.("value","All");

                    get_barang(v);
                    
                });            
            
        ','embed');  
        
        //<!-- $this->template->add_js('datepicker.js'); -->
        
        $this->template->load_view('purchase_order_view',array(
                'nopo'=>$this->generate_new_po(),
                'opt_supplier'=>$this->podb->dropdown_supplier(),
                'opt_barang'=>array(),
                'opt_satuan'=>array(),
                'opt_bayar'=>$this->podb->dropdown_pembayaran(),
                        'title'=>'Kelola Data Purchase_order',
                        'subtitle'=>'Pengelolaan Purchase_order',
                        'breadcrumb'=>array(
                            'Purchase_order'),
                        ));
        
    }
     
     //<!-- Start Primary Key -->
    function generate_new_po(){
        $last_po=$this->podb->get_last_po();
        // print_r($last_po);
        if(!empty($last_po)):
            $first=substr($last_po['faktur_po'],0,2);
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
            $gen_po="PO151100001";
        endif;
        return $gen_po;
    }    
    function get_new_po(){
        echo $this->generate_new_po();
    }

    public function getdatatables(){
        $this->datatables->select('faktur_po,tgl_po,namasupplier,totalbayar,status,jenis_pembayaran,idpo,')
            ->from('00-00-03-00-view-purchase-order');
        // if($this->isadmin()==1):
        $this->datatables->edit_column('totalbayar','<div class="text-right">$1</div>','rp(totalbayar)');    
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('purchase_order_ajax/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'>
                    <i class='fa fa-info-circle'></i> </a>

                <a href='#outside' data-toggle='tooltip' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='$1' data-purchase='$2'><i class='glyphicon glyphicon-edit'></i></a>
                <button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger'id='$1'><i class='glyphicon glyphicon-remove'></i></button>
                </div>" , 'idpo,faktur_po');
    
       /* else:
           
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('purchase_order_ajax/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'>
                <i class='fa fa-info-circle'></i> </a></div>" , 'idpo');
           
        endif;*/ 
        $this->datatables->unset_column('idpo');
        echo $this->datatables->generate();
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
    public function get_po_detail($po){
               $this->datatables->select('id_detail,Kode,Nama,jumlah,satuan,harga,subtotal,po')
                            ->from('00-00-03-04-view-detail-po');
                $this->datatables->where("po",$po);
                $this->datatables->edit_column('harga','<div class="text-right harga">$1</div>','rp(harga)');
                $this->datatables->edit_column('subtotal','<div class="text-right subtotal">$1</div>','rp(subtotal)');
                $this->datatables->add_column('edit',"<div class='btn-group'>
               <button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete_temp btn btn-xs btn-danger' id='$1'><i class='fa fa-minus'></i></button>
                </div>" , 'id_detail');
            $this->datatables->unset_column('po');
        echo $this->datatables->generate();
    }
    function isadmin(){
       return ($this->ion_auth->is_admin());
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
        
       
        // $this->index();
        $this->load->view('form_po_ajax_tanpa_bayar');
           
    }

    public function get($id=null){
        if($id!==null){
            echo json_encode($this->podb->get_one($id));
        }
    }
    function tables(){
        $this->load->view('purchase_order_ajax_data');
    }
    function get_barang_satuan(){

    }
    function get_po_temp_total(){
        $total=$this->podb->get_po_total();
        echo ($total['total']);
    }
    function dropdown_barang($id_supplier=null){
        $result = array();
        if(!empty($id_supplier)):
            $array_keys_values = $this->db->query('select id,Kode,Nama from `00-00-01-05-drop-barang-supplier` where id_supplier='.$id_supplier.' order by id asc');
        else:
            $array_keys_values = $this->db->query('select id,Kode,Nama from `00-00-01-05-drop-barang-supplier` order by id asc');
        endif;
        $result[0]="-- Pilih Barang --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id]= $row->Kode." (".$row->Nama.")";
        }
       echo json_encode($result);
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
    function edit_data(){
        $data = array(
        // 'id' => $this->input->post('id',TRUE),
       'faktur_po' => $this->input->post('faktur_po', TRUE),
       'tgl_po' => $this->input->post('tgl_po', TRUE),
       'id_supplier' => $this->input->post('id_supplier', TRUE),
       'keterangan' => $this->input->post('keterangan', TRUE),
       'ref_beli' => $this->input->post('ref_beli', TRUE),
       'id_stock_req' => $this->input->post('id_stock_req', TRUE),
       'id_bayar' => $this->input->post('id_bayar', TRUE),
       'totalbayar' => $this->input->post('totalbayar', TRUE),
       'uangmuka' => $this->input->post('uangmuka', TRUE),
       'grandtotal' => $this->input->post('grandtotal', TRUE),
       'biaya_kirim' => $this->input->post('biaya_kirim', TRUE),
       'status' => $this->input->post('status', TRUE),
       'tgl_kirim_po' => $this->input->post('tgl_kirim_po', TRUE),
       'tgl_kedaluarsa_po' => $this->input->post('tgl_kedaluarsa', TRUE),
       'id_user' => $this->getuser(),
       'datetime' => date('Y-m-d H:m:s'),
       
        );

        return $data;
    }
    public function submit(){
        $total=$this->input->post('totalbayar',TRUE);//Rp3.542.700,00
        $total1=str_replace("Rp","",$total);
        $total2=str_replace(".","",$total1);
        $total3=substr_replace($total2,"",-3);

        print_r($total3);
           $data = array(
            
                'faktur_po' => $this->input->post('faktur_po', TRUE),
                'tgl_po' => $this->input->post('tgl_po', TRUE),
                'id_supplier' => $this->input->post('id_supplier', TRUE),
                'keterangan' => $this->input->post('keterangan', TRUE),
                'ref_beli' => $this->input->post('ref_beli', TRUE),
                'id_stock_req' => $this->input->post('id_stock_req', TRUE),
                'id_bayar' => $this->input->post('id_bayar', TRUE),
                'totalbayar' => $total3,
                'uangmuka' => $this->input->post('uangmuka', TRUE),
                'grandtotal' => $this->input->post('grandtotal', TRUE),
                'biaya_kirim' => $this->input->post('biaya_kirim', TRUE),
                'status' => 'Baru',
                'tgl_kirim_po' => $this->input->post('tgl_kirim_po', TRUE),
                'tgl_kedaluarsa_po' => $this->input->post('tgl_kedaluarsa', TRUE),
                'id_user' => $this->getuser(),
                'datetime' => date('Y-m-d H:m:s'),
               
            );
        if ($this->input->post('ajax')){
          if ($this->input->post('id')){
            $this->podb->update($this->input->post('id'));
          }else{
            $this->podb->save($data);
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id')){
                $this->podb->update($this->input->post('id'));
              }else{
                $this->podb->save($data);
              }
          }
        }
         $transfer=$this->podb->get_po_temp($this->input->post('faktur_po'));
        // print_r($transfer);
        if(!empty($transfer)):
            $jml=count($transfer);
            $data=array();
            $i=0;
            foreach ($transfer as $key => $value) {
                # code...
                $data[$i]=array(
                    'po'=>$value['id_po'],
                    'id_barang'=>$value['id_barang'],
                    'jumlah'=>$value['jumlah'],
                    'id_satuan'=>$value['id_satuan'],
                    'id_user'=>$value['id_user'],
                    'datetime'=>date('Y-m-d H:m:s'),

                    );
                $i++;
            }

            // print_r($data);
            $this->podb->transfer_detail_po($data);
        endif;
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
    public function reset_temp(){
        if(isset($_POST['ajax'])){
           
                $this->podb->reset_temp();
                echo "Form Reset";
           
        }
    }
    

}

/** Module purchase_order_ajax Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
