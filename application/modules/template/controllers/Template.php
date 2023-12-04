<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * NOTE: Be careful to edit this file. Data might be lost.
 */
class Template extends HY_Controller{

	private $template_dir = 'templates/pages';
	private $layout_dir = 'templates/layout';
	private $template = [];
	private $errorMsg = null;

	function __construct(){

		parent::__construct();

		$this->load->library('session');

		$this->load->model('template/template_model');

		$this->load->model('template/layout_model');

		$this->load->model('template/shortcode_model');

		$this->load->model('settings/settings_model');

		$this->load->library('image_lib');

	}

	/**
	 * Load page in the index
	 * @return none
	 */
	public function index(){

		$this->load_page();

	}

	/**
	 * Load page by id
	 * @param  int $id page id
	 * @return none
	 */
	public function page($id){
		$this->load_page($id);
	}

	/**
	 * Load list of pages in the admin
	 * @return none
	 */
	public function list(){

		$data['pages'] = $this->template_model->all();

		foreach($data['pages'] as $key => $page){
			$data['pages'][$key]['created_at'] = dateFormat($page['created_at']);
			$data['pages'][$key]['updated_at'] = dateFormat($page['updated_at']);
		}

		$this->content = 'template/list';

		$this->layout_admin($data);

	}

	/**
	 * Load edit page in the admin
	 * @param  int $id [description]
	 * @return none
	 */
	public function edit($id){

		$this->load_page($id, true);

		$data = [];

		$data['message'] = $this->session->flashdata('message');

		$data['setting'] = $this->settings_model->getColumn('meta_enabled');

		$page_data = (array) $this->template_model->findPageById($id);

		foreach($page_data as $key => $page){

			if($key == 'content'){
				$data[$key] = json_decode($page, true);

				foreach($data[$key] as $content_key => $content){
					$title = str_replace($content['type'] . '_' , '', $content_key);
					$title = str_replace('_' , ' ', $title);
					$data[$key][$content_key]['title'] = ucwords($title);
					
					if($data[$key][$content_key]['type'] == 'gallery'){
						$data[$key][$content_key]['value'] = is_array($data[$key][$content_key]['value']) ? $data[$key][$content_key]['value'] : json_decode($data[$key][$content_key]['value'], true);
						
						foreach($data[$key][$content_key]['value'] as $g_key => $gallery){
							$data[$key][$content_key]['value'][$g_key]['g_image_prop'] = $gallery['g_image'] ? $this->image($gallery['g_image']) : [] ;
						}

					}

					if($data[$key][$content_key]['type'] == 'image'){

						$data[$key][$content_key]['value'] = $this->image($data[$key][$content_key]['value']);

					}

				}
				
			}else{
				$data[$key] = $page;
			}


		}

		$this->content = 'template/edit';

		$this->layout_admin($data);

	}

	/**
	 * Update page in the admin
	 * @param  int $id page id
	 * @return none
	 */
	public function update($id){

		$this->load->model('shortcode_model');

		$inputs = $this->input->post();

		$page = $this->shortcode_model->findOne('page_template_id', $id);

		$page_shortcodes = json_decode($page->content, true);

		$shortcode_data = [];

		foreach($page_shortcodes as $key => $shortcodes){
			
			$shortcode_data[$key]['type'] = $page_shortcodes[$key]['type'];
			$shortcode_data[$key]['status'] = $this->input->post($key . '_status');

			switch($shortcodes['type']){

				case 'image':

					$shortcode_data[$key]['value'] = !empty($_FILES[$key]['name']) ? $this->upload_file($key, [$page_shortcodes[$key]['value'] ?? '']) : $page_shortcodes[$key]['value'];

					if($this->input->post($key . '_reset')){
						$shortcode_data[$key]['value'] = '';
					}

					remove_image($this->input->post($key . '_current_image'));

					break;

				case 'gallery':

					$gallery_data = [];

					$gallery_titles = $this->input->post($key . '_title');

					foreach($gallery_titles as $g_key => $gallery_title){

						$gallery_array = is_array($page_shortcodes[$key]['value']) ? $page_shortcodes[$key]['value'] : json_decode($page_shortcodes[$key]['value'], true);

						$gallery_data[] = [
							'g_title' => $gallery_title,
							'g_image' => !empty($_FILES[$key . '_image_'. $g_key]['name']) 
								? $this->upload_file($key . '_image_'. $g_key, ['existingImage' => $gallery_array[$g_key]['g_image'] ?? '']) 
								: $gallery_array[$g_key]['g_image']
						];

					}

					foreach($this->input->post($key . '_current_image') as $g_key => $image) remove_image($image);

					$shortcode_data[$key]['value'] = json_encode($gallery_data);

					break;

				default:

					$shortcode_data[$key]['value'] = htmlentities($this->input->post($key));

			}

		}

		// Update page settings
		$metaEnabled = $this->settings_model->getColumn('meta_enabled');
		$page_settings = [];	
		$page_settings['status'] = $this->input->post('page_status') ?? 0;

		if($metaEnabled){
			$page_settings['meta_keywords'] = $this->input->post('meta_keywords');
			$page_settings['meta_description']  = $this->input->post('meta_description');
		}

		$this->template_model->update($id, $page_settings);

		$shortcode_data_obj = json_encode($shortcode_data);

		// update if there's a change in page main fields
		if($shortcode_data_obj != $page->content){

			$this->shortcode_model->update($page->id, [
				'content' => $shortcode_data_obj
			]);

		}

		$message = [
			'status' => 'success',
			'text' => 'Successfully updated.'
		];

		if($this->errorMsg){
			$message = $this->errorMsg;
		}

		$this->session->set_flashdata('message', $message);

		redirect($_SERVER['HTTP_REFERER']);

	}

