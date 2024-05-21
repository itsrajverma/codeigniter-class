<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends MY_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Student_model','student');
	}

	public function index(){
		$data["records"] = $this->student->get_records();
		$this->loadViews('students/list',$data);
	}


	public function create(){
		$this->loadViews('students/create');
	}

	public function insertStudent(){
		$pData = $this->input->post();
		if (empty($pData)){
			redirect('student/create');
		}

		$student["name"] = $this->input->post('name');
		$student["email"] = $this->input->post('email');
		$student["phone"] = $this->input->post('mobile');
		$student["class"] = $this->input->post('class');
		$student["address"] = $this->input->post('address');
		$student["addon"] = date('Y-m-d H:i:s');

//		$student["name"] = $pData["name"];

		$insert = $this->student->insert_student($student);
		if ($insert){
			redirect('student');
		}else{
			echo "failed";
		}
	}

}
