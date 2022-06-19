<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends HY_Controller{

	private $dir_pages = 'templates/pages';

	function __construct(){

		parent::__construct();

		$this->load->library('session');

	}

	public function index(){

		$this->load->model('settings/settings_model');

		$data['settings'] = $this->settings_model->getColumn('maintenance');

		$this->content = 'admin/dashboard';

		$this->layout_admin($data);

	}

	public function logout(){

		$this->session->sess_destroy();

		redirect('admin');

	}

}
 