	/**
	 * Load edit header in the admin page
	 * @return none
	 */
	public function header(){

		$this->edit_layout('header');

	}

	/**
	 * Load edit footer in the admin
	 * @return none
	 */
	public function footer(){

		$this->edit_layout('footer');

	}

	/**
	 * Update header and footer template layout in the admin page
	 * @return none
	 */
	public function updateLayout(){

		$layout = (array) $this->layout_model->get();

		$layout_shortcodes = json_decode($layout[$this->input->post('partial')], true);

		$shortcode_data = [];

		$message = [];

		foreach($layout_shortcodes as $key => $shortcodes){

			$shortcode_data[$key]['type'] = $layout_shortcodes[$key]['type'];
			$shortcode_data[$key]['status'] = $this->input->post($key . '_status');

			switch($shortcodes['type']){
				case 'image':

					$shortcode_data[$key]['value'] = !empty($_FILES[$key]['name']) ? $this->upload_file($key, ['existingImage' => $layout_shortcodes[$key]['value'] ?? '']) : $layout_shortcodes[$key]['value'];

					if($this->input->post($key . '_reset')){
						$shortcode_data[$key]['value'] = '';
					}

					$current_image = $this->input->post($key . '_current_image');

					if($current_image){
						$image_data = image_data($current_image);
						unlink('uploads/' . $current_image);
						unlink('uploads/' . $image_data['name'] . '-200x200.' . $image_data['ext']);
					}
					break;

				case 'gallery':

					$gallery_data = [];
					$gallery_titles = $this->input->post($key . '_title');

					foreach($gallery_titles as $g_key => $gallery_title){

						$gallery_array = is_array($layout_shortcodes[$key]['value']) ? $layout_shortcodes[$key]['value'] : json_decode($layout_shortcodes[$key]['value'], true);

						$gallery_data[] = [
							'g_title' => $gallery_title,
							'g_image' => !empty($_FILES[$key . '_image_'. $g_key]['name']) 
								? $this->upload_file(
									$key . '_image_'. $g_key,
									['existingImage' => $gallery_array[$g_key]['g_image'] ?? '']
								) 
								: $gallery_array[$g_key]['g_image']
						];

					}

					foreach($this->input->post($key . '_current_image') as $g_key => $image)
						remove_image($image);

					$shortcode_data[$key]['value'] = json_encode($gallery_data);
					break;

				default:
					$shortcode_data[$key]['value'] = htmlentities($this->input->post($key));
			}

		}

		$shortcode_data_obj = json_encode($shortcode_data);

		if($shortcode_data_obj != $layout[$this->input->post('partial')]){
			$this->layout_model->update($layout['id'], [
				$this->input->post('partial') => $shortcode_data_obj
			]);
		}

		$message = ['status' => 'success', 'text' => 'Successfully updated.'];

		$this->session->set_flashdata('message', $message);

		redirect($_SERVER['HTTP_REFERER']);

	}

