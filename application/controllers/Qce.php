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
    function qce_subject()
    {
        $this->load->model('faculty');
        $this->load->model('registration');
        $this->load->view('include/header');
        $this->load->view('include/nav');
        $this->load->view('page/qce_per_subject');
        $this->load->view('include/footer');
    }
    function view_summary_subject($id, $subject)
    {
        $this->load->model('subjectmod');
        $this->load->model('facultymod');
        $this->load->view('include/header');
        $this->load->view('include/nav');
        $this->load->view('student/evaluation_summary_subject', array('id' => $id, 'subject' => $subject));
        $this->load->view('include/footer');
    }
}
