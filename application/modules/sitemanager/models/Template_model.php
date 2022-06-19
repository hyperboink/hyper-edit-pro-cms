<?php

class Template_Model extends CI_Model {


	protected $table = 'page_templates';
 
	function __construct(){

		parent::__construct();

	}

	public function all(){

		return $this->db
			->from($this->table)
			->get()
			->result_array(); 

	}

	public function find($column, $value){

		return $this->db
			->from($this->table)
			->where($column, $value)
			->order_by("id", "desc")
			->get()
			->result_array();

	}

	public function findOne($column, $value){

		return $this->db
			->from($this->table)
			->where($column, $value)
			->get()
			->row();

	}

	public function findById($id){

		return $this->db
			->from($this->table)
			->where('id', $id)
			->get()
			->row();

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

		return $this->db
			->from($this->table)
			->where('status', 1)
			->get()
			->result_array();

	}

	public function create($data){

		$this->db->insert($this->table, $data);

	}
	
	public function update($id, $data){             

		$this->db
			->where('id', $id)
			->update($this->table, $data);
			 
	}

	public function delete($id){

		$this->db
			->where('id', $id)
			->delete($this->table);

	}

	public function allRoutes(){

		return $this->db
			->get_where($this->table, ['status' => 1])
			->result_array();

	}


}