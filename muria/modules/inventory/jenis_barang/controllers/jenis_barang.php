<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class jenis_barang extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->model('jenis_barang_model','jenisdb',TRUE);
        $this->session->set_userdata('lihat','jenis_barang');
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
        $this->template->set_title('Kelola Jenis_barang');
        
        $this->template->add_js('var baseurl="'.base_url().'jenis_barang/";','embed');  
        

        //<!-- $this->template->add_js('datepicker.js'); -->
        
        $this->template->load_view('jenis_barang_view',array(
                        'title'=>'Kelola Data Jenis_barang',
                        'subtitle'=>'Pengelolaan Jenis_barang',
                        'breadcrumb'=>array(
                            'Jenis_barang'),
                        ));
        
    }
     
     //<!-- Start Primary Key -->
    

    public function getdatatables(){
        if($this->isadmin()==1):
            $this->datatables->select('id,Kode,Keterangan,parent,User,Time,')
                            ->from('jenis_barang');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('jenis_barang/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>

                <a href='#outside' data-toggle='tooltip' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='$1'><i class='glyphicon glyphicon-edit'></i></a>
                <button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger'id='$1'><i class='glyphicon glyphicon-remove'></i></button>
                </div>" , 'id');
            $this->datatables->unset_column('id');

        else:
            $this->datatables->select('id,Kode,Keterangan,parent,User,Time,')
                            ->from('jenis_barang');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('jenis_barang/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a></div>" , 'id');
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
            echo json_encode($this->jenisdb->get_one($id));
        }
    }
    public function get_jenis_id($gol=null){
        if($gol!==null){
            echo json_encode($this->jenisdb->get_last_jenis($gol));
        }
    }
    function gen_jenis_id($id){
        $gol=$this->jenisdb->get_last_jenis($id,TRUE);
        // print_r($id);
        if(!empty($gol)):
            $right=strval(substr($gol['Kode'],-4));
            $new=$right+1;
            $new2="0000".$new;
            $gen0=substr($new2,-4);
            $gen=$gol['id_golongan'].$gen0;
        else:
            $gen=json_encode($gol)."0001";
        endif;
        // echo "<br>";
        return $gen;
    }
    function get_new_jenis($enkrip=null,$gol){
        echo $this->gen_jenis_id($gol);
    }
    function tables(){
        $this->load->view('jenis_barang_data');
    }

    function getone($id=null){
        if($id!==null){
            $data=$this->jenisdb->get_one($id);
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
            $this->jenisdb->update($this->input->post('id'));
          }else{
            $this->jenisdb->save();
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id')){
                $this->jenisdb->update($this->input->post('id'));
              }else{
                $this->jenisdb->save();
              }
          }
        }
    }

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->jenisdb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
    

}

/** Module jenis_barang Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
