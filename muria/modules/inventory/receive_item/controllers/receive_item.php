<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class receive_item extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->model('receive_item_model','revdb',TRUE);
        $this->session->set_userdata('lihat','receive_item');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;

           
         $this->template->add_js('plugins/select2/select2.min.js');
         $this->template->add_css('plugins/datapicker/datepicker3.css');
        $this->template->add_js('plugins/datapicker/bootstrap-datepicker.js');
        $this->template->add_js('datepicker.js');
        $this->template->add_js('datatables.js');
        $this->template->add_js('muria.js');
        $this->template->add_js('crud.js');
        $this->template->set_layout('dashboard');
    }

    public function index() {
        $this->template->set_title('Kelola Penerimaan Barang');
        $this->template->add_js('var baseurl="'.base_url().'receive_item/";','embed');  
        $this->template->load_view('receive_item_view',array(
            'view'=>'receive_item_data',
            'title'=>'Kelola Data Penerimaan Barang',
            'subtitle'=>'Pengelolaan Penerimaan Barang',
            'breadcrumb'=>array(
            'Penerimaan Barang'),
        ));
    }
     public function baru() {
        $this->template->set_title('Kelola Penerimaan Barang');
        
        $this->template->add_js('plugins/select2/select2.min.js');
        $this->template->add_css('plugins/select2/select2.min.css');
        $this->template->add_js('
            var baseurl="'.base_url('receive_item').'/";
            var enkrip="'.$this->enkrip().'";
            var brgsatuurl="'.base_url('barang_satuan').'/"; 
            $("#id_supplier").select2();
            ','embed');  
        $this->template->add_js('modules/recording.js');
        $gudang=$this->revdb->dropdown_gudang();
        $last=$this->revdb->get_last();
        $default['faktur']=genfaktur($last['faktur'],'RC');
        $default['tanggal']=date('Y-m-d');
        $default['is_approved']=true;
        $this->template->load_view('receive_item_view',array(
            'view'=>'form_terima',
            'default'=>$default,
            'opt_mitra'=>$this->revdb->dropdown_mitra(),
            'opt_gudang'=>$gudang,
            'opt_kandang'=>array(),
            'opt_satuan'=>array(),
            'opt_barang'=>array(),
            'opt_customer'=>$this->revdb->dropdown_supplier(),

            'title'=>'Kelola Data Penerimaan Barang',
            'subtitle'=>'Pengelolaan Penerimaan Barang',
            'breadcrumb'=>array(
            'Penerimaan Barang'),
        ));
        
    }
     
     //<!-- Start Primary Key -->
    

    public function getdatatables(){
        if($this->isadmin()==1):
            $this->datatables->select('id,faktur,faktur_reff,faktur_do,id_supplier,tanggal,tanggal_terima,kirim_via,keterangan,alamat_terima,id_cabang,id_mitra,id_kandang,id_gudang,nopol_pengirim,nama_pengirim,is_approved,user_id,datetime,')
                            ->from('00-00-18-00-view-receive-item');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('receive_item/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>

                <a href='#outside' data-toggle='tooltip' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='$1'><i class='glyphicon glyphicon-edit'></i></a>
                <button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger'id='$1'><i class='glyphicon glyphicon-remove'></i></button>
                </div>" , 'id');
            $this->datatables->unset_column('id');

        else:
            $this->datatables->select('id,faktur,faktur_reff,faktur_do,id_supplier,tanggal,tanggal_terima,kirim_via,keterangan,alamat_terima,id_cabang,id_mitra,id_kandang,id_gudang,nopol_pengirim,nama_pengirim,is_approved,user_id,datetime,')
                            ->from('receive_item');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('receive_item/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a></div>" , 'id');
            $this->datatables->unset_column('id');
        endif;
        echo $this->datatables->generate();
    }
    public function getdetail($enkrip,$faktur){
            // $dec=dekrip($faktur);
            // print_r($dec);
            $this->datatables->select('id_detail,faktur,Kode,Nama,jumlah,satuan,keterangan')
                            ->from('00-00-18-01-view-receive-detail');
                        $this->datatables->where('faktur',$faktur);
                        // $this->datatables->where('faktur',$dec);
         
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
    function enkrip(){
        return md5($this->session->userdata('lihat').":".$this->getuser()."+".date('H:m'));
        // echo $this->session->userdata('receive_item');
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
        
       

        $this->load->view('receive_item_form_inside');
           
    }

    public function get($id=null){
        if($id!==null){
            echo json_encode($this->revdb->get_one($id));
        }
    }
    function tables(){
        $this->load->view('receive_item_data');
    }

    function getone($id=null){
        if($id!==null){
            $data=$this->revdb->get_one($id);
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
            $this->revdb->update($this->input->post('id'));
          }else{
            $this->revdb->save();
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id')){
                $this->revdb->update($this->input->post('id'));
              }else{
                $this->revdb->save();
              }
          }
        }
    }
    
    public function submit_detail($id){
        $id=$this->input->post('id_detail');
         $data = array(
             'faktur' => $this->input->post('faktur', TRUE),
           
            'faktur_reff' => $this->input->post('faktur_reff', TRUE),
           
            'faktur_do' => $this->input->post('faktur_do', TRUE),
           
            'id_barang' => $this->input->post('id_barang', TRUE),
           
            'id_satuan' => $this->input->post('id_satuan', TRUE),
           
            'jumlah' => $this->input->post('jumlah', TRUE),
           
            'jumlah_retur' => $this->input->post('jumlah_retur', TRUE),
           
            'id_mitra' => $this->input->post('id_mitra', TRUE),
           
            'id_gudang' => $this->input->post('id_gudang', TRUE),
           
            'id_kandang' => $this->input->post('id_kandang', TRUE),
           
            'keterangan' => $this->input->post('keterangan', TRUE),
           
            'user_id' => userid(),
           
            'datetime' => now(),
           
           
        );
        if ($this->input->post('ajax')){
          if ($id){
            $this->revdb->update($id);
          }else{
            $this->revdb->save_detail($data);
          }

        }else{
          if ($this->input->post('submit')){
              if ($id){
                $this->revdb->update($id);
              }else{
                $this->revdb->save_detail($data);
              }
          }
        }
    }
    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->revdb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
     public function delete_detail(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->revdb->delete_detail($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    } 
    private function gen_faktur(){
        $last=$this->revdb->get_last_pt();
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
    private function dropdown_barang($id_supplier=null){
        $result = array();
        if(!empty($id_supplier)):
            $array_keys_values = $this->db->query('select id,Kode,Nama from `00-00-01-05-drop-barang-supplier` where id_supplier='.$id_supplier.' order by Kode asc');
        else:
            $array_keys_values = $this->db->query('select id,Kode,Nama from `00-00-01-05-drop-barang-supplier` order by Kode asc');
        endif;
        $result[0]="-- Pilih Barang --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id]= $row->Kode." (".$row->Nama.")";
        }
      return json_encode($result);
    } 
    function get_drop_barang($enkrip=null,$id_supplier=null){
        echo $this->dropdown_barang($id_supplier);
    }
    function get_dropdown_kandang($enkrip,$id=null){
        echo json_encode($this->revdb->dropdown_kandang($id));
    }
    function get_dropdown_gudang($enkrip,$id=null){
        echo json_encode($this->revdb->dropdown_gudang($id));
    }
    function get_total($enkrip,$faktur=null){
        // echo json_encode($this->revdb->get_total($faktur));
        echo json_encode(array());
    }

}

/** Module receive_item Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
