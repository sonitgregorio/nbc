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
          redirect('/faculty_registration');
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
                                    a.address, a.contact, a.emailaddress, b.id AS schid, c.id AS pid
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
              $d['student_id']     = $this->db->insert_id();
              $d['instructor']  = $this->session->userdata('id');
              $this->db->insert('tbl_student_eval', $d);
          }
          $this->session->set_flashdata('message', '<div class="alert alert-success">' . $this->successMessage() .  'User Added  .</div>');
          redirect('/user_registration');
      }
      function getAlltype()
      {
          return $this->db->get('tbl_usertype')->result_array();
      }
      function getAllusers()
      {
          return $this->db->get('tbl_userreg')->result_array();
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
         return $this->db->query("SELECT * FROM tbl_userreg WHERE id NOT IN(SELECT student_id FROM tbl_student_eval WHERE instructor = $x) AND usertype != 0")->result_array();
      }
      function insert_eval($id)
      {
          $data = array('student_id' => $id, 'instructor' => $this->session->userdata('fid'));
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
}
