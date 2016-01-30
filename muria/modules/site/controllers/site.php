<?php 

class Site extends MX_Controller{
	function __construct(){
		parent::__construct();
		 if ($this->session->userdata("login") != TRUE) {
            $this->session->set_flashdata('login_notif','<p>You must be logged in</p>');
            //redirect('login', 'refresh');
        }
        //Load IgnitedDatatables Library
        $this->load->library(array('Datatables','template','Ion_auth/Ion_auth'));
        $this->load->model('site_model','sitedb',TRUE);
        $this->load->library('form_validation');
        $this->load->helper('url','form');
        
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
        $this->load->helper('language');
        
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;

	}
	function index(){
        // echo frontend_url();
		$this->template->set_title('Aplikasi Kinerja Karyawan THL');
        $this->template->set_layout('default');
        $this->template->load_view('site',array());

	}
    
    function sukses(){
        $this->template->set_title('Aplikasi Rekomendasi');
        $this->template->set_layout('home');
        $this->template->load_view('sukses',array(
            // 'element'=>'sukses',
            'message'=>$this->session->userdata('message'),
            'link'=>$this->session->userdata('prev_url'),
            ));
    }
    function gagal(){
        $this->template->set_title('Aplikasi Rekomendasi');
        $this->template->set_layout('home');
        $this->template->load_view('gagal',array(
            // 'element'=>'sukses',
            'message'=>$this->session->userdata('message'),
            'link'=>$this->session->userdata('prev_url'),
            ));
    }
    
    function registrasi(){
        $tables = $this->config->item('tables','ion_auth');

        //validate form input

        $this->form_validation->set_rules('username', $this->lang->line('create_user_validation_fname_label'), 'required|xss_clean');
        $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|is_unique['.$tables['users'].'.email]');
        $this->form_validation->set_rules('password1', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

        if ($this->form_validation->run() == true)
        {
            // $username = strtolower($this->input->post('first_name')) . ' ' . strtolower($this->input->post('last_name'));
            $username = strtolower($this->input->post('username'));
            $email    = strtolower($this->input->post('email'));
            $password = $this->input->post('password1');

            $additional_data = array(
                'first_name' => $this->input->post('firstname'),
                'last_name'  => $this->input->post('lastname'),
            );
            $groups=array('4');
        }
        // }else{
        //     redirect('site','refresh');
        // }
        if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email, $additional_data,$groups))
        {
            //check to see if we are creating the user
            //redirect them back to the admin page
            $this->session->set_userdata('message', $this->ion_auth->messages());
            $this->session->set_userdata('prev_url',base_url('site'));
            redirect("site/sukses", 'refresh');
        }else{
           $this->session->set_userdata('message',(validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message'))));
           $this->session->set_userdata('prev_url',base_url('site'));
           redirect("site/gagal", 'refresh');
        }
    }

}

 ?>