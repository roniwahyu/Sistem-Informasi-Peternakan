<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class assembly_pakan extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->model('assembly_pakan_model','assydb',TRUE);
        $this->load->model('jurnal_model','jrdb',TRUE);
        $this->load->model('jurnal_detail_model','detaildb',TRUE);
        $this->load->model('kartustok_model','stokdb',TRUE);
        $this->session->set_userdata('lihat','assembly_pakan');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;

           
        
        $this->template->add_js('datatables.js');
        $this->template->add_js('muria.js');
        $this->template->add_js('crud.js');
        $this->template->set_layout('dashboard');
    }

    public function index() {
        $this->template->set_title('Kelola Pencampuran Pakan/Feeds Assembly');
        $this->template->add_js('var baseurl="'.base_url().'assembly_pakan/";','embed');  
        $this->template->load_view('assembly_pakan_view',array(
            'view'=>'assembly_pakan_data',
            'title'=>'Kelola Data Pencampuran Pakan/Feeds Assembly',
            'subtitle'=>'Pengelolaan Pencampuran Pakan/Feeds Assembly',
            'breadcrumb'=>array(
            'Pencampuran Pakan/Feeds Assembly'),
        ));
    }
     public function baru() {

        $this->template->set_title('Kelola Pencampuran Pakan/Feeds Assembly');
        $this->template->add_js('var 
            baseurl="'.base_url().'assembly_pakan/";
            var enkrip="'.$this->enkrip().'";
            var brgsatuurl="'.base_url('barang_satuan').'/"; 
            ','embed');  
       
        $this->template->add_js('modules/recording.js');
        $this->template->add_css('plugins/datapicker/datepicker3.css');
        $this->template->add_js('plugins/datapicker/bootstrap-datepicker.js');
        $this->template->add_js('datepicker.js');
        $this->template->add_js('accounting.min.js');
        $this->session->set_userdata('new',true);
        $this->session->set_userdata('edit',false);
        // $default['total']=0;
        $default['tanggal']=date('Y-m-d');
        
        $last=$this->assydb->get_last();
        // print_r($last);
        if(!empty($last)):
            $default['faktur']=genfaktur($last['faktur'],'AS');
        else:
            $default['faktur']=genfaktur(array(),'AS');

        endif;
        // print_r($default['faktur']);
         $default['is_jrnl']=true;
        $default['is_trx']=true;
        $this->template->load_view('assembly_pakan_view',array(
            'view'=>'form_assembly',
            'default'=>$default,
             'opt_satuan'=>array(),
            'opt_jadi'=>$this->assydb->dropdown_pakan_jadi(),
            'opt_pakan'=>$this->assydb->dropdown_pakan(),
            'opt_vaksin'=>$this->assydb->dropdown_vaksin(),
            'opt_obat'=>$this->assydb->dropdown_obat(),
            'opt_gudang'=>$this->assydb->dropdown_gudang(),
            'opt_formulasi'=>$this->assydb->dropdown_formulasi(),
            'title'=>'Kelola Data Pencampuran Pakan/Feeds Assembly',
            'subtitle'=>'Pengelolaan Pencampuran Pakan/Feeds Assembly',
            'breadcrumb'=>array(
            'Pencampuran Pakan/Feeds Assembly'),
        ));
        
    }
     
     //<!-- Start Primary Key -->
    

    public function getdatatables(){
        if($this->isadmin()==1):
            $this->datatables->select('id,faktur,faktur_reff,tanggal,id_gudang,id_recording,id_formulasi,id_barang_jadi,id_satuan_jadi,jumlah,harga,total_jadi,akun_hpp,akun_perkiraan,total,is_trx,is_void,is_jrnl,is_post,date_posted,id_user,datetime,')
                            ->from('assembly_pakan');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('assembly_pakan/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>

                <a href='#outside' data-toggle='tooltip' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='$1'><i class='glyphicon glyphicon-edit'></i></a>
                <button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger'id='$1'><i class='glyphicon glyphicon-remove'></i></button>
                </div>" , 'id');
            $this->datatables->unset_column('id');

        else:
            $this->datatables->select('id,faktur,faktur_reff,tanggal,id_gudang,id_recording,id_formulasi,id_barang_jadi,id_satuan_jadi,jumlah,harga,total_jadi,akun_hpp,akun_perkiraan,total,is_trx,is_void,is_jrnl,is_post,date_posted,id_user,datetime,')
                            ->from('assembly_pakan');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('assembly_pakan/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a></div>" , 'id');
            $this->datatables->unset_column('id');
        endif;
        echo $this->datatables->generate();
    }
    public function getdetail($enkrip,$faktur){
    
            $this->datatables->select('id_detail,faktur,Kode,Nama,jumlah_satuan,satuan,harga_satuan,urutan,subtotal,')
                            ->from('00-00-16-01-view-rekam-assembly-detail');
                        $this->datatables->where('faktur',$faktur);
            $this->datatables->edit_column('harga_satuan','<div class="text-right">$1</div>','rp(harga_satuan)');
            $this->datatables->edit_column('subtotal','<div class="text-right">$1</div>','rp(subtotal)');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('recording_pakan_detail/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a></div>
                <a id='$1' href='#' class='del_detail btn btn-danger btn-xs'><i class='fa fa-remove'></i> </a></div>" , 'id_detail');
            $this->datatables->unset_column('id_detail,Kode,urutan');
        echo $this->datatables->generate();
    }
    private function dropdown_barang($kat=null){
        $result = array();
        if(!empty($kat)):
            $array_keys_values = $this->db->query('select id,Kode,Nama from `00-00-01-06-view-barang-kategori` where id_golongan='.$kat.' order by Kode asc');
        else:
            $array_keys_values = $this->db->query('select id,Kode,Nama from `00-00-01-06-view-barang-kategori` order by Kode asc');
        endif;
        $result[0]="-- Pilih Barang --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id]= $row->Kode." (".$row->Nama.")";
        }
      return json_encode($result);
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
    function enkrip(){
        return md5($this->session->userdata('lihat').":".$this->getuser()."+".date('H:m'));
        // echo $this->session->userdata('assembly_pakan');
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
        
       

        $this->load->view('assembly_pakan_form_inside');
           
    }

    public function get($id=null){
        if($id!==null){
            echo json_encode($this->assydb->get_one($id));
        }
    }
    function tables(){
        $this->load->view('assembly_pakan_data');
    }

    function getone($id=null){
        if($id!==null){
            $data=$this->assydb->get_one($id);
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
    function get_pakan(){
        echo json_encode($this->assydb->get_pakan());
    } 
  
    function get_dropdown_gudang($enkrip,$id=null){
        echo json_encode($this->assydb->dropdown_gudang($id));
    }
    function get_total($enkrip,$faktur=null){
        echo json_encode($this->assydb->get_total($faktur));
    }
     function get_drop_barang($enkrip=null,$id_supplier=null){
        echo $this->dropdown_barang($id_supplier);
    }


    function submit_stok($data){
         // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        foreach ($data as $key => $value) {
            $faktur_stok=$this->stokdb->get_last();
            // print_r($faktur_stok);
            $newfaktur=genfaktur_stok($faktur_stok);
            // print_r($newfaktur);
            # code...
            $data[$key]['faktur']=$newfaktur;
            $this->stokdb->save_stok($data[$key]);
            // echo "Setelah Update";
            // print_r($data);
        }

       
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
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
    } 
    public function submit(){
        $faktur_stok=$this->stokdb->get_last();
        $newstok=genfaktur_stok($faktur_stok);
        $faktur=$this->input->post('faktur');
        $detail=$this->assydb->get_detail($faktur);
        $ket=$this->input->post('keterangan', TRUE);
        $tgl=$this->input->post('tanggal', TRUE);
        $faktur_ref=$this->input->post('faktur', TRUE);
        $kandang=$this->assydb->get_kandang($this->input->post('id_kandang'));
        $mitra=$this->assydb->get_mitra($this->input->post('id_mitra'));
        echo "<pre>";
        print_r($detail);
        echo "</pre>";
        foreach ($detail as $k => $val) {
            # code...
            
            if($val['urutan']==1){
              
                 $datastok[] = array(
                    'faktur_ref' => $faktur_ref,
                    'tanggal' => $tgl,
                    'tipe_kartustok' => 'Pakan',
                    'tipe' => 'D',
                    'jumlah' =>  $val['jumlah_satuan'],
                    'id_barang' => $val['id_barang'],
                    'id_satuan' => $val['id_satuan'],
                    'kredit' => 0, 
                    'debet' =>$val['jumlah_satuan'],
                    'keterangan'=>'Barang Jadi Hasil Pencampuran Stok/Feeds Assembly Faktur:'.$faktur_ref.' Tanggal: '.$tgl,
                    'user_id' => $this->session->userdata('user_id'),
                    'datetime' => date('Y-m-d H:m:s'),
                );
            }else{
                $datastok[] = array(
                    'faktur_ref' => $faktur_ref,
                    'tanggal' => $tgl,
                    'tipe_kartustok' => 'Pakan',
                    'tipe' => 'K',
                    'jumlah' =>  $val['jumlah_satuan'],
                    'id_barang' => $val['id_barang'],
                    'id_satuan' => $val['id_satuan'],
                    'debet' => 0, 
                    'kredit' =>$val['jumlah_satuan'],
                    'keterangan'=>'Pemakaian Bahan Pencampuran Stok/Feeds Assembly Faktur:'.$faktur_ref.' Tanggal: '.$tgl,
                    'user_id' => $this->session->userdata('user_id'),
                    'datetime' => date('Y-m-d H:m:s'),
                );
            }

           
        }
        
         $dtjurnal= array(
                    'no_bukti' => $faktur_ref,
                    'tgl' => $tgl,
                    'tgl_posted' => date('Y-m-d H:m:s'),
                    'total_debet'=> $this->input->post('total', TRUE),
                    'total_kredit'=> $this->input->post('total', TRUE),
                    'ket' => 'Campur Stok Tanggal: '.$tgl,
                    'user_id' => $this->session->userdata('user_id'),
                    'datetime' => date('Y-m-d H:m:s'),
                );
        $jrdetail[] = array(
        
           
            'akun_detail' => '5.600.900',
            'tipe_detail' => 'K',
            'ket_detail' => 'Biaya/Pendapatan Barang Jadi Campur Stok: '.$tgl.' Faktur:'.$faktur_ref,
            'nilai' => $this->input->post('total', TRUE),
            'no_urut' => 1,
            'user_id' => $this->session->userdata('user_id'),
            'datetime' => date('Y-m-d H:m:s'),
           
        );
        $jrdetail[] = array( 
            'akun_detail' => '1.901',
            'tipe_detail' => 'D',
            'ket_detail' => 'Persediaan Barang Jadi Campur Stok Tanggal: '.$tgl,
            'nilai' => $this->input->post('total', TRUE),
            'no_urut' => 2,
            'user_id' => $this->session->userdata('user_id'),
            'datetime' => date('Y-m-d H:m:s'),
        );
        echo "<pre>";
        print_r($datastok);
        print_r($dtjurnal);
        print_r($jrdetail);
        echo "</pre>";

        if ($this->input->post('ajax')){
          if ($this->input->post('id')){
            $this->assydb->update($this->input->post('id'));
          }else{
            $this->assydb->save();
            $new=$this->submit_jurnal($dtjurnal);
            $this->submit_stok($datastok);
            $jrdetail[0]['no_jurnal']=$new;
            $jrdetail[1]['no_jurnal']=$new;
            $this->detaildb->save_detail($jrdetail);
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id')){
                $this->assydb->update($this->input->post('id'));
              }else{
                $this->assydb->save();
                $new=$this->submit_jurnal($dtjurnal);
                $this->submit_stok($datastok);
                $jrdetail[0]['no_jurnal']=$new;
                $jrdetail[1]['no_jurnal']=$new;
                $this->detaildb->save_detail($jrdetail);
              }
          }
        }
    }
    public function submit_detail($id){
        $id=$this->input->post('id_detail');
        $faktur=$this->input->post('faktur', TRUE);
        $last_detail=$this->assydb->get_lastdetail($faktur);
        $pertama=$this->input->post('pertama', TRUE);
        $urutan=$last_detail['urutan'];
        if(!empty($pertama)):
            $urut=1;
        elseif(empty($urutan)):
            $urut=2;
        elseif(empty($urutan) && !empty($pertama)):
            $urut=1;
        elseif(empty($urutan) && empty($pertama)):
            $urut=2; 
        elseif(!empty($urutan) && empty($pertama)):
            $urut=$urutan+1;
           /* elseif($urutan>=1):
                $urut=$urutan+1;*/
        endif;
        $data = array(
        
            'id_assembly' => $this->input->post('id_assembly', TRUE),
            'faktur' => $faktur,
            'id_barang' => $this->input->post('id_barang', TRUE),
            'jumlah_satuan' => $this->input->post('jumlah_satuan', TRUE),
            'jumlah_total' => $this->input->post('jumlah_total', TRUE),
            'id_satuan' => $this->input->post('id_satuan', TRUE),
            'harga' => $this->input->post('harga', TRUE),
            'is_barangjadi' => $this->input->post('is_barangjadi', TRUE),
            'urutan' => $urut,
            'subtotal' => $this->input->post('subtotal', TRUE),
            'user_id' => $this->session->userdata('user_id'),
            'datetime' => date('Y-m-d H:m:s'),
                    );

        if ($this->input->post('ajax')){
          if ($id){
            $this->assydb->update($id);
          }else{
            $this->assydb->save_detail($data);
          }

        }else{
          if ($this->input->post('submit')){
              if ($id){
                $this->assydb->update($id);
              }else{
                $this->assydb->save_detail($data);
              }
          }
        }
    }
    

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->assydb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
     public function delete_detail(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->assydb->delete_detail($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    } 
    private function gen_faktur(){
        $last=$this->assydb->get_last();
        // print_r($last);
        if(!empty($last)):
            $first=substr($last['faktur_pt'],0,2);
            if($first==''||$first==null){
                $first=' ';
            }
            $left=substr($last['faktur_pt'],2,4);
            $right=substr($last['faktur_pt'],-5);
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

/** Module assembly_pakan Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
