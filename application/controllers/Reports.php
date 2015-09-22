<?php 

	/**
	* 
	*/
	class Reports extends CI_Controller
	{
		
		function view_all_rep()
		{
	        $this->load->view('include/header');
	        $this->load->view('include/nav');
	        $this->load->view('page/rep');
	        $this->load->view('include/footer');
		}
	}