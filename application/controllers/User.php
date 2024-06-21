<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model','user');
	}

	public function create(){
		$this->form_validation->set_rules('name', 'Name', 'required|xss_clean|alpha_numeric_spaces');
		$this->form_validation->set_rules('email', 'Email', 'required|xss_clean|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|xss_clean');
		if ($this->form_validation->run() == FALSE) {
			$this->loadViews('user/create');
		} else {
			$pData = $this->input->post();
			$pData = $this->security->xss_clean($pData);
			$user["name"] = $pData["name"];
			$user["email"] = $pData["email"];
			$user["password"] = getHashedPassword($pData["password"]);
			$user["addon"] = date('Y-m-d H:i:s');
			$insert = $this->user->insert_user($user);
			if ($insert){
				success("User added..");
				redirect('user/login');
			}else{
				error("Error");
				redirect_back();
			}
		}
	}


	public function login(){
		$this->form_validation->set_rules('email', 'Email', 'required|xss_clean|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|xss_clean');
		if ($this->form_validation->run() == FALSE) {
			$this->loadViews('user/login');
		} else {
			$pData = $this->input->post();
			$pData = $this->security->xss_clean($pData);
			$user["email"] = $pData["email"];
			$user["password"] = $pData["password"];
			$login = $this->user->login_user($user);
			if ($login){
				pr($login);
				$userdata["id"] = $login->id;
				$userdata["name"] = $login->name;
				$this->session->set_userdata($userdata);
				success("User Login");
				redirect('/');
			}else{
				error("Error");
				redirect_back();
			}
		}
	}


	public function logout(){
		$this->session->sess_destroy();
		$url = base_url().'user/login';
		redirect($url);
	}

}
