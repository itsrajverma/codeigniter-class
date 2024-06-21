<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->isLoggedIn();
		$this->load->model('Home_model','home');
	}

	public function index()
	{
		$this->loadViews('home');
	}

	public function contactUs()
	{
		$this->load->view('includes/header');
		$this->load->view('contact');
		$this->load->view('includes/footer');
	}

	public function records()
	{
		$data["records"] = $this->home->get_records();
		$this->loadViews('records',$data);
	}


}
