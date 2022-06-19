<?php

/*
class Page_template extends CI_Model {


	protected $table = 'page_templates';
 
	function __construct(){

		parent::__construct();

	}

	public function all(){

		$this->db->from($this->table);

		$q = $this->db->get();
		
		return $q->result_array(); 

	}

	public function find($column, $value){

		$this->db->where($column, $value);

		$this->db->from($this->table);

		$this->db->order_by("id", "desc");

		$q = $this->db->get();

		return $q->result_array();

	}

	public function findById($id){

		$this->db->where('id', $id);

		$this->db->from($this->table);

		$result = $this->db->get()->row();

		return $result;

	}

	public function findPageById($id){

		return $this->db
			->from('page_shortcodes')
			->join($this->table, 'page_templates.id = page_shortcodes.page_template_id', 'left')
			->where('page_templates.id', $id)
			->get()
			->row();

	}

	public function active(){

		$this->db->where('status', 1);

		$this->db->from($this->table);

		$q = $this->db->get();

		return $q->result_array();

	}

	public function create($data){

		$this->db->insert($this->table, $data);

		$this->db->cache_delete('pagesv2', 'index');

	}
	
	public function update($id, $data){             

		$this->db->where('id', $id);

		$this->db->update($this->table, $data);
			 
	}

	public function delete($id){

		$this->db->where('id', $id);

		$this->db->delete($this->table);

		$this->db->affected_rows();

		$this->db->cache_delete('pagesv2', 'index');

	}

	public function allRoutes(){

		return $this->db->get_where($this->table, ['status' => 1])->result_array();

	}


}*/