	/**
	 * Load components in the page
	 * Be careful to edit this code. Your data might be lost.
	 * @param  int  $id          the page id
	 * @param  boolean $is_admin true if admin
	 * @return none
	 */
	private function load_page($id = null, $is_admin = false){

		//Render Menu
		$this->menu();

		//Render Contact
		$this->contact();

		//Render Social
		$this->social();

		//Render Google Map
		$this->google_map();

		//Render Form
		$this->form();

		//Render Partial Templates
		$this->template_partials();

		//Render Page Template
		$this->page_template($id, $is_admin);

	}

	/**
	 * Parse header and footer shortcode 
	 * Note: Be careful to edit this code. Your data might be lost.
	 * @param  string $layout (header|footer)
	 * @return none
	 */
	private function load_layout(string $layout = ''){

		if(!empty($layout)){
		
			$this->load->model('layout/layout_model');

			$layout_path = APPPATH . 'views/templates/layout';

			$partial = (array)$this->layout_model->get();

			$template_layout = file_get_contents($layout_path . '/' . $layout .'.php');

			preg_match_all('/{(.*?)}/', $template_layout, $template_shortcodes_layout);

			$shortcode_texts = $template_shortcodes_layout[1];

			$shortcode_lists = $this->initial_shortcodes();

			$shortcode_layout_array = (array) ( isset($partial[$layout]) && count((array) $partial[$layout]) 
				? json_decode($partial[$layout], true)
				: []);

			$shortcode_layout_data = [];

			$page_shortcodes = [];

			$page_data = $this->shortcode_model->all();

			foreach($page_data as $page){
				
				foreach(json_decode($page['content'], true) as $key => $content){
					$page_shortcodes[$key] = $content;
				}
			}

			foreach($shortcode_texts as $key => $shortcode){

				$shortcode_key = explode('_', $shortcode)[0];

				if(array_key_exists($shortcode_key, $shortcode_lists)){

					$shortcode_layout_data[$shortcode] = [];

					foreach($shortcode_lists as $key => $shortcode_list){

						if($shortcode_key == $key){

							if(!empty($shortcode_layout_array[$shortcode]['value'])){
								$shortcode_list['value'] = $shortcode_layout_array[$shortcode]['value'];
							}

							$status = $shortcode_list['status'];
							$status_ = 'first';

							if(isset($shortcode_layout_array[$shortcode]['status']) && $shortcode_layout_array[$shortcode]['status'] == 'first'){
								$status = $shortcode_layout_array[$shortcode]['status'];
							}

							if($status != "first" && (
								array_key_exists($shortcode, $page_shortcodes)
								|| (array_key_exists($shortcode, array_merge(json_decode($partial['header'], true), $page_shortcodes)) && $layout == 'footer')
								|| (array_key_exists($shortcode, array_merge(json_decode($partial['footer'], true), $page_shortcodes)) && $layout == 'header')
							)){
								$status_ = 'declared';
							}

							$shortcode_list['status'] = $status_;

							$shortcode_layout_data[$shortcode] = $shortcode_list;

							switch($key){

								case 'custom-google-map':
									$value = $this->map($shortcode_list['value']);
									break;
								case 'gallery':

									$value = is_array($shortcode_list['value']) ? $shortcode_list['value'] : json_decode($shortcode_list['value'], true);

									foreach($value as $v_key => $val){
										$value[$v_key]['g_image'] = 'uploads/' . $val['g_image'];
										$value[$v_key]['g_thumbnail'] = 'uploads/' . $this->image($val['g_image'], true);
										$value[$v_key]['g_index'] = $v_key + 1;
									}

									break;

								default:
									$value = html_entity_decode($shortcode_list['value'] ?? '');

							}

							$this->template[$shortcode] = $value;

							if($status_ == 'declared'){
								unset($shortcode_layout_data[$shortcode]);
							}

						}

					}

				}

			}

			$shortcode_data_obj = json_encode($shortcode_layout_data);

			if($shortcode_layout_data != $shortcode_layout_array){

				if(count($partial)){
					$this->layout_model->update($partial['id'], [
						$layout => $shortcode_data_obj
					]);
				}else{
					$this->layout_model->create([
						$layout => $shortcode_data_obj
					]);
				}

			}

		}

	}

