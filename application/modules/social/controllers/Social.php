<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Social extends HY_Controller{

	function __construct(){

		parent::__construct();

		$this->load->model('social/social_model');

		$this->load->helper(array('form', 'url'));

		$this->load->library('session');

	}

	public function settings(){

		$data = [];

		$data['message'] = $this->session->flashdata('message');

		$this->content = 'social/page';

		$data['socials'] = $this->social_model->all();

		$this->layout_admin($data);

	}

	public function create(){

		$data = [];

		$socials = ['facebook', 'twitter', 'instagram', 'googleplus', 'youtube', 'linkedin', 'pinterest', 'vimeo'];

		foreach($socials as $social){
			$data[] = [
				'name' => $social,
				'url' =>  $this->input->post($social . '_url') ?? '',
				'status' => $this->input->post($social) ?? 0
			];
		}

		$this->load->model('social/social_model');

		$isUpdated = $this->social_model->createOrUpdateBatch($data, 'name');

		if($isUpdated){
			$this->session->set_flashdata('message', 'Successfully updated!');
		}

		redirect($_SERVER['HTTP_REFERER']);

	}


	/*private function upload_file($filename, $config = []){

		$config = array(
			'upload_path' => './uploads/',
			'allowed_types' => 'jpg|jpeg|gif|png|svg',
			'max_size' => 2048,
			'image_width' => 32,
			'image_height' => 32,
			'overwrite' => true
		);

		$this->load->library('upload', $config);

		if(!$this->upload->do_upload($filename)) return false;
        
        $this->resize_image($this->upload->data('orig_name'), 32, 32);

        return $this->upload->data('orig_name');

	}



	private function resize_image($fileName, $width, $height){

		$seg = explode('/', base_url());

		$this->load->library('image_lib');

		$config = array(
			'image_library' => 'gd2',
			'source_image' =>  $_SERVER['DOCUMENT_ROOT'].'/'.$seg[3].'/uploads/'. $fileName,
			'create_thumb' => false,
			'maintain_ratio' => true,
			'width' => $width,
			'height' => $height,
			'new_image' => $_SERVER['DOCUMENT_ROOT'].'/'.$seg[3].'/uploads/thumbnails/'. $fileName,
			'overwrite' => true
		);
             
		$this->image_lib->initialize($config);

		if (! $this->image_lib->resize()) { 

			return false;

		}

	}*/

	
}