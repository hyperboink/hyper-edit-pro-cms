<?php
/*defined('BASEPATH') OR exit('No direct script access allowed');



class Pages extends HY_Controller{

	private $dir_pages1 = 'pages-v1';
	private $dir_pages = 'templates/pages';

	function __construct(){

		parent::__construct();

	}

	//v1
	public function index($id){

		$this->load->model('page_model_test');

		$data['page'] = $this->page_model_test->findById($id);

		$this->content = count($data['page'])
			? $this->dir_pages1 . '/pages'
			: '404';

		$this->layout($data);

	}

	
	public function template($id){

		$this->loadPage($id);

	}

	//v2 - Note: careful to edit this code.
	private function loadPage($id){

		$template = [];

		//Contact
		$this->load->model('contact_model');

		$contact_data = $this->contact_model->get();

		foreach($contact_data as $key => $contact){
			$template['contact_' . $key] = $contact;
		}

		//Social
		$this->load->model('social/social_model');

		$social_data = $this->social_model->active();

		foreach($social_data as $key => $social){
			$template['social_' . $social['name']] = $social['url'];
		}



		//Page Template
		$this->load->model('page_template');

		$this->load->model('shortcode');

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

			//pre($shortcode_data_obj);

		}

		if(count($page)){
			$template['id'] = $page['id'];
		}

		//pre($template);
		$this->content = array_key_exists('title', $page) 
			? $this->dir_pages . '/' . $page['title']
			: '404';

		$this->layout($template);

	}

}*/
