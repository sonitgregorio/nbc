<?php

class Api
{
    protected $CI;

    function __construct()
    {
        $this->CI =& get_instance();
    }


    // calculate total cce points of instructor
    function qce_instruc($id)
    {
        $r = $this->CI->db->get_where('attachment', array('instructor' => $id))->result_array();
        $sum = 0;
        foreach($r as $cce)
        {
            $c = $this->CI->db->get_where('tbl_cce', array('id' => $cce['criteria']))->row_array();
            $sum += $c['point'];
        }
        return $sum;
    }

    //calculate total evaluation of instructor for student
    function student_eval($id)
    {
        $e = $this->CI->db->get_where('tbl_evaluation', array('to_evaluate' => $id))->result_array();
        $sum = 0;
        foreach ($e as $evaluate) {
            $this->CI->db->where('id', $evaluate['evaluator'])->where('usertype', 2);
            $c = $this->CI->db->count_all_results('tbl_userreg');
            if($c > 0)
                $sum = $sum + ($evaluate['group1'] + $evaluate['group2'] + $evaluate['group3'] + $evaluate['group4']);
        }
        return $sum * STUDENT_SUPERVISOR;
    }

    function peer_eval($id)
    {
        $e = $this->CI->db->get_where('tbl_evaluation', array('to_evaluate' => $id))->result_array();
        $sum = 0;
        foreach ($e as $evaluate) {
            $this->CI->db->where('id', $evaluate['evaluator'])->where('usertype', 1);
            $c = $this->CI->db->count_all_results('tbl_userreg');
            if($c > 0)
                $sum = $sum + ($evaluate['group1'] + $evaluate['group2'] + $evaluate['group3'] + $evaluate['group4']);
        }
        return $sum * PEER_SELF;
    }

    function self_eval($id)
    {
        $e = $this->CI->db->get_where('tbl_evaluation', array('to_evaluate' => $id, 'evaluator' => $id))->row_array();
        $sum = $e['group1'] + $e['group2'] + $e['group3'] + $e['group4'];
        return $sum * PEER_SELF;
    }

    function super_eval($id)
    {
        $e = $this->CI->db->query("SELECT * FROM tbl_evaluation a, tbl_userreg b, tbl_faculty c WHERE a.to_evaluate = $id AND b.fid = c.id  AND c.position = 3 AND a.to_evaluate = b.id")->result_array();
        $sum = 0;
        foreach($e as $ee)
        {
            $sum = $sum + ($evaluate['group1'] + $evaluate['group2'] + $evaluate['group3'] + $evaluate['group4']);
        }
        return $sum * STUDENT_SUPERVISOR;
    }

    function rank($id)
    {
        $cce            = $this->qce_instruc($id);
        // just add the supervisor eval
        $qce            = $this->self_eval($id) + $this->peer_eval($id) + $this->student_eval($id) + $this->super_eval($id) ;
        $based_point    = ($qce > $cce) ? 'cce' : 'qce';
        $e              = $this->CI->db->query("SELECT * FROM tbl_userreg, tbl_faculty, tbl_school WHERE tbl_userreg.id = $id AND tbl_faculty.id = tbl_userreg.fid AND tbl_school.id = tbl_faculty.school")->row_array();
        $position       = $e['position'];
        $school         = $e['sch_name'];
        $pos            = $this->CI->db->get('points_allocation')->result_array();


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
                        $position++;
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
          return array('qce' =>  $qce,
                       'cce' => $cce,
                       'position' => $position,
                       'school' => $school);
        // update the instructor rank if the rank is change
    }
}
