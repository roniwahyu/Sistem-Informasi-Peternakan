<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class sales_order extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->model('sales_order_model','sodb',TRUE);
        $this->session->set_userdata('lihat','sales_order');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;

           
        
        $this->template->add_js('datatables.js');
        $this->template->add_js('muria.js');
        $this->template->add_js('crud.js');
        $this->template->set_layout('dashboard');
    }

    public function index() {
        $this->template->set_title('Kelola Sales_order');
        $this->template->add_js('var baseurl="'.base_url().'sales_order/";','embed');  
        $this->template->load_view('sales_order_view',array(
            'view'=>'sales_order_data',
            'title'=>'Kelola Data Sales_order',
            'subtitle'=>'Pengelolaan Sales_order',
            'breadcrumb'=>array(
            'Sales_order'),
        ));
    }
     public function baru() {
        $this->template->set_title('Kelola Sales_order');
        $this->template->add_js('accounting.min.js');
        $this->template->add_js('jquery.maskMoney.min.js');
        $this->template->add_js('plugins/select2/select2.min.js');
        $this->template->add_css('plugins/select2/select2.min.css');
        $this->template->add_js('var 
            baseurl="'.base_url().'sales_order/";
            enkrip="'.$this->enkrip().'";
            var brgsatuurl="'.base_url('barang_satuan').'/"; 
            $(".select2").select2();
             $("#uangmukax").maskMoney({prefix:"Rp", allowNegative: true, thousands:",", decimal:".", affixesStay: true});
            $("#biayakirimx").maskMoney({prefix:"Rp", allowNegative: true, thousands:",", decimal:".", affixesStay: true});
           
            ','embed');  
        $this->template->add_js('modules/recording.js');
        $last=$this->sodb->get_last();
        $default['faktur']=genfaktur($last['faktur'],'SO');
        $default['total']=0;
         $this->session->set_userdata('new',true);
        $this->session->set_userdata('edit',false);
        $this->template->load_view('sales_order_view',array(
            'view'=>'form_so',
            'default'=>$default,
            'opt_customer'=>$this->sodb->dropdown_customer(),
            'opt_satuan'=>array(),
            'opt_barang'=>$this->sodb->dropdown_barang(),
            'opt_sales'=>$this->sodb->get_drop_array('sales','id_karyawan','nama'),
            'opt_jenis'=>$this->sodb->get_drop_array('jenis_barang','Kode','Keterangan'),
            'title'=>'Kelola Data Sales_order',
            'subtitle'=>'Pengelolaan Sales_order',
            'breadcrumb'=>array(
            'Sales_order'),
        ));
        
    }
     
     //<!-- Start Primary Key -->
    

    public function getdatatables(){

            $this->datatables->select('id,faktur,tgl,kdcustomer,namacustomer,nama,grandtotal,keterangan')
                            ->from('00-00-19-00-view-sales-order');
                            $this->datatables->edit_column('namacustomer','$1 ($2)','namacustomer,kdcustomer');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('sales_order/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a></div>" , 'id');
            $this->datatables->unset_column('id,kdcustomer');
       
        echo $this->datatables->generate();
    }
    public function getdetail($enkrip,$faktur){
            // $dec=dekrip($faktur);
            // print_r($dec);
            $this->datatables->select('id_detail,faktur,Kode,Nama,jumlah,satuan,harga,subtotal')
                            ->from('00-00-19-01-view-sales-order-detail');
                        $this->datatables->edit_column('harga','<div class="text-right">$1</div>','rp(harga)');
                        $this->datatables->edit_column('subtotal','<div class="text-right">$1</div>','rp(subtotal)');
                        $this->datatables->where('faktur',$faktur);
         
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('recording_pakan_detail/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a></div>
                <a id='$1' href='#' class='del_detail btn btn-danger btn-xs'><i class='fa fa-remove'></i> </a></div>" , 'id_detail');
            $this->datatables->unset_column('id_detail,Kode');
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
    function get_total($enkrip=null,$faktur=null){
        echo json_encode($this->sodb->get_detail_total($faktur));
    }
    function enkrip(){
        return md5($this->session->userdata('lihat').":".$this->getuser()."+".date('H:m'));
        // echo $this->session->userdata('sales_order');
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
        
       

        $this->load->view('sales_order_form_inside');
           
    }

    public function get($id=null){
        if($id!==null){
            echo json_encode($this->sodb->get_one($id));
        }
    }
    function tables(){
        $this->load->view('sales_order_data');
    }

    function getone($id=null){
        if($id!==null){
            $data=$this->sodb->get_one($id);
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
  
    function get_dropdown_kandang($enkrip,$id=null){
        echo json_encode($this->reqdb->dropdown_kandang($id));
    }
    function get_dropdown_gudang($enkrip,$id=null){
        echo json_encode($this->reqdb->dropdown_gudang($id));
    }
     function get_drop_barang($enkrip=null,$id_supplier=null){
        echo $this->dropdown_barang($id_supplier);
    }
    
    public function submit(){
        if ($this->input->post('ajax')){
          if ($this->input->post('id')){
            $this->sodb->update($this->input->post('id'));
          }else{
            $this->sodb->save();
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id')){
                $this->sodb->update($this->input->post('id'));
              }else{
                $this->sodb->save();
              }
          }
        }
    }
    public function submit_detail(){
        $data=array( 'faktur' => $this->input->post('faktur', TRUE),
           
           
            'id_barang' => $this->input->post('id_barang', TRUE),
           
            'jumlah' => $this->input->post('jumlah', TRUE),
           
            'id_satuan' => $this->input->post('id_satuan', TRUE),
           
            'harga_jual' => $this->input->post('harga_jual', TRUE),
        
           
            'id_user' => userid(),
           
            'datetime' => now(),
            );
        if ($this->input->post('ajax')){
          if ($this->input->post('id')){
            $this->sodb->update($this->input->post('id'));
          }else{
            $this->sodb->save_detail($data);
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id')){
                $this->sodb->update($this->input->post('id'));
              }else{
                $this->sodb->save_detail($data);
              }
          }
        }
    }
    

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->sodb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
     public function delete_detail(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->sodb->delete_detail($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    } 
    private function gen_faktur(){
        $last=$this->sodb->get_last_pt();
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

/** Module sales_order Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
