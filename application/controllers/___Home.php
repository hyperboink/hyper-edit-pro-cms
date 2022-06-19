<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends HY_Controller{

	function __construct(){

		parent::__construct();

		//$this->output->delete_cache('/');

	}
	

	public function index(){

		$this->load->model('page_model');

		$this->load->model('setting_model');

		$this->load->model('form/form_model');

		$this->load->model('social/social_model');

		$this->load->model('portfolio/portfolio_model');

		$data['socials'] = $this->social_model->sortByOrder('social_order', 'asc', true);

		$data['settings'] = $this->setting_model->all();

		$data['form'] = $this->form_model->all();

		$data['portfolio'] = $this->portfolio_model->active();

		$data['sections'] = $this->page_model->all();

		$data['body_class'] = 'homepage';

		foreach($data['sections'] as $key => $section){

			$data['section'.($key + 1)] = array($section);

		}

		$this->content = 'home';

		$this->layout($data);

		//$this->output->cache(3360);



	}

	public function thank_you(){

		$data['body_class'] = 'thankyou-page';

		$this->content = 'thank_you';

		$this->layout($data);
		
	}

	public function testing_library(){

		$this->load->library('templatex', 'wohoooo!');
		$this->templatex->woo();
	}

	/*public function testingPage(){
		$this->load->view('create-pages');
	}

	public function pageList(){
		$this->load->model('page_model_test');

		$data['pages'] = $this->page_model_test->all();

		$this->content = 'page-listing';
		
		$this->layout($data);
	}

	public function savePage(){

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

			//$this->pre($lastChar);

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

		//$this->pre($this->page_model_test->find('title', $title));


	}

	public function deletePage($id){
		$this->load->model('page_model_test');

		$deleted = $this->page_model_test->delete($id);

		if($deleted){
			//$this->pre($deleted);
			
		}

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
	}*/



}
