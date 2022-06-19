<?php
 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
/* load the MX_Router class */
require APPPATH . "third_party/MX/Controller.php";
 

class MY_Controller extends MX_controller{

 	function __contstruct(){

 		parent::construct();

 		if (version_compare(CI_VERSION, '2.1.0', '<')) {

            $this->load->library('security');

        }

 	}
 	
}

class HY_Controller extends MY_Controller{

 	private $tmpl = [];

	protected $data;

	function __construct(){

		parent::__construct();

		$this->load->library('parser');

	}

	/**
	 * Render page
	 * @param  array  $data         data to be displayed in the page
	 * @param  array  $template_set template settings to be rendered
	 * @return [type]               none
	 */
 	public function layout($data = [], $template_set = []){

 		$this->load->model('settings/settings_model');

		$setting = $this->settings_model->get();

		$maintenance_exception = $data['maintenance'] ?? true;

		if(isset($data['page_status']) && !$data['page_status']){
 			$template_set['header'] = false;
 			$this->content = 'templates/404';
 			$template_set['footer'] = false;
 		}

 		$data['body_class'] = $data['body_class'] ?? $data['slug'] ?? '';

		$this->tmpl['head_tag'] = $this->parser->parse('templates/layout/head_tags' , $data, TRUE);

 		$setting->maintenance && $maintenance_exception
 			? $this->tmpl['content'] = $this->parser->parse('maintenance' , $data, TRUE)
 			: $this->set_layout($data, $template_set);

 		$this->tmpl['additional_script'] = html_entity_decode($setting->additional_script);

		$this->parser->parse('templates/layout/main', $this->tmpl);

	}

	private function set_layout($data = [], $template_set = []){

		$template_base = [
 			'head_tags' => true,
 			'header' => true,
 			'content' => true,
 			'sidebar' => true,
 			'footer' => true
 		];

 		$template_data = array_merge($template_base, $template_set);

 		foreach($data as $key => $__data){
 			$this->tmpl[$key] = $__data;
 		}

		foreach($template_data as $key => $is_template_set){

			if($is_template_set){

				$this->tmpl[$key] = $this->parser->parse(($key == 'content' ? $this->content : 'templates/layout/' . $key), $data, TRUE);

			}

		}

	}

 	/**
	 * Render admin page
	 * @param  array  $data         data to be displayed in the page
	 * @param  array  $template_set template settings to be rendered
	 * @return [type]               none
	 */
	public function layout_admin($data = [], $template_set = []){		

		$this->load->library('session');

	    $sess = $this->session->userdata('username');

	    if(!$sess){

	    	$oldUrl = ['old_url' => $_SERVER['PATH_INFO']];

	    	$this->session->set_userdata($oldUrl);

			redirect('/admin');

	    }

	    $data['user'] = $sess;

	    $data['prev_url'] = $_SERVER['HTTP_REFERER'] ?? '';

	    $template_base = [
 			'headtags' => true,
 			'header' => true,
 			'sidebar' => true,
 			'content' => true,
 			'footer' => true
 		];

 		$template_data = array_merge($template_base, $template_set);

		foreach($template_data as $key => $template_is_set){

			if($template_is_set){

				$this->tmpl[$key] = $this->load->view(($key == 'content' ? $this->content : 'admin/layout/'.$key), $data, TRUE);

			}

		}
		
		$this->load->view('admin/layout/main', $this->tmpl);

	}

}
