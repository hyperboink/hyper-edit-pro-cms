<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends HY_Controller{

	function __construct(){

		parent::__construct();

		$this->load->library('session');

		$this->load->model('user_model');

		$this->load->model('settings_model');

		$this->load->model('template/template_model');

	}

	public function general(){

		$data = [];

		$data['message'] = $this->session->flashdata('message');

		$data['pages'] = $this->template_model->all();

		$setting_data = $this->settings_model->get();

		foreach($setting_data as $key => $setting){
			if($key != 'password'){
				$data[$key] = $setting; 
			}

			if($key == 'username'){
				$data[$key] = $this->session->userdata('username');
			}
		}

		$this->content = 'settings/page';

		$this->layout_admin($data);

	}

	public function changePassword(){

		$data = [];

		$data['message'] = $this->session->flashdata('message');

		$setting_data = $this->settings_model->get();

		foreach($setting_data as $key => $setting){
			if($key != 'password'){
				$data[$key] = $setting; 
			}
		}

		$this->content = 'settings/change-password';

		$this->layout_admin($data);

	}

	public function update(){

		$data = [
			'site_title' => $this->input->post('site_title'),
			'maintenance' => $this->input->post('maintenance') ? 1 : 0,
			'meta_enabled' => $this->input->post('meta_enabled') ? 1 : 0,
			'default_page' => $this->input->post('default_page'),
			'additional_script' => htmlentities($this->input->post('additional_script'))
		];

		$this->settings_model->update($this->input->post('id'), $data);

		$this->user_model->update($this->input->post('user_id'), ['email' => $this->input->post('email')]);

		$message = [
			'status' => 'success',
			'text' => 'Successfully updated form.'
		];

		$this->session->set_flashdata('message', $message);

		redirect($_SERVER['HTTP_REFERER']);

	}

	public function updatePassword(){

		/*$this->user_model->update($this->input->post('user_id'), ['email' => $this->input->post('email')]);

		$message = [
			'status' => 'success',
			'text' => 'Successfully updated form.'
		];

		$this->session->set_flashdata('message', $message);

		redirect($_SERVER['HTTP_REFERER']);*/



		$this->load->library('form_validation');

		$this->load->library('bcrypt');

		$this->form_validation->set_rules('password', 'Current Password', 'required|min_length[8]');
		$this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[8]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');


		if($this->form_validation->run()){

			$this->load->model('user_model');

			$username = $this->session->userdata('username');

			$password = $this->input->post('password');
			$new_password = $this->input->post('new_password');
			$confirm_password = $this->input->post('confirm_password');		

			$user = $this->user_model->getByUsername($username);	
			
			if($this->bcrypt->check_password($password, $user->password)){

				$this->user_model->updateByUsername($username, ['password' => $this->bcrypt->hash_password($new_password)]);

				$message = [
					'status' => 'success',
					'text' => 'Successfully change password.'
				];

				$this->session->set_flashdata('message', $message);

				return redirect('settings/general');

			}else{

				$message = [
					'status' => 'danger',
					'text' => 'Current password is incorrect.'
				];

				$this->session->set_flashdata('message', $message);

			}

		}

		return $this->changePassword();

	}

	
}
 