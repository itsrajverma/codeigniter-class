<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
	public function loadViews($page,$data = null)
	{
		$this->load->view('includes/header');
		$this->load->view($page, $data);
		$this->load->view('includes/footer');
	}
}