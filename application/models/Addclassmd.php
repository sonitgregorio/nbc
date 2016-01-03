<?php
	/**
	* 
	*/
	class Addclassmd extends CI_Model
	{
		function get_instruc()
		{
			$this->db->select('CONCAT(firstname, " ", middlename, ". ", lastname) as fname, id');
			return $this->db->get('tbl_faculty')->result_array();			
		}
		function get_subj()
		{
			$this->db->select('CONCAT(code, "-", description) as sname, id');
			return $this->db->get('tbl_subject')->result_array();			
		}
		function yrsect()
		{
			$this->db->select('yrsec, id');
			return $this->db->get('tbl_sectionyear')->result_array();			
		}
		function get_classes()
		{
			return $this->db->query("SELECT tbl_class.id, CONCAT(tbl_faculty.firstname, ' ', tbl_faculty.lastname) as fname,
								     CONCAT(tbl_subject.code, '-', tbl_subject.description) as subdesc, tbl_sectionyear.yrsec,
								     tbl_sy.description as semester FROM tbl_sy, tbl_class, tbl_subject,tbl_faculty,  tbl_sectionyear 
								     WHERE tbl_class.faculty = tbl_faculty.id AND tbl_class.subject = tbl_subject.id 
								     AND tbl_class.yrsec = tbl_sectionyear.id AND tbl_sy.id = tbl_class.semester")->result_array();
		}
		function get_sy()
		{
			return $this->db->get('tbl_sy')->result_array();
		}
		function get_students($subid, $sy)
		{
			return $this->db->query("SELECT * FROM tbl_userreg WHERE usertype = 2 AND id not in(SELECT student from tbl_class_stud WHERE subject = $subid AND sy = $sy)")->result_array();
		}
		function get_info($id)
		{
			return $this->db->query("SELECT tbl_class.id, CONCAT(tbl_faculty.firstname, ' ', tbl_faculty.lastname) as fname,
								     CONCAT(tbl_subject.code, '-', tbl_subject.description) as subdesc, tbl_sectionyear.yrsec,
								     tbl_sy.description as semester, tbl_subject.id as subid, tbl_sy.id as sy
								     FROM tbl_sy, tbl_class, tbl_subject,tbl_faculty,  tbl_sectionyear 
								     WHERE tbl_class.faculty = tbl_faculty.id AND tbl_class.subject = tbl_subject.id 
								     AND tbl_class.yrsec = tbl_sectionyear.id AND tbl_sy.id = tbl_class.semester 
								     AND tbl_class.id = $id")->row_array();
		}
		function checkings($subid, $stud, $sy)
		{
			$this->db->where('subject', $subid);
			$this->db->where('student', $stud);
			$this->db->where('sy', $sy);
			return $this->db->get('tbl_class_stud')->num_rows();
		}
		function get_stud_class($classid)
		{
			return $this->db->query("SELECT tbl_class_stud.id as cid, tbl_userreg.* from tbl_class_stud, tbl_userreg WHERE student = tbl_userreg.id and classid = $classid")->result_array();
		}	

	}