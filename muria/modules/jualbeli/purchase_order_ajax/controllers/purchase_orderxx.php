2<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class purchase_order extends MX_Controller {

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
       
        
        $this->template->add_js('datatables.js');
        $this->template->add_js('muria.js');
        $this->template->add_js('crud.js');
        $this->template->set_layout('dashboard');
    }

    public function index() {
        $this->template->set_title('Kelola Purchase_order');
        
        $this->template->add_js('var baseurl="'.base_url().'purchase_order/";','embed');  
        $this->template->add_js('
            $(function(){
               $.get("'.base_url('purchase_order/generate_new_po/').'", function(datan, status){
                    $("#faktur_po").prop("value",datan);
                });
            });
                var TempTbl=$(".tabletemp").DataTable({
                    "ajax":{
                        "url":"'.base_url('purchase_order/get_po_temp').'",
                        "dataType": "json"
                    },
                    "sServerMethod": "POST",
                    "bServerSide": true,
                    "bAutoWidth": true,
                    // "lengthChange": true,
                    "bSortClasses": false,
                    "bscrollCollapse": true,    
                     scrollY: 400,
                    paging: false,
                    
                     
                });

            // TempTbl.clear(0).draw();

                 $("body").on("click",".btn-add",function(){
                   
                    var faktur = $("#faktur_po").val();
                    var kode = $("#Kode").val();
                    var qty = $("#Qty").val();
                    var satuan = $("#Satuan").val();
                    var datax={id_barang:kode,jumlah:qty,id_satuan:satuan,id_po:faktur,ajax:1};


                    $(this).ready(function(){
                        $.ajax({
                            url:"'.base_url('purchase_order/submit_temp').'",
                            data:datax,
                            type:"POST",
                            success:function(msg){
                                $("#Kode").prop("value","");
                                $("#Qty").prop("value","");
                                $("#Satuan").prop("value","");
                                // $("#faktur_po").prop("value","");
                                TempTbl.clear(0).draw();
                            } });
                        });
                    });
                $("body").on("click",".delete_temp",function(e){
                    e.preventDefault();
                    var del_data={id:$(this).attr("id"),ajax:1}
                    if(confirm("Anda Yakin Ingin Menghapus Item Ini?")){
                    $(this).ready(function(){
                            
                                $.ajax({
                                    url: "'.base_url('purchase_order/delete_temp').'",
                                    type: "POST",
                                    data: del_data,
                                    success:function(msg){
                                         // $(".tabletemp").DataTable().clear(0).draw();                      
                                         TempTbl.clear(0).draw();                      
                                    }
                                });
                            });
                        }
                });
            
           
            
            
        ','embed');  
        

        //<!-- $this->template->add_js('datepicker.js'); -->
        
        $this->template->load_view('purchase_order_view',array(
                'nopo'=>$this->generate_new_po(),
                'opt_supplier'=>$this->podb->dropdown_supplier(),
                'opt_barang'=>$this->podb->dropdown_barang(),
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
        echo $gen_po;
    }    

    public function getdatatables(){
        if($this->isadmin()==1):
            $this->datatables->select('id,faktur_po,tgl_po,id_supplier,keterangan,ref_beli,id_stock_req,id_bayar,totalbayar,uangmuka,grandtotal,biaya_kirim,status,tgl_kirim_po,tgl_kedaluarsa_po,id_user,datetime,')
                            ->from('purchase_order');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('purchase_order/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>

                <a href='#outside' data-toggle='tooltip' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='$1'><i class='glyphicon glyphicon-edit'></i></a>
                <button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger'id='$1'><i class='glyphicon glyphicon-remove'></i></button>
                </div>" , 'id');
            $this->datatables->unset_column('id');

        else:
            $this->datatables->select('id,faktur_po,tgl_po,id_supplier,keterangan,ref_beli,id_stock_req,id_bayar,totalbayar,uangmuka,grandtotal,biaya_kirim,status,tgl_kirim_po,tgl_kedaluarsa_po,id_user,datetime,')
                            ->from('purchase_order');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('purchase_order/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a></div>" , 'id');
            $this->datatables->unset_column('id');
        endif;
        echo $this->datatables->generate();
    }
    public function get_po_temp(){
               $this->datatables->select('id_detail,id_po,Kode,Nama,jumlah,satuan_kemasan')
                            ->from('00-00-03-03-view-detail-po-temp');
            $this->datatables->add_column('edit',"<div class='btn-group'>
               <button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete_temp btn btn-xs btn-danger' id='$1'><i class='fa fa-minus'></i></button>
                </div>" , 'id_detail');
            // $this->datatables->unset_colum   n('id_detail');
        echo $this->datatables->generate();
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
        
       

        $this->load->view('purchase_order_form_inside');
           
    }

    public function get($id=null){
        if($id!==null){
            echo json_encode($this->podb->get_one($id));
        }
    }
    function tables(){
        $this->load->view('purchase_order_data');
    }
    function get_barang_satuan(){

    }
    function tabeldetail(){
        $data=$this->podb->getdetail_po_temp();
         if(!empty($data)){
            $div='';
            $div.='<table id="datatables" class="tabletemp table table-condensed table-bordered table-striped" style="font-size:12px">';
            $div.="<thead>";
       
            $div.="<tr>";
            $div.="<th class='text-center'>#</th>";
            $div.="<th class='text-center'>#PO</th>";
            $div.="<th class='text-center'>Kode</th>";
            $div.="<th class='text-center'>Barang</th>";
            $div.="<th class='text-center'>Jumlah</th>";
            $div.="<th class='text-center'>Satuan</th>";
            $div.="<th class='text-center'>Harga</th>";
            $div.="<th class='text-center'>Sub Total</th>";
            $div.="<th class='text-center'>#</th>";
          
            $div.="</tr>";
            $div.="</thead><tbody>";
            $jml=count($data);
            $total=0;
            // print_r($data);
            $j=0;
            for ($i=0; $i <$jml ; $i++) { 
                # code...
                
                foreach($data as $v){
                $div.="<tr>";
                   $div.="<td>".$j."</td>";
                   $div.="<td>".($v['id_po'])."</td>";
                   $div.="<td>".($v['Kode'])."</td>";
                   $div.="<td>".($v['Nama'])."</td>";
                   $div.="<td>".($v['jumlah'])."</td>";
                   $div.="<td>".($v['satuan_kemasan'])."</td>";
                   $div.="<td class='text-right'>".rp($v['harga_kemasan'])."</td>";
                   $div.="<td class='text-right'>".rp($v['subtot_kemasan'])."</td>";
                   $div.="<td ><button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete_temp btn btn-xs btn-danger' id='".$v['id_detail']."'><i class='fa fa-minus'></i></button></td>";
                   $div.="</tr>";
                   $j++;
                }
                $total=$total+$v['subtot_kemasan'];
                
            }
            
           
            $div.='</tbody><tfoot><tr>';
            $div.='<th colspan="6" class="text-right">Total</th>';
            $div.='<th class="text-right">'.rp($total).'</th>';
            $div.='</tr></tfoot>';
            $div.='</table>';

        }else{
            $div=array();
        }
        return $div;

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
       return json_encode($result);
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

    public function submit(){
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
    } 
    public function submit_temp(){
         $data = array(
        
            'id_po' => $this->input->post('faktur_po', TRUE),
           
            'id_barang' => $this->input->post('id_barang', TRUE),
           
            'jumlah' => $this->input->post('jumlah', TRUE),
           
            'id_satuan' => $this->input->post('id_satuan', TRUE),
           
            'diskon1' => $this->input->post('diskon1', TRUE),
           
            'diskon2' => $this->input->post('diskon2', TRUE),
           
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
    

}

/** Module purchase_order Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
