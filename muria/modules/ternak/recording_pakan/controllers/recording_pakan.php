<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class recording_pakan extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->model('recording_pakan_model','pakandb',TRUE);
        $this->load->model('kartustok/kartustok_model','stokdb',TRUE);
        $this->load->model('jurnal_model','jrdb',TRUE);
        $this->load->model('jurnal_detail_model','detaildb',TRUE);
        $this->session->set_userdata('lihat','recording_pakan');
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

    public function index() {
        $this->template->set_title('Kelola Recording Pakan');
        $this->template->add_js('var baseurl="'.base_url().'recording_pakan/";','embed');  
        $this->template->load_view('recording_pakan_view',array(
            'view'=>'recording_pakan_data',
            'title'=>'Kelola Data Recording Pakan',
            'subtitle'=>'Pengelolaan Recording Pakan',
            'breadcrumb'=>array(
            'Recording_pakan'),
        ));
    }
     public function baru($type=null) {
        $this->template->set_title('Kelola Recording Pakan');
        $this->template->add_js('
            var baseurl="'.base_url().'recording_pakan/";
            var enkrip="'.$this->enkrip().'";
            var brgsatuurl="'.base_url('barang_satuan').'/"; 
            ','embed');  
        $this->template->add_js('accounting.min.js');

        $this->template->add_js('modules/recording.js');  
        $recording='14';
        $tipestok='Tambah';
        $this->session->set_userdata('new',true);
        $this->session->set_userdata('edit',false);
        $default['total']=0;
        $default['tanggal']=date('Y-m-d');
        $default['id_recording']=$recording;
        $default['tipe_stok']=$tipestok;
        $default['faktur']=$this->gen_faktur();
         $default['is_jrnl']=true;
        $default['is_trx']=true;
        $this->template->load_view('recording_pakan_view',array(
            'default'=>$default,
            'opt_mitra'=>$this->pakandb->dropdown_mitra(),
            'opt_gudang'=>$this->pakandb->dropdown_gudang(),
            // 'opt_gudang'=>array(),
            // 'opt_kandang'=>$this->pakandb->dropdown_kandang(),
            'opt_kandang'=>array(),
            'opt_satuan'=>array(),
            'opt_pakan'=>$this->pakandb->dropdown_pakan(),
            'view'=>'form_recording_pakan',
            'title'=>'Kelola Data Recording Pakan',
            'subtitle'=>'Pengelolaan Recording Pakan',
            'breadcrumb'=>array(
            'Recording_pakan'),
        ));
        
    }
     
     //<!-- Start Primary Key -->
    
    function enkrip(){
        return md5($this->session->userdata('lihat').":".$this->getuser()."+".date('H:m'));
        // echo $this->session->userdata('purchase_order');
    }
    public function last_activity(){
      
            $this->datatables->select('id,tanggal,recording')
                            ->from('00-00-14-00-view-rekam-pakan');
            $this->datatables->limit(5);
            $this->datatables->order('id','DESC');
            $this->datatables->edit_column('tanggal','<div class="text-center">$1</div>','thedate(tanggal)');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('recording_ayam/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a></div>" , 'id');
            $this->datatables->unset_column('id');
       
        echo $this->datatables->generate();
    }
    public function getdatatablesx(){
        if($this->isadmin()==1):
            $this->datatables->select('id,faktur,tanggal,id_kandang,id_gudang,id_mitra,id_recording,akun_perkiraan,total,tipe_stok,is_trx,is_void,is_jrnl,is_post,date_posted,id_user,datetime,')
                            ->from('recording_pakan');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('recording_pakan/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>

                <a href='#outside' data-toggle='tooltip' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='$1'><i class='glyphicon glyphicon-edit'></i></a>
                <button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger'id='$1'><i class='glyphicon glyphicon-remove'></i></button>
                </div>" , 'id');
            $this->datatables->unset_column('id');

        else:
            $this->datatables->select('id,faktur,tanggal,id_kandang,id_gudang,id_mitra,id_recording,akun_perkiraan,total,tipe_stok,is_trx,is_void,is_jrnl,is_post,date_posted,id_user,datetime,')
                            ->from('recording_pakan');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('recording_pakan/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a></div>" , 'id');
            $this->datatables->unset_column('id');
        endif;
        echo $this->datatables->generate();
    }
    public function getdatatables(){
      
            $this->datatables->select('id,faktur,tanggal,kandang,gudang,namagudang,mitra,namamitra,recording,total')
                            ->from('00-00-14-00-view-rekam-pakan');
            $this->datatables->edit_column('namagudang','<div class="text-left">$2 ($1)</div>','gudang,namagudang');
            $this->datatables->edit_column('namamitra','<div class="text-left">$2 ($1)</div>','mitra,namamitra');
            $this->datatables->edit_column('total','<div class="text-right">$1</div>','rp(total)');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('recording_pakan/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a></div>" , 'id');
            $this->datatables->unset_column('id,gudang,mitra');
       
        echo $this->datatables->generate();
    }
    public function getdetail($enkrip,$faktur){
    
            $this->datatables->select('id_detail,faktur_recording,Kode,Nama,jumlah_satuan,satuan,harga_satuan,subtotal,')
                            ->from('00-00-14-01-view-rekam-pakan-detail');
                        $this->datatables->where('faktur_recording',$faktur);
            $this->datatables->edit_column('harga_satuan','<div class="text-right">$1</div>','rp(harga_satuan)');
            $this->datatables->edit_column('subtotal','<div class="text-right">$1</div>','rp(subtotal)');
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
        
       

        $this->load->view('recording_pakan_form_inside');
           
    }

    public function get($id=null){
        if($id!==null){
            echo json_encode($this->pakandb->get_one($id));
        }
    }
    function tables(){
        $this->load->view('recording_pakan_data');
    }

    function getone($id=null){
        if($id!==null){
            $data=$this->pakandb->get_one($id);
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
    
    function submit_stok($data){
        
        foreach ($data as $key => $value) {
            $faktur_stok=$this->stokdb->get_last();
            // print_r($faktur_stok);
            $newfaktur=genfaktur_stok($faktur_stok);
            // print_r($newfaktur);
            # code...
            $data[$key]['faktur']=$newfaktur;
            $this->stokdb->save_stok($data[$key]);
        }
        /*echo "<pre>";
        print_r($data);
        echo "</pre>";*/
    }
    function submit_jurnal($data){
        
        // foreach ($data as $key => $value) {
            $jurnal=$this->jrdb->get_last_jr();
            // print_r($jurnal);
            $newfaktur=genfaktur_jurnal($jurnal);
            // print_r($newfaktur);
            # code...
            $data['no_jurnal']=$newfaktur;
            $this->jrdb->save_jurnal($data);
            return $newfaktur;
        // }
        /*echo "<pre>";
        print_r($data);
        echo "</pre>";*/
    } 
    function submit_detailjurnal($data){
        
        // foreach ($data as $key => $value) {
            $jurnal=$this->detaildb->get_last_jr();
            // print_r($jurnal);
            $newfaktur=genfaktur_jurnal($jurnal);
            // print_r($newfaktur);
            # code...
            $data['no_jurnal']=$newfaktur;
            $this->detaildb->save_jurnal($data);
        // }
        /*echo "<pre>";
        print_r($data);
        echo "</pre>";*/
    }

    public function submit(){
        $faktur=$this->input->post('faktur');
        $detail=$this->pakandb->get_detail($faktur);
       
        $faktur_stok=$this->stokdb->get_last();
        $newstok=genfaktur_stok($faktur_stok);
        $recording=$this->input->post('id_recording');
        $faktur_ref=$this->input->post('faktur', TRUE);
        $ket=$this->input->post('keterangan', TRUE);
        $tgl=$this->input->post('tanggal', TRUE);
        $kandang=$this->pakandb->get_kandang($this->input->post('id_kandang'));
        $mitra=$this->pakandb->get_mitra($this->input->post('id_mitra'));
        
        foreach ($detail as $k => $val) {
            # code...
            $datastok[] = array(
                    'faktur_ref' => $faktur_ref,
                    'tanggal' => $tgl,
                    'tipe_kartustok' => 'Pakan',
                    'tipe' => 'K',
                    'jumlah' =>  $val['jumlah_satuan'],
                    'id_barang' => $val['id_barang'],
                    'id_satuan' => $val['id_satuan'],
                    'kredit' =>  $val['jumlah_satuan'],
                    'debet' =>0,
                    'keterangan' => 'Pemberian Pakan Tanggal: '.$tgl,
                    'user_id' => $this->session->userdata('user_id'),
                    'datetime' => date('Y-m-d H:m:s'),
                );
           
        }
         $dtjurnal= array(
                    'no_bukti' => $faktur_ref,
                    'tgl' => $tgl,
                    'tgl_posted' => date('Y-m-d H:m:s'),
                   
                    'ket' => 'Pemberian Pakan Tanggal: '.$tgl.' Mitra: '.$mitra['Kode'].' Kandang: '.$kandang['Keterangan'],
                    'user_id' => $this->session->userdata('user_id'),
                    'datetime' => date('Y-m-d H:m:s'),
                );
        $jrdetail[] = array(
        
           
            'akun_detail' => '5.600.600',
            'tipe_detail' => 'D',
            'ket_detail' => 'Pemberian Pakan Kandang: '.$kandang['Keterangan'],
            'nilai' => $this->input->post('total_debet', TRUE),
            'no_urut' => 1,
            'user_id' => $this->session->userdata('user_id'),
            'datetime' => date('Y-m-d H:m:s'),
           
        );
        $jrdetail[] = array(
        
           
            'akun_detail' => '1.901',
            'tipe_detail' => 'K',
            'ket_detail' => 'Pemberian Pakan Tanggal: '.$tgl,
            'nilai' => $this->input->post('total_kredit', TRUE),
            'no_urut' => 2,
            'user_id' => $this->session->userdata('user_id'),
            'datetime' => date('Y-m-d H:m:s'),
           
        );

        // print_r($datastok);
        
        if ($this->input->post('ajax')){
          if ($this->input->post('id')){
            $this->pakandb->update($this->input->post('id'));
          }else{
            $this->pakandb->save();
            $this->submit_stok($datastok);
            $pakan=$this->pakandb->get_rekaman($faktur);
            print_r($pakan);
            $dtjurnal['total_kredit']=$pakan['total'];
            $dtjurnal['total_debet']=$pakan['total'];
            $jrdetail[0]['nilai']=$pakan['total'];
            $jrdetail[1]['nilai']=$pakan['total'];
            $new=$this->submit_jurnal($dtjurnal);
            $jrdetail[0]['no_jurnal']=$new;
            $jrdetail[1]['no_jurnal']=$new;
            $this->detaildb->save_detail($jrdetail);

          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id')){
                $this->pakandb->update($this->input->post('id'));
              }else{
                $this->pakandb->save();
                $this->submit_jurnal($dtjurnal);
                $pakan=$this->pakandb->get_rekaman($faktur);
                print_r($pakan);
                $new=$this->submit_stok($datastok);
                $jrdetail[0]['nilai']=$pakan['total'];
                $jrdetail[1]['nilai']=$pakan['total'];
                $jrdetail[0]['no_jurnal']=$new;
                $jrdetail[1]['no_jurnal']=$new;
                $this->detaildb->save_detail($jrdetail);
              }
          }
        }
    }
    public function submit_detail($id){
        $id=$this->input->post('id_detail');
        $data = array(
        
            'id_recording_pakan' => $this->input->post('id_recording_pakan', TRUE),
            'faktur_recording' => $this->input->post('faktur_recording', TRUE),
            'id_record' => $this->input->post('id_record', TRUE),
            'id_barang' => $this->input->post('id_barang', TRUE),
            'jumlah_satuan' => $this->input->post('jumlah_satuan', TRUE),
            'id_satuan' => $this->input->post('id_satuan', TRUE),
            'user_id' => $this->session->userdata('user_id'),
           
            'datetime' => date('Y-m-d H:m:s'),
           
        );
        if ($this->input->post('ajax')){
          if ($id){
            $this->pakandb->update($id);
          }else{
            $this->pakandb->save_detail($data);
          }

        }else{
          if ($this->input->post('submit')){
              if ($id){
                $this->pakandb->update($id);
              }else{
                $this->pakandb->save_detail($data);
              }
          }
        }
    }

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->pakandb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
     public function delete_detail(){

        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->pakandb->delete_detail($this->input->post('id'));
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
                $this->pakandb->delete_by_bukti($faktur);
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    } 
    function get_pakan(){
        echo json_encode($this->pakandb->get_pakan());
    } 
    function get_dropdown_kandang($enkrip,$id=null){
        echo json_encode($this->pakandb->dropdown_kandang($id));
    }
    function get_dropdown_gudang($enkrip,$id=null){
        echo json_encode($this->pakandb->dropdown_gudang($id));
    }
    function get_total($enkrip,$faktur=null){
        echo json_encode($this->pakandb->get_total($faktur));
    }
    private function gen_faktur(){
        $last=$this->pakandb->get_last();
        // print_r($last);
        if(!empty($last)):
            $first=substr($last['faktur'],0,2);
            if($first=='RP'||$first==null){
                $first='RP';
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
            $gen="RP".date('ym')."00001";
        endif;
        return $gen;
    }
     function get_new_faktur(){
        echo $this->gen_faktur();
    }

    

}

/** Module recording_pakan Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
