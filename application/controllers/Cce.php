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
            //$config['encrypt_name']         = TRUE;
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
    function insert_this_cce()
    {
        $cycle = $this->registration->get_cycle_end();
        $fid = $this->session->userdata('fid');
        $ch = $this->registration->check_cce_res();
        foreach ($this->registration->load_cce() as $key => $value) 
        {
            if ($this->input->post($value['id']) == "") 
            {
                $vals = 0;
            } 
            else
            {
                $vals = $this->input->post($value['id']);
            }
            
            $data = array('cid' => $value['id'] , 'fid' => $fid,  'point' =>  $vals, 'cycle' => $cycle);
            if ($ch > 0) 
            {
                $this->registration->update_cce_res($data, $value['id']);
            }
            else
            {
                $this->registration->insert_cces($data);
            }
            
        }
        $this->api->insert_log('Inserted CCE');
        redirect('/cce');
    }
    function set_cycle()
    {
        $this->load->view('include/header');
        $this->load->view('include/nav');
        $this->load->view('page/add_cycle');
        $this->load->view('include/footer');
    }
    function insert_cycle()
    {
        $descrip = $this->input->post('descrip');
        $from = $this->input->post('date_from');
        $to = $this->input->post('date_to');
        $data = array('description' => $descrip, 'date_from' => $from, 'date_to' => $to);
        $this->registration->insert_cycle($data);
        $this->api->insert_log('New Cycle Inserted');
        redirect('/set_cycle');
       // echo $descrip . "|" . $from . "|" . $to;
    }

}
