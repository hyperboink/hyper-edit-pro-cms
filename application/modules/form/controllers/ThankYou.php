<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ThankYou extends HY_Controller{

	function __construct(){

		parent::__construct();

	}

	public function index(){

		$data['body_class'] = 'thankyou';

		$this->content = 'templates/thank_you';

		$this->layout($data, [
			'header' => false,
			'footer' => false,
		]);
		
	}
	
	
}
 