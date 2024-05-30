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
			if(!empty($_FILES["profile_pic"])){
				$config['upload_path']          = './uploads/students/';
				$config['allowed_types']        = 'gif|jpg|png|jpeg';
				$config['max_size']             = 2048;
				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('profile_pic')) {
					error($this->upload->display_errors());
					redirect_back();
				} else {
					$data = array('upload_data' => $this->upload->data());
					$student["profile_pic"] = "uploads/students/".$data["upload_data"]["file_name"];
				}
			}
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


	public function edit($id){
		if (empty($id)){
			redirect('student');
		}
		$record = $this->student->student_detail($id);
		if (empty($record)){
			redirect('student');
		}
		$data["values"] = $record;
		$this->loadViews('students/update',$data);
	}

	public function updateStudent($student_id){
		$this->form_validation->set_rules('name', 'Name', 'required|xss_clean|alpha_numeric_spaces');
		$this->form_validation->set_rules('email', 'Email', 'required|xss_clean|valid_email');
		$this->form_validation->set_rules('mobile', 'Mobile', 'required|xss_clean|exact_length[10]|numeric');
		$this->form_validation->set_rules('class', 'Class', 'required|xss_clean');
		$this->form_validation->set_rules('address', 'Address', 'required|xss_clean');
		if ($this->form_validation->run() == FALSE) {
			$record = $this->student->student_detail($student_id);
			if (empty($record)){
				redirect('student');
			}
			$data["values"] = $record;
			$this->loadViews('students/update',$data);
		} else {
			$pData = $this->input->post();
			$pData = $this->security->xss_clean($pData);
			$student["name"] = $pData["name"];
			$student["email"] = $pData["email"];
			$student["phone"] = $pData["mobile"];
			$student["class"] = $pData["class"];
			$student["address"] = $pData["address"];
			$student["addon"] = date('Y-m-d H:i:s');
			$insert = $this->student->update_student($student,$student_id);
			if ($insert){
				success("Student updates..");
				redirect('student');
			}else{
				error("Error");
				redirect("student/edit/$student_id");
			}
		}
	}

}
