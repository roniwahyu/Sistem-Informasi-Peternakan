<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class purchase_request extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
         $this->load->library('encrypt');
        $this->load->model('purchase_request_model','reqdb',TRUE);
        $this->load->model('kartustok_model','stokdb',TRUE);
        $this->load->model('jurnal_model','jrdb',TRUE);
        $this->load->model('jurnal_detail_model','jrdetaildb',TRUE);
        $this->session->set_userdata('lihat','purchase_request');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;

           
        
        $this->template->add_js('datatables.js');
        $this->template->add_js('muria.js');
        $this->template->add_js('plugins/select2/select2.min.js');
         $this->template->add_css('plugins/datapicker/datepicker3.css');
        $this->template->add_js('plugins/datapicker/bootstrap-datepicker.js');
        $this->template->add_js('datepicker.js');
       
        $this->template->add_js('crud.js');
        $this->template->set_layout('dashboard');
    }

    public function index() {
        $this->template->set_title('Kelola Permintaan Barang');
        $this->template->add_js('var baseurl="'.base_url().'purchase_request/";','embed');  
        $this->template->load_view('purchase_request_view',array(
            'view'=>'purchase_request_data',
            'title'=>'Kelola Data Permintaan Barang',
            'subtitle'=>'Pengelolaan Permintaan Barang',
            'breadcrumb'=>array(
            'Permintaan Barang'),
        ));
    }
     public function baru() {
        //pada purchase request ini telah digunakan beberapa teknik enkripsi dan pengamanan data
        //enkripsi dan metode pengamanan data telah diujicoba 08022016
        //menggunakan library encryption, dan sedikit modifikasi pada helper untuk function enkrip dan dekrip
        
        $data["hash"] = '';
    
        //if usur submits the form, 
        // if ($this->input->post('userinput')) {
        //get the hash result
        // $new = $this->encrypt->encode("new");
        $new = enkrip("new");
        // $edit = $this->encrypt->encode("edit");
        $edit = enkrip("edit");
        $token=enkrip(now());
        $hash["new"] = $new;
        $hash["edit"] = $edit;
        $hash["token"] = $token;
        // print_r($token);
        // }
        // print_r($new);
       /* $enc=enkrip("aku");
        print_r($enc);
        echo "<br>";
        $dec=dekrip($enc);
        print_r($dec);*/
        // $this->session->set_userdata('new',true);
        $this->session->set_userdata($new,true);
        $this->session->set_userdata('secureit',$token);
        // $this->session->set_userdata('edit',false);
        $this->session->set_userdata($edit,false);
        $last=$this->reqdb->get_last();
        $default['faktur']=genfaktur($last['faktur'],"RQ");
        // $faktur=$default['faktur'];
        // print_r($faktur);
        $this->template->add_js('plugins/select2/select2.min.js');
        $this->template->add_css('plugins/select2/select2.min.css');
        $this->template->set_title('Kelola Permintaan Barang');
        $this->template->add_js('
            var baseurl="'.base_url().'purchase_request/";
            var enkrip="'.$this->enkrip().'";
            var brgsatuurl="'.base_url('barang_satuan').'/";
            $(".select2").select2(); 
            ','embed');  
            // var enfaktur="'.enkrip($faktur).'/";
        $this->template->add_js('modules/recording.js');
        $default['tanggal']=date('Y-m-d');

        $default['is_approved']=true;
        $this->template->load_view('purchase_request_view',array(
            'default'=>$default,
            'view'=>'form_request',
            'opt_gudang'=>$this->reqdb->dropdown_gudang(),
            'opt_barang'=>$this->reqdb->dropdown_barang(),
            'opt_mitra'=>$this->reqdb->dropdown_mitra(),
            'opt_kandang'=>array(),
            'opt_satuan'=>array(),
            'hash'=>$hash,
          
            'title'=>'Kelola Data Permintaan Barang',
            'subtitle'=>'Pengelolaan Permintaan Barang',
            'breadcrumb'=>array(
            'Permintaan Barang'),
        ));
        
    }
     
     //<!-- Start Primary Key -->
    

    public function getdatatables(){
        $enkrip=$this->enkrip();
        if($this->isadmin()==1):
            $this->datatables->select('id,faktur,tanggal,tanggal_tempo,id_mitra,id_gudang,id_kandang,keterangan,catatan,user_id,is_approved,datetime,')
                            ->from('purchase_request');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('purchase_request/getoneview/'.$enkrip.'/'.'$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>

                <a href='#outside' data-toggle='tooltip' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='$1'><i class='glyphicon glyphicon-edit'></i></a>
                <button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger'id='$1'><i class='glyphicon glyphicon-remove'></i></button>
                </div>" , 'id');
            $this->datatables->unset_column('id');

        else:
            $this->datatables->select('id,faktur,tanggal,tanggal_tempo,id_mitra,id_gudang,id_kandang,keterangan,catatan,user_id,is_approved,datetime,')
                            ->from('purchase_request');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('purchase_request/getoneview/'.$enkrip.'/'.'$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a></div>" , 'id');
            $this->datatables->unset_column('id');
        endif;
        echo $this->datatables->generate();
    }
     public function getdetail($enkrip,$faktur){
            // $dec=dekrip($faktur);
            // print_r($dec);
            $this->datatables->select('id_detail,faktur,Kode,Nama,jumlah,satuan,keterangan')
                            ->from('00-00-17-01-view-purchase-request-detail');
                        // $this->datatables->where('faktur',$dec);
                        $this->datatables->where('faktur',$faktur);
         
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('recording_pakan_detail/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a></div>
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
    function get_total($enkrip=null,$faktur=null){
        echo json_encode(array());
    }
    function enkrip(){
        return md5($this->session->userdata('lihat').":".$this->getuser()."+".date('H:m'));
        // echo $this->session->userdata('purchase_request');
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
        
       

        $this->load->view('purchase_request_form_inside');
           
    }

    public function get($id=null){
        if($id!==null){
            echo json_encode($this->reqdb->get_one($id));
        }
    }
    function tables(){
        $this->load->view('purchase_request_data');
    }
    function getoneview($enkrip=null,$id=null){
        $enkrip=$this->enkrip();
        if($id!=null){
            $data=$this->reqdb->getoneview($id);
            // print_r($data);
            $div='';
            $div.='<div class="btn-group pull-right" style="margin-bottom:20px">';
            $div.='<a class="btn btn-success btn-md" href="'.base_url('purchase_request/cetak/'.$enkrip.'/'.$id.'/').'"><i class="fa fa-print"></i> Cetak Order Permintaan </a>';
            $div.='<a class="btn btn-info btn-md" href="'.base_url('purchase_order/pakai/'.$enkrip.'/'.$id.'/').'"> Proses Beli Permintaan <i class="fa fa-arrow-right"></i></a>';
            $div.='</div>';
            $div.='<table class="table table-condensed table-striped table-bordered">';
            $div.='<tbody>';
            // $div.='<tr>';
            if($data['is_approved']!=null):
                if($data['is_approved']==1):
                    $status="Disetujui";
                else:
                    $status="-";
                endif;
            else:    
                $status="-";
            endif;
            $div.='<tr><th>Faktur PO:</th><td>'.$data['faktur'].'</td><th>Mitra:</th><td>'.$data['mitra'].'</td></tr>';
            $div.='<tr><th>Tanggal</th><td>'.$data['tanggal'].'</td><th>Gudang</th><td>'.$data['gudang'].'</td></tr>';
            $div.='<tr><th>Status PO:</th><td>'.$status.'</td><td>Kandang</td><td>'.$data['kandang'].'</td></tr>';
         
            $div.="</tbody></table><table class='table table-condesed table-striped'><tbody>";
            $div.='<tr><th class="text-center">No</th><th class="text-center">Kode</th>
            <th class="text-center">Nama Barang</th>
            <th class="text-center">Jumlah</th>
            <th class="text-center">Satuan</th>
          
            </tr>';
            $detail=$this->reqdb->getdetailview($data['faktur']);
            // print_r($detail);
            $jdetail=count($detail);
            $j=1;
            for ($i=0; $i <$jdetail ; $i++) { 
                # code...
                
                $div.='<tr ><td class="text-center">'.$j.'</td><td class="text-center">'
                .$detail[$i]['kode'].'</td><td>'
                .$detail[$i]['Nama'].'</td><td class="text-center"></td>'
                .'</tr>';
            $j++;

            }
            
            $div.="</tbody></table>";
            echo $div;
        }
    }
    function cetak($enkrip=null,$id=null){
        // $enkrip=$this->enkrip();
        if($id!=null){
            $data=$this->reqdb->getoneview($id);
            // print_r($data);
            $div='';
            $div.='<table class="table table-condensed table-striped table-bordered">';
            $div.='<tbody>';
            // $div.='<tr>';
            $div.='<tr><th>Faktur PO:</th><td>'.$data['faktur'].'</td><th>Tanggal PO</th><td>'.$data['tgl_po'].'</td></tr>';
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
            $detail=$this->reqdb->getdetailview($data['faktur']);
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
            $this->template->load_view('cetak',array(
                'content'=>$div,
                'data'=>$data,
                'detail'=>$detail,
                ));
        }
    }
    function getone($id=null){
        if($id!==null){
            $data=$this->reqdb->get_one($id);
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
            $this->reqdb->update($this->input->post('id'));
          }else{
            $this->reqdb->save();
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id')){
                $this->reqdb->update($this->input->post('id'));
              }else{
                $this->reqdb->save();
              }
          }
        }
    }
    public function submit_detail($id){
        $id=$this->input->post('id_detail');
         $data = array(
        
            'faktur' => $this->input->post('faktur', TRUE),
            'jumlah' => $this->input->post('jumlah', TRUE),
            'id_barang' => $this->input->post('id_barang', TRUE),
            'id_satuan' => $this->input->post('id_satuan', TRUE),
            'keterangan' => $this->input->post('ket_detail', TRUE),
           
         
            'user_id' =>$this->getuser(),
            
            'datetime' => date('Y-m-d H:m:s'),
        );
        if ($this->input->post('ajax')){
          if ($id){
            $this->reqdb->update($id);
          }else{
            $this->reqdb->save_detail($data);
          }

        }else{
          if ($this->input->post('submit')){
              if ($id){
                $this->reqdb->update($id);
              }else{
                $this->reqdb->save_detail($data);
              }
          }
        }
    }
    function get_dropdown_kandang($enkrip,$id=null){
        echo json_encode($this->reqdb->dropdown_kandang($id));
    }
    function get_dropdown_gudang($enkrip,$id=null){
        echo json_encode($this->reqdb->dropdown_gudang($id));
    }
    

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->reqdb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
     public function delete_detail(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->reqdb->delete_detail($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    } 
    private function gen_faktur(){
        $last=$this->reqdb->get_last();
        // print_r($last);
        if(!empty($last)):
            $first=substr($last['faktur'],0,2);
            if($first==''||$first==null){
                $first=' ';
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
            $gen=" ".date('ym')."00001";
        endif;
        return $gen;
    }
     function get_new_faktur(){
        echo $this->gen_faktur();
    }

    

}

/** Module purchase_request Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
