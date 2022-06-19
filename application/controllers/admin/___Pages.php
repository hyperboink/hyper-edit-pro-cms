<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*class Pages extends HY_Controller{

	private $dir_pages = 'templates/pages';

	function __construct(){

		parent::__construct();

		$this->output->delete_cache('/');

		$this->load->library('session');

		$this->load->model('page_model');

		$this->load->model('page_template');

	}

	public function index(){

		$data['pages'] = $this->page_template->all();

		$this->content = 'admin/pages';

		$this->layout_admin($data);

	}

	public function template($id){
		$this->load->model('page_template');

		$this->loadPage($id);

		$data = [];

		$data['message'] = $this->session->flashdata('message');

		$page_data = (array) $this->page_template->findPageById($id);

		foreach($page_data as $key => $page){

			if($key == 'content'){
				$data[$key] = json_decode($page, true);

				foreach($data[$key] as $content_key => $content){
					$title = str_replace($content['type'] . '_' , '', $content_key);
					$title = str_replace('_' , ' ', $title);
					$data[$key][$content_key]['title'] = ucwords($title);
				}
				
			}else{
				$data[$key] = $page;
			}

		}

		$this->content = 'admin/page';

		$this->layout_admin($data);

	}

	public function update($id){

		$this->load->model('shortcode');

		$inputs = $this->input->post();

		$page = $this->shortcode->findOne('page_template_id', $id);

		$page_shortcodes = json_decode($page->content, true);

		$shortcode_data = [];

		foreach($page_shortcodes as $key => $shortcodes){
			$shortcode_data[$key]['type'] = $page_shortcodes[$key]['type'];
			$shortcode_data[$key]['value'] = $this->input->post($key);
		}

		$shortcode_data_obj = json_encode($shortcode_data);

		if($shortcode_data_obj != $shortcode_results->content){
			$this->shortcode->update($page->id, [
				'content' => $shortcode_data_obj
			]);
			$this->session->set_flashdata('message', 'Page updated.');
		}else{
			$this->session->set_flashdata('message', 'No changes made.');
		}

		redirect($_SERVER['HTTP_REFERER']);

	}

	//Note: Be careful to edit this code. Your data might be lost.
	private function loadPage($id){

		$this->load->model('page_template');

		$this->load->model('shortcode');

		$template = [];

		$page = (array) $this->page_template->findById($id);

		if(count($page)){

			$shortcode_results = $this->shortcode->findOne('page_template_id', $id);

			$shortcode_content_array = count((array)$shortcode_results->content) ? json_decode($shortcode_results->content, true) : [];

			$path = APPPATH . 'views/' . $this->dir_pages . '/' . $page['title'] . '.php';

			$template_contents = file_get_contents($path);

			preg_match_all('/{(.*?)}/', $template_contents, $template_shortcodes);

			$shortcodes = $template_shortcodes[0];

			$shortcode_texts = $template_shortcodes[1];

			$shortcode_lists = $this->config->item('shortcode_lists');

			$shortcode_data = [];

			foreach($shortcode_texts as $key => $text){

				$shortcode_key = explode('_', $text)[0];

				if(array_key_exists($shortcode_key, $shortcode_lists)){

					$shortcode_data[$text] = [];

					foreach($shortcode_lists as $key => $shortcode_list){

						if($shortcode_key == $key){

							if(!empty($shortcode_content_array[$text]['value'])){
								$shortcode_list['value'] = $shortcode_content_array[$text]['value'];
							}

							$shortcode_data[$text] =  $shortcode_list;

							$template[$text] = $shortcode_list['value'];

						}

					}

				}

			}

			$shortcode_data_obj = json_encode($shortcode_data);

			if($shortcode_data_obj != $shortcode_results->content){

				if($shortcode_results->page_template_id != $id){

					$this->shortcode->create([
						'page_template_id' => $id,
						'content' => $shortcode_data_obj
					]);

				}else{

					$this->shortcode->update($shortcode_results->id, [
						'content' => $shortcode_data_obj
					]);

				}
				
			}

		}

	}*/
	
}
 