<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class delivery_order extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->model('delivery_order_model','devdb',TRUE);
        $this->session->set_userdata('lihat','delivery_order');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;

           
        
        $this->template->add_js('datatables.js');
        $this->template->add_js('muria.js');
        $this->template->add_js('crud.js');
        $this->template->set_layout('dashboard');
    }

    public function index() {
        $this->template->set_title('Kelola Order Pengiriman/Delivery Order ');
        $this->template->add_js('var baseurl="'.base_url().'delivery_order/";','embed');  
        $this->template->load_view('delivery_order_view',array(
            'view'=>'delivery_order_data',
            'title'=>'Kelola Data Order Pengiriman/Delivery Order ',
            'subtitle'=>'Pengelolaan Order Pengiriman/Delivery Order ',
            'form_title'=>'Order Pengiriman/Delivery Order ',
            'breadcrumb'=>array(
            'Order Pengiriman/Delivery Order '),
        ));
    }
     public function baru() {
        $this->template->set_title('Kelola Order Pengiriman/Delivery Order ');
        $this->template->add_js('plugins/select2/select2.min.js');
        $this->template->add_css('plugins/select2/select2.min.css');
        $this->template->add_js('modules/recording.js');
        $this->template->add_js('var baseurl="'.base_url().'delivery_order/";
            var enkrip="'.$this->enkrip().'";
            var brgsatuurl="'.base_url('barang_satuan').'/"; 
            $("#id_customer").select2();
            ','embed');  
        $default['is_approved']=true;
        $last=$this->devdb->get_last();
        $default['faktur']=genfaktur($last['faktur'],'DO');
        $this->template->load_view('delivery_order_view',array(
            'view'=>'form_delivery',
            'default'=>$default,
            'opt_kirim'=>array(),
            'opt_armada'=>array(),
            'opt_gudang'=>array(),
            'opt_customer'=>$this->devdb->get_customer(),
            'title'=>'Kelola Data Order Pengiriman/Delivery Order ',
            'subtitle'=>'Pengelolaan Order Pengiriman/Delivery Order ',
            'breadcrumb'=>array(
            'Order Pengiriman/Delivery Order '),
        ));
        
    }
     
     //<!-- Start Primary Key -->
    

    public function getdatatables(){
        if($this->isadmin()==1):
            $this->datatables->select('id,faktur,faktur_reff,faktur_po,id_customer,tanggal,tanggal_kirim,kirim_via,keterangan,alamat_kirim,alamat_tagihan,biaya_id,biaya_kirim,armada_id,is_approved,user_id,datetime,')
                            ->from('delivery_order');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('delivery_order/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>

                <a href='#outside' data-toggle='tooltip' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='$1'><i class='glyphicon glyphicon-edit'></i></a>
                <button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger'id='$1'><i class='glyphicon glyphicon-remove'></i></button>
                </div>" , 'id');
            $this->datatables->unset_column('id');

        else:
            $this->datatables->select('id,faktur,faktur_reff,faktur_po,id_customer,tanggal,tanggal_kirim,kirim_via,keterangan,alamat_kirim,alamat_tagihan,biaya_id,biaya_kirim,armada_id,is_approved,user_id,datetime,')
                            ->from('delivery_order');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('delivery_order/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a></div>" , 'id');
            $this->datatables->unset_column('id');
        endif;
        echo $this->datatables->generate();
    }
    function enkrip(){
        return md5($this->session->userdata('lihat').":".$this->getuser()."+".date('H:m'));
        // echo $this->session->userdata('delivery_order');
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
        
       

        $this->load->view('delivery_order_form_inside');
           
    }

    public function get($id=null){
        if($id!==null){
            echo json_encode($this->devdb->get_one($id));
        }
    }
    function tables(){
        $this->load->view('delivery_order_data');
    }

    function getone($id=null){
        if($id!==null){
            $data=$this->devdb->get_one($id);
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
            $this->devdb->update($this->input->post('id'));
          }else{
            $this->devdb->save();
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id')){
                $this->devdb->update($this->input->post('id'));
              }else{
                $this->devdb->save();
              }
          }
        }
    }
    

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->devdb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
     public function delete_detail(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->devdb->delete_detail($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    } 
    private function gen_faktur(){
        $last=$this->devdb->get_last_pt();
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

/** Module delivery_order Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
