<?php 
	/**
	* Faculty Adding Evualuators.
	*/
	class Faculty extends CI_Controller
	{
		function failedMessage()
	    {
	        return '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color:red"><span aria-hidden="true">&times;</span></button>';
	    }
		function successMessage()
		{
		  	return'<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color:red"><span aria-hidden="true">&times;</span></button>';
		}
		function faculty_list()
		{
			
			$this->load->view('include/header');
			$this->load->view('include/nav');
			$this->load->view('page/faculty_list');
			$this->load->view('include/footer');
		}
		function add_faculty_evaluator($id)
		{
			$this->load->model('subjectmod');
			$this->load->model('facultymod');
			$data['id'] = $id;
			$this->load->view('include/header');
			$this->load->view('include/nav');
			$this->load->view('page/add_evaluators', $data);
			$this->load->view('include/footer');
		}
		function insert_faculty_evaluator()
		{
			$this->api->insert_log('Faculty Evaluator Added');
			$this->load->model('facultymod');
			$subid = $this->input->post('subid');
			$uid = $this->input->post('uid');
			$evaluator = $this->input->post('evaluator');
			$cycle = $this->registration->get_cycle_end();
			$data = array('student_id' => $evaluator, 'instructor' => $uid, 'subject' => $subid, 'cycle' => $cycle);
			$x = $this->facultymod->check_exist($evaluator, $uid, $subid, $cycle);
			if ($x == 0) 
			{
				$this->facultymod->insert_eval($data);
				$this->session->set_flashdata('message', $this->successMessage() . 'Evaluator Added</div>');
			} 
			else 
			{
				$this->session->set_flashdata('message', $this->failedMessage() . 'Evaluator Already Exist</div>');
			}
			redirect('/add_faculty_evaluator/'.$uid);
		}
		function delete_evaluators($id, $id2)
		{
			$this->api->insert_log('Deleted Evaluators');
			$this->load->model('facultymod');
			$this->facultymod->delete_evaluators($id);
			redirect('/add_faculty_evaluator/'.$id2);
		}
		function view_summary($id)
		{
			$this->load->model('subjectmod');
			$this->load->model('facultymod');
			$this->load->view('include/header');
			$this->load->view('include/nav');
			$this->load->view('student/evaluation_summary', array('id' => $id));
			$this->load->view('include/footer');
		}
		function searching()
	    {
	        return $this->input->post('searchedname');
	        
	    }		
	}