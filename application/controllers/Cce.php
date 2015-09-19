<?php

class Cce extends CI_Controller
{
    function show_instruc()
    {
        //common criteria

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('criteria', 'Criteria', 'required');

        $this->load->view('include/header');
        $this->load->view('include/nav');

        if($this->form_validation->run() === FALSE)
        {
            $d['error'] = '';
            $this->load->view('page/cce', $d);
        }
        else
        {
            $criteria = $this->input->post('criteria');
            $config['upload_path']          = './assets/uploads/';
            // check if the attachment belongs to image/document/spreadsheet
            $config['allowed_types']        = 'jpg|png|jpeg|doc|docx|pdf|xlsx';
            $config['max_size']             = 2048;
            $config['encrypt_name']         = TRUE;
            $this->load->library('upload', $config);

            if($this->upload->do_upload())
            {
                $data['file']       = $this->upload->data('file_name');
                $data['criteria']   = $criteria;
                $data['instructor'] = $this->session->userdata('id');
                $this->db->insert('attachment', $data);
                redirect('/cce');
            }
            else
            {
                $d['error'] = '<div class="alert alert-danger">'.$this->upload->display_errors().'</div>';
                $this->load->view('page/cce', $d);
            }
        }

        $this->load->view('include/footer');
    }

    // calculate total cce points of instructor
    function cce_instruc($id)
    {
        $r = $this->db->get_where('attachment', array('instructor' => $id))->result_array();
        $sum = 0;
        foreach($r as $cce)
        {
            $c = $this->db->get_where('tbl_cce', array('id' => $cce['criteria']))->row_array();
            $sum += $c['point'];
        }
        return $sum;
    }

    //calculate total evaluation of instructor for student
    function student_eval($id)
    {
        $e = $this->db->get_where('tbl_evaluation', array('to_evaluate' => $id))->result_array();
        $sum = 0;
        foreach ($e as $evaluate) {
            $this->db->where('id', $evaluate['evaluator'])->where('usertype', 2);
            $c = $this->db->count_all_results('tbl_userreg');
            if($c > 0)
                $sum = $sum + ($evaluate['group1'] + $evaluate['group2'] + $evaluate['group3'] + $evaluate['group4']);
        }
        return $sum * STUDENT_SUPERVISOR;
    }
}
