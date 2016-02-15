<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class purchase_transaction extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->model('purchase_transaction_model','ptdb',TRUE);
        $this->load->model('supplier_model','spdb',TRUE);
        $this->session->set_userdata('lihat','purchase_transaction');
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
    public function indexx(){
         $this->template->load_view('purchase_transaction_view',array(
            'opt_supplier'=>$this->ptdb->dropdown_supplier(),
                 'opt_barang'=>array(),
                'opt_satuan'=>array(),
                'opt_bayar'=>$this->ptdb->dropdown_pembayaran(),
            'view'=>'purchase_transaction_table',
            'title'=>'Kelola Data Order Pembelian (PO)',
            'subtitle'=>'Pengelolaan Order Pembelian (PO)',
            'breadcrumb'=>array(
                'Order Pembelian (PO)',),
            ));

    }
    public function index(){
        $this->template->set_title('Kelola Transaksi Pembelian');
        
        $this->template->add_js('var baseurl="'.base_url().'purchase_transaction/";','embed');  
        

        //<!-- $this->template->add_js('datepicker.js'); -->
        
        $this->template->load_view('transaksi_beli_view',array(
                        'view'=>'purchase_transaction_data',
                        'title'=>'Kelola Data Transaksi Pembelian',
                        'subtitle'=>'Pengelolaan Transaksi Pembelian',
                        'breadcrumb'=>array(
                            'Transaksi Pembelian'),
                        ));
    }
    public function baru() {
        $this->template->set_title('Kelola Transaksi Pembelian');
        
        $this->template->add_js('accounting.min.js');
        $this->template->add_js('
            var baseurl="'.base_url('purchase_transaction').'/"; 
            var pourl="'.base_url('purchase_order').'/"; 
            var spurl="'.base_url('supplier').'/"; 
            var jnsbrgurl="'.base_url('jenis_barang').'/"; 
            var brgurl="'.base_url('barang').'/"; 
            var brgsatuurl="'.base_url('barang_satuan').'/"; 
            var brgharga="'.base_url('barang_harga').'/"; 
            var satuanurl="'.base_url('barang_satuan').'/"; 
            var enkrip="'.$this->enkrip().'";','embed');  
        
        $this->session->set_userdata('new',true);
        $this->session->set_userdata('edit',false);
        $this->template->add_js('modules/purchase_transaction.js');
        $default['totalbayar']=0;
        $default['tgl_jatuh_tempo']=date('Y-m-d');
        $default['tgl_pt']=date('Y-m-d');
        $this->template->load_view('transaksi_beli_view',array(
            'default'=>$default,
            'view'=>'form_transaksi_beli',
            
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
    function edit($id){
        
         $this->template->add_js('accounting.min.js');
        $this->template->add_js('
            var baseurl="'.base_url('purchase_transaction').'/"; 
            var pourl="'.base_url('purchase_order').'/"; 
            var spurl="'.base_url('supplier').'/"; 
            var jnsbrgurl="'.base_url('jenis_barang').'/"; 
            var brgurl="'.base_url('barang').'/"; 
            var brgsatuurl="'.base_url('barang_satuan').'/"; 
            var brgharga="'.base_url('barang_harga').'/"; 
            var satuanurl="'.base_url('barang_satuan').'/"; 
            var enkrip="'.$this->enkrip().'";','embed');  
        
      
        $this->template->add_js('modules/purchase_transaction.js');
        $trx_beli=$this->ptdb->get_one($id);
        $po=$this->ptdb->getonepo($trx_beli['id_po']);
        $this->session->set_userdata('edit',true);
        $this->session->set_userdata('new',false);
        $this->session->set_userdata('jenis_trx',$trx_beli['id_tipe_beli']);
        // print_r($trx_beli);
        // print_r($po);
         $this->template->load_view('purchase_transaction_view',array(
            'default'=>$trx_beli,
            'faktur_pt'=>$trx_beli['faktur_pt'],
            'id_po'=>$trx_beli['id_po'],
            'faktur_po'=>isset($po['faktur_po'])?$po['faktur_po']:'',
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

                </div>" , 'id');
            $this->datatables->unset_column('id,po');

      
        echo $this->datatables->generate();
    }
    public function getdatapo($enkrip=null,$id=null){

        $enkrip=$this->enkrip();
        $this->datatables->select('faktur_po,tgl_po,namasupplier,totalbayar,status,idpo,md5id,idsupplier')
            ->from('00-00-03-01-view-po-trx');
            // ->from('00-00-03-00-view-purchase-order');
        if(!empty($id)):
            $this->datatables->where('idsupplier',$id);
        endif;
        $this->datatables->where('idpt',null);
        $this->datatables->edit_column('status','<div class="text-center">$1</div>','status');           
        $this->datatables->edit_column('totalbayar','<div class="text-right">$1</div>','rp(totalbayar)');    
        $this->datatables->add_column('edit',"<div class='btn-group'>
                <a href='#' data-dismiss='modal' data-faktur-target='#data' data-load-faktur='".base_url('purchase_order/use_po/$1/'.$enkrip)."' title='Use' class='use_po btn btn-xs btn-success' id='$1' data-faktur='$2'><i class='fa fa-check'></i> Gunakan</a> 
                </div>" , 'idpo,faktur_po,md5id');
    

        $this->datatables->unset_column('idpo,md5id,idsupplier');
        
        echo $this->datatables->generate();

    } 
    public function pt_detail($enkrip=null,$pt=null){

        $enkrip=$this->enkrip();
        $this->datatables->select('faktur_pt,Kode,Nama,jumlah,satuan,harga_satuan,subtotal,id_pt,id_detail')
            ->from('00-00-06-00-view-transaksi-beli-detail');
        $this->datatables->where("faktur_pt",$pt);

        $this->datatables->edit_column('harga_satuan','<div class="text-center">$1</div>','rp(harga_satuan)');           
        $this->datatables->edit_column('subtotal','<div class="text-right">$1</div>','rp(subtotal)');    
        if($this->session->userdata('jenis_trx')==2):
            $style="disabled";
        else:
            $style="";
        endif;
        $this->datatables->add_column('edit',"<div class='btn-group'>
               <button data-toggle='tooltip' data-placement='top' title='Hapus' class='".$style." delete_temp btn btn-xs btn-danger' id='$1'><i class='fa fa-minus'></i></button>
                </div>" , 'id_detail');
        /*$this->datatables->add_column('edit',"<div class='btn-group'>
                <a href='#' data-faktur-target='#data' data-load-faktur='".base_url('purchase_order/use_po/$1/'.$enkrip)."' title='Use' class='use_po btn btn-xs btn-success' id='$1' data-faktur='$2'><i class='fa fa-check'></i> Gunakan</a> 
                </div>" , 'id_detail,faktur_pt,md5id');*/
    

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
    function getorder($enkrip,$id=null){
        $faktur=($this->ptdb->getorder_supplier($id));
        print_r(count($faktur));
    }
    function tabelorder($enkrip,$id=null){
        $this->datatables->select('idpo,faktur_po,tgl_po,kdsupplier,namasupplier,totalbayar')
                            ->from('00-00-03-00-view-purchase-order');
            $this->datatables->where('idsupplier',$id);
            $this->datatables->edit_column('namasupplier','$1 ($2)','namasupplier,kdsupplier');
            $this->datatables->edit_column('totalbayar','<div class="text-right">$1</div>','rp(totalbayar)');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('sales_order/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a></div>" , 'idpo');
            $this->datatables->unset_column('idpo,kdsupplier,idsupplier');
       
        echo $this->datatables->generate();

    }
    //get po detail dengan menggunakan enkripsi --> "id_user+Jam:Menit" saat ini
    function get_po_detail($po=null,$md5){
        if($md5==$this->enkrip()):
            echo $this->po_detail($po);
        endif;
    }
     function get_pt_detail_total($enkrip=null,$pt=null){

        $total=$this->ptdb->get_detail_total($pt);
        // print_r($total);
        if($total!=null):
            echo ($total['total']);
        else:
            echo "0";
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
            $div.='<a class="btn btn-success btn-md" href="'.base_url('purchase_transaction/cetak_pt/'.$enkrip.'/'.$id.'/').'"><i class="fa fa-print"></i> Cetak Order Jemput Barang (Pickup Order) </a>';
            // $div.='<a class="btn btn-info btn-md" href="'.base_url('purchase_transaction/use_pt/'.$enkrip.'/'.$id.'/').'"> Proses Transaksi Pembelian <i class="fa fa-arrow-right"></i></a>';
            $div.='</div>';
            $div.='<table class="table table-condensed table-striped table-bordered">';
            $div.='<tbody>';
            // $div.='<tr>';
            $div.='<tr><th># Trx. Pembelian:</th><td>'.$data['faktur_pt'].'</td><th>Tanggal Trx.</th><td>'.$data['tgl_pt'].'</td></tr>';
            if($data['id_tipe_beli']==1){
                $beli='Langsung';
            }else{
                $beli='Dari Order Pembelian'." <br><span class='badge badge-info'>".$data['po']."</span>";
            }
            $div.='<tr><th>Tipe Transaksi:</th><td>'.$beli.'</td><th>Tanggal Order Pembelian</th><td>'.$data['tgl_po'].'</td></tr>';
            $div.='<tr><th>Supplier:</th><td>'.$data['Nama'].' ('.$data['Kode'].')</td><th>Tanggal Jatuh Tempo</th><td>'.$data['tgl_jatuh_tempo'].'</td></tr>';
        
            $div.="</tbody></table><table class='table table-condesed table-striped'><tbody>";
            $div.='<tr><th class="text-center">No</th><th class="text-center">Kode</th>
            <th class="text-center">Nama Barang</th>
            <th class="text-center">Jumlah</th>
            <th class="text-center">Satuan</th>
            <th class="text-center">Harga</th>
            <th class="text-center">Subtotal</th>
            </tr>';
            $detail=$this->ptdb->get_detail_pt($data['id']);
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
                .rp($detail[$i]['harga_satuan']).'</td><td class="text-right">'
                .rp($detail[$i]['subtotal']).'</td></tr>';
                $j++;

            }
            $div."</tbody><tfoot>";
            $div.="<tr><td colspan='5'></td><th class='text-right'>
                <h5>Total</h5>
                <h5>Biaya Kirim/Pickup</h5>
                <h5>PPn</h5>
                <h3>Grand Total</h3>
                <h5>Uang Muka</h5>
                <h5>Sisa (Hutang)</h5>
                </th><td class='text-right'>
                    <h5>".rp($data['totalbayar'])."</h5>
                    <h5>".rp($data['biayakirim'])."</h5>
                    <h5>".rp($data['ppn'])."</h5>
                    <h3>".rp($data['grandtotal'])."</h3>
                    <h5>".rp($data['uangmuka'])."</h5>";
            $sisa=$data['grandtotal']-$data['uangmuka'];
            $div.="<h5>".rp($sisa)."</h5>

            </td></tr>";
            
            $div.="</tfoot></table>";
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
                $idpt=$this->ptdb->save();
                $pt=$this->input->post('faktur_pt');
                echo $this->ptdb->update_detail($pt,$idpt);
            else: 
                $idpt=$this->ptdb->save();
                $po=$this->input->post('faktur_po');
                $pt=$this->input->post('faktur_pt');
                // print_r($po);
                $detailpo=$this->ptdb->get_detail_po($po);
                print_r($detailpo);
                $jml=count($detailpo);
                for ($i=0; $i < $jml; $i++) { 
                    # code...
                    $datadetail[]=array(
                        'id_pt'=>$idpt,
                        'pt'=>$pt,
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
    function submit_detail(){
        $data = array(
        
            'id_pt' => $this->input->post('id_pt', TRUE),
            'pt' => $this->input->post('pt', TRUE),
           
            'id_barang' => $this->input->post('id_barang', TRUE),
           
            'jumlah' => $this->input->post('jumlah', TRUE),
           
            'id_satuan' => $this->input->post('id_satuan', TRUE),
                    
            'id_user' => $this->getuser(),
           
            'datetime' => date('Y-m-d H:m:s'),
           
        );
        if ($this->input->post('ajax')){
          if ($this->input->post('id_detail')){
            $this->ptdb->update($this->input->post('id_detail'));
          }else{
            $this->ptdb->save_detail($data);
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id_detail')){
                $this->ptdb->update($this->input->post('id_detail'));
              }else{
                $this->ptdb->save_detail($data);
              }
          }
        }
    }

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $pt=$this->ptdb->get_one($this->input->post('id'));
                $faktur_pt=$pt['faktur_pt'];
                $this->ptdb->delete($this->input->post('id'));
                $this->ptdb->delete_detail_pt($faktur_pt);
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
     public function delete_detail(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->ptdb->delete_detail_id($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    } 
    public function delete_detail_pt(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->ptdb->delete_detail_pt($this->input->post('id'));
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
            // echo "<pre>";
            // print_r($data);
            $div='';
            $div.='<table class="table table-condensed table-striped table-bordered">';
            $div.='<tbody>';
            // $div.='<tr>';
            $div.='<tr><th>#Faktur PT:</th><td>'.$data['faktur_pt'].'</td><th>Tanggal Transaksi</th><td>'.$data['tgl_pt'].'</td></tr>';
            $div.='<tr><th>Supplier:</th><td>'.$data['Nama'].' ('.$data['Kode'].')</td><th>Tanggal Kirim</th><td>'.$data['tgl_jatuh_tempo'].'</td></tr>';
        
            $div.="</tbody></table><table class='table table-condesed table-striped'><tbody>";
            $div.='<tr><th class="text-center">No</th><th class="text-center">Kode</th>
            <th class="text-center">Nama Barang</th>
            <th class="text-center">Jumlah</th>
            <th class="text-center">Satuan</th>
            <th class="text-center">Harga</th>
            <th class="text-center">Subtotal</th>
            </tr>';
            $detail=$this->ptdb->get_detail_pt($data['id']);
            // print_r($detail);
            // echo "</pre>";
            $jdetail=count($detail);
            $j=1;
            for ($i=0; $i <$jdetail ; $i++) { 
                # code...
                
                $div.='<tr ><td class="text-center">'.$j.'</td><td class="text-center">'
                .$detail[$i]['Kode'].'</td><td>'
                .$detail[$i]['Nama'].'</td><td class="text-center">'
                .$detail[$i]['jumlah'].'</td><td class="text-center">'
                .$detail[$i]['satuan'].'</td><td class="text-right">'
                .rp($detail[$i]['harga_satuan']).'</td><td class="text-right">'
                .rp($detail[$i]['subtotal']).'</td></tr>';
            $j++;

            }
            $div.="<tr><td colspan='5'></td><th class='text-right'><h3>Total</h3></th><th class='text-right'><h3>".rp($data['totalbayar'])."</h3></th></tr>";
            
            $div.="</tbody></table>";
            $supplier=$this->spdb->get_one($data['id_supplier']);
            // print_r($supplier);
            $this->template->set_layout('cetak');
            $this->template->load_view('cetak_pt',array(
                'content'=>$div,
                'data'=>$data,
                'detail'=>$detail,
                'supplier'=>$supplier,
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
