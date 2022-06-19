<?php
/*
class Shortcode extends CI_Model {

	protected $table = 'page_shortcodes';
 
	function __construct(){

		parent::__construct();

	}

	public function all(){

		return $this->db
			->select('*')
			->from($this->table)
			->join('page_templates', 'page_templates.id = page_shortcodes.page_template_id', 'left')
			->get()
			->result_array(); 

	}

	public function findById($id){

		$defaultObj = (object)['content' => (object)[], 'page_template_id' => ''];

		return $this->db
			->from($this->table)
			->where('page_template_id', $id)
			->get()
			->row() ?: $defaultObj;

	}

	public function findOne($column, $value){

		$defaultObj = (object)['content' => (object)[], 'page_template_id' => ''];

		return $this->db
			->from('page_templates')
			->join($this->table, 'page_templates.id = page_shortcodes.page_template_id', 'left')
			->where($column, $value)
			->get()
			->row() ?: $defaultObj;

	}

	public function create($data){

		$this->db->insert($this->table, $data);

		$this->db->cache_delete('admin', 'pages');

	}
	
	public function update($id, $data){

		$this->db
			->where('id', $id)
			->update($this->table, $data);

		$this->db->cache_delete('admin', 'pages');
			 
	}


}*/