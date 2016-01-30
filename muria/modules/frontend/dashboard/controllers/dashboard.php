<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Dashboard extends MX_Controller {
	function __construct(){
		parent::__construct();
	    $this->load->model('dashboard_model','dashdb',TRUE);
        $this->lang->load('auth');
        if ( !$this->ion_auth->logged_in()): 
            redirect('../auth/login', 'refresh');
     
        endif;


       }
	public function index(){
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


	}

   
}

/* End of file dashboard.php */
/* Location: ./ */

 ?>