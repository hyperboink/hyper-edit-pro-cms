<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Pagination_model extends CI_Model {

	private $table = 'hyper_visitor';

	function __construct(){

		parent::__construct();
		
	}

	public function count_data(){

		return $this->db->count_all('hyper_visitor');

	}

	public function fetch_data($limit, $start){

		$this->db->from($this->table);

		$this->db->limit($limit, $start);

		$q = $this->db->get();

		if($q->num_rows() > 0){

			foreach($q->result() as $rows){

				$data[] = $rows;

			}

			return $data;

		}

		return false;

	}





}