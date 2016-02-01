<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class beli extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->model('beli_model','belidb',TRUE);
        $this->session->set_userdata('lihat','beli');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;

        $this->template->add_js('plugins/dataTables/jquery.dataTables.js');
        $this->template->add_js('plugins/dataTables/dataTables.bootstrap.js');
        $this->template->add_css('plugins/dataTables/dataTables.bootstrap.css');
        $this->template->add_js('plugins/dataTables/dataTables.responsive.js');
        $this->template->add_css('plugins/dataTables/dataTables.responsive.css');
        
        $this->template->add_js('datatables.js');
        $this->template->add_js('muria.js');
        $this->template->add_js('crud.js');
        $this->template->set_layout('dashboard');
    }

    public function index() {
        $this->template->set_title('Kelola Beli');
        
        $this->template->add_js('var baseurl="'.base_url().'beli/";','embed');  
        

        //<!-- $this->template->add_js('datepicker.js'); -->
        
        $this->template->load_view('beli_view',array(
                        'title'=>'Kelola Data Beli',
                        'subtitle'=>'Pengelolaan Beli',
                        'breadcrumb'=>array(
                            'Beli'),
                        ));
        
    }
     
     //<!-- Start Primary Key -->
    

    public function getdatatables(){

        if($this->isadmin()==1):
            $this->datatables->select('id,Faktur,Tgl_po,jtotal')
                            ->from('00-00-03-01-view-po-2015');
            $this->datatables->edit_column('jtotal','<div class="text-right">$1</div>','jtotal');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('beli/getdetail/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> Detail PO</a>

                <a href='#outside' data-toggle='tooltip' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='$1'><i class='glyphicon glyphicon-edit'></i></a>
                <button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger'id='$1'><i class='glyphicon glyphicon-remove'></i></button>
                </div>" , 'Faktur');
            $this->datatables->unset_column('id');

        else:
            $this->datatables->select('id,Faktur,Tgl_po,jtotal')
                            ->from('00-00-03-01-view-po-2015');
            $this->datatables->edit_column('jtotal',"<div class='text-right'>$1</div>",'jtotal');

            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('beli/getdetail/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> Detail PO</a></div>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('beli/getdetail/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-primary btn-xs'><i class='fa fa-money'></i> Buka Invoice</a></div>" , 'Faktur');
            $this->datatables->unset_column('id');
        endif;
        echo $this->datatables->generate();
    } 
    public function getdatatablesx(){
        if($this->isadmin()==1):
            $this->datatables->select('id,Faktur,Tgl,Kode,NmBarang,Qty,Satuan,Harga,Jumlah,Status,')
                            ->from('beli');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('beli/getdetail/$2/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>

                <a href='#outside' data-toggle='tooltip' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='$1'><i class='glyphicon glyphicon-edit'></i></a>
                <button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger'id='$1'><i class='glyphicon glyphicon-remove'></i></button>
                </div>" , 'id');
            $this->datatables->unset_column('id');

        else:
            $this->datatables->select('id,Faktur,Tgl,Kode,NmBarang,Qty,Satuan,Harga,Jumlah,Status,')
                            ->from('beli');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('beli/getdetail/$2/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a></div>" , 'id');
            $this->datatables->unset_column('id');
        endif;
        echo $this->datatables->generate();
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
   

    public function get($id=null){
        if($id!==null){
            echo json_encode($this->belidb->get_one($id));
        }
    }
    function tables(){
        $this->load->view('beli_data');
    }
   /* function left($str, $length) {
         return substr($str, 0, $length);
    }

    function right($str, $length) {
         return substr($str, -$length);
    }
   */
    function generate_new_po(){
        $last_po=$last=$this->belidb->get_last_po();
        $left=substr($last_po['Faktur'],2,4);
        $right=substr($last_po['Faktur'],-5);
        $nopo=number_format($right); 
        
        echo "<pre>";
       
        print_r($last_po);
        echo "<br>Right:";
        print_r($right);
        echo "<br>PO:";
        print_r($nopo);
        echo "<br>New PO:"; 
        $newpo=strval($nopo+1);
        $newpo2=substr(strval("00000$newpo"),-5);
        print_r($newpo2);
         echo "<br>"; 
        
        // $right=$this->right($last_po['Faktur'],5);
        // $left=$this->left($last_po['Faktur'],2,4);
        // 
        $tahun=substr($left,0,2);
        $bulan=substr($left,2,4);
        // $bulan=$this->right($left,2);
        //
        // print_r($left);
        if($tahun<>date('y')):
            $tahun=date('y');
            if($bulan==date('m')):
                $gen_po=strval("PB".$tahun.$bulan."00001");
            elseif($bulan<>date('m')):
                $bulan=date('m');
                $gen_po=strval("PB".$tahun.$bulan."00001");
            endif;
        elseif($tahun==date('y')):
            if(intval($bulan)<>date('m')):
                $bulan=date('m');
                $gen_po=strval("PB".$tahun.$bulan."00001"); 
            elseif($bulan==date('m')):
                $gen_po=strval("PB".$tahun.$bulan.$newpo2);
            endif;
        endif;

        
        echo "<br>"; 
        echo date('m');
        echo "<br>"; 
        print_r($gen_po);
        echo "<br>Len:";
        echo strlen($last_po['Faktur']);
        echo "<br>Len:";
        echo strlen($gen_po);
        echo "<br>";
        // print_r($bulan);
        // print_r($nopo);
        echo "</pre>";
        return $gen_po;
    }
    function forms(){
        
       

        $this->load->view('beli_form_inside',array(
            'last_po'=> $last_po,
            // 'tahun'=>$this->left($left,2),
            // 'bulan'=>$this->right($left,2),
            // 'nopo'=>$right,
            ));
    }

    function getone($id=null){
        if($id!==null){
            $data=$this->belidb->get_one($id);
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
    function getdetail($faktur=null){
        if($faktur!==null){
            $datax=$this->belidb->get_detail($faktur);
            $jml=count($datax);
            // print_r($jml);
            // print_r($datax);
            $div='';
                $div.="<table class='table table-condensed table-striped table-bordered'>";
                
                $div.="<thead>";
                $div.="<th>Kode Barang</th>";
                $div.="<th>Nama Barang</th>";
                $div.="<th>Jumlah</th>";
                $div.="<th>Satuan</th>";
                $div.="<th>Harga Satuan</th>";
                $div.="<th>Subtotal</th>";
                $div.="</thead>";
                $div.="<tbody>";
                $total=0;
            foreach ($datax as $key => $value) {
                    # code...
                    $div.="<tr>";
                       
                        $div.="<td style='width:75px;'><a class='btn btn-xs btn-primary' href='".$value['id']."'> ".$value['Kode']."</a></td>";
                         $div.="<td>".$value['NmBarang']."</td>";
                         $div.="<td class='text-right'>".$value['Qty']."</td>";
                         $div.="<td>".$value['Satuan']."</td>";
                         $div.="<td class='text-right'>".$this->rupiah($value['harga'])."</td>";
                         $div.="<td class='text-right'>".$this->rupiah($value['jtotal'])."</td>";
                    $total=$total+$value['jtotal'];
                    $div.="</tr>";
                }    
            $div.="</tbody><tfoot><tr>";
            $div.="<th colspan='5' class='text-right' style='background:#ddd' ><h3>Total</h3></th><td class='text-right'><h3>".$this->rupiah($total)."</t3></td>";
            $div.="</tr></tfoot>";
            
            $div.="</table>";
           echo $div;
      
        }
      
    }

    public function submit(){
        if ($this->input->post('ajax')){
          if ($this->input->post('id')){
            $this->belidb->update($this->input->post('id'));
          }else{
            $this->belidb->save();
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id')){
                $this->belidb->update($this->input->post('id'));
              }else{
                $this->belidb->save();
              }
          }
        }
    }

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->belidb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
    
    function rupiah($data){
        return number_format($data,2,',','.');
    }
}

/** Module beli Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
