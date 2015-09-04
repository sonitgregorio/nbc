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
}
