<?php

class Login_model extends CI_Model {

	protected $table = 'users';

	public function get_pass($username){

		$this->db->from($this->table);

		$this->db->where('username', $username);

		$q = $this->db->get();

		foreach ($q->result() as $user) {

			return $user->password;

		}

		

}

