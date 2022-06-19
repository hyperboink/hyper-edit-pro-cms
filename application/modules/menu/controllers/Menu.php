<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends HY_Controller{

	function __construct(){

		parent::__construct();

		$this->load->library('session');

		$this->load->model('menu_model');

		$this->load->model('template/template_model');

	}

	public function settings(){

		$data['menus'] = $this->menu_model->all();

		if(!count($data['menus'])) return redirect('menu/create');

		$data['pages'] = $this->template_model->select('id, title, slug');

		$oldest = $this->menu_model->oldest();

		$id = $oldest->id;

		$data['id'] = $id;

		$data['shortcode_menu_id'] = $oldest->shortcode_menu_id;

		$data['shortcode_menu_key'] = $oldest->shortcode_menu_key;

		$data['menu_name'] = $oldest->name;

		$data['message'] = $this->session->flashdata('message');

		foreach($data['menus'] as $key => $menu){

			if($menu['id'] === $id){
				//$data['shortcode_menu_id'] = $menu['shortcode_menu_id'];
				//$data['shortcode_menu_key'] = $menu['shortcode_menu_key'];
				//$data['menu_name'] = $menu['name'];
				$data['menu_data'] = json_decode(html_entity_decode($menu['data_menu']), true);
				$data['page_data'] = json_decode(html_entity_decode($menu['data_page']), true);
			}

		}

		$new_pages = [];

		$saved_in_menu = get_all_by_keys(array_merge($data['menu_data'], $data['page_data']), 'id');

		foreach($data['pages'] as $page){
			if(!in_array($page->id, $saved_in_menu)){
				$new_pages[] = [
					'id' => $page->id,
					'type' => 'page',
					'title' => $page->title,
					'name' => $page->slug.'-'.$page->id,
					'slug' => $page->slug,
				];
			}
		}

		$data['page_data_added'] = $new_pages;


		//pre(html_entity_decode($menu['data_menu']));

		$this->content = 'menu/page';

		$this->layout_admin($data);

		//$data['menus'] = $this->menu_model->oldest();

	}

	public function create(){

		$data = [];

		$menu_shortcode_ids = [];

		$isPrimary = false;

		$data['message'] = $this->session->flashdata('message');

		$data['menus'] = $this->menu_model->all();

		$data['pages'] = $this->template_model->all();

		foreach($data['menus'] as $key => $menu){

			if($menu['is_primary']){
				$isPrimary = true;
			}

			if($menu['shortcode_menu_id']){
				$menu['shortcode_menu_id'] += 1;
			}else{
				$menu['shortcode_menu_id'] = 1;
			}

			array_push($menu_shortcode_ids, $menu['shortcode_menu_id']);
			
		}

		$data['shortcode_menu_id'] = count($data['menus']) ?  max($menu_shortcode_ids) : 1;

		$data['is_primary'] = $isPrimary ? 0 : 1;

		$this->content = 'menu/create';

		$this->layout_admin($data);

	}

	public function edit($id){

		$data['menus'] = (array) $this->menu_model->all();

		if(!count($data['menus'])) return redirect('menu/create');

		$data['pages'] = $this->template_model->select('id, title, slug');

		$data['id'] = $id;

		$data['shortcode_menu_id'] = null;

		$data['shortcode_menu_key'] = null;

		$data['menu_name'] = null;

		$data['menu_data'] = null;

		$data['page_data'] = null;

		$data['message'] = $this->session->flashdata('message');

		foreach($data['menus'] as $key => $menu){

			if($menu['id'] === $id){
				$data['shortcode_menu_id'] = $menu['shortcode_menu_id'];
				$data['shortcode_menu_key'] = $menu['shortcode_menu_key'];
				$data['menu_name'] = $menu['name'];
				$data['menu_data'] = json_decode(html_entity_decode($menu['data_menu']), true);
				$data['page_data'] = json_decode(html_entity_decode($menu['data_page']), true);
			}

		}

		$new_pages = [];

		$saved_in_menu = get_all_by_keys(array_merge($data['menu_data'], $data['page_data']), 'id');

		foreach($data['pages'] as $page){
			if(!in_array($page->id, $saved_in_menu)){
				$new_pages[] = [
					'id' => $page->id,
					'type' => 'page',
					'title' => $page->title,
					'name' => $page->slug.'-'.$page->id,
					'slug' => $page->slug,
				];
			}
		}

		$data['page_data_added'] = $new_pages;

		$this->content = 'menu/edit';

		$this->layout_admin($data);

	}

	public function save(){

		$shortcode_menu_id = $this->input->post('shortcode_menu_id');
		$shortcode_menu_key = $this->input->post('shortcode_menu_key');

		$data = [
			'name' => $this->input->post('menu_name'),
			'data_menu' => htmlentities($this->input->post('menu_data')),
			'data_page' => htmlentities($this->input->post('page_data')),
			'shortcode' =>  'menu_' . $shortcode_menu_key .  $shortcode_menu_id,
			'shortcode_menu_id' => $shortcode_menu_id,
			'shortcode_menu_key' => $shortcode_menu_key,
			'is_primary' => $this->input->post('is_primary')
		];

		$create = $this->menu_model->create($data);

		if($create){

			$id = $this->menu_model->latest()->id;

			$message = [
				'status' => 'success',
				'text' => 'Successfully created menu.'
			];

			$this->session->set_flashdata('message', $message);

			return redirect('/menu/edit/' . $id);

		}

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function update($id){

		$data = [
			'name' => $this->input->post('menu_name'),
			'data_menu' => htmlentities($this->input->post('menu_data')),
			'data_page' => htmlentities($this->input->post('page_data')),
			'is_primary' => $this->input->post('is_primary') ?? 0
		];

		$this->menu_model->update($id, $data);

		redirect($_SERVER['HTTP_REFERER']);


	}

	public function delete($id){

		$this->menu_model->delete($id);

		return redirect('/menu/settings', 'refresh');

	}

	
}
 