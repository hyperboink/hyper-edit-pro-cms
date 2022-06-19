<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends HY_Controller{

	function __construct(){

		parent::__construct();

		$this->load->library('session');

		$this->load->model('contact_model');

	}

	public function settings(){

		$data = [];

		$data['message'] = $this->session->flashdata('message');

		$contact_data = $this->contact_model->get();

		foreach($contact_data as $key => $contact){
			$data[$key] = $contact; 
		}

		$this->content = 'contact/page';

		$this->layout_admin($data);

	}

	public function update(){

		$data = [
			'phone' => $this->input->post('phone'),
			'mobile' => $this->input->post('mobile'),
			'fax' => $this->input->post('fax'),
			'email' => $this->input->post('email'),
			'address' => $this->input->post('address'),
			'info' => $this->input->post('info')
		];

		$this->contact_model->updateOrCreate($this->input->post('id'), $data);

		$this->session->set_flashdata('message', 'Successfully updated!');

		redirect($_SERVER['HTTP_REFERER']);

	}

	
}
 