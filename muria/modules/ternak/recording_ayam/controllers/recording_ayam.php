<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class recording_ayam extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->model('recording_ayam_model','ayamdb',TRUE);
        $this->load->model('kartustok/kartustok_model','stokdb',TRUE);
        $this->session->set_userdata('lihat','recording_ayam');
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
        $this->template->set_title('Kelola Recording Ayam');
        $this->template->add_js('var baseurl="'.base_url().'recording_ayam/";','embed');  
        $this->template->load_view('recording_ayam_view',array(
            'view'=>'recording_ayam_data',
            'title'=>'Kelola Data Recording Ayam',
            'subtitle'=>'Pengelolaan Recording Ayam',
            'breadcrumb'=>array(
            'Recording_ayam'),
        ));
    }
     public function baru($type=null) {
        $this->template->set_title('Kelola Recording Ayam');
        $this->template->add_js('
            var baseurl="'.base_url().'recording_ayam/";
            var enkrip="'.$this->enkrip().'";
            var brgsatuurl="'.base_url('barang_satuan').'/"; 
            ','embed');  
        $this->template->add_js('accounting.min.js');

        $this->template->add_js('modules/recording.js');  
        switch ($type) {
            case 'isi':
                $recording='1';
                $tipestok='Awal';
                $faktur=$this->gen_faktur('isi');

            break;
            case 'tambah':
                $recording='2';
                $tipestok='Tambah';
                $faktur=$this->gen_faktur('tambah');
            break;
            case 'kosong':
                $recording='8';
                $tipestok='Akhir';
                $faktur=$this->gen_faktur('kosong');
            break;
            case 'mati':
                $recording='4';
                $tipestok='Kurang';
                $faktur=$this->gen_faktur('mati');
            break;
            case 'afkir':
                $recording='3';
                $tipestok='Kurang';
                $faktur=$this->gen_faktur('afkir');
            break;
            default:
                $recording='1';
                $tipestok='Tambah';
                $faktur=$this->gen_faktur('isi');
            break;

            
        }
        $this->session->set_userdata('new',true);
        $this->session->set_userdata('edit',false);
        $default['total']=0;
        $default['tanggal']=date('Y-m-d');
        $default['id_recording']=$recording;
        $default['tipe_stok']=$tipestok;
        $default['faktur']=$faktur;
        $default['is_jrnl']=false;
        $default['is_trx']=true;
        $this->template->load_view('recording_ayam_view',array(
            'submodule'=>$type,
            'default'=>$default,
            'opt_mitra'=>$this->ayamdb->dropdown_mitra(),
            'opt_gudang'=>$this->ayamdb->dropdown_gudang(),
            // 'opt_gudang'=>array(),
            // 'opt_kandang'=>$this->ayamdb->dropdown_kandang(),
            'opt_kandang'=>array(),
            'opt_satuan'=>array(),
            'opt_ayam'=>$this->ayamdb->dropdown_ayam(),
            'view'=>'form_recording_ayam',
            'title'=>'Kelola Data Recording Ayam',
            'subtitle'=>'Pengelolaan Recording Ayam',
            'breadcrumb'=>array(
            'Recording_ayam'),
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
                            ->from('recording_ayam');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('recording_ayam/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>

                <a href='#outside' data-toggle='tooltip' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='$1'><i class='glyphicon glyphicon-edit'></i></a>
                <button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger'id='$1'><i class='glyphicon glyphicon-remove'></i></button>
                </div>" , 'id');
            $this->datatables->unset_column('id');

        else:
            $this->datatables->select('id,faktur,tanggal,id_kandang,id_gudang,id_mitra,id_recording,akun_perkiraan,total,tipe_stok,is_trx,is_void,is_jrnl,is_post,date_posted,id_user,datetime,')
                            ->from('recording_ayam');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('recording_ayam/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a></div>" , 'id');
            $this->datatables->unset_column('id');
        endif;
        echo $this->datatables->generate();
    }
    public function getdatatables(){
      
            $this->datatables->select('id,faktur,tanggal,kandang,gudang,namagudang,mitra,namamitra,recording,total')
                            ->from('00-00-12-00-view-rekam-ayam');
            $this->datatables->edit_column('namagudang','<div class="text-left">$2 ($1)</div>','gudang,namagudang');
            $this->datatables->edit_column('namamitra','<div class="text-left">$2 ($1)</div>','mitra,namamitra');
            $this->datatables->edit_column('total','<div class="text-right">$1</div>','rp(total)');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('recording_ayam/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a></div>" , 'id');
            $this->datatables->unset_column('id,gudang,mitra');
       
        echo $this->datatables->generate();
    }
    public function last_activity(){
      
            $this->datatables->select('id,tanggal,recording')
                            ->from('00-00-12-00-view-rekam-ayam');
            $this->datatables->limit(5);
            $this->datatables->order('id','DESC');
            $this->datatables->edit_column('tanggal','<div class="text-center">$1</div>','thedate(tanggal)');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('recording_ayam/getrecording/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a></div>" , 'id');
            $this->datatables->unset_column('id');
       
        echo $this->datatables->generate();
    }
    public function getdetail($enkrip,$faktur){
    
            $this->datatables->select('id_detail,faktur,Kode,Nama,usia,jumlah_satuan,satuan,harga_satuan,subtotal,')
                            ->from('00-00-12-01-view-rekam-ayam-detail');
                        $this->datatables->where('faktur',$faktur);
            $this->datatables->edit_column('harga_satuan','<div class="text-right">$1</div>','rp(harga_satuan)');
            $this->datatables->edit_column('subtotal','<div class="text-right">$1</div>','rp(subtotal)');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('recording_ayam_detail/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a></div>
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
    function getrecording($id=null){
        if(!empty($id)):
            $data=$this->ayamdb->get_recording($id);

            $faktur=$data['faktur'];
            $detail=$this->ayamdb->get_recording_detail($faktur);
            $this->load->view('recording_detail',array(
                'data'=>$data,
                'detail'=>$detail,

            ));
            
            
        endif;


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
        
       

        $this->load->view('recording_ayam_form_inside');
           
    }

    public function get($id=null){
        if($id!==null){
            echo json_encode($this->ayamdb->get_one($id));
        }
    }
    function tables(){
        $this->load->view('recording_ayam_data');
    }

    function getone($id=null){
        if($id!==null){
            $data=$this->ayamdb->get_one($id);
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
            $this->ayamdb->update($this->input->post('id'));
          }else{
            $this->ayamdb->save();
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id')){
                $this->ayamdb->update($this->input->post('id'));
              }else{
                $this->ayamdb->save();
              }
          }
        }
    }
    public function submit_detail($id){
        // Belum FIX NIH
        $recording=$this->input->post('id_recording');
            $faktur_ref=$this->input->post('faktur_ref', TRUE);
            $ket=$this->input->post('keterangan', TRUE);
            $tgl=$this->input->post('tanggal', TRUE);
        $id=$this->input->post('id_detail');
        $data = array(
        
            'id_recording_ayam' => $this->input->post('id_recording_ayam', TRUE),
            'faktur_recording' => $this->input->post('faktur_recording', TRUE),
            'id_record' => $this->input->post('id_record', TRUE),
            'id_barang' => $this->input->post('id_barang', TRUE),
            'jumlah_satuan' => $this->input->post('jumlah_satuan', TRUE),
            'id_satuan' => $this->input->post('id_satuan', TRUE),
            'usia' => $this->input->post('usia', TRUE),
            'user_id' => $this->session->userdata('user_id'),
           
            'datetime' => date('Y-m-d H:m:s'),
           
        );
        $datastok = array(
        
                    'faktur' => $this->gen_fakturstok(),
                    'faktur_ref' => $faktur_ref,
                    'tanggal' => $tgl,
                    'tipe_kartustok' => 'Telur',
                    'tipe' => 'D',
                    'jumlah' =>  $this->input->post('jumlah_total', TRUE),
                    'id_barang' => $this->input->post('id_barang', TRUE),
                    'id_satuan' => $this->input->post('id_satuan', TRUE),
                    'debet' =>  $this->input->post('jumlah_total', TRUE),
                    'kredit' =>0,
                    'keterangan' => 'Pengumpulan Telur Stok Tanggal: '.$this->input->post('tanggal', TRUE),
                    'user_id' => $this->session->userdata('user_id'),
                    'datetime' => date('Y-m-d H:m:s'),
                   
                );
        if ($this->input->post('ajax')){
          if ($id){
            $this->ayamdb->update($id);
          }else{
            $this->ayamdb->save_detail($data);
          }

        }else{
          if ($this->input->post('submit')){
              if ($id){
                $this->ayamdb->update($id);
              }else{
                $this->ayamdb->save_detail($data);
              }
          }
        }
    }

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->ayamdb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
     public function delete_detail(){

        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->ayamdb->delete_detail($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    } 
    public function delete_bukti(){
        $faktur=$this->input->post('faktur');
        // print_r($faktur);
        if(isset($_POST['ajax'])){
            if(!empty($faktur)){
                $this->ayamdb->delete_by_bukti($faktur);
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    } 
    function get_ayam(){
        echo json_encode($this->ayamdb->get_ayam());
    } 
    function get_dropdown_kandang($enkrip,$id=null){
        echo json_encode($this->ayamdb->dropdown_kandang($id));
    }
    function get_dropdown_gudang($enkrip,$id=null){
        echo json_encode($this->ayamdb->dropdown_gudang($id));
    }
    function get_total($enkrip,$faktur=null){
        echo json_encode($this->ayamdb->get_total($faktur));
    }
     private function gen_fakturstok(){
        $last=$this->stokdb->get_last();
        // print_r($last);
        if(!empty($last)):
            $first=substr($last['faktur'],0,2);
            if($first=='KS'||$first==null){
                $first='KS';
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
            $gen="KS".date('ym')."00001";
        endif;
        return $gen;
    }
     function get_fakturstok(){
        echo $this->gen_fakturstok();
    }
    function gen_faktur($type=null){
        $last=$this->ayamdb->get_last($type);
       /* echo "<pre>";
        print_r($last);
        echo "</pre>";
*/
        if(!empty($last)):
            $first=substr($last['faktur'],0,2);
            $second=substr($last['faktur'],2,1);

            if($first=='RA'||$first==null){
                $first='RA';
            }
            if(!empty($type)):

                switch ($type) {
                    case 'isi':
                        $second='I';
                    break;
                    case 'tambah':
                        $second='T';
                    break;
                    case 'kosong':
                        $second='K';
                    break;
                    case 'mati':
                        $second='M';
                    break;
                    case 'afkir':
                        $second='A';
                    break;
                    default:
                        $second='T';
                    break;
                }
            else:
                $second='';
            endif;
            $left=substr($last['faktur'],3,4);
          /*  echo "<pre>";
            print_r($first.$second);
            print_r($last);
            print_r($left);
            echo "<br>";*/
            $right=substr($last['faktur'],-5);
            $nopt=number_format($right); 
            // print_r($right);
            
            
            $newpo=strval($nopt+1);
            $newpo2=substr(strval("00000$newpo"),-5);
           /* print_r($newpo);
            echo "<br>";
            print_r($newpo2);*/
            $tahun=substr($left,0,2);
            $bulan=substr($left,2,4);
            // print_r($tahun.$bulan);
            // echo "</pre>";
            if($tahun<>date('y')):
                $tahun=date('y');
                if($bulan==date('m')):
                    $gen=strval($first.$second.$tahun.$bulan."00001");
                elseif($bulan<>date('m')):
                    $bulan=date('m');
                    $gen=strval($first.$second.$tahun.$bulan."00001");
                endif;
            elseif($tahun==date('y')):
                if(intval($bulan)<>date('m')):
                    $bulan=date('m');
                    $gen=strval($first.$second.$tahun.$bulan."00001"); 
                elseif($bulan==date('m')):
                    $gen=strval($first.$second.$tahun.$bulan.$newpo2);
                endif;
            endif;
        else:
            // $gen="PT151100001";
            if(!empty($type)):
                switch ($type) {
                    case 'isi':
                        $gen='RAI'.date('ym')."00001";
                    break;
                    case 'tambah':
                        $gen='RAT'.date('ym')."00001";
                    break;
                    case 'kosong':
                        $gen='RAK'.date('ym')."00001";
                    break;
                    case 'mati':
                        $gen='RAM'.date('ym')."00001";
                    break;
                    case 'afkir':
                        $gen='RAA'.date('ym')."00001";
                    break;
                }
            else:
                $gen='';
            endif;
        endif;
        return $gen;
    }
    
     function get_new_faktur($type){
        echo $this->gen_faktur($type);
    }

    

}

/** Module recording_ayam Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