	/**
	 * Edit header and footer in the admin page
	 * @param  string $data (footer or header string)
	 * @return none      
	 */
	private function edit_layout($data = ''){

		$this->load_layout($data);

		$this->template['message'] = $this->session->flashdata('message');

		$layout_data = (array) $this->layout_model->get();

		foreach($layout_data as $key => $layout){

			if($data == $key){

				$layout_array = json_decode($layout, true);

				if(!empty($layout)){

					foreach($layout_array as $shortcode_key => $shortcode){

						$title = str_replace($shortcode['type'], '', $shortcode_key);
						$title = str_replace_first('_', '', $title);
						$title = str_replace('_' , ' ', $title);
						$layout_array[$shortcode_key]['title'] = ucwords($title);

						if($shortcode['type'] == 'gallery'){
							$layout_array[$shortcode_key]['value'] = is_array($layout_array[$shortcode_key]['value']) ? $layout_array[$shortcode_key]['value'] : json_decode($layout_array[$shortcode_key]['value'], true);

							foreach($layout_array[$shortcode_key]['value'] as $g_key => $gallery){
								$layout_array[$shortcode_key]['value'][$g_key]['g_image_prop'] = $gallery['g_image'] ? $this->image($gallery['g_image']) : [] ;
							}
						}

						if($shortcode['type'] == 'image'){
							$layout_array[$shortcode_key]['value'] = $this->image($layout_array[$shortcode_key]['value']);
						}

					}

				}

				$this->template[$key] = $layout_array;

			}else{

				unset($this->template[$key]);

			}

		}

		$this->content = 'template/edit-' . $data;

		$this->layout_admin($this->template);
	}

	/**
	 * Parse page content shortcode
	 * @param  int $id            page id
	 * @param  boolean $is_admin (true if admin)
	 * @return none
	 */
	private function page_template($id, $is_admin){

		$settings = $this->settings_model->get();

		$default_page = $settings->default_page ?:  $this->template_model->first()->slug;

		$page = (array) ($id ? $this->template_model->findById($id) : $this->template_model->findOne('slug', $default_page));

		if(count($page)){

			$shortcode_results = $this->shortcode_model->findOne('page_template_id', $page['id']);
			$shortcode_content_array = count((array)$shortcode_results->content) ? json_decode($shortcode_results->content, true) : [];
			$path = APPPATH . 'views/' . $this->template_dir . '/' . $page['slug'] . '.php';
			$template_contents = file_get_contents($path);
			preg_match_all('/{(.*?)}/', $template_contents, $template_shortcodes);
			$shortcodes = $template_shortcodes[0];
			$shortcode_texts = $template_shortcodes[1];
			$shortcode_lists = $this->initial_shortcodes();
			$shortcode_data = [];

			$layout_data = (array) $this->layout_model->get();
			$layout_shortcodes = array_merge(
				json_decode($layout_data['header'], true),
				json_decode($layout_data['footer'], true)
			);

			foreach($shortcode_texts as $key => $shortcode){

				$shortcode_key = explode('_', $shortcode)[0];

				if(array_key_exists($shortcode_key, $shortcode_lists)){

					$shortcode_data[$shortcode] = [];

					foreach($shortcode_lists as $s_key => $shortcode_list){

						if($shortcode_key == $s_key){

							if(!empty($shortcode_content_array[$shortcode]['value'])){
								$shortcode_list['value'] = $shortcode_content_array[$shortcode]['value'];
							}

							$status = $shortcode_list['status'];
							$status_ = 'first';

							if(isset($shortcode_content_array[$shortcode]['status']) && $shortcode_content_array[$shortcode]['status'] == 'first'){
								$status = $shortcode_content_array[$shortcode]['status'];
							}

							if($status != "first" && array_key_exists($shortcode, $layout_shortcodes)){
								$status_ = 'declared';
							}

							$shortcode_list['status'] = $status_;

							$shortcode_data[$shortcode] = $shortcode_list;

							$value = null;

							switch($s_key){
								case 'custom-google-map':
									$value = $this->map($shortcode_list['value']);
									break;

								case 'image':
									$value = 'uploads/' . $shortcode_list['value'];
									break;

								case 'gallery':

									$value = is_array($shortcode_list['value']) ? $shortcode_list['value'] : json_decode($shortcode_list['value'], true);

									foreach($value as $v_key => $val){
										$value[$v_key]['g_image'] = 'uploads/' . $val['g_image'];
										$value[$v_key]['g_thumbnail'] = 'uploads/' . $this->image($val['g_image'], true);
										$value[$v_key]['g_index'] = $v_key + 1;
									}
									break;

								default:
									$value = html_entity_decode($shortcode_list['value'] ?? '');
							}
							
							if($status_ != 'declared'){
								$this->template[$shortcode] = $value;
							}

						}

					}

				}

			}

			$shortcode_data_obj = json_encode($shortcode_data);

			if($shortcode_data_obj != $shortcode_results->content){

				if($shortcode_results->page_template_id != $page['id']){

					$this->shortcode_model->create([
						'page_template_id' => $page['id'],
						'content' => $shortcode_data_obj
					]);

				}else{

					$this->shortcode_model->update($shortcode_results->id, [
						'content' => $shortcode_data_obj
					]);

				}
				
			}

		}else{

			return redirect('template/list');

		}

		if(!$is_admin){
			if(count($page)){
				$page_title = $page['title'];
				$site_title = $settings->site_title;
				$slug = $page['slug'];
				$meta_enabled = $settings->meta_enabled;
				$is_home = $default_page == $page['slug'];

				$this->template['id'] = $page['id'];
				$this->template['page_status'] = $page['status'];
				$this->template['page_title'] = $page_title;
				$this->template['slug'] = $slug;
				$this->template['site_title'] = $site_title;
				$this->template['meta_keywords'] = $meta_enabled ? $page['meta_keywords'] : '';
				$this->template['meta_description'] = $meta_enabled ? $page['meta_description'] : '';
				$this->template['is_home'] = $is_home;
				$this->template['site_page_title'] = $default_page != $slug 
					? $page_title.' | '.$site_title
					: $site_title;
			}

			$this->content = array_key_exists('slug', $page)
				? $this->template_dir . '/' . $page['slug']
				: 'templates/404';

			$this->layout($this->template);
		}
	}

