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
			return $this->db->query("SELECT tbl_class_stud.id as cid, tbl_userreg.* 
									 FROM tbl_class_stud, tbl_userreg WHERE student = tbl_userreg.id 
									 AND classid = $classid")->result_array();
		}
		function get_active()
		{
			$x = $this->db->query("SELECT id FROM tbl_sy WHERE status = 1")->row_array();
			return $x['id'];
		}
		function get_all_class($facid, $active_sy)
		{
			// $this->db->where('faculty', $facid);
			// $this->db->where('semester', $active_sy);
			// $this->db->select('id');
			return $this->db->query("SELECT count(subject) as counts, subject, id 
									FROM `tbl_class` where faculty = $facid 
									AND semester = $active_sy GROUP BY subject")->result_array();
		}	
		function all_stud($id, $limit, $active_sy, $subject, $facid)
		{
			return $this->db->query("SELECT * FROM tbl_class_stud 
									WHERE classid = $id 
									AND student != 0 
									AND student NOT in(SELECT student_id FROM tbl_student_eval WHERE sy = $active_sy AND subject = $subject AND instructor = $facid)
									ORDER BY RAND(), id ASC 
									LIMIT $limit")->result_array();
		}
		function split_sub($facid, $active_sy, $subject)
		{
			return $this->db->query("SELECT id FROM tbl_class 
									WHERE faculty = $facid 
									AND subject = $subject 
									AND semester = $active_sy 
									ORDER BY RAND() LIMIT 2")->result_array();
		}
		function insert_stud_eval($data)
		{
			$this->db->insert('tbl_student_eval', $data);
		}
		function get_rand_inst($id, $type, $limit)
		{
			$x = $this->db->query("SELECT * FROM tbl_userreg WHERE usertype = $type AND fid != $id ORDER BY RAND() LIMIT $limit")->result_array();
			return $x;
		}
		function get_instruc_id($id)
		{
			$this->db->where('fid', $id);
			$this->db->select('id');
			$x = $this->db->get('tbl_userreg')->row_array();
			return $x['id'];
		}
		function check_two_subject($facid, $subject, $active_sy)
		{
			$x = $this->db->query("SELECT * FROM tbl_class WHERE subject = $subject AND faculty = $facid AND semester = $active_sy")->num_rows();
			return $x;
		}
		function check_if_instructor($facid, $active_sy)
		{
			return $this->db->query("SELECT * FROM tbl_student_eval 
									 WHERE instructor = '$facid' 
									 AND sy = '$active_sy' 
									 AND subject = '0'")->num_rows();
		}
		function classid_get($subject, $facid, $active_sy)
		{
			$x = $this->db->query("SELECT * FROM tbl_class WHERE subject = $subject AND faculty = $facid AND semester = $active_sy")->row_array();
			return $x['id'];
		}
	}