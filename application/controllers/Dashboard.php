<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends HY_Controller{

	private $dir_pages = 'templates/pages';

	function __construct(){

		parent::__construct();

		$this->load->library('session');

	}

	public function index(){

		$this->content = 'admin/dashboard';

		$this->layout_admin();

	}

	public function logout(){

		$this->session->sess_destroy();

		redirect('admin');

	}

	public function clear(){
		$this->db->cache_delete_all();

		redirect('index.php/admin/dashboard');
	}

	
	
}
 