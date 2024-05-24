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
		$this->form_validation->set_rules('name', 'Name', 'required|xss_clean|alpha_numeric_spaces');
		$this->form_validation->set_rules('email', 'Email', 'required|xss_clean|valid_email');
		$this->form_validation->set_rules('mobile', 'Mobile', 'required|xss_clean|exact_length[10]|numeric');
		$this->form_validation->set_rules('class', 'Class', 'required|xss_clean');
		$this->form_validation->set_rules('address', 'Address', 'required|xss_clean');
		if ($this->form_validation->run() == FALSE) {
			$this->loadViews('students/create');
		} else {
			$pData = $this->input->post();
			$pData = $this->security->xss_clean($pData);
			$student["name"] = $pData["name"];
			$student["email"] = $pData["email"];
			$student["phone"] = $pData["mobile"];
			$student["class"] = $pData["class"];
			$student["address"] = $pData["address"];
			$student["addon"] = date('Y-m-d H:i:s');
			$insert = $this->student->insert_student($student);
			if ($insert){
				success("Student added..");
				redirect('student');
			}else{
				error("Error");
				redirect("student/create");
			}

		}
	}


	public function deleteStudent($id){
		$result = $this->student->delete_student($id);
		if ($result){
			$this->session->set_flashdata('success', 'Deleted Successfully');
			redirect('student');
		}else{
			$this->session->set_flashdata('error', 'Error while deleting your record..');
			redirect('student');
		}
	}

}
