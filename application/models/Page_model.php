<?php


class Page_model extends CI_Model {


	protected $table = 'hyper_page';
 
	function __construct(){

		parent::__construct();

	}

	public function all(){

		$this->db->from($this->table);

		$q = $this->db->get();
		
		return $q->result_array(); 

	}

	public function findById($id){

		$this->db->where('id', $id);

		$this->db->from($this->table);

		$q = $this->db->get();

		return $q->result_array();

	}

	
	public function update($id, $data){             

		$this->db->where('id', $id);

		$this->db->update($this->table, $data);

		$this->db->cache_delete('admin', 'pages');
			 
	}


}