<?php
    class Main extends CI_Controller
    {
      function index()
      {
          if($this->session->has_userdata('id'))
          {
              $this->home();
          }
          else
          {
              $this->login();
          }
      }

      function login()
      {
          $this->load->helper('form');
          $this->load->library('form_validation');

          $this->form_validation->set_rules('username', 'Username', 'required');
          $this->form_validation->set_rules('password', 'Password', 'required');

          if($this->form_validation->run() === FALSE)
          {
              $d['error'] = '';
              $this->load->view('include/header');
              $this->load->view('index', $d);
              $this->load->view('include/footer');
          }
          else
          {
              $this->load->model('userreg');
              $r = $this->userreg->login();
              if(is_numeric($r))
              {
                  $this->session->set_userdata('id', $r);
                  redirect(base_url());
              }
              else
              {
                  $d['error'] = '<div class="alert alert-danger">Authentication Failed</div>';
                  $this->load->view('include/header');
                  $this->load->view('index', $d);
                  $this->load->view('include/footer');
              }
          }

      }
      function home()
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

      function logout()
      {
          $this->session->unset_userdata('id');
          redirect('/');
      }
    }