	/**
	 * Parse header and footer in the page
	 * @return none
	 */
	private function template_partials(){

		$this->load_layout('header');

		$this->load_layout('footer');

		$layout_data = (array) $this->layout_model->get();

		$layout_header = !empty($layout_data['header']) ? json_decode($layout_data['header'], true) : [];

		$layout_footer = !empty($layout_data['footer']) ? json_decode($layout_data['footer'], true) : [];

		$layout_combine = array_merge($layout_header, $layout_footer);

		foreach($layout_combine as $key => $layout){

			$layout_value = null;

			switch($layout['type']){
				case 'custom-google-map':
					$layout_value = $this->map($layout['value']);
					break;
				case 'image':
					$layout_value = 'uploads/' . $layout['value'];
					break;
				case 'gallery':
					$layout_value = is_array($layout['value']) ? $layout['value'] : json_decode($layout['value'], 1);

					foreach($layout_value as $v_key => $val){
						$layout_value[$v_key]['g_image'] = 'uploads/' . $val['g_image'];
						$layout_value[$v_key]['g_thumbnail'] = 'uploads/' . $this->image($val['g_image'], true);
						$layout_value[$v_key]['g_index'] = $v_key + 1;
					}

					break;
				default:
					$layout_value = html_entity_decode($layout['value'] ?? '');
			}


			$this->template[$key] = $layout_value;
		}

	}

	/**
	 * Method to load menu in the page
	 * @return none
	 */
	private function menu(){

		$this->load->model('menu/menu_model');

		$menus = $this->menu_model->all();

		$data = [];

		foreach($menus as $key => $menu){

			foreach($menu as $menu_key => $menu_data){

				$data[$menu_key] = $menu_key == 'data_menu' ? json_decode(html_entity_decode($menu_data ?? ''), true) : $menu_data;

				if( $menu_key == 'data_menu'){
					$woo[$key][$menu_key] = json_decode(html_entity_decode($menu_data ?? ''), true);
				}else{
					$woo[$key][$menu_key] = $menu_data;
				}
				
			}

			$this->template[$menu['shortcode']] =  $this->parser->parse('templates/inc/menu', array_merge($this->template, $data), true);
		}

	}

	/**
	 * Method to load contact settings in the page
	 * @return none
	 */
	private function contact(){

		$this->load->model('contact/contact_model');

		$contact_data = $this->contact_model->get();

		foreach($contact_data as $key => $contact){
			$this->template['contact_' . $key] = $contact;
		}

	}

	/**
	 * Method to load social in the page
	 * @return none
	 */
	private function social(){

		$this->load->model('social/social_model');

		$social_data = $this->social_model->all();

		foreach($social_data as $key => $social){
			$this->template['social_' . $social['name']] = $social_data[$key]['status'] == 0 ? '' : $social['url'];
		}

	}

	/**
	 * Method to load google map in the page
	 * @return [type] none
	 */
	private function google_map(){
		$this->template['google-map'] = $this->map($this->template['contact_address']);
	}

