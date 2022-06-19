<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Create dynamic pages via slug
class Pagesv1 extends HY_Controller{

	function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$this->load->view('pages-v1/create-pages');
	}

	public function list(){
		$this->load->model('page_model_test');

		$data['pages'] = $this->page_model_test->all();

		$this->content = 'pages-v1/page-listing';
		
		$this->layout($data);
	}

	public function save(){

		$this->load->model('page_model_test');

		$title = $this->input->post('title');
		$slug = str_replace(" ", "-", $title);

		$data = [
			'title' => $title,
			'content' => $this->input->post('content'),
			'slug' => strtolower($slug)
		];

		$pages = $this->page_model_test->find('title', $title);

		if(count($pages)){
			$slug = $pages[0]['slug'];

			$lastChar = substr($slug, -1, 1);

			if(is_numeric($lastChar)){
				$lastChar += 1;
			}else{
				$lastChar = 1;
			}
			$data['slug'] = $data['slug'].$lastChar;
		}

		$this->page_model_test->create($data);

		$this->updateRoutes();

		redirect($_SERVER['HTTP_REFERER']);


	}

	public function delete($id){
		$this->load->model('page_model_test');

		$deleted = $this->page_model_test->delete($id);

		$this->updateRoutes();

		redirect($_SERVER['HTTP_REFERER']);
	}

	private function updateRoutes(){
		$this->load->helper('file');

		$this->load->model('page_model_test');

		$routes = $this->load->page_model_test->allRoutes();

		$path = APPPATH . 'inc/routes.php';

		$data = [];

		write_file($path, "");

		if(!empty($routes)){

			$data[] = '<?php';

			foreach($routes as $route){
				$data[] = '$route["'. $route['slug'] .'"] = "pages/index/'.$route['id'].'";';
			}

			$result = implode("\n", $data);

			write_file($path, $result);
			
		}
	}

	private function pre($data){
		echo '<pre>';
		print_r($data);
		echo '</pre>';
		die();
	}

}
