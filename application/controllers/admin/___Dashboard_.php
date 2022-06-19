<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_ extends HY_Controller{

	function __construct(){

		parent::__construct();

		$this->output->delete_cache('/');

		$this->load->model('page_model');

	}

	public function index(){

		$this->content = 'admin-orig/hyperadmin';

		$data['sections'] = $this->page_model->all();

		$data['body_class'] = 'dashboard-page'; 

		foreach($data['sections'] as $key => $section){

			$data['section'.($key + 1)] = [$section];

		}

		$this->layout_admin($data);

	}

	public function update_page(){

		$id = $this->input->post('id');

		$posts_data = ['page_title', 'page_content'];

		$data['page_section_title'] = $this->input->post('page_section_title');
		
		foreach($posts_data as  $post_data){
			
			$post = $this->input->post($post_data, true);

			foreach($post as $key => $post_val){
				$key += 1;
				$data[$post_data.(!$key || $key <= 1 ? '' : '_'.$key)] = $post_val;
			}

		}
		
		$this->page_model->update($id, $data);	
		
		//redirect('index.php/admin/dashboard');

			
	}

	public function logout(){

		$this->load->library('session');

		$this->session->sess_destroy();

		redirect('hyperadmin');

	}

	
	
}
 