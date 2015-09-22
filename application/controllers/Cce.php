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

    // calculate total cce points of instructor
    function qce_instruc($id)
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

    function peer_eval($id)
    {
        $e = $this->db->get_where('tbl_evaluation', array('to_evaluate' => $id))->result_array();
        $sum = 0;
        foreach ($e as $evaluate) {
            $this->db->where('id', $evaluate['evaluator'])->where('usertype', 1);
            $c = $this->db->count_all_results('tbl_userreg');
            if($c > 0)
                $sum = $sum + ($evaluate['group1'] + $evaluate['group2'] + $evaluate['group3'] + $evaluate['group4']);
        }
        return $sum * PEER_SELF;
    }

    function self_eval($id)
    {
        $e = $this->db->get_where('tbl_evaluation', array('to_evaluate' => $id, 'evaluator' => $id))->row_array();
        $sum = $e['group1'] + $e['group2'] + $e['group3'] + $e['group4'];
        return $sum * PEER_SELF;
    }

    function rank($id)
    {
        $qce            = $this->qce_instruc($id);
        // just add the supervisor eval
        $cce            = $this->self_eval($id) + $this->peer_eval($id) + $this->student_eval($id);
        $based_point    = ($qce > $cce) ? 'cce' : 'qce';
        $e              = $this->db->get_where('tbl_userreg', array('id' => $id))->row_array();
        $position       = $e['position'];
        $pos            = $this->db->get('points_allocation')->result_array();


        foreach ($pos as $key)
        {
            if($based_point == 'cce')
            {
                $c  = $key['cce_points'];
                $cc = explode('-', $c);
                // if the cce points is within the range
                if($cce >= $cc[0] AND $cce <= $cc[1])
                {
                    //just promote if the position bracket is greater the current position
                    if($key['position'] > $position)
                    {
                        //increment position then break
                        $positon++;
                        break;
                    }
                }
            }
            else
            {
                $c  = $key['qce_points'];
                $cc = explode('-', $c);
                if(count($cc) == 1)
                {
                    if($qce == $cc[0])
                    {
                        if($key['position'] > $position)
                        {
                            $position++;
                            break;
                        }
                    }
                }
                else
                {
                    if($qce >= $cc[0] AND $qce <= $cc[1])
                    {
                        if($key['position'] > $position)
                        {
                            $position++;
                            break;
                        }
                    }
                }
            }
        }
        return array('qce' => ,  $qce, 'cce' => $cce, 'position' => $position);
        // update the instructor rank if the rank is change
    }
}
