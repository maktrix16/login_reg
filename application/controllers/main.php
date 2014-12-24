<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('user');  
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		date_default_timezone_set('America/Los_Angeles'); 
//		$this->output->enable_profiler();		
	}

	public function index()
	{
		$user_id=$this->session->userdata('user_id');

		// Get user info using user_id from session data
		if (!empty($user_id)) {
			$user['user']=$this->user->get_user_by_id($user_id);
			$this->load->view('main_page',$user);
		}
		// If user_id is empty at the session, then logout
		else{
			redirect('/users/logout');
		}
	}


}