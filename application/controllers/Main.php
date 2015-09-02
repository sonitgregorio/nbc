<?php
    class Main extends CI_Controller
    {
      function index()
      {
        $this->load->view('include/header');
        $this->load->view('index');
        $this->load->view('include/footer');
      }
      function verifylogin()
      {
        $this->load->view('include/header');
        $this->load->view('include/nav');
        $this->load->view('page/home');
        $this->load->view('include/footer');
      }
      function fac_reg()
      {
        $this->load->view('include/header');
        $this->load->view('include/nav');
        $this->load->view('page/faculty_reg');
        $this->load->view('include/footer');
      }
      function add_school()
      {
        $this->load->view('include/header');
        $this->load->view('include/nav');
        $this->load->model('registration');
        $this->load->view('page/add_school');
        $this->load->view('include/footer');
      }
      function user_reg()
      {
        $this->load->view('include/header');
        $this->load->view('include/nav');
        $this->load->view('page/user_reg');
        $this->load->view('include/footer');
      }
      function add_criteria()
      {
        $this->load->view('include/header');
        $this->load->view('include/nav');
        $this->load->view('page/add_cce');
        $this->load->view('include/footer');
      }
    }
