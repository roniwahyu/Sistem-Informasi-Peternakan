<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class recording_medis extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->model('recording_medis_model','medisdb',TRUE);
        $this->session->set_userdata('lihat','recording_medis');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;

           
        $this->template->add_css('plugins/datapicker/datepicker3.css');
        $this->template->add_css('plugins/select2/select2.css');
        $this->template->add_css('custom.css');
        $this->template->add_js('plugins/datapicker/bootstrap-datepicker.js');
        $this->template->add_js('plugins/select2/select2.min.js');
        $this->template->add_js('datepicker.js');
        
        $this->template->add_js('datatables.js');
        $this->template->add_js('muria.js');
        $this->template->add_js('crud.js');
        $this->template->set_layout('dashboard');
    }

    public function index() {
        $this->template->set_title('Kelola Recording Medis');
        $this->template->add_js('var baseurl="'.base_url().'recording_medis/";','embed');  
        $this->template->load_view('recording_medis_view',array(
            'view'=>'recording_medis_data',
            'title'=>'Kelola Data Recording Medis',
            'subtitle'=>'Pengelolaan Recording Medis',
            'breadcrumb'=>array(
            'Recording_medis'),
        ));
    }
     public function baru($type=null) {
        $this->template->set_title('Kelola Recording Medis');
        $this->template->add_js('
            var baseurl="'.base_url().'recording_medis/";
            var enkrip="'.$this->enkrip().'";
            var brgsatuurl="'.base_url('barang_satuan').'/"; 
            ','embed');  
        $this->template->add_js('accounting.min.js');

        $this->template->add_js('
            $(".select2").select2();
            var faktur=$("#faktur").val();
            gettotal();
            $("#id_mitra").change(function(){
                 var that = this,
                            v = $(this).val();        
                            // alert(v);
                            get_kandang(v);
                            get_gudang(v);
            });
            $("#id_barang").change(function(){
                            var that = this,
                            v = $(this).val();
                            var urls=brgsatuurl+"satuan_barang/"+v+"/";
                            // alert(urls);
                            $("#id_satuan").attr("data-load-satuan",urls);
                            $("#id_satuan").attr("data-id",v);
                            get_satuan(v); 
                            console.clear();
                    });
             var Tabeltrx = $("#data").DataTable({
                        "ajax":{
                            "url":baseurl+"getdetail/"+enkrip+"/"+faktur,
                            "dataType": "json"
                        },
                        "sServerMethod": "POST",
                        "bServerSide": true,
                         "paging":   false,
                        "deferRender": true,
                        "bFilter":false,
                         "ordering": false,  
                    });
                $("body").on("click",".btn-add",function(e){
                    e.preventDefault();
                   
                    var faktur = $("#faktur").val();
                    var kode = $("#id_barang").val();
                    var qty = $("#jumlah_satuan").val();
                    var satuan = $("#id_satuan").val();
                    var umur = $("#umur").val();
                    
                    var datax={id_barang:kode,jumlah_satuan:qty,id_satuan:satuan,umur:umur,faktur_recording:$("#faktur").val(),ajax:1};
                    $(this).ready(function(){
                        $.ajax({
                            url:baseurl+"submit_detail/"+enkrip,
                            data:datax,
                            type:"POST",
                            success:function(msg){
                                //alert(msg);
                                $("#id_barang").prop("value","");
                                $("#jumlah_satuan").prop("value","");
                                $("id_satuan").prop("value","");
                                // $("#faktur_po").prop("value","");
                                $("id_satuan option").prop("selected", function() {
                                    return this.defaultSelected;
                                });
                                $("#id_barang option").prop("selected", function() {
                                    return this.defaultSelected;
                                });
                                Tabeltrx.clear(0).draw();
                                gettotal();

                            } });
                        });
                    console.clear();
                });
                 $("body").on("click",".del_detail",function(e){
                    e.preventDefault();
                    var del_data={id:$(this).attr("id"),ajax:1}
                    if(confirm("Anda Yakin Ingin Menghapus Item Ini?")){
                    $(this).ready(function(){
                            
                                $.ajax({
                                    url: baseurl+"delete_detail",
                                    type: "POST",
                                    data: del_data,
                                    success:function(msg){
                                         // $(".tabletemp").DataTable().clear(0).draw();                      
                                         Tabeltrx.clear(0).draw();    
                                         gettotal();
                                    }
                                });
                            });
                        }
                });
                $("body").on("click","#cancel",function(e){
                    e.preventDefault();
                    var del_data={faktur:$("#faktur").val(),ajax:1}
                    if(confirm("Anda Yakin Ingin Membatalkan Recording?")){
                    $(this).ready(function(){
                            
                                $.ajax({
                                    url: baseurl+"delete_bukti",
                                    type: "POST",
                                    data: del_data,
                                    success:function(msg){
                                         // $(".tabletemp").DataTable().clear(0).draw();                      
                                         Tabeltrx.clear(0).draw();    
                                         gettotal();
                                    }
                                });
                            });
                        }
                });
                $("#modal-notif").on("hidden.bs.modal", function(){
                        $(this).data("modal", null);
                            window.location=baseurl;
                    });
            function get_kandang(id){
                $("select#id_kandang option").remove();
                $.getJSON(baseurl+"get_dropdown_kandang/"+enkrip+"/"+id, function (data) {
                         $.each(data, function (index, item) {
                             $("#id_kandang").append(
                                  $("<option></option>").val(index).html(item)
                              );
                         });
                     });
                console.clear();
            }
            function get_satuan(id){
                $("select#id_satuan option").remove();
                 $.getJSON(baseurl+"dropdown_satuan/"+id, function (data) {
                         $.each(data, function (index, item) {
                             $("#id_satuan").append(
                                  $("<option></option>").val(index).html(item)
                              );
                         });
                     });
                console.clear();
            }
            function get_gudang(id){
                $("select#id_gudang option").remove();
                $.getJSON(baseurl+"get_dropdown_gudang/"+enkrip+"/"+id, function (data) {
                         $.each(data, function (index, item) {
                             $("#id_gudang").append(
                                  $("<option></option>").val(index).html(item)
                              );
                         });
                     });
                console.clear();
            }
            function gettotal(){
                var faktur=$("#faktur").val();
                //alert(faktur);
                $.get(baseurl+"get_total/"+enkrip+"/"+faktur, 
                    function(dt, status){
                        var va=JSON.parse(dt);
                        if(va.total>0){
                            $("#total").val(va.total).trigger("change");
                            $("#totalx").val(accounting.formatMoney(va.total,"Rp ",2)).trigger("change");
                        }else{
                             $("#total").val(0).trigger("change");
                             $("#totalx").val(0).trigger("change");
                        }
                    }
                );
                console.clear();
            };
            ','embed');  
        switch ($type) {
            case 'obat':
                $recording='15';
                $tipestok='Kurang';
            break;
            case 'vaksin':
                $recording='16';
                $tipestok='Kurang';
            break;
           
            default:
                $recording='15';
                $tipestok='Kurang';
            break;

            
        }
        $this->session->set_userdata('new',true);
        $this->session->set_userdata('edit',false);
        $default['total']=0;
        $default['tanggal']=date('Y-m-d');
        $default['id_recording']=$recording;
        $default['tipe_stok']=$tipestok;
        $default['faktur']=$this->gen_faktur();
        $this->template->load_view('recording_medis_view',array(
            'default'=>$default,
            'opt_mitra'=>$this->medisdb->dropdown_mitra(),
            'opt_gudang'=>$this->medisdb->dropdown_gudang(),
            // 'opt_gudang'=>array(),
            // 'opt_kandang'=>$this->medisdb->dropdown_kandang(),
            'opt_kandang'=>array(),
            'opt_satuan'=>array(),
            'opt_medis'=>$this->medisdb->dropdown_medis(),
            'view'=>'form_recording_medis',
            'title'=>'Kelola Data Recording Medis',
            'subtitle'=>'Pengelolaan Recording Medis',
            'breadcrumb'=>array(
            'Recording_medis'),
        ));
        
    }
     
     //<!-- Start Primary Key -->
    
    function enkrip(){
        return md5($this->session->userdata('lihat').":".$this->getuser()."+".date('H:m'));
        // echo $this->session->userdata('purchase_order');
    }
    public function getdatatablesx(){
        if($this->isadmin()==1):
            $this->datatables->select('id,faktur,tanggal,id_kandang,id_gudang,id_mitra,id_recording,akun_perkiraan,total,tipe_stok,is_trx,is_void,is_jrnl,is_post,date_posted,id_user,datetime,')
                            ->from('recording_medis');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('recording_medis/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>

                <a href='#outside' data-toggle='tooltip' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='$1'><i class='glyphicon glyphicon-edit'></i></a>
                <button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger'id='$1'><i class='glyphicon glyphicon-remove'></i></button>
                </div>" , 'id');
            $this->datatables->unset_column('id');

        else:
            $this->datatables->select('id,faktur,tanggal,id_kandang,id_gudang,id_mitra,id_recording,akun_perkiraan,total,tipe_stok,is_trx,is_void,is_jrnl,is_post,date_posted,id_user,datetime,')
                            ->from('recording_medis');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('recording_medis/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a></div>" , 'id');
            $this->datatables->unset_column('id');
        endif;
        echo $this->datatables->generate();
    }
    public function getdatatables(){
      
            $this->datatables->select('id,faktur,tanggal,kandang,gudang,namagudang,mitra,namamitra,recording,total')
                            ->from('00-00-15-00-view-rekam-medis');
            $this->datatables->edit_column('namagudang','<div class="text-left">$2 ($1)</div>','gudang,namagudang');
            $this->datatables->edit_column('namamitra','<div class="text-left">$2 ($1)</div>','mitra,namamitra');
            $this->datatables->edit_column('total','<div class="text-right">$1</div>','rp(total)');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('recording_medis/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a></div>" , 'id');
            $this->datatables->unset_column('id,gudang,mitra');
       
        echo $this->datatables->generate();
    }
    public function getdetail($enkrip,$faktur){
    
            $this->datatables->select('id_detail,faktur,Kode,Nama,umur,jumlah_satuan,satuan,harga_satuan,subtotal,')
                            ->from('00-00-15-01-view-rekam-medis-detail');
                        $this->datatables->where('faktur',$faktur);
            $this->datatables->edit_column('harga_satuan','<div class="text-right">$1</div>','rp(harga_satuan)');
            $this->datatables->edit_column('subtotal','<div class="text-right">$1</div>','rp(subtotal)');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('recording_medis_detail/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a></div>
                <a id='$1' href='#' class='del_detail btn btn-danger btn-xs'><i class='fa fa-remove'></i> </a></div>" , 'id_detail');
            $this->datatables->unset_column('id_detail,Kode');
        echo $this->datatables->generate();
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
        
       

        $this->load->view('recording_medis_form_inside');
           
    }

    public function get($id=null){
        if($id!==null){
            echo json_encode($this->medisdb->get_one($id));
        }
    }
    function tables(){
        $this->load->view('recording_medis_data');
    }

    function getone($id=null){
        if($id!==null){
            $data=$this->medisdb->get_one($id);
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
            $this->medisdb->update($this->input->post('id'));
          }else{
            $this->medisdb->save();
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id')){
                $this->medisdb->update($this->input->post('id'));
              }else{
                $this->medisdb->save();
              }
          }
        }
    }
    public function submit_detail($id){
        $id=$this->input->post('id_detail');
        $data = array(
        
            'id_recording_medis' => $this->input->post('id_recording_medis', TRUE),
            'faktur_recording' => $this->input->post('faktur_recording', TRUE),
            'id_record' => $this->input->post('id_record', TRUE),
            'id_barang' => $this->input->post('id_barang', TRUE),
            'jumlah_satuan' => $this->input->post('jumlah_satuan', TRUE),
            'id_satuan' => $this->input->post('id_satuan', TRUE),
            'umur' => $this->input->post('umur', TRUE),
            'user_id' => $this->session->userdata('user_id'),
           
            'datetime' => date('Y-m-d H:m:s'),
           
        );
        if ($this->input->post('ajax')){
          if ($id){
            $this->medisdb->update($id);
          }else{
            $this->medisdb->save_detail($data);
          }

        }else{
          if ($this->input->post('submit')){
              if ($id){
                $this->medisdb->update($id);
              }else{
                $this->medisdb->save_detail($data);
              }
          }
        }
    }

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->medisdb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
     public function delete_detail(){

        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->medisdb->delete_detail($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    } 
    public function delete_bukti(){
        $faktur=$this->input->post('faktur');
        print_r($faktur);
        if(isset($_POST['ajax'])){
            if(!empty($faktur)){
                $this->medisdb->delete_by_bukti($faktur);
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    } 
    function get_medis(){
        echo json_encode($this->medisdb->get_medis());
    } 
    function get_dropdown_kandang($enkrip,$id=null){
        echo json_encode($this->medisdb->dropdown_kandang($id));
    }
    function get_dropdown_gudang($enkrip,$id=null){
        echo json_encode($this->medisdb->dropdown_gudang($id));
    }
    function get_total($enkrip,$faktur=null){
        echo json_encode($this->medisdb->get_total($faktur));
    }
    private function gen_faktur(){
        $last=$this->medisdb->get_last();
        // print_r($last);
        if(!empty($last)):
            $first=substr($last['faktur'],0,2);
            if($first=='RM'||$first==null){
                $first='RM';
            }
            $left=substr($last['faktur'],2,4);
            $right=substr($last['faktur'],-5);
            $nopt=number_format($right); 
            
            
            $newpo=strval($nopt+1);
            $newpo2=substr(strval("00000$newpo"),-5);

        $tahun=substr($left,0,2);
        $bulan=substr($left,2,4);
        
            if($tahun<>date('y')):
                $tahun=date('y');
                if($bulan==date('m')):
                    $gen=strval($first.$tahun.$bulan."00001");
                elseif($bulan<>date('m')):
                    $bulan=date('m');
                    $gen=strval($first.$tahun.$bulan."00001");
                endif;
            elseif($tahun==date('y')):
                if(intval($bulan)<>date('m')):
                    $bulan=date('m');
                    $gen=strval($first.$tahun.$bulan."00001"); 
                elseif($bulan==date('m')):
                    $gen=strval($first.$tahun.$bulan.$newpo2);
                endif;
            endif;
        else:
            // $gen="PT151100001";
            $gen="RM".date('ym')."00001";
        endif;
        return $gen;
    }
     function get_new_faktur(){
        echo $this->gen_faktur();
    }

    

}

/** Module recording_medis Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
