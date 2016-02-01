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


      
        $this->template->add_js('muria.js');
        $this->template->add_js('crud.js');
        $this->template->set_layout('dashboard');
    }

    public function index() {
        $this->template->set_title('Kelola Beli');
        
        $this->template->add_js('var baseurl="'.base_url().'beli/";','embed');  
         $this->template->add_js('datatables.js');

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
        $this->template->add_js('var baseurl="'.base_url().'beli/";','embed');  


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
        $first=substr($last_po['Faktur'],0,2);
        $left=substr($last_po['Faktur'],2,4);
        $right=substr($last_po['Faktur'],-5);
        $nopo=number_format($right); 
        
        
        $newpo=strval($nopo+1);
        $newpo2=substr(strval("00000$newpo"),-5);
        
        $tahun=substr($left,0,2);
        $bulan=substr($left,2,4);
 
        if($tahun<>date('y')):
            $tahun=date('y');
            if($bulan==date('m')):
                $gen_po=strval($first.$tahun.$bulan."00001");
            elseif($bulan<>date('m')):
                $bulan=date('m');
                $gen_po=strval($first.$tahun.$bulan."00001");
            endif;
        elseif($tahun==date('y')):
            if(intval($bulan)<>date('m')):
                $bulan=date('m');
                $gen_po=strval($first.$tahun.$bulan."00001"); 
            elseif($bulan==date('m')):
                $gen_po=strval($first.$tahun.$bulan.$newpo2);
            endif;
        endif;
        return $gen_po;
    }
    function forms(){
        
       

        $this->load->view('beli_form_inside',array(
            // 'last_po'=> $last_po,
            'newpo'=>$this->generate_new_po(),
            // 'tahun'=>$this->left($left,2),
            // 'bulan'=>$this->right($left,2),
            // 'nopo'=>$right,
            ));
    }
    function showform(){
        $lastpo=$this->belidb->get_last_po();
        $this->template->add_js('var baseurl="'.base_url().'beli/";','embed');  
        $this->template->load_view('beli_wrapper_view',array(
                'newpo'=>generate_code($lastpo),
                'forms'=>'beli_form_inside',
                'title'=>'Order Pembelian / Purchase Order (PO)'
            ));
    }
    function new_po(){
        $lastpo=$this->belidb->get_last_po();
        $this->template->add_js('var baseurl="'.base_url().'beli/";','embed');  
        $this->template->load_view('beli_wrapper_view',array(
                'newpo'=>generate_code($lastpo),
                'forms'=>'beli_form_ajax',
                'title'=>'Order Pembelian / Purchase Order (PO)'
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
                $div.="<table id='tabel-detail' class='table table-condensed table-striped table-bordered'>";
                
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

                        $div.="<td style='width:75px;'><a id='kdbarang' class='openmodal btn btn-xs btn-primary' data-dismiss='modal' data-toggle='modal' href='#modal-detail' data-load-remote='".base_url('barang/getonekode/'.$value['Kode'].'/')."' data-remote-target='#modal-detail .modal-body'> ".$value['Kode']."</a></td>";
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
    public function submit_batch(){
        
            
                $faktur= $this->input->post('Faktur', TRUE);
                $tgl= $this->input->post('Tgl', TRUE);
                $kode= $this->input->post('Kode', TRUE);
                $qty= $this->input->post('Qty', TRUE);
                $satuan= $this->input->post('Satuan', TRUE);
                
        
            if(!empty($faktur)){
                if(!empty($kode)){
                    $jml=count($kode);
                    $i=0;
                    foreach ($kode as $kd) {
                        $new[]=array(
                            'faktur'=>$faktur,
                            'tgl'=>$tgl,
                            'kode'=>$kd,
                            'qty'=>$qty[$i],
                            'satuan'=>$satuan[$i],
                            );
                        # code...
                        
                        $i++;
                    }
                }
            }
            echo "<pre>";
            print_r($new);
         
            echo "</pre>";

        
            $result=$this->belidb->save_batch($new);
            if(!empty($result)):
                redirect('beli/show_po/'.$faktur."/",'refresh');
            else:
                redirect('beli/showform','refresh');
            endif;
         
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

    function show_po($po=null){
       
        $this->template->set_layout('invoicing');
        $this->template->load_view('purchase_order',array(
            'po'=> $this->belidb->get_detail($po),

            ));
    }
}

/** Module beli Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
