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
       function data(){
         $data=" { y: '2006', a: 100, b: 90 },
            { y: '2007', a: 75, b: 65 },
            { y: '2008', a: 50, b: 40 },
            { y: '2009', a: 75, b: 65 },
            { y: '2010', a: 50, b: 40 },
            { y: '2011', a: 75, b: 65 },
            { y: '2012', a: 100, b: 90 }";
        $data1=array(
            array('y'=>'2006','B01'=>100,'B02'=>90),
            array('y'=>'2006','B01'=>100,'B02'=>90),
            array('y'=>'2006','B01'=>100,'B02'=>90),
            array('y'=>'2006','B01'=>100,'B02'=>90),
            );
        print_r($data);

        print_r(json_encode($data1));
       }
    public function index(){
        $data1=$this->telurdb->getrekap_hasil_bulanan();
        // echo "<pre>";
        // print_r(json_encode($data1));
        // echo "</pre>";
         $this->template->add_css('plugins/morris/morris-0.4.3.min.css');
            $this->template->add_js('plugins/morris/raphael-2.1.0.min.js');
            $this->template->add_js('plugins/morris/raphael-2.1.0.min.js');
            $this->template->add_js('plugins/morris/morris.js');
           /*  $data1=array(
                array('y'=>'2006','B01'=>100,'B02'=>90),
                array('y'=>'2007','B01'=>200,'B02'=>300),
                array('y'=>'2008','B01'=>300,'B02'=>40),
                array('y'=>'2009','B01'=>400,'B02'=>50),
                );*/
          /*  $this->template->add_js('
            Morris.Line({
                    element: "morris-line-chart",
                   
                    data:'.json_encode($data1).',
                    xkey: ["bulan"],
                    ykeys: ["jml"],
                    labels: ["Series A", "Series B"],
                    hideHover: "auto",
                    resize: true,
                    lineColors: ["#54cdb4","#1ab394"],
                });
                ','embed');
            */
            /* data: [{ period: '2010 Q1', iphone: 2666, ipad: null, itouch: 2647 },
                    { period: '2010 Q2', iphone: 2778, ipad: 2294, itouch: 2441 },
                    { period: '2010 Q3', iphone: 4912, ipad: 1969, itouch: 2501 },
                    { period: '2010 Q4', iphone: 3767, ipad: 3597, itouch: 5689 },
                    { period: '2011 Q1', iphone: 6810, ipad: 1914, itouch: 2293 },
                    { period: '2011 Q2', iphone: 5670, ipad: 4293, itouch: 1881 },
                    { period: '2011 Q3', iphone: 4820, ipad: 3795, itouch: 1588 },
                    { period: '2011 Q4', iphone: 15073, ipad: 5967, itouch: 5175 },
                    { period: '2012 Q1', iphone: 10687, ipad: 4460, itouch: 2028 },
                    { period: '2012 Q2', iphone: 8432, ipad: 5713, itouch: 1791 } ],*/
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