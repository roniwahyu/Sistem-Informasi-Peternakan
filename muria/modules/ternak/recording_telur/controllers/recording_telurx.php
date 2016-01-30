<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class recording_telur extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->model('recording_telur_model','telurdb',TRUE);
        $this->load->model('kartustok/kartustok_model','stokdb',TRUE);
        $this->session->set_userdata('lihat','recording_telur');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;

           
        
        $this->template->add_js('datatables.js');
        $this->template->add_js('muria.js');
        $this->template->add_js('crud.js');
        $this->template->set_layout('dashboard');
    }

    public function index() {
        $this->template->set_title('Kelola Recording Telur');
        $this->template->add_js('var baseurl="'.base_url().'recording_telur/";','embed');  
        $this->template->load_view('recording_telur_view',array(
            'view'=>'recording_telur_data',
            'title'=>'Kelola Data Recording Telur',
            'subtitle'=>'Pengelolaan Recording Telur',
            'breadcrumb'=>array(
            'Recording_telur'),
        ));
    }
     public function baru($type) {
        $this->template->set_title('Kelola Recording Telur');
        $this->template->add_js('
            var baseurl="'.base_url().'recording_telur/";
            var enkrip="'.$this->enkrip().'";
            var brgsatuurl="'.base_url('barang_satuan').'/"; 
            ','embed');  
        $this->template->add_js('accounting.min.js');
        $this->template->add_js('$("#datatables_wrapper > .row").html("<div class="col-md-12 btn-filter"><h3>OKE</h3></div>")','embed');
        $this->template->add_js('modules/recording.js');  
        switch ($type) {
            case 'kumpul':
                $recording='9';
                $tipestok='Awal';
                $faktur=$this->gen_faktur('hasil');
               
            break;
            case 'pilah':
                $recording='10';
                $tipestok='Tambah';
                $faktur=$this->gen_faktur('stok');
            break;
            case 'pakai':
                $recording='11';
                $tipestok='Kurang';
                $faktur=$this->gen_faktur('pakai');
            break;
            case 'pecah':
                $recording='12';
                $tipestok='Kurang';
                $faktur=$this->gen_faktur('rusak');
            break;
            case 'afkir':
                $recording='13';
                $tipestok='Kurang';
                $faktur=$this->gen_faktur('rusak');
            break;
            default:
                $recording='9';
                $tipestok='Awal';
                $faktur=$this->gen_faktur('hasil');
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
        // print_r($faktur);
        $this->template->load_view('recording_telur_view',array(
            'default'=>$default,
            'opt_mitra'=>$this->telurdb->dropdown_mitra(),
            'opt_gudang'=>$this->telurdb->dropdown_gudang(),
            // 'opt_gudang'=>array(),
            // 'opt_kandang'=>$this->telurdb->dropdown_kandang(),
            'opt_kandang'=>array(),
            'opt_satuan'=>array(),
            'opt_telur'=>$this->telurdb->dropdown_telur(),
            'view'=>'form_recording_telur',
            'title'=>'Kelola Data Recording Telur',
            'subtitle'=>'Pengelolaan Recording Telur',
            'breadcrumb'=>array(
            'Recording Telur'),
        ));
        
    }
     
     //<!-- Start Primary Key -->
    

    public function getdatatablesx(){
        if($this->isadmin()==1):
            $this->datatables->select('id,faktur,tanggal,id_kandang,id_gudang,id_mitra,id_recording,akun_perkiraan,total,tipe_stok,is_trx,is_void,is_jrnl,is_post,date_posted,id_user,datetime,')
                            ->from('recording_telur');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('recording_telur/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>

                <a href='#outside' data-toggle='tooltip' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='$1'><i class='glyphicon glyphicon-edit'></i></a>
                <button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger'id='$1'><i class='glyphicon glyphicon-remove'></i></button>
                </div>" , 'id');
            $this->datatables->unset_column('id');

        else:
            $this->datatables->select('id,faktur,tanggal,id_kandang,id_gudang,id_mitra,id_recording,akun_perkiraan,total,tipe_stok,is_trx,is_void,is_jrnl,is_post,date_posted,id_user,datetime,')
                            ->from('recording_telur');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('recording_telur/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a></div>" , 'id');
            $this->datatables->unset_column('id');
        endif;
        echo $this->datatables->generate();
    }
     public function last_activity(){
      
            $this->datatables->select('id,tanggal,recording,faktur')
                            ->from('00-00-13-00-view-rekam-telur');
            $this->datatables->limit(5);
            $this->datatables->order('id','DESC');
            $this->datatables->edit_column('tanggal','<div class="text-center">$1</div>','thedate(tanggal)');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('recording_telur/getrecording/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a></div>" , 'id,faktur');
            $this->datatables->unset_column('id,faktur');
       
        echo $this->datatables->generate();
    }
    public function getdetail($enkrip,$faktur){
    
            $this->datatables->select('id_detail,faktur,Kode,Nama,jumlah_butir,jumlah_total,satuan,harga_satuan,subtotal,')
                            ->from('00-00-13-01-view-rekam-telur-detail');
                        $this->datatables->where('faktur',$faktur);
            $this->datatables->edit_column('jumlah_total','<div class="text-right">$1 ($2)</div>','rp(jumlah_total),satuan');
            $this->datatables->edit_column('harga_satuan','<div class="text-right">$1</div>','rp(harga_satuan)');
            $this->datatables->edit_column('subtotal','<div class="text-right">$1</div>','rp(subtotal)');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('recording_telur_detail/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a></div>
                <a id='$1' href='#' class='del_detail btn btn-danger btn-xs'><i class='fa fa-remove'></i> </a></div>" , 'id_detail');
            $this->datatables->unset_column('id_detail,Kode,satuan');
        echo $this->datatables->generate();
    }
    public function getdatatables(){
      
            $this->datatables->select('id,faktur,tanggal,kandang,gudang,namagudang,mitra,namamitra,recording,total')
                            ->from('00-00-13-00-view-rekam-telur');
            $this->datatables->edit_column('tanggal','<div class="text-center">$1</div>','thedate(tanggal)');
            $this->datatables->edit_column('namagudang','<div class="text-left">$2 ($1)</div>','gudang,namagudang');
            $this->datatables->edit_column('namamitra','<div class="text-left">$2 ($1)</div>','mitra,namamitra');
            $this->datatables->edit_column('total','<div class="text-right">$1</div>','rp(total)');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('recording_ayam/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a></div>" , 'id');
            $this->datatables->unset_column('id,gudang,mitra');
       
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
    function gen_faktur($type=null){
        $last=$this->telurdb->get_last($type);
       /* echo "<pre>";
        print_r($last);
        echo "</pre>";*/

        if(!empty($last)):
            $first=substr($last['faktur'],0,2);
            $second=substr($last['faktur'],2,1);

            if($first=='RT'||$first==null){
                $first='RT';
            }
            if(!empty($type)):
                switch ($type) {
                    case 'hasil':
                        $second="H";    
                    break;
                    case 'stok':
                        $second="S";    
                    break;
                    case 'pakai':
                        $second="P";    
                    break;
                    case 'rusak':
                        $second="R";    
                    break;
                }
            else:
                $second='';
            endif;
            $left=substr($last['faktur'],3,4);
            // echo "<pre>";
            // print_r($first.$second);
            // print_r($last);
            // print_r($left);
            // echo "<br>";
            $right=substr($last['faktur'],-5);
            $nopt=number_format($right); 
            // print_r($right);
            
            
            $newpo=strval($nopt+1);
            $newpo2=substr(strval("00000$newpo"),-5);
            // print_r($newpo);
            // echo "<br>";
            // print_r($newpo2);
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
                    case 'hasil':
                        $gen="RTH".date('ym')."00001";    
                    break;
                    case 'stok':
                        $gen="RTS".date('ym')."00001";    
                    break;
                    case 'pakai':
                        $gen="RTP".date('ym')."00001";    
                    break;
                    case 'rusak':
                        $gen="RTR".date('ym')."00001";    
                    break;
                }
            else:
                $gen='';
            endif;

            
        endif;
        return $gen;
    }
     function get_new_faktur($type=null){
        echo $this->gen_faktur($type);
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

    function enkrip(){
        return md5($this->session->userdata('lihat').":".$this->getuser()."+".date('H:m'));
        // echo $this->session->userdata('recording_telur');
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
        
       

        $this->load->view('recording_telur_form_inside');
           
    }

    public function get($id=null){
        if($id!==null){
            echo json_encode($this->telurdb->get_one($id));
        }
    }
    function tables(){
        $this->load->view('recording_telur_data');
    }
    function getrecording($id=null){
        if(!empty($id)):
            $data=$this->telurdb->get_recording($id);

            $faktur=$data['faktur'];
            $detail=$this->telurdb->get_recording_detail($faktur);
            $this->load->view('recording_detail',array(
                'data'=>$data,
                'detail'=>$detail,

            ));
            
            
        endif;


    }
    function getone($id=null){
        if($id!==null){
            $data=$this->telurdb->get_one($id);
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
        $recording=$this->input->post('id_recording');
        if ($this->input->post('ajax')){
          if ($this->input->post('id')){
            $this->telurdb->update($this->input->post('id'));
          }else{
            $id=$this->telurdb->save();
            if(!empty($recording) && $recording='10' ):
                $this->submit_stok($id);
            endif;
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id')){
                $this->telurdb->update($this->input->post('id'));
              }else{
                $id=$this->telurdb->save();
                if(!empty($recording) && $recording='10' ):
                    $this->submit_stok($id);
                endif;
              }
          }
        }
    }
    public function submit_detail($id){
        $id=$this->input->post('id_detail');

        $data = array(
        
            'id_recording_telur' => $this->input->post('id_recording_telur', TRUE),
            'faktur_recording' => $this->input->post('faktur_recording', TRUE),
            'id_record' => $this->input->post('id_record', TRUE),
            'id_barang' => $this->input->post('id_barang', TRUE),
            'jumlah_butir' => $this->input->post('jumlah_butir', TRUE),
            'jumlah_total' => $this->input->post('jumlah_total', TRUE),
            'id_satuan' => $this->input->post('id_satuan', TRUE),
            'user_id' => $this->session->userdata('user_id'),
           
            'datetime' => date('Y-m-d H:m:s'),
           
        );
        if ($this->input->post('ajax')){
          if ($id){
            $this->telurdb->update($id);
          }else{
            $this->telurdb->save_detail($data);
          }

        }else{
          if ($this->input->post('submit')){
              if ($id){
                $this->telurdb->update($id);
              }else{
                $this->telurdb->save_detail($data);
              }
          }
        }
    }
    public function submit_stok($id){
        $telur=$this->telurdb->get_one($id);
        $detail=$this->telurdb->get_detail($telur['faktur']);
        print_r($detail);
        if(!empty($detail)):
            foreach ($detail as $key => $value) {
                  $data[] = array(
        
                    'faktur' => $this->gen_fakturstok(),
                    'faktur_ref' => $this->input->post('faktur', TRUE),
                    'tanggal' => $this->input->post('tanggal', TRUE),
                    'tipe_kartustok' => 'Telur',
                    'tipe' => 'D',
                    'jumlah' => $value['jumlah_total'],
                    'id_barang' => $value['id_barang'],
                    'id_satuan' => $value['id_satuan'],
                    'debet' => $value['jumlah_total'],
                    'keterangan' => 'Pengumpulan Telur Stok Tanggal:'.$this->input->post('tanggal', TRUE),
                    'user_id' => $this->session->userdata('user_id'),
                    'datetime' => date('Y-m-d H:m:s'),
                   
                );
            }
            print_r($data);
       
        endif;
        if ($this->input->post('ajax')){
          if ($this->input->post('id')){
            $this->stokdb->update($this->input->post('id'));
          }else{
            $this->stokdb->save_stok($data);
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id')){
                $this->stokdb->update($this->input->post('id'));
              }else{
                $this->stokdb->save_stok($data);
              }
          }
        }
    }
    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->telurdb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
     public function delete_detail(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->telurdb->delete_detail($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    } 
    function get_telur(){
        echo json_encode($this->telurdb->get_telur());
    } 
    function get_dropdown_kandang($enkrip,$id=null){
        echo json_encode($this->telurdb->dropdown_kandang($id));
    }
    function get_dropdown_gudang($enkrip,$id=null){
        echo json_encode($this->telurdb->dropdown_gudang($id));
    }
    function get_total($enkrip,$faktur=null){
        echo json_encode($this->telurdb->get_total($faktur));
    }
    
    

}

/** Module recording_telur Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
