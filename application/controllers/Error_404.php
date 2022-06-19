<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error_404 extends HY_Controller{

	function __construct(){

	    parent::__construct();
	   
	}

	public function index(){

		$data['body_class'] = '404';	
		$data['site_page_title'] = 'Page Not Found.';	
		$data['site_title'] = 'Page Not Found.';	
		$data['page_title'] = 'Page Not Found.';	

		$this->content = 'templates/404';

		$this->layout($data, [
			'header' => false,
			'footer' => false
		]);

	}


	
}
