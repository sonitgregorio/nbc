<?php 

	/**
	* Adding Class Controller
	*/
	class AddClassed extends CI_Controller
	{
		function failedMessage()
	    {
	        return '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color:red"><span aria-hidden="true">&times;</span></button>';
	    }
		function successMessage()
		{
		  	return'<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color:red"><span aria-hidden="true">&times;</span></button>';
		}
		function add_class()
		{
			$this->load->model('addclassmd');
			$this->load->view('include/header');
			$this->load->view('include/nav');
			$this->load->view('page/add_class');
			$this->load->view('include/footer');
		}
		function insert_class()
		{
			$instructor = $this->input->post('instructor');
			$subject = $this->input->post('subject');
			$yrsec = $this->input->post('yrsec');
			$semester = $this->input->post('semester');


			$data = array('faculty' => $instructor, 'subject' => $subject, 	
						  'yrsec' => $yrsec, 'semester' => $semester);
			$this->db->insert('tbl_class', $data);
			$this->session->set_flashdata('message', $this->successMessage() . 'Class Inserted.</div>');
			redirect('/add_class');

		}
		function set_sy()
		{
			$this->load->model('addclassmd');
			$this->load->view('include/header');
			$this->load->view('include/nav');
			$this->load->view('page/set_sy');
			$this->load->view('include/footer');
		}
		function insert_sy()
		{
			$desc = $this->input->post('desc');
			$semester = $this->input->post('semester');


			$d = $desc . " - " . $semester;

			$this->db->where('description', $d);
			$x = $this->db->get('tbl_sy')->num_rows();

			if ($x > 0) {
				$this->session->set_flashdata('message', $this->failedMessage() . 'S.Y Already Exist.</div>');
			}else{
				$this->db->insert('tbl_sy', array('description' => $d));
				$this->session->set_flashdata('message', $this->successMessage() . 'S.Y Added.</div>');
							
			}
			redirect('/set_sy');
		}
		function set_active($id)
		{

			$this->db->update('tbl_sy', array('status' => 0));

			$this->db->where('id', $id);
			$this->db->update('tbl_sy', array('status' => 1));
			redirect('/set_sy');
		}
		function add_stud($id)
		{
			$data['classid'] = $id;
			$this->load->model('addclassmd');
			$this->load->view('include/header');
			$this->load->view('include/nav');
			$this->load->view('page/add_students', $data);
			$this->load->view('include/footer');
		}
		function insert_student()
		{
			$this->load->model('addclassmd');
			$subid = $this->input->post('subid');
			$sy = $this->input->post('sy');
			$stud = $this->input->post('student');
			$classid = $this->input->post('classid');
			$data = array('student' => $stud, 'subject' => $subid, 'classid' => $classid, 'sy' => $sy);


			$x = $this->addclassmd->checkings($subid, $stud, $sy);
	
			if ($x > 0) {
				$this->session->set_flashdata('message', $this->failedMessage() . 'Student is Already Assigned.</div>');
			}
			else{
				$this->db->insert('tbl_class_stud', $data);
				$this->session->set_flashdata('message', $this->successMessage() . 'Student Added.</div>');
			}
			redirect('/add_stud/'.$classid);
		}
		function delete_stud($id, $classid)
		{
			$this->db->where('id', $id);
			$this->db->delete('tbl_class_stud');
			$this->session->set_flashdata('message', $this->successMessage() . 'Successfuly Deleted.</div>');
			redirect('/add_stud/'.$classid);
		}
	}