<?php
/**
 *
 */
class Registration extends CI_Model
{
      function successMessage()
      {
          return'<button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color:red"><span aria-hidden="true">&times;</span></button>';
      }
      function failedMessage()
      {
          return '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color:red"><span aria-hidden="true">&times;</span></button>';
      }
      function add_school($data)
      {
          $this->db->insert('tbl_school', $data);
          $this->session->set_flashdata('message', '<div class="alert alert-success">' . $this->successMessage() .  'School has been Inserted.</div>');
          redirect('/add_school');
      }
      function schoolList()
      {
          return $this->db->get('tbl_school')->result_array();
      }
      function Allposition()
      {
          return $this->db->query("SELECT id as positionid, description as descr FROM position")->result_array();
      }
      function edit_sch($id)
      {
          $this->db->where('id', $id);
          return $this->db->get('tbl_school')->row_array();
      }
      function edit_school($data, $id)
      {
          $this->db->where('id', $id);
          $this->db->update('tbl_school', $data);
          $this->session->set_flashdata('message', '<div class="alert alert-success">' . $this->successMessage() .  'School Updated.</div>');
          redirect('/add_school');
      }
      function delete_school($id)
      {
          $this->db->delete('tbl_school', array('id' => $id));
          $this->session->set_flashdata('message', '<div class="alert alert-success">' . $this->successMessage() .  'School Deleted.</div>');
          redirect('/add_school');
      }
      function insert_fac($data)
      {
          $this->db->insert('tbl_faculty', $data);
          $this->session->set_flashdata('message', '<div class="alert alert-success">' . $this->successMessage() .  'Inserted New Data.</div>');
      }
      function getallfaculty()
      {
          return $this->db->query("SELECT a.id AS fid, CONCAT(a.firstname, ' ', a.middlename, ' ', a.lastname)
                                AS fullname, a.address, a.contact, CONCAT(b.sch_name, '-', b.sch_address)
                                AS sch , b.id
                                AS schid, c.description
                                AS position, c.id
                                AS pid
                                FROM `tbl_faculty` a, tbl_school b, position c
                                WHERE a.school = b.id AND c.id = a.position")->result_array();
      }
      function delete_faculty($id)
      {
          $this->db->where('id', $id);
          $this->db->delete('tbl_faculty');
          $this->session->set_flashdata('message', '<div class="alert alert-success">' . $this->successMessage() .  'Faculty Deleted.</div>');
          redirect('/faculty_registration');

      }
      function getFaculty($id)
      {
          return $this->db->query("SELECT a.id AS fid, a.firstname, a.middlename, a.lastname,
                                    a.address, a.contact, a.emailaddress, b.id AS schid, c.id AS pid,  dates
                                    FROM `tbl_faculty` a, tbl_school b, position c
                                    WHERE a.school = b.id
                                    AND c.id = a.position
                                    AND a.id = '$id'")->row_array();
      }
      function update_fac($data, $fid)
      {
          $this->db->where('id', $fid);
          $this->db->update('tbl_faculty', $data);
          $this->session->set_flashdata('message', '<div class="alert alert-success">' . $this->successMessage() .  'Faculty Updated  .</div>');
          redirect('/faculty_registration');
      }
      function insert_user($data)
      {
          $this->db->insert('tbl_userreg', $data);
          if($data['usertype'] == 2)
          {
            if ($this->session->userdata('type') != 0) {
              $d['student_id']  = $this->db->insert_id();
              $d['instructor']  = $this->session->userdata('id');
              $this->db->insert('tbl_student_eval', $d);
            }
             
          }
          $this->session->set_flashdata('message', '<div class="alert alert-success">' . $this->successMessage() .  'User Added  .</div>');
        
      }
      function getAlltype()
      {
          return $this->db->get('tbl_usertype')->result_array();
      }
      function getAllusers()
      {
          return $this->db->query("SELECT *, tbl_userreg.id as uid FROM tbl_userreg, tbl_usertype WHERE tbl_userreg.usertype = tbl_usertype.id")->result_array();
      }
      function getUser($id)
      {
          $this->db->where('id', $id);
          return $this->db->get('tbl_userreg')->row_array();
      }
      function update_users($data, $id)
      {
          $this->db->where('id', $id);
          $this->db->update('tbl_userreg', $data);
          $this->session->set_flashdata('message', '<div class="alert alert-success">' . $this->successMessage() .  'User Updated  .</div>');
          redirect('/user_registration');

      }
      function delete_users($id)
      {
          $this->db->where('id', $id);
          $this->db->delete('tbl_userreg');
          $this->session->set_flashdata('message', '<div class="alert alert-success">' . $this->successMessage() .  'Succesfully Deleted.</div>');
          redirect('/user_registration');
      }
      function insert_criteria($data)
      {
          $this->db->insert('tbl_cce', $data);
          $this->session->set_flashdata('message', '<div class="alert alert-success">' . $this->successMessage() .  'Criteria Added.</div>');
          redirect('/add_criteria');
      }
      function getAllcce()
      {
          return $this->db->get('tbl_cce')->result_array();
      }
      function delete_cce($id)
      {
          $this->db->where('id', $id);
          $this->db->delete('tbl_cce');
          $this->session->set_flashdata('message', '<div class="alert alert-success">' . $this->successMessage() .  'Criteria Deleted.</div>');
          redirect('/add_criteria');
      }
      function edit_cce($id)
      {
          $this->db->where('id', $id);
          return $this->db->get('tbl_cce')->row_array();
      }
      function update_cce($data, $id)
      {
          $this->db->where('id', $id);
          $this->db->update('tbl_cce', $data);
          $this->session->set_flashdata('message', '<div class="alert alert-success">' . $this->successMessage() .  'Criteria Updated.</div>');
          redirect('/add_criteria');
      }
      function checkif($criteria)
      {
          $this->db->where('description', $criteria);
          return $this->db->get('tbl_cce')->num_rows();
      }
      function list_evaluate()
      {
          $x = $this->session->userdata('fid');
          $cycle = $this->get_cycle_end();
          return $this->db->query("SELECT * FROM tbl_userreg WHERE id NOT IN(SELECT student_id FROM tbl_student_eval WHERE instructor = '$x' AND cycle = '$cycle') AND usertype != 0")->result_array();
      }
      function insert_eval($id)
      {
          $cycle = $this->get_cycle_end();
          $data = array('student_id' => $id, 'instructor' => $this->session->userdata('fid'), 'cycle' => $cycle);
          $this->db->insert('tbl_student_eval', $data);
          $this->session->set_flashdata('message', '<div class="alert alert-success">' . $this->successMessage() .  'Succesfully Added.</div>');
          redirect('/list_evaluate');
      }
      function get_fs()
      {
          return $this->db->query("SELECT a.*, a.id as facid, b.id as userid, c.sch_name FROM `tbl_faculty` a, tbl_userreg b, tbl_school c WHERE b.fid = a.id AND a.school = c.id ")->result_array();
      }
      function getPo($id)
      {
          $this->db->where('id', $id);
          $x = $this->db->get('position')->row_array();
          return $x['description'];
      }
      function load_cce()
      {
          return $this->db->get('tbl_cce')->result_array();
      }
      function info()
      {
          return $this->db->get_where('tbl_faculty', array('id' => $this->session->userdata('fid')))->row_array();
      }
      function get_pos($id)
      {
         $this->db->where('id', $id);
         $x = $this->db->get('position')->row_array();
         return $x['description'];
      }
      function sch_per($id)
      {
        $this->db->where('id', $id);
        $x = $this->db->get('tbl_school')->row_array();
        return $x['sch_name'];
      }
      function get_all_cycle()
      {
        return $this->db->get('tbl_cycle')->result_array();
      }
      function insert_cycle($data)
      {
        $this->db->insert('tbl_cycle', $data);

        $this->db->query("UPDATE tbl_faculty SET ident = 0");
      }
      function get_cycle_end()
      {
          $x = $this->db->query("SELECT id FROM tbl_cycle ORDER BY id DESC LIMIT 1")->row_array();
          return $x['id'];
      }
      function insert_cces($data)
      {
          $this->db->insert('tbl_cce_res', $data);
      }
      function get_cce_points($id)
      {
          $this->db->where('cid', $id);
          $this->db->where('fid', $this->session->userdata('fid'));
          $this->db->where('cycle', $this->get_cycle_end());
          $x = $this->db->get('tbl_cce_res')->row_array();
          return $x['point'];
      }
      function get_cce_points_prev($id)
      {
          $counted = 0;
          $xy = $this->db->query("SELECT id FROM tbl_cycle ORDER by id DESC LIMIT 2")->result_array();
          foreach ($xy as $key => $value) {
            $va = $value ['id'];
            $counted += 1;
          }
          if ($counted == 1) {
            $va = 0;
          }



          $this->db->where('cid', $id);
          $this->db->where('fid', $this->session->userdata('fid'));
          $this->db->where('cycle', $va);
          $x = $this->db->get('tbl_cce_res')->row_array();
          return $x['point'];
      }
      function check_cce_res()
      {
          $this->db->where('fid', $this->session->userdata('fid'));
          $this->db->where('cycle', $this->get_cycle_end());
          return $this->db->get('tbl_cce_res')->num_rows();
      }
      function update_cce_res($data, $id)
      {
          $this->db->where('fid', $this->session->userdata('fid'));
          $this->db->where('cid', $id);
          $this->db->where('cycle', $this->get_cycle_end());
          $this->db->update('tbl_cce_res', $data);
      }
      function get_total_cce()
      {
        $fid = $this->session->userdata('fid');
        $cycle = $this->registration->get_cycle_end();
        $x = $this->db->query("SELECT SUM(point) as p FROM tbl_cce_res WHERE cycle = '$cycle' AND fid = '$fid'")->row_array();
        return $x['p'];
      }
      function student_result($fid, $cycle, $usertype, $types)
      {
        $x = $this->db->query("SELECT sum(group1) +  sum(group2) + sum(group3) + sum(group4)  as grp, count(*) as grp2
                              FROM `tbl_evaluation`, tbl_userreg 
                              WHERE tbl_evaluation.evaluator = tbl_userreg.id 
                              AND tbl_userreg.usertype = '$usertype' 
                              AND to_evaluate = '$fid' 
                              AND cycle = '$cycle' LIMIT 30")->row_array();

        if ($x['grp2'] == 0) {
          return  0;
        } else {
           return $x['grp'] / $x['grp2'] * $types;
        }
        
       
      }
      function self_result($fid, $cycle, $usertype, $types)
      {
         $x = $this->db->query("SELECT sum(group1) +  sum(group2) + sum(group3) + sum(group4) as grp
                              FROM `tbl_evaluation`, tbl_userreg 
                              WHERE tbl_evaluation.evaluator = tbl_userreg.id 
                              AND tbl_userreg.usertype = '$usertype' 
                              AND to_evaluate = '$fid' 
                              AND cycle = '$cycle' AND tbl_userreg.fid = '$fid' LIMIT 1")->row_array();
        return $x['grp'] * $types;
      }
      function peer_result($fid, $cycle, $usertype, $types)
      {
        $x = $this->db->query("SELECT sum(group1) +  sum(group2) + sum(group3) + sum(group4) as grp, count(*) as grp2
                              FROM `tbl_evaluation`, tbl_userreg 
                              WHERE tbl_evaluation.evaluator = tbl_userreg.id 
                              AND tbl_userreg.usertype = '$usertype' 
                              AND to_evaluate = '$fid' 
                              AND cycle = '$cycle' AND tbl_userreg.fid != '$fid' LIMIT 5")->row_array();
        if ($x['grp2'] == 0) {
          return 0;
        } else {
          return $x['grp'] / $x['grp2'] * $types;
      
        }
        
      }
      function supervisor_result($fid, $cycle, $usertype, $types)
      {
          $x = $this->db->query("SELECT sum(group1) +  sum(group2) + sum(group3) + sum(group4) as grp
                                FROM `tbl_evaluation`, tbl_userreg 
                                WHERE tbl_evaluation.evaluator = tbl_userreg.id 
                                AND tbl_userreg.usertype = '$usertype' 
                                AND to_evaluate = '$fid' 
                                AND cycle = '$cycle' AND tbl_userreg.fid != '$fid' LIMIT 1")->row_array();
          return $x['grp'] * $types;
      }
      function get_cce_results($fid, $cycle)
      {
        $x = $this->db->query("SELECT sum(`point`) as p from tbl_cce_res where cycle = '$cycle' AND fid = '$fid'")->row_array();
        return $x['p'];
      }
      function get_all_points()
      {
          return $this->db->get('points_allocation')->result_array();
      }
      function get_ranked($id)
      {
          $alloc = $this->get_all_points();
          $qce =  $this->student_result($id, $this->get_cycle_end(), 2, .30) + $this->self_result($id, $this->get_cycle_end(), 1, .20) + $this->peer_result($id, $this->get_cycle_end(), 1, .20) + $this->supervisor_result($id, $this->get_cycle_end(), 3, .30);
          $cce = $this->get_cce_results($id, $this->get_cycle_end());
          $position = 0;
          if ($qce < $cce) 
          {
              foreach ($alloc as $key => $value) 
              {

                $c = $value['qce_points'];
                if ($c == "") {
                  $c = "0-0";
                } 
                
                $a = explode('-', $c);

                if (count($a) == 1) 
                {
                    if ($qce == $a) 
                    {
                      $post = $value['position']; 
                      break;
                    }                    
                } 
                else
                {
                  if($qce >= $a[0] AND $qce <= $a[1])
                    {
                        $post = $value['position']; 
                        break; 
                    }
                  elseif($qce <= 80)
                    {
                        $post = 1;
                        break;
                    }
                }
              }
          }
          else
          {
            foreach ($alloc as $key => $value) {
                $c = $value['cce_points'];
                $a = explode('-', $c);
                if ($cce >= $a[0] AND $cce <= $a[1]) {
                   $post = $value['position']; 
                   break;
                }
                else
                {
                    $post = 0;
                }
            }
          } 
         
          $this->db->where('id', $id);
          $pos = $this->db->get('tbl_faculty')->row_array();
          $currpos = $pos['position'];
          if ($currpos > $post) 
          {
            $updatedposition = $currpos;
          }
          else
          {
            $updatedposition = $currpos + 1;
            $this->db->where('id', $id);
            $this->db->where('ident', 0);
            $data = array('position' => $updatedposition, 'ident' => 1);
            $this->db->update('tbl_faculty', $data);


          }

          return $updatedposition;



          // foreach ($alloc as $key => $value) 
          // {
          //     $a = explode('-', $value['cc_points']);

              
              
          // }
      } 
      function get_positions($id)
      {
          $this->db->where('id', $id);
          $x = $this->db->get('position')->row_array();
          return $x['description'];
      }
      function check_facs($id)
      {
        $this->db->where('fid', $id);
        return $this->db->get('tbl_userreg')->num_rows();
      }
      function get_cce_type()
      {
        return $this->db->query("SELECT * FROM tbl_cce")->result_array();
      }
      function get_subject_qce($cycle)
      {
          $fid = $this->session->userdata('fid');
          return $this->db->query("SELECT tbl_evaluation.subject, tbl_subject.description, tbl_subject.code 
                                   FROM `tbl_evaluation`, tbl_subject 
                                   WHERE to_evaluate = $fid 
                                   AND cycle = $cycle 
                                   AND subject != 0 
                                   AND tbl_evaluation.subject = tbl_subject.id 
                                   GROUP BY subject, cycle")->result_array();
      }
      function get_sum_points_cce($cycle, $cat)
      {

          $fid = $this->session->userdata('fid');
          $x = $this->db->query("SELECT SUM(tbl_cce_res.point) as p FROM tbl_cce_res, tbl_cce 
                            WHERE fid = $fid and tbl_cce.id = cid AND tbl_cce.cat = $cat 
                            AND cycle = $cycle")->row_array();
          return $x['p'];
      }
}

