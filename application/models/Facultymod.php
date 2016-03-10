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
	    	$get_active = $this->db->query("SELECT id FROM tbl_sy WHERE status = 1")->row_array();
	    	$sy = $get_active['id'];
	    	$cycle = $this->registration->get_cycle_end();
	    	return $this->db->query("SELECT concat(firstname, ' ', lastname) as names, tbl_student_eval.id as eid, tbl_subject.description 
	    					 		 FROM tbl_student_eval, tbl_userreg, tbl_subject WHERE instructor = $id 
	    							 AND tbl_student_eval.student_id = tbl_userreg.id 
	    							 AND tbl_student_eval.subject = tbl_subject.id 
	    							 AND tbl_student_eval.cycle = $cycle AND sy = $sy")->result_array();
	    }
	    function delete_evaluators($id)
	    {
	    	$this->db->where('id', $id);
	    	$this->db->delete('tbl_student_eval');
	    }
	    function get_mylist_eval($id)
	    {
	    	return $this->db->query("SELECT tbl_student_eval.cycle, tbl_subject.id as subject, concat(tbl_userreg.firstname, ' ', tbl_userreg.lastname) names, tbl_userreg.fid, tbl_subject.description 
	    							 FROM `tbl_student_eval`, tbl_userreg, tbl_faculty, tbl_subject 
	    							 WHERE student_id = $id 
	    							 AND tbl_student_eval.instructor = tbl_faculty.id 
	    							 AND tbl_userreg.fid = tbl_faculty.id 
	    							 AND tbl_student_eval.subject = tbl_subject.id")->result_array();
	    }
	    function list_instruct($id)
	    {
	    	return $this->db->query("SELECT tbl_student_eval.cycle, concat(tbl_userreg.firstname, ' ', tbl_userreg.lastname) names, tbl_userreg.fid 
	    							 FROM `tbl_student_eval`, tbl_userreg, tbl_faculty 
	    							 WHERE student_id = $id 
	    							 AND tbl_student_eval.instructor = tbl_faculty.id 
	    							 AND tbl_userreg.fid = tbl_faculty.id")->result_array();
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
	    function get_sy($id)
	    {
	    	$x = $this->db->query("SELECT description FROM tbl_student_eval, tbl_sy WHERE cycle = $id AND tbl_sy.id = tbl_student_eval.sy LIMIT 1")->row_array();
	    	return $x['description'];
	    }
	    function cheked($id)
	    {
	    	$get_active = $this->db->query("SELECT id FROM tbl_sy WHERE status = 1")->row_array();
	    	$sy = $get_active['id'];

	    	$this->db->where('instructor', $id);
	    	$this->db->where('sy', $sy);
	    	return $this->db->get('tbl_student_eval')->num_rows();
	    }
	     function get_points_qce_subject($grp, $cat, $cycle, $subject)
	    {
	    	$fid = $this->session->userdata('fid');
	    	//$cycle = $this->registration->get_cycle_end();
	    	$x = $this->db->query("SELECT SUM(points) as p FROM tbl_qce_rate 
	    					  WHERE groups = '$grp' 
	    					  AND nums = '$cat' 
	    					  AND fid = '$fid' 
	    					  AND cycle = '$cycle'
	    					  AND subject = '$subject'")->row_array();
	    	return $x['p'];
	    }
	    function get_lowest_subject($grp, $cycle, $subject)
	    {
	    	$fid = $this->session->userdata('fid');
	    	//$cycle = $this->registration->get_cycle_end();
	    	$x = $this->db->query("SELECT SUM(points) as p FROM tbl_qce_rate 
	    					  WHERE groups = '$grp' 
	    					  AND fid = '$fid' 
	    					  AND cycle = $cycle
	    					  AND subject = '$subject' 
	    					  group by nums 
	    					  order by p asc limit 1")->row_array();
	    	return $x['p'];
	    }
	    function get_subject_description($subject)
	    {
	    	$x = $this->db->query("SELECT CONCAT(code, '-', description) as sub FROM tbl_subject WHERE id = $subject")->row_array();
	    	return $x['sub'];
	    }
	    function get_subject_inclass($id)
	    {
	    	$activ_sy = $this->get_actives();
	    	$x = $this->db->query("SELECT DISTINCT(tbl_class.subject), CONCAT(tbl_subject.code, '-', tbl_subject.description) as `desc`, tbl_subject.id 
	    						   FROM tbl_subject, tbl_class 
	    						   WHERE faculty = $id 
	    						   AND tbl_subject.id = tbl_class.subject AND semester = $activ_sy")->result_array();
	    	return $x;
	    }
	    function get_actives()
		{
			$x = $this->db->query("SELECT id FROM tbl_sy WHERE status = 1")->row_array();
			return $x['id'];
		}
	}