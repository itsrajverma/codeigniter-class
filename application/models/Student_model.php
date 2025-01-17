<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_model extends CI_Model {


	public function get_records(){
		$this->db->select("s.*,c.course_name");
		$this->db->from("students s");
		$this->db->join("courses c","s.course_id=c.id");
		$res = $this->db->get()->result();
		if ($res)
			return $res;
		else
			return false;
	}

	public function student_detail($student_id){
		$this->db->where('id',$student_id);
		$this->db->select("*");
		$this->db->from("students");
		$res = $this->db->get()->result();
		if ($res)
			return $res[0];
		else
			return false;
	}

	public function insert_student($data){
		return $this->db->insert('students',$data);
	}

	public function update_student($data,$student_id){
		$this->db->where('id',$student_id);
		return $this->db->update('students',$data);
	}

	public function delete_student($student_id){
		$this->db->where('id',$student_id);
		return $this->db->delete('students');
	}

}
