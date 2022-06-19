<?php
/*defined('BASEPATH') OR exit('No direct script access allowed');

// Create custom pages that generates files
class Template extends HY_Controller{

	private $dir_pages = 'templates/pages';

	function __construct(){

		parent::__construct();

		$this->load->library('session');

		$this->load->helper('file');

	}
	
	public function index(){
		$this->load->model('page_template');

		$data['pages'] = $this->page_template->all();

		$data['file_message'] = $this->session->flashdata('file_message');

		$this->content = 'pages-v2/create-pages';

		$this->layout($data);

	}

	public function save(){

		$this->load->model('page_template');

		$title = $this->input->post('title');

		$data = [
			'title' => $title,
			'slug' => strtolower(
				str_replace(" ", "-", $title)
			)
		];

		if($title){

			if($this->checkPageFileIfExist($data['title'])){

				$this->session->set_flashdata('file_message', 'The file already exist.');

			}else{
				$this->page_template->create($data);

				$this->createTemplate($data['title']);

				$this->updateRoutes();

				$this->session->set_flashdata('file_message', 'Successfully added!');
			}

		}else{

			$this->session->set_flashdata('file_message', 'Please input the name of the file.');

		}

		redirect($_SERVER['HTTP_REFERER']);

	}

	public function delete($id){

		$this->load->model('page_template');

		$template = (array) $this->page_template->findById($id);

		$path = APPPATH . 'views/' . $this->dir_pages . '/' . $template['title'] . '.php';

		$deleted = $this->page_template->delete($id);

		$this->deleteTemplate($path);

		$this->updateRoutes();

		redirect($_SERVER['HTTP_REFERER']);

	}

	private function checkPageFileIfExist($title){

		$path = APPPATH . 'views/' . $this->dir_pages . '/' . $title . '.php';
		
		return file_exists($path);

	}

	private function createTemplate($title){

		$path = APPPATH . 'views/' . $this->dir_pages . '/' . $title . '.php';

		$fileHandler = fopen($path, 'w') or die("can't open file");

		fclose($fileHandler);

		chmod($path, 0777);

	}

	private function deleteTemplate($path){
		unlink($path);
	}

	private function updateRoutes(){

		$this->load->model('page_template');

		$routes = $this->load->page_template->allRoutes();

		$path = APPPATH . 'inc/template-routes.php';

		$data = [];

		write_file($path, "");

		if(!empty($routes)){

			$data[] = '<?php';

			foreach($routes as $route){
				$data[] = '$route["'. $route['slug'] .'"] = "pages/template/'.$route['id'].'";';
			}

			$result = implode("\n", $data);

			write_file($path, $result);
			
		}
	}

}*/
