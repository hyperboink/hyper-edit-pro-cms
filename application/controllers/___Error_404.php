<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error_404 extends HY_Controller{

	function __construct(){

	    parent::__construct();
	   
	}
	 

	public function index(){

		$data['body_class'] = '404';	
		$data['site_page_title'] = '404';

		$this->content = 'templates/404';

		$this->layout($data, [
			'footer' => false
		]);

	}


	
}