	/**
	 * Method to load form in the page
	 * @return [type] none
	 */
	private function form(){

		$this->load->model('form/form_model');

		$forms = $this->form_model->all();

		$data = [];

		foreach($forms as $key => $form){

			foreach($form as $form_key => $form_data){

				$data[$form_key] = $form_key == 'data' ? json_decode($form_data, true) : $form_data;
				
			}

			$this->template[$form['shortcode']] =  $this->parser->parse('templates/inc/form', array_merge($this->template, $data), true);
		}

	}

	/**
	 * Method to set google map iframe
	 * @param  [type] $string google map location
	 * @return [type]     	  none
	 */
	private function map($location){
		return '<iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" class="google-map" src="https://maps.google.com/maps?hl=en&amp;q=' . urlencode($location ?? '') . '&amp;z=15&amp;ie=UTF8&amp;output=embed"></iframe>';
	}

	/**
	 * Upload image
	 * @param  string $filename      filename
	 * @param  array  $data          attach data array
	 * @return string                file
	 */
	private function upload_file($filename, $data = []){

		$config = array(
			'upload_path' => './uploads/',
			'allowed_types' => 'jpg|jpeg|gif|png',
			'max_size' => 2048
		);

		$this->load->library('upload', $config);

		if($this->upload->do_upload($filename)){

        	$uploaded_file_name = $this->upload->data('file_name');

        	$this->crop_image($this->upload->data(), 200, 200);

        	return $uploaded_file_name;

        }else{

        	$error = $this->upload->display_errors();

        	log_message('error', $error);

        	if(strpos($error, 'size')){
        		$error = 'The file size you uploaded is too large. Please upload not greater than 2MB.';
        	}

        	$this->errorMsg = [
				'status' => 'danger',
				'text' => $error
			];

        	return $data['existingImage'] ?? '';

        }

	}

	/**
	 * Crop Image
	 * @param  string $image filename
	 * @param  int $width    image width
	 * @param  int $height   image height
	 * @return none
	 */
	private function crop_image($upload_data, $width, $height){
        $config['source_image'] = $upload_data['full_path'];
        $config['maintain_ratio'] = TRUE;
        $config['width'] = $width ?? 200;
        $config['height'] = $width ?? 200;
        $config['new_image'] = str_replace('.', '-'. $config['width'] .'x'. $config['height'] .'.', 'uploads/' . $upload_data['file_name']);

        $this->image_lib->initialize($config);

        if (!$this->image_lib->resize()) {
            echo $this->image_lib->display_errors();
        }

        $this->image_lib->clear();
	}

	public function cropImage($imagePath, $width, $height){

	    $config['image_library'] = 'gd2';
		$config['source_image'] = $imagePath;
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = 10;
		$config['height'] = 10;
		$config['new_image'] = str_replace('.', '-200x200.', $imagePath);


		if (!$this->image_lib->resize()) {
			pre($config['new_image']);
		    echo $this->image_lib->display_errors();
		}else{
			//pre('resized');
		}
	}

	/**
	 * Get Image Details
	 * @param  string  $data           filename
	 * @param  boolean $thumbNailsOnly (true for thumbnail only and false if image details)
	 * @return string|array             image data | thumbnail data
	 */
	private function image($data, $thumbNailsOnly = false){

		if($data){
			$reversed = explode('.', $data, 2);

			$props = [
				'path' => 'uploads/' . $data,
				'file' => $data,
				'name' => $reversed[0],
				'ext' => '.' . $reversed[1],
				'dimension' => '200x200',
			];

			return !$thumbNailsOnly ? $props : $props['name'] . '-'. $props['dimension'] . $props['ext'];
		}
		
	}

	/**
	 * Initial set shortcode data
	 * Note: Data will be lose if you delete this one.
	 * @return array use for checking shortcodes
	 */
	private function initial_shortcodes(){
		return [
			'title' => [
				'type' => 'title',
				'value' => null,
				'status' => null
			], 
			'content' => [
				'type' => 'content',
				'value' => null,
				'status' => null
			],
			'custom-google-map' => [
				'type' => 'custom-google-map',
				'value' => null,
				'status' => null
			],
			'image' => [
				'type' => 'image',
				'value' => null,
				'status' => null
			],
			'gallery' => [
				'type' => 'gallery',
				'value' => [
					[
						'g_title' => null,
						'g_image' => null,
						'g_thumbnail' => null
					]
				],
				'status' => null
			]
		];
	}
	
}
 