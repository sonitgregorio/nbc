<?php

class Cce extends CI_Controller
{
    function show_instruc()
    {
        $this->load->model('faculty');
        $this->load->view('include/header');
        $this->load->view('include/nav');
        $this->load->view('page/cce');
        $this->load->view('include/footer');
    }
}
