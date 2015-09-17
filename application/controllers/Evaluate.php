<?php

class Evaluate extends CI_Controller
{
    function eval()
    {
        $data['group1'] = 0;
        for($i = 1;$i <= 5; $i++)
        {
            if($this->input->post('aname'.$i))
                $data['group1'] += $this->input->post('aname'.$i);
        }

        $data['group2'] = 0;
        for($i = 1;$i <= 5; $i++)
        {
            if($this->input->post('bname'.$i))
                $data['group2'] += $this->input->post('bname'.$i);
        }

        $data['group3'] = 0;
        for($i = 1;$i <= 5; $i++)
        {
            if($this->input->post('cname'.$i))
                $data['group3'] += $this->input->post('cname'.$i);
        }

        $data['group4'] = 0;
        for($i = 1;$i <= 5; $i++)
        {
            if($this->input->post('dname'.$i))
                $data['group4'] += $this->input->post('dname'.$i);
        }

        $data['to_evaluate']    = $this->input->post('ins_id');
        $data['evaluator']      = session('id');

        $this->db->insert('tbl_evaluation', $data);
        redirect('/evaluate');
    }
}
