<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_model extends CI_Model {


	public function get_records(){
		$this->db->select("*");
		$this->db->from("students");
		$res = $this->db->get()->result();
		if ($res)
			return $res;
		else
			return false;
	}

	public function insert_student($data){
		return $this->db->insert('students',$data);
	}

}
