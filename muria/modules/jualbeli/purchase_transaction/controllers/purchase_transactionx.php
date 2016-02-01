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
       
        
        $this->template->add_js('datatables.js');
        $this->template->add_js('muria.js');
        $this->template->add_js('crud.js');
        $this->template->set_layout('dashboard');
    }

    public function index() {
        $this->template->set_title('Kelola Transaksi Pembelian');
        
        $this->template->add_js('var baseurl="'.base_url().'purchase_transaction/";','embed');  
        
        $this->template->add_js('$("document").ready(function(){
            $("body").on("change","#id_tipe_beli",function(){
                var a=$(this).val();
                if($(this).val()=="2"){
                    $(".panel_tambah").fadeOut(200);
                    $("#bypo").fadeIn(200);
                    
                }else{
                    $(".panel_tambah").fadeIn(200);
                    $("#bypo").fadeOut(200);
                }    
            });
            var enkrip="'.$this->enkrip().'";
            var fakturpt=$("#faktur_pt").val();
            var Tabeltrx = $("#data").DataTable({
                        "ajax":{
                            "url":"'.base_url('purchase_transaction/pt_detail/').'/"+fakturpt+"/"+enkrip+"/",
                            "dataType": "json"
                        },
                        "sServerMethod": "POST",
                        "bServerSide": true,
                         "paging":   false,
                        "deferRender": true,
                        "bFilter":false,
                         "ordering": false,  
                    });

             $("body").on("click","[data-load-faktur]",function(e) {
                e.preventDefault();
                var enkrip="'.$this->enkrip().'";
                var $this = $(this);
                var faktur = $this.data("load-faktur");
                var nofaktur = $this.data("faktur");
                $("#id_po").prop("val",nofaktur);
                alert(nofaktur);
                var po_url="'.base_url('purchase_transaction/get_po_detail/').'/"+nofaktur+"/"+enkrip+"/";
                // alert(po_url);
                if(faktur) {
                    // $($this.data("faktur-target")).load(faktur);
                    $("id_po").prop("val",nofaktur);
                    Tabeltrx.ajax.url(po_url).load();

                }


            });
        });
            $("#modal-id").on("shown.bs.modal", function (e) {
                // console.log(e.relatedTarget) // do something...
                var Temptbl = $("#datax.tabelpo").DataTable({
                    "ajax":{
                        "url":"'.base_url('purchase_transaction/getdatapo/').'",
                        "dataType": "json"
                    },
                    "sServerMethod": "POST",
                    "bServerSide": true,
                     "paging":   false,
                        "deferRender": true,
                        "bFilter":false,
                         "ordering": false,  
                });
            })
            

            $("body").on("click",".use_po", function(e){
                e.preventDefault();
                    var $this = $(this);
                    var faktur = $this.data("load-faktur");
                    var nofaktur = $this.data("faktur");
                    $("#id_po").prop("val",nofaktur);
                // alert("ok");
            });

                    


            ','embed');
        //<!-- $this->template->add_js('datepicker.js'); -->
        
        $this->template->load_view('purchase_transaction_view',array(
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
        if($this->isadmin()==1):
            $this->datatables->select('id,faktur_pt,tgl_pt,id_tipe_beli,id_po,tgl_jatuh_tempo,id_supplier,keterangan,ref_beli,id_stock_req,id_bayar,totalbayar,uangmuka,biayakirim,ppn,grandtotal,status,id_user,datetime,')
                            ->from('purchase_transaction');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('purchase_transaction/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>

                <a href='#outside' data-toggle='tooltip' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='$1'><i class='glyphicon glyphicon-edit'></i></a>
                <button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger'id='$1'><i class='glyphicon glyphicon-remove'></i></button>
                </div>" , 'id');
            $this->datatables->unset_column('id');

        else:
            $this->datatables->select('id,faktur_pt,tgl_pt,id_tipe_beli,id_po,tgl_jatuh_tempo,id_supplier,keterangan,ref_beli,id_stock_req,id_bayar,totalbayar,uangmuka,biayakirim,ppn,grandtotal,status,id_user,datetime,')
                            ->from('purchase_transaction');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('purchase_transaction/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a></div>" , 'id');
            $this->datatables->unset_column('id');
        endif;
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
    public function pt_detail($pt=null,$enkrip=null){
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

    function use_po($id){
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

    public function get($id=null){
        if($id!==null){
            echo json_encode($this->ptdb->get_one($id));
        }
    }
    function tables(){
        $this->load->view('purchase_transaction_data');
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
            $this->ptdb->save();
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
            $gen_pt="PT151100001";
        endif;
        return $gen_pt;
    }
     function get_new_pt(){
        echo $this->generate_new_pt();
    }
    

}

/** Module purchase_transaction Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
