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
}
