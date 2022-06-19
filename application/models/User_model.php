<?php

class User_Model extends CI_Model {

	protected $table = 'users';

	public function getByUsername($username){
		return $this->db
			->from($this->table)
			->where('username', $username)
			->get()
			->row();
	}

	public function getEmailByUsername($username){
		return $this->db
			->select('email')
			->from($this->table)
			->where('username', $username)
			->get()
			->row();
	}

	public function update($id, $data){
		$this->db
			->where('id', $id)
			->update($this->table, $data);

		return $this->db->affected_rows() > 0;
	}

	public function updateByUsername($username, $data){
		$this->db
			->where('username', $username)
			->update($this->table, $data);

		return $this->db->affected_rows() > 0;
	}

}
