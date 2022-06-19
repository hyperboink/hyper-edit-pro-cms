<?php

class Form_setting_model extends CI_Model {

	protected $table = 'form_settings';

	function __construct(){

		parent::__construct();

	}

	public function all(){

		return $this->db
			->from($this->table)
			->join('forms', 'forms.id = form_settings.form_id', 'left')
			->order_by("id", "desc")
			->get()
			->result_array();

	}

	public function findById($id){

		return $this->db
			->from($this->table)
			->where('form_id', $id)
			->get()
			->row();

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

}