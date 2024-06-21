<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function insert_user($data){
		return $this->db->insert('users',$data);
	}

	public function login_user($data){
		$this->db->where('email',$data["email"]);
		$this->db->select("*");
		$this->db->from("users");
		$res = $this->db->get()->result();
		if ($res){
			if (verifyHashedPassword($data["password"],$res[0]->password)){
				return $res[0];
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

}
