<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Send extends HY_Controller{

	function __construct(){

	    parent::__construct();
	   
	}
	 
	public function index(){

		/*if($this->input->post('hypersubmit')){

			$this->load->model('form/form_model');
			$data = $this->form_model->all();

			$config = array();
			$config['useragent'] = "CodeIgniter";
			$config['mailpath'] = "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
			$config['protocol'] = "smtp";
			$config['smtp_host'] = "localhost";
			$config['smtp_port'] = "25";
			$config['mailtype'] = 'html';
			$config['charset'] = 'utf-8';
			$config['newline'] = "\r\n";
			$config['wordwrap'] = TRUE;

			foreach($data as $form){

				$this->load->library('email');

				$this->email->initialize($config);

				$hyper_name = $this->input->post('name');
				$hyper_email = $this->input->post('email');
				$hyper_address = $this->input->post('address');
				$hyper_message = $this->input->post('message');

				$this->email->from($hyper_email, $form->form_subject);
				$this->email->to($form->form_email);
				$this->email->cc($form->form_cc); 
				$this->email->subject($hyper_name);
				$hyper_message_body = 'Name: '.$hyper_name.'<br/>Email: '.$hyper_email.'<br/>Address: '.$hyper_address.'<br/>Message: '.$hyper_message;
				$this->email->message($hyper_message_body); 
				$this->email->send();

				return redirect('form/thank_you');

			}
			
		}

		return redirect(base_url());*/

	}

	
	
}
