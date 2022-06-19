<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends HY_Controller{

	function __construct(){

	    parent::__construct();

	    $this->load->library('session');

	    if($this->session->userdata('username')) redirect('admin/dashboard');
	}

	public function index(){		

		$this->login();

	}

	public function login(){

		$this->load->model('setting_model');

		$data['body_class'] = 'login-page';

		$data['site_page_title'] = 'Login';

		$data['maintenance'] = false;

		$this->rawr = 'wohoho';
		$this->content = 'auth/login';

		$this->layout($data, [
			'header' => false,
			'footer' => false
		]);


	}

	public function validate_login(){

		$this->load->library('form_validation');

		$this->load->library('bcrypt');

		$this->form_validation->set_rules('username', 'Username', 'required');

		$this->form_validation->set_rules('password', 'Password', 'required');


		if($this->form_validation->run()){

			$this->load->model('user_model');

			$username = $this->input->post('username');

			$password = $this->input->post('password');			

			$user = $this->user_model->getByUsername($username);	
			
			if($this->bcrypt->check_password($password, $user->password)){

				$user = array('username' => $username);

				$old_url = $this->session->userdata('old_url');

				$this->session->set_userdata($user);

				if($old_url){
					return redirect($old_url);
				}

				return redirect('admin/dashboard');

			}

		}

		$this->session->set_flashdata('error', 'Username/Password is incorrect.');

		return redirect('admin');
		

	}

	public function encrypt(){

		$this->load->view('auth/encrypt.php');

		$str = $this->input->post('encrypt_n');

		if($this->input->post('convertBtn')){

			$this->load->library('bcrypt');

			$convert =  $this->bcrypt->hash_password($str);

			echo $convert.'<br/>';

		}

	}


}
