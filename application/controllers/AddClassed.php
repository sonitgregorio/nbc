<?php 

	/**
	* Adding Class Controller
	*/
	class AddClassed extends CI_Controller
	{
		function failedMessage()
	    {
	        return '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color:red"><span aria-hidden="true">&times;</span></button>';
	    }
		function successMessage()
		{
		  	return'<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color:red"><span aria-hidden="true">&times;</span></button>';
		}
		function add_class()
		{
			$this->load->model('addclassmd');
			$this->load->view('include/header');
			$this->load->view('include/nav');
			$this->load->view('page/add_class');
			$this->load->view('include/footer');
		}
		function insert_class()
		{
			$instructor = $this->input->post('instructor');
			$subject = $this->input->post('subject');
			$yrsec = $this->input->post('yrsec');
			$semester = $this->input->post('semester');


			$data = array('faculty' => $instructor, 'subject' => $subject, 	
						  'yrsec' => $yrsec, 'semester' => $semester);
			$this->db->insert('tbl_class', $data);
			$this->session->set_flashdata('message', $this->successMessage() . 'Class Inserted.</div>');
            $this->api->insert_log('Added Class');

			redirect('/add_class');

		}
		function set_sy()
		{
			$this->load->model('addclassmd');
			$this->load->view('include/header');
			$this->load->view('include/nav');
			$this->load->view('page/set_sy');
			$this->load->view('include/footer');
		}
		function insert_sy()
		{
			$desc = $this->input->post('desc');
			$semester = $this->input->post('semester');


			$d = $desc . " - " . $semester;

			$this->db->where('description', $d);
			$x = $this->db->get('tbl_sy')->num_rows();

			if ($x > 0) {
				$this->session->set_flashdata('message', $this->failedMessage() . 'S.Y Already Exist.</div>');
			}else{
				$this->db->insert('tbl_sy', array('description' => $d));
				$this->session->set_flashdata('message', $this->successMessage() . 'S.Y Added.</div>');
							
			}
			$this->api->insert_log('School Year Set');
			redirect('/set_sy');
		}
		function set_active($id)
		{

			$this->db->update('tbl_sy', array('status' => 0));

			$this->db->where('id', $id);
			$this->db->update('tbl_sy', array('status' => 1));
			$this->api->insert_log('Set Active S.Y');
			redirect('/set_sy');
		}
		function add_stud($id)
		{
			$data['classid'] = $id;
			$this->load->model('addclassmd');
			$this->load->view('include/header');
			$this->load->view('include/nav');
			$this->load->view('page/add_students', $data);
			$this->load->view('include/footer');
		}
		function insert_student()
		{
			$this->load->model('addclassmd');
			$subid = $this->input->post('subid');
			$sy = $this->input->post('sy');
			$stud = $this->input->post('student');
			$classid = $this->input->post('classid');
			$data = array('student' => $stud, 'subject' => $subid, 'classid' => $classid, 'sy' => $sy);


			$x = $this->addclassmd->checkings($subid, $stud, $sy);
	
			if ($x > 0) {
				$this->session->set_flashdata('message', $this->failedMessage() . 'Student is Already Assigned.</div>');
			}
			else{
				$this->db->insert('tbl_class_stud', $data);
				$this->session->set_flashdata('message', $this->successMessage() . 'Student Added.</div>');
			}
			$this->api->insert_log('Inserted Student');
			redirect('/add_stud/'.$classid);
		}
		function delete_stud($id, $classid)
		{
			$this->db->where('id', $id);
			$this->db->delete('tbl_class_stud');
			$this->session->set_flashdata('message', $this->successMessage() . 'Successfuly Deleted.</div>');
			$this->api->insert_log('Student Deleted');
			redirect('/add_stud/'.$classid);
		}
		function generate_eval($id)
		{
			
			$this->load->model('addclassmd');
			$active_sy = $this->addclassmd->get_active();
			$active_cycle = $this->registration->get_cycle_end();

			$facid = $id;
		//Genearting Evaluation Randomized by class //
		// Randomize Student to evaluate Instructor //
		//-------------------------------------------------------------------------------------------------//
			$get_all_class = $this->addclassmd->get_all_class($facid, $active_sy);
			foreach ($get_all_class as $key => $value)
			{
				//Split if more than 2 same subject handled else only one subject will select 30 students
				if ($value['counts'] >= 2) 
				{
					//Get Randomid subject and get classid
					$split_subject = $this->addclassmd->split_sub($facid, $active_sy, $value['subject']);
					foreach ($split_subject as $splits => $splitsubs) {
						//get all student by classid and limit
						$count = 0;
						$get_all_stud = $this->addclassmd->all_stud($splitsubs['id'], 15);					 	
					 	foreach ($get_all_stud as $st => $stud_lim) {
					 		//Put in array All data;
					 		$stud_id = $stud_lim['student'];
					 		$subjs = $stud_lim['subject'];
					 		$data = array('student_id' => $stud_id, 
					 					  'instructor' => $facid, 
					 					  'cycle' => $active_cycle, 
					 					  'subject' => $subjs, 
					 					  'sy' => $active_sy);
					 		$this->addclassmd->insert_stud_eval($data);
					 	}
					 } 
				}
				else
				{
						$count = 0;
						$get_limits = $this->addclassmd->all_stud($value['id'], 30);
						foreach ($get_limits as $lm => $limis) {
							$stud_id = $limis['student'];
					 		$subjs = $limis['subject'];
					 		$data = array('student_id' => $stud_id, 
					 					  'instructor' => $facid, 
					 					  'cycle' => $active_cycle, 
					 					  'subject' => $subjs, 
					 					  'sy' => $active_sy);

					 		$this->addclassmd->insert_stud_eval($data);
						}
				}
			}
	//-------------------------------------------------------------------------------------------------//
	
	//Randomize Instructor Evaluation for peer		
	//------------------------------------------------------------------------------------------------//		
			$instruct = $this->addclassmd->get_rand_inst($id, 1, 5);
			foreach ($instruct as $key => $value) {
				$stud_id = $value['id'];
				$data = array('student_id' => $stud_id, 
					 					  'instructor' => $facid, 
					 					  'cycle' => $active_cycle, 
					 					  'subject' => 0, 
					 					  'sy' => $active_sy);

					 		$this->addclassmd->insert_stud_eval($data);
			}
			//Self Evaluator
			$get_id = $this->addclassmd->get_instruc_id($id);
			$stud_id = $get_id;
			$data = array('student_id' => $stud_id, 
					 					  'instructor' => $facid, 
					 					  'cycle' => $active_cycle, 
					 					  'subject' => 0, 
					 					  'sy' => $active_sy);
			$this->addclassmd->insert_stud_eval($data);
			$count = 0;
			//Supervisor Evaluator
			$sup = $this->addclassmd->get_rand_inst($id, 3, 1);
			foreach ($sup as $key => $value) {
				$stud_id = $value['id'];
				$count += 1;
				$data = array('student_id' => $stud_id, 
					 					  'instructor' => $facid, 
					 					  'cycle' => $active_cycle, 
					 					  'subject' => 0, 
					 					  'sy' => $active_sy);
				$this->addclassmd->insert_stud_eval($data);
			}
			$this->api->insert_log('Generate Evaluation');
			$this->session->set_flashdata('message', $this->successMessage() . 'Successfuly Generated.</div>');
			redirect('/add_faculty_evaluator/'.$id);
		}
		function insert_this_cces()
		{
			$cid = $this->input->post('ccetype');
			$fid = $this->input->post('fiddss');
			$points = $this->input->post('points');
			$active_cycle = $this->registration->get_cycle_end();
			$data = array('cid' => $cid, 'fid' => $fid, 'point' => $points, 'cycle' => $active_cycle);

			$x = $this->db->query("SELECT * FROM tbl_cce_res WHERE cid =  $cid AND fid = $fid AND cycle = $active_cycle")->num_rows();
			if ($x > 0) {
				$this->db->where('cid', $cid);
				$this->db->where('fid', $fid);
				$this->db->update('tbl_cce_res', $data);
			}else{
				$this->db->insert('tbl_cce_res', $data);
			}
			$this->api->insert_log('Inserted CCE points');
			redirect('/faculty_registration');
		}
		function generate_evaluators_input()
		{
			$this->load->model('addclassmd');
			$facid = $this->input->post('facid');
			$subject = $this->input->post('subject');
			$limit = $this->input->post('limit');
			$active_sy = $this->addclassmd->get_active();
			$active_cycle = $this->registration->get_cycle_end();




			//CHECKINF IF more than 2 subjects it will be spliited by subject
			$check_if_two = $this->addclassmd->check_two_subject($facid, $subject, $active_sy);

			if ($check_if_two >= 2) 
			{
				$limits = $limit / 2;
				$split_subject = $this->addclassmd->split_sub($facid, $active_sy, $subject);
					foreach ($split_subject as $splits => $splitsubs) {
						//get all student by classid and limit
						$count = 0;

						$get_all_stud = $this->addclassmd->all_stud($splitsubs['id'], $limits, $active_sy, $subject, $facid);					 	
					 	foreach ($get_all_stud as $st => $stud_lim) {
					 		//Put in array All data;
					 		$stud_id = $stud_lim['student'];
					 		$subjs = $stud_lim['subject'];
					 		$data = array('student_id' => $stud_id, 
					 					  'instructor' => $facid, 
					 					  'cycle' => $active_cycle, 
					 					  'subject' => $subjs, 
					 					  'sy' => $active_sy);
					 		$this->addclassmd->insert_stud_eval($data);
					 	}
					 }
			}
			else
			{
				$get_classid = $this->addclassmd->classid_get($subject, $facid, $active_sy);
				$get_all_stud = $this->addclassmd->all_stud($get_classid, $limit, $active_sy, $subject, $facid);					 	
			 	foreach ($get_all_stud as $st => $stud_lim) {
			 		//Put in array All data;
			 		$stud_id = $stud_lim['student'];
			 		$subjs = $stud_lim['subject'];
			 		
			 		$data = array('student_id' => $stud_id, 
			 					  'instructor' => $facid, 
			 					  'cycle' => $active_cycle, 
			 					  'subject' => $subjs, 
			 					  'sy' => $active_sy);
			 		
			 		$this->addclassmd->insert_stud_eval($data);
			 	}
			}

			//Check if Instructor Supervisor is added
			$check_instructors = $this->addclassmd->check_if_instructor($facid, $active_sy);
			if ($check_instructors <= 0) {
				//Randomize Instructor Evaluation for peer		
				//------------------------------------------------------------------------------------------------//		
				$instruct = $this->addclassmd->get_rand_inst($facid, 1, 5);
				foreach ($instruct as $key => $value) {
					$stud_id = $value['id'];
					$data = array('student_id' => $stud_id, 
						 					  'instructor' => $facid, 
						 					  'cycle' => $active_cycle, 
						 					  'subject' => 0, 
						 					  'sy' => $active_sy);

						 		$this->addclassmd->insert_stud_eval($data);
				}
				//Self Evaluator
				$get_id = $this->addclassmd->get_instruc_id($facid);
				$stud_id = $get_id;
				$data = array('student_id' => $stud_id, 
						 					  'instructor' => $facid, 
						 					  'cycle' => $active_cycle, 
						 					  'subject' => 0, 
						 					  'sy' => $active_sy);
				$this->addclassmd->insert_stud_eval($data);
				$count = 0;
				//Supervisor Evaluator
				$sup = $this->addclassmd->get_rand_inst($facid, 3, 1);
				foreach ($sup as $key => $value) {
					$stud_id = $value['id'];
					$count += 1;
					$data = array('student_id' => $stud_id, 
						 					  'instructor' => $facid, 
						 					  'cycle' => $active_cycle, 
						 					  'subject' => 0, 
						 					  'sy' => $active_sy);
					$this->addclassmd->insert_stud_eval($data);
				}		
			}
			$this->api->insert_log('Generated Evaluator');
			$this->session->set_flashdata('message', $this->successMessage() . 'Successfuly Generated.</div>');
			redirect('/add_faculty_evaluator/'.$facid);
		}
		function insert_temp_sub()
		{

			$this->load->model('addclassmd');
			$subject = $this->input->post('subject');
			$yrsec = $this->input->post('yrsec');
			$semester = $this->input->post('semester');
			$check_first = $this->addclassmd->check_first(array('subid' => $subject, 'yrsec' => $yrsec, 'semester' => $semester));
			if ($check_first > 0) {
				echo 1;				
			}else{
				$this->db->insert('tbl_temp_sub', array('subid' => $subject, 'yrsec' => $yrsec, 'semester' => $semester));
				$this->refstbl();

			}
		}
		function refstbl()
		{

			$this->load->model('addclassmd');
			$x = $this->addclassmd->get_temp_sub();

			foreach ($x as $key => $value) {
				echo "<tr>
					 <td>" . $value['subs'] . "</td>
					 <td>" . $value['yrsec'] . "</td>
					 <td>" . $value['sy'] . "</td>
					 <td><button class='btn btn-danger delsub' data-param=" . $value['id'] . "><span class='glyphicon glyphicon-trash'></span></a></button>
					 </tr>";
			}
			$this->load->view('include/footer2');
		}
		function deletesubs()
		{
			$x = $this->input->post('x');
			$this->db->where('id', $x);
			$this->db->delete('tbl_temp_sub');
			$this->refstbl();
		}
		function insert_stud_subj()
		{
			$classid = $this->input->post('x');

			$x = $this->db->get_where('tbl_class', array('id' => $classid))->row_array();

			$data = ['classid' => $x['id'], 'subject' => $x['subject'], 'semester' => $x['semester']];


			$ch = $this->db->get_where('tbl_class_temp', $data)->num_rows();
			if ($ch <= 0) {
				$this->db->insert('tbl_class_temp', $data);
			
				$this->ref_tab();
			}
			else{
				echo 2;
			}
			

		}
		function ref_tab()
		{

			$this->load->model('addclassmd');
			foreach ($this->addclassmd->get_temp_cl() as $key => $value) {
				$x = $this->addclassmd->get_spc_temp($value['classid']);
				echo "<tr>
						<td>" . $x['facname'] . "</td>
                        <td>" . $x['subs'] . "</td>
                        <td>" . $x['yrsec'] ."</td>
                        <td>" . $x['description'] . "</td>
                        <td>
                                <a href='#' class='btn btn-danger btn-xs deltempsub' data-param=" . $value['id'] . "><span class='glyphicon glyphicon-remove-sign'></span>&nbsp;&nbsp;Remove</a>
                        </td>
					</tr>";
			}
			$this->load->view('include/footer2');
		}
		function deltemcla()
		{
			$x = $this->input->post('x');
			$this->db->where('id', $x);
			$this->db->delete('tbl_class_temp');
			$this->ref_tab();
		}
		function delete_class($id)
		{
			$this->db->where('id', $id);
			$this->db->delete('tbl_class');
			$this->session->set_flashdata('message', $this->successMessage() . 'Successfuly Deleted.</div>');
			redirect('/add_class');
		}
		function searchsub()
		{
			$ac = $this->db->query("SELECT id FROM tbl_sy WHERE status = 1")->row_array();
             $active = $ac['id'];
			$sub = $this->input->post('val');
			$x =  $this->db->query("SELECT tbl_class.id, CONCAT(tbl_faculty.firstname, ' ', tbl_faculty.lastname) as fname,
								     CONCAT(tbl_subject.code, '-', tbl_subject.description) as subdesc, tbl_sectionyear.yrsec,
								     tbl_sy.description as semester FROM tbl_sy, tbl_class, tbl_subject,tbl_faculty,  tbl_sectionyear 
								     WHERE tbl_class.faculty = tbl_faculty.id AND tbl_class.subject = tbl_subject.id 
								     AND tbl_class.yrsec = tbl_sectionyear.id AND tbl_sy.id = tbl_class.semester AND tbl_sy.id = '$active' AND tbl_class.subject = $sub")->result_array();
							foreach ($x as $key => $value) {
								echo "<tr>
	                                      <td>" . $value['fname'] . "</td>
	                                      <td>" . $value['subdesc'] . "</td>
	                                      <td>" . $value['yrsec'] . "</td>
	                                      <td>" . $value['semester'] . "</td>
	                                      <td>
	                                        <a href='/add_stud/" . $value['id'] . "' class='btn btn-info btn-xs'>Add Student</a>
	                                        <a href='/delete_class/" . $value['id'] . "' class='btn btn-danger btn-xs'>Delete</a>
	                                      </td>
                                    </tr>";
							}
								
		}
		function logs()
		{
			$this->load->model('addclassmd');
			$this->load->view('include/header');
			$this->load->view('include/nav');
			$this->load->view('page/logs');
			$this->load->view('include/footer');
		}
		function about()
		{
			$this->load->model('addclassmd');
			$this->load->view('include/header');
			$this->load->view('include/nav');
			$this->load->view('page/about');
			$this->load->view('include/footer');
		}
		function serachs()
		{
			$froms = $this->input->post('x');
			$tos = date('Y-m-d');
			$this->r($froms, $tos);
		}
		function serachss()
		{
			$froms = $this->input->post('x');
			$tos = $this->input->post('y');
			$this->r($froms, $tos);
		}
		function r($froms, $tos)
		{
			$x = $this->db->query("SELECT * FROM tbl_logs WHERE `date_log` BETWEEN '$froms' AND '$tos' ORDER BY tbl_logs.id DESC")->result_array();
			foreach ($x as $key => $value) {
				echo "<tr>
			          <td>" . $value['names'] . "</td>
			          <td>" . $value['activity'] . "</td>
			          <td>" . $value['date_log'] . "</td>
			          <td>" . $value['time_log'] . "</td>
			        </tr>";
			}
		}
		function help()
		{
			redirect(base_url().'assets/images/help.pdf');
		}
		function prints()
		{
	        $this->load->view('include/header');
	        $this->load->view('page/print_cce');
	        $this->load->view('include/footer');
		}

	}