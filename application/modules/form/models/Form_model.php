<?php

class Form_model extends CI_Model {

	protected $table = 'forms';

	function __construct(){

		parent::__construct();

	}

	public function get(){

		return $this->db
			->from($this->table)
			->order_by("id", "desc")
			->get()
			->result_array();

	}

	public function findById($id){

		return $this->db
			->from($this->table)
			->where('id', $id)
			->get()
			->row();

	}

	public function latest(){

		return $this->db
			->from($this->table)
			->order_by("id", "desc")
			->limit(1)
			->get()
			->row();

	}

	public function all(){

		return $this->db
			->from('form_settings')
			->join($this->table, 'forms.id = form_settings.form_id', 'left')
			->order_by("form_id", "desc")
			->get()
			->result_array();

	}

	public function create($data){

		$this->db->insert($this->table, $data);

		return $this->db->affected_rows() > 0;

	}

	public function update($id, $data){

		$this->db
			->where('id', $id)
			->update($this->table, $data);

		return $this->db->affected_rows() > 0;

	}

	public function delete($id){

		$this->db
			->where('id', $id)
			->delete($this->table);

		return $this->db->affected_rows() > 0;

	}

}