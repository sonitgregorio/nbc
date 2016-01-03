<?php 

	/**
	* 
	*/
	class Facultymod extends CI_Model
	{

		function insert_eval($data)
	    {
	        $this->db->insert('tbl_student_eval', $data);
	    }
	    function check_exist($evaluator, $uid, $subid, $cycle)
	    {

	    	$this->db->where('student_id', $evaluator);
	    	$this->db->where('instructor', $uid);
	    	$this->db->where('cycle', $cycle);
	    	$this->db->where('subject', $subid);
	    	return $this->db->get('tbl_student_eval')->num_rows();
	    }
	    function get_evaluators($id)
	    {
	    	$cycle = $this->registration->get_cycle_end();
	    	return $this->db->query("SELECT concat(firstname, ' ', lastname) as names, tbl_student_eval.id as eid, tbl_subject.description 
	    					 		 FROM tbl_student_eval, tbl_userreg, tbl_subject WHERE instructor = $id 
	    							 AND tbl_student_eval.student_id = tbl_userreg.id 
	    							 AND tbl_student_eval.subject = tbl_subject.id 
	    							 AND tbl_student_eval.cycle = $cycle")->result_array();
	    }
	    function delete_evaluators($id)
	    {
	    	$this->db->where('id', $id);
	    	$this->db->delete('tbl_student_eval');
	    }
	    function get_mylist_eval($id)
	    {
	    	return $this->db->query("SELECT tbl_subject.id as subject, concat(tbl_userreg.firstname, ' ', tbl_userreg.lastname) names, tbl_userreg.fid, tbl_subject.description 
	    							 FROM `tbl_student_eval`, tbl_userreg, tbl_faculty, tbl_subject 
	    							 WHERE student_id = $id 
	    							 AND tbl_student_eval.instructor = tbl_faculty.id 
	    							 AND tbl_userreg.fid = tbl_faculty.id 
	    							 AND tbl_student_eval.subject = tbl_subject.id")->result_array();
	    }
	    function get_points_qce($grp, $cat, $cycle)
	    {
	    	$fid = $this->session->userdata('fid');
	    	//$cycle = $this->registration->get_cycle_end();
	    	$x = $this->db->query("SELECT SUM(points) as p FROM tbl_qce_rate 
	    					  WHERE groups = '$grp' 
	    					  AND nums = '$cat' 
	    					  AND fid = '$fid' 
	    					  AND cycle = '$cycle'")->row_array();
	    	return $x['p'];
	    }
	    function get_lowest($grp, $cycle)
	    {
	    	$fid = $this->session->userdata('fid');
	    	//$cycle = $this->registration->get_cycle_end();
	    	$x = $this->db->query("SELECT SUM(points) as p FROM tbl_qce_rate 
	    					  WHERE groups = '$grp' 
	    					  AND fid = '$fid' 
	    					  AND cycle = $cycle 
	    					  group by nums 
	    					  order by p asc limit 1")->row_array();
	    	return $x['p'];
	    }
	}