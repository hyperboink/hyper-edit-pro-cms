<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Generate custom pages
class Pagesv2 extends HY_Controller{

	private $dir_pages = 'templates/pages';

	function __construct(){

		parent::__construct();

		$this->load->library('session');

		$this->load->helper('file');

	}
	
	public function index(){
		$this->load->model('template/template_model');

		$data['pages'] = $this->template_model->all();

		$data['file_message'] = $this->session->flashdata('file_message');

		$this->content = 'pages-v2/create-pages';

		$this->layout($data);

	}

	public function save(){

		$this->load->model('template/template_model');

		$title = $this->input->post('title');

		$data = [
			'title' => $title, 
			'slug' => strtolower(str_replace(" ", "-", $title))
		];

		if($title){

			if($this->checkPageFileIfExist($data['slug'])){

				$this->session->set_flashdata('file_message', 'The file already exist.');

			}else{
				$this->template_model->create($data);

				$this->createTemplate($data['slug']);

				$this->updateRoutes();

				$this->session->set_flashdata('file_message', 'Successfully added!');
			}

		}else{

			$this->session->set_flashdata('file_message', 'Please input the name of the file.');

		}

		redirect($_SERVER['HTTP_REFERER']);

	}

	public function delete($id){

		$this->load->model('template/template_model');

		$template = (array) $this->template_model->findById($id);

		$path = APPPATH . 'views/' . $this->dir_pages . '/' . $template['slug'] . '.php';

		$deleted = $this->template_model->delete($id);

		$this->deleteTemplate($path);

		$this->updateRoutes();

		redirect($_SERVER['HTTP_REFERER']);

	}

	private function checkPageFileIfExist($slug){

		$path = APPPATH . 'views/' . $this->dir_pages . '/' . $slug . '.php';
		
		return file_exists($path);

	}

	private function createTemplate($slug){

		$path = APPPATH . 'views/' . $this->dir_pages . '/' . $slug . '.php';

		$fileHandler = fopen($path, 'w') or die("can't open file");

		fclose($fileHandler);

		chmod($path, 0777);

	}

	private function deleteTemplate($path){
		unlink($path);
	}

	private function updateRoutes(){

		$this->load->model('template/template_model');

		$routes = $this->load->template_model->allRoutes();

		$path = APPPATH . 'inc/template-routes.php';

		$data = [];

		write_file($path, "");

		if(!empty($routes)){

			$data[] = '<?php';

			foreach($routes as $route){
				$data[] = '$route["'. $route['slug'] .'"] = "template/page/'.$route['id'].'";';
			}

			$result = implode("\n", $data);

			write_file($path, $result);
			
		}
	}

}
