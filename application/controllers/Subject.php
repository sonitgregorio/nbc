<?php
/**
 * 
 */
 class Subject extends CI_Controller
 {
 	function failedMessage()
    {
        return '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color:red"><span aria-hidden="true">&times;</span></button>';
    }
	function successMessage()
	{
	  	return'<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color:red"><span aria-hidden="true">&times;</span></button>';
	}
 	function add_subject()
 	{
 		$this->load->model('subjectmod');
 		$this->load->view('include/header');
 		$this->load->view('include/nav.php');
 		$this->load->view('page/add_subject');
 		$this->load->view('include/footer');
 	}
 	//Insertion for Subject.
 	function insert_subject()
 	{
 		$this->load->model('subjectmod');
 		$id = $this->input->post('sid');
 		$code = strtoupper(strtolower($this->input->post('subcode')));
 		$description = strtoupper(strtolower($this->input->post('description')));

 		$data = array('code' => $code, 'description' => $description);
 		if ($id != '') {
 			$this->subjectmod->update_subject($data, $id);
 			$this->session->set_flashdata('message', $this->successMessage() . "Subject Updated</div>");

 		} else {
 			$check_subject = $this->subjectmod->check_sub($code, $description);
	 		if ($check_subject <= 0) 
	 		{
		 		$this->subjectmod->insert_subject($data);
		 		$this->session->set_flashdata('message', $this->successMessage() . "Subject Added</div>");
		 		
	 		} 
	 		else 
	 		{
	 			$this->session->set_flashdata('message', $this->failedMessage() . "Cannot Insert. Subject Already Exist<strong>&nbsp;!</strong></div>");
	 		}
 		}
		$this->cancel_subject();
 	}
 	//Delete Subject
 	function delete_subject($id)
 	{
 		$this->load->model('subjectmod');
 		$this->subjectmod->delete_subject($id);
 		$this->session->set_flashdata('message', $this->successMessage() . "Subject Deleted</div>");
 		$this->cancel_subject();
 	}
 	function edit_subject($id)
 	{
 		$this->session->set_userdata('subject', $id);
 		redirect('/add_subject');
 	}
 	function cancel_subject()
 	{
 		$this->session->unset_userdata('subject');
 		redirect('/add_subject');
 	}
 } 