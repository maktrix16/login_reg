<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

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
		$this->load->view('login_page');
	}

	public function login()
	{
		if ($this->form_validation->run('login')) {  
			$post=$this->input->post(NULL,TRUE);
			$user=$this->user->get_user_by_email($post['email_login']);
			$this->session->set_userdata('user_id',$user['id']);
			redirect('/main');
		}
		else $this->load->view('login_page');
	}

	//callback function for form validation to check email password validity
	public function login_check($email)
	{
		$user=$this->user->get_user_by_email($email);
		$password=md5($this->input->post('password_login',TRUE));

		if (empty($user['password'])) {$user['password']='';}

		if ($user['password'] != $password){
			$this->form_validation->set_message('login_check', 'The %s failed due to invalid email / password combination');
			return false;
		}
		return true;
	}

	// Registration Method
	public function register(){
		if($this->form_validation->run('register')){
			$post=$this->input->post(NULL,TRUE);
			$user=array(
				'name'=>$post['name'],
				'email'=>$post['email_reg'],
				'password'=>md5($post['password_reg']),
				'birthday'=>$post['birthday'],
			);
			$this->user->add_user($user);
			$user_id=$this->user->get_last_insert_id();
			$this->session->set_userdata('user_id',$user_id['LAST_INSERT_ID()']);
			redirect('/main');
		}
		else $this->load->view('login_page');		
	}

	// Logout or Log Off Method - destroys session and return to login page
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}

