<?php

class Student extends CI_Controller
{

    function evaluate()
    {
        $this->load->model('facultymod');
        $this->load->model('registration');
        $this->load->view('include/header');
        $this->load->view('include/nav');
        $this->load->view('student/evaluate');
        $this->load->view('include/footer');
    }

    function ins_eval($id, $subject, $cycle)
    {
        $data['instructor'] = $this->db->get_where('tbl_faculty', array('id' => $id))->row_array();
        $data['subject'] = $subject;
        $data['cy'] = $cycle;
        $data['ids']= $id;
        $this->load->view('include/header');
        $this->load->view('include/nav');
        $this->load->view('student/ins_eval', $data);
        $this->load->view('include/footer');
    }
    function print_qce($id, $subject, $cycle)
    {
        $data['instructor'] = $this->db->get_where('tbl_faculty', array('id' => $id))->row_array();
        $data['subject'] = $subject;
        $data['cy'] = $cycle;
        $this->load->view('include/header');
        $this->load->view('student/print_qce', $data);
        $this->load->view('include/footer');
    }
}
