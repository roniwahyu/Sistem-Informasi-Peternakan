<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Hutang_beli extends MX_Controller {
	function __construct(){
		parent::__construct();
		    //Load IgnitedDatatables Library
        $this->load->model('hutang_beli_model','hutangdb',TRUE);
        $this->session->set_userdata('lihat','hutang_beli');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;

     
        $this->template->add_css('plugins/datapicker/datepicker3.css');
        $this->template->add_js('plugins/datapicker/bootstrap-datepicker.js');
        $this->template->add_js('datepicker.js');
       
        
       
        $this->template->add_js('datatables.js');
        $this->template->add_js('muria.js');
        $this->template->add_js('crud-muria.js');
        $this->template->set_layout('dashboard');
	}
	public function index(){
		$this->template->set_title('Data Hutang Pembelian');
		$this->template->add_js('var baseurl="'.base_url().'hutang_beli/";','embed');  

		$this->template->load_view('hutang_beli_view',array(
			'view'=>'hutang_beli_data',
			'title'=>'Kelola Data Hutang Pembelian',
                        'subtitle'=>'Pengelolaan Hutang Pembelian',
                        'breadcrumb'=>array(
                            'Hutang Pembelian'),

			));
	}
	public function getdatatables(){
      
            $this->datatables->select('idsp,Kode,Nama,sisa_hutang')
                            ->from('00-00-06-02-view-hutang-supplier');
            $this->datatables->edit_column('sisa_hutang','<div class="text-right">$1</div>','rp(sisa_hutang)');
            $this->datatables->add_column('edit',"<div class='text-center'><div class=' btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('hutang_beli/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>

                </div></div>" , 'idsp');
            $this->datatables->unset_column('idsp');

      
        echo $this->datatables->generate();
    }
    function tables(){
        $this->load->view('hutang_beli_data');
    }

    function getone($id=null){
        if($id!==null){
            $data=$this->hutangdb->get_one($id);
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

    
}

/* End of file hutang_beli.php */
/* Location: ./ */
 ?>