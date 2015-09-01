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
    }
