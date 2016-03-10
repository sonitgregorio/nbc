<?php

class Evaluate extends CI_Controller
{
    function evaluation()
    {
        $this->api->insert_log('Evaluation Submited');
        $data['group1'] = 0;
        for($i = 1;$i <= 5; $i++)
        {
            if($this->input->post('aname'.$i))
                $p = $this->input->post('aname'.$i);
                $data['group1'] += $this->input->post('aname'.$i);
                if ($p != 0 OR $p != '') {
                     $data2 = array('groups' => 'group1', 'nums' => 'aname'.$i, 'points' => $this->input->post('aname'.$i), 'fid' => $this->input->post('ins_id'), 'cycle' => $this->registration->get_cycle_end(), 'subject' => $this->input->post('subject'));
                    $this->db->insert('tbl_qce_rate', $data2);
                }
        }

        $data['group2'] = 0;
        for($i = 1;$i <= 5; $i++)
        {
            $p = $this->input->post('bname'.$i);
            if($this->input->post('bname'.$i))
                $data['group2'] += $this->input->post('bname'.$i);
                if ($p != 0 OR $p != '') {
                     $data3 = array('groups' => 'group2', 'nums' => 'bname'.$i, 'points' => $this->input->post('bname'.$i), 'fid' => $this->input->post('ins_id'), 'cycle' => $this->registration->get_cycle_end(), 'subject' => $this->input->post('subject'));
                    $this->db->insert('tbl_qce_rate', $data3);
                }
        }

        $data['group3'] = 0;
        for($i = 1;$i <= 5; $i++)
        {
             $p = $this->input->post('cname'.$i);
            if($this->input->post('cname'.$i))
                $data['group3'] += $this->input->post('cname'.$i);
                if ($p != 0 OR $p != '') {
                    $data4 = array('groups' => 'group3', 'nums' => 'cname'.$i, 'points' => $this->input->post('cname'.$i), 'fid' => $this->input->post('ins_id'), 'cycle' => $this->registration->get_cycle_end(), 'subject' => $this->input->post('subject'));
                    $this->db->insert('tbl_qce_rate', $data4);
                }
        }

        $data['group4'] = 0;
        for($i = 1;$i <= 5; $i++)
        {
            $p = $this->input->post('dname'.$i);
            if($this->input->post('dname'.$i))
                $data['group4'] += $this->input->post('dname'.$i);
                 if ($p != 0 OR $p != '') {
                        $data5 = array('groups' => 'group4', 'nums' => 'dname'.$i, 'points' => $this->input->post('dname'.$i), 'fid' => $this->input->post('ins_id'), 'cycle' => $this->registration->get_cycle_end(), 'subject' => $this->input->post('subject'));
                        $this->db->insert('tbl_qce_rate', $data5);
                    }
        }

        $data['to_evaluate']    = $this->input->post('ins_id');
        $data['evaluator']      = session('id');
        $data['cycle']          = $this->registration->get_cycle_end();
        $data['subject']        = $this->input->post('subject');

        $this->db->insert('tbl_evaluation', $data);
        redirect('/evaluate');
    }
}
