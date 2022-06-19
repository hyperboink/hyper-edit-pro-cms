<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Global_setting extends HY_Controller{

	function __construct(){

		parent::__construct();

		$this->load->model('setting_model');

	}

	public function index(){		

		$data['settings'] = $this->setting_model->all();

		$data['body_class'] = 'setting-page'; 

		$this->content = 'admin-orig/settings';

		$this->layout_admin($data);

	}
	
	public function update_global(){

		$id = $this->input->post('id', true);

		$data = array(
			'site_title' => $this->input->post('sitetitle_'.$id, true),
			'site_tagline' => $this->input->post('sitetagline_'.$id, true),
			'site_maintenance' => $this->input->post('maintenance_'.$id, true)
		);
		
		$this->setting_model->update($id, $data);

		//redirect('index.php/admin/dashboard/settings');

	}
	
	

	
	
}
 