<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Create custom pages that generates files
class Template extends HY_Controller{

	function __construct(){

		$this->load->model('template/template_model');

	}

	public function enableMeta(){
		$this->template_model->update($id, $page_settings);
	}

}
