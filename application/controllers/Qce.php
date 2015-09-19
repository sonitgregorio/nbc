<?php

class Qce extends CI_Controller
{
    function criteria()
    {
        //show instructor
        $this->load->model('faculty');
        $this->load->model('registration');
        $this->load->view('include/header');
        $this->load->view('include/nav');
        $this->load->view('page/qce');
        $this->load->view('include/footer');
    }
}
