<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Dashboard extends MX_Controller {
	function __construct(){
		parent::__construct();
        $this->load->model('dashboard_model','dashdb',TRUE);
	    $this->load->model('recording_telur/recording_telur_model','telurdb',TRUE);
        $this->lang->load('auth');
        if ( !$this->ion_auth->logged_in()): 
            redirect('../auth/login', 'refresh');
        // else:
            // redirect($this->session->userdata('lihat'),'refresh');
        endif;
     
       
      
        $this->template->add_js('crud.js');
        $this->template->set_layout('dashboard');

       }
     
    function chart_hasil_telur(){
        $data1=$this->telurdb->getrekap_hasil_bulanan();
      
         $this->template->add_css('plugins/morris/morris-0.4.3.min.css');
            $this->template->add_js('plugins/morris/raphael-2.1.0.min.js');
        
            $this->template->add_js('plugins/morris/morris.js');
         
            $this->template->add_js("
                var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

                Morris.Line({
                element: 'morris-line-chart',
                data:".json_encode($data1).",
                xkey: 'bulanan',
                ykeys: ['bakalan','peletrenteng','wagir'],
                labels: ['Bakalan Internal','Pelet Pulet',' Wagir Internal'],
                pointSize: 2,
                hideHover: 'auto',
                resize: true,
                 hoverCallback: function(index, options, content) {
                    return(content);
                },
                  xLabelFormat: function(x) { // <--- x.getMonth() returns valid index
                    var month = months[x.getMonth()];
                    return month;
                  },
                  dateFormat: function(x) {
                    var month = months[new Date(x).getMonth()];
                    return month;
                  },
                lineColors: ['#87d6c6', '#54cdb4','#1ab394'],
                lineWidth:2,
                pointSize:1,
            });",'embed');
    }
    public function index(){
        
        $this->chart_hasil_telur();
            // $this->template->add_js('demo/telur.js');
            $this->session->set_userdata("module",'farm');
           $this->template->add_js('muria.js');
        // $this->ion_auth->get_users_groups($user->id)->result()
        if ($this->ion_auth->logged_in()):
            $user = $this->ion_auth->user()->row();
                if ( ! empty($user)):
                    $userid=$user->id;
                    // $usergroup=$this->ion_auth->get_users_groups($user->id)->row()->id();
                    // $this->ion_auth->get_users_groups($userid)->row()->id
                    // echo $usergroup;

            endif;
        endif;
        
        if($this->ion_auth->in_group(array(1))):
            
        else:
        
        endif;
        $this->template->add_js('
            var ayamurl="'.base_url().'recording_ayam/";
            var telururl="'.base_url().'recording_telur/";
            var pakanurl="'.base_url().'recording_pakan/";
            var medisurl="'.base_url().'recording_medis/";
            var enkrip="'.$this->enkrip().'";
           
            ','embed'); 
        $this->template->add_js('
             // Tabeltrx.ajax.url(po_url).load();
            var Tabeltrx = $("#ayam").DataTable({
                        "ajax":{
                            "url":ayamurl+"last_activity/"+enkrip,
                            "dataType": "json"
                        },
                        "sServerMethod": "POST",
                        "bServerSide": true,
                         "paging":   false,
                        "deferRender": true,
                        "bFilter":false,
                         "ordering": false,  
                         
                    }); 
        var telur = $("#telur").DataTable({
                        "ajax":{
                            "url":telururl+"last_activity/"+enkrip,
                            "dataType": "json"
                        },
                        "sServerMethod": "POST",
                        "bServerSide": true,
                         "paging":   false,
                        "deferRender": true,
                        "bFilter":false,
                         "ordering": false,  

                    }); 
        var pakan = $("#pakan").DataTable({
                        "ajax":{
                            "url":pakanurl+"last_activity/"+enkrip,
                            "dataType": "json"
                        },
                        "sServerMethod": "POST",
                        "bServerSide": true,
                         "paging":   false,
                        "deferRender": true,
                        "bFilter":false,
                         "ordering": false,  

                    });
            var medis = $("#medis").DataTable({
                        "ajax":{
                            "url":medisurl+"last_activity/"+enkrip,
                            "dataType": "json"
                        },
                        "sServerMethod": "POST",
                        "bServerSide": true,
                         "paging":   false,
                        "deferRender": true,
                        "bFilter":false,
                         "ordering": false,  

                    });','embed');
        $this->template->load_view('dashboard_view',array(
                        'title'=>'Dashboard Peternakan (Poultry Layer Farming)',
                        'subtitle'=>'Peternakan',
                        'breadcrumb'=>array(
                            'Peternakan'),
            ));
        // redirect('site');

	}
    function enkrip(){
        return md5($this->session->userdata('lihat').":".$this->getuser()."+".date('H:m'));
        // echo $this->session->userdata('purchase_order');
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
   
   
}

/* End of file dashboard.php */
/* Location: ./ */

 ?>