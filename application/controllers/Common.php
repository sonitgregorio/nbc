<?php
/**
 * Common Controller
 */
class Common extends CI_Controller
{

    function save_school()
    {
      $this->api->insert_log('Added School');
        if ($this->input->post('shid') != "")
        {
          $data = array('id'            => $this->input->post('shid'),
                        'sch_name'      => ucwords($this->input->post('sch_name')),
                        'sch_address'   => ucwords($this->input->post('sch_address')),
                        'sch_contact'   => $this->input->post('sch_contact')
                      );
          $this->registration->edit_school($data, $this->input->post('shid'));
        }
        else
        {
          $data = array('sch_name'      => ucwords($this->input->post('sch_name')),
                        'sch_address'   => ucwords($this->input->post('sch_address')),
                        'sch_contact'   => $this->input->post('sch_contact')
                      );
          $this->registration->add_school($data);
        }

    }
    function failedMessage()
    {
        return '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color:red"><span aria-hidden="true">&times;</span></button>';
    }
    function edit_school($id)
    {
        $data = $this->registration->edit_sch($id);
        $this->load->view('include/header');
        $this->load->view('include/nav');
        $this->load->view('page/add_school', $data);
        $this->load->view('include/footer');
    }
    function delete_school($id)
    {
      $this->api->insert_log('School Deleted');
        $this->registration->delete_school($id);
    }
    function insert_faculty()
    {
      if ($this->input->post('types') == 1) {
            $data = array(
                            'firstname'       => ucwords($this->input->post('firstname')),
                            'middlename'      => ucwords($this->input->post('middlename')),
                            'lastname'        => ucwords($this->input->post('lastname')),
                            'address'         => ucwords($this->input->post('address')),
                            'emailaddress'    => $this->input->post('emailaddress'),
                            'contact'         => $this->input->post('contact'),
                            'position'        => $this->input->post('position'),
                            'school'          => $this->input->post('school'),
                            'dates'           => $this->input->post('dates')
                        );
            if ($this->input->post('fid') != "")
            {
              $this->registration->update_fac($data, $this->input->post('fid'));
            }
            else
            {
              $this->api->insert_log('Faculty Inserted');
              $this->registration->insert_fac($data);
              $i = $this->db->insert_id();

              $x = $this->db->get('tbl_temp_sub')->result_array();
             
              foreach ($x as $key => $value) {
                $cl = array('faculty' => $i, 'subject' => $value['subid'], 'yrsec' => $value['yrsec'], 'semester' => $value['semester']);
                $this->db->insert('tbl_class', $cl);
              }
            $this->db->truncate('tbl_temp_sub');
            }
      }else{

              $this->api->insert_log('Supervisor Inserted');
          $x = preg_replace('/\s+/', '', $this->input->post('firstname'));
          $username = strtolower($x. '.' . strtolower($this->input->post('lastname')));
          $data = array(
                        'firstname'     => ucwords($this->input->post('firstname')),
                        'middlename'    => ucwords($this->input->post('middlename')),
                        'lastname'      => ucwords($this->input->post('lastname')),
                        'emailaddress'  => $this->input->post('emailaddress'),
                        'address'       => ucwords($this->input->post('address')),
                        'contact'       => $this->input->post('contact'),
                        'username'      => $username,
                        'password'      => 'welcome',
                        'usertype'      => 3,
                    );
          $this->db->insert('tbl_userreg', $data);

      }


          redirect('/faculty_registration');
    }
    function delete_faculty($id)
    {
        $this->registration->delete_faculty($id);
    }
    function edit_faculty($id)
    {
      
        $data = $this->registration->getFaculty($id);
        $this->load->view('include/header');
        $this->load->view('include/nav');
        $this->load->view('page/faculty_reg', $data);
        $this->load->view('include/footer');
    }
    function user_reg()
    {
        $data = array(
                        'firstname'     => ucwords($this->input->post('firstname')),
                        'middlename'    => ucwords($this->input->post('middlename')),
                        'lastname'      => ucwords($this->input->post('lastname')),
                        'emailaddress'  => $this->input->post('emailaddress'),
                        'address'       => ucwords($this->input->post('address')),
                        'contact'       => $this->input->post('contact'),
                        'username'      => $this->input->post('username'),
                        'password'      => $this->input->post('password'),
                        'usertype'      => 2,
                    );

        if ($this->input->post('password') != $this->input->post('confirmpassword'))
        {
            $this->session->set_flashdata('data', $data);
            $data2 =  array('uid' => $this->input->post('uid'));
            $this->session->set_flashdata('ids', $data2);
            $this->session->set_flashdata('message', $this->failedMessage() .  'Please Confirm Password.</div>');
        }
        else
        {
            if ($this->input->post('uid') == "")
            {
                $this->registration->insert_user($data);
                $ids = $this->db->insert_id();


                $x = $this->db->get('tbl_class_temp')->result_array();

                foreach ($x as $key => $value) {

                  $cls = array('student' => $ids, 'subject' => $value['subject'], 'sy' => $value['semester'], 'classid' => $value['classid']); 
                  $this->db->insert('tbl_class_stud', $cls);
                }
                $this->db->truncate('tbl_class_temp');
            }
            else
            {
                $this->registration->update_users($data, $this->input->post('uid'));
            }
        }
          redirect('/user_registration');
        // redirect('/user_registration');

    }
    function edit_users($id)
    {
        $data = $this->registration->getUser($id);
        $this->load->view('include/header');
        $this->load->view('include/nav');
        $this->load->view('page/user_reg', $data);
        $this->load->view('include/footer');
    }
    function delete_users($id)
    {
      $this->api->insert_log('User Deleted');
        $this->registration->delete_users($id);
    }
    function insert_criteria()
    {
      $this->api->insert_log('Criteria Inserted');
      $criteria = $this->input->post('criteria');

      $checking = $this->registration->checkif($criteria);
      if ($checking >= 1)
      {
         $data = array('description' => $criteria,
                        'point' =>  $this->input->post('points'));
          $this->registration->insert_criteria($data);
          $this->session->set_flashdata('message', $this->failedMessage() .  'Criteria Already Exist.</div>');
          redirect('/add_criteria');
      }
      else
      {
          $data = array('description' => $criteria,
                        'point' =>  $this->input->post('points'));
          if ($this->input->post('cid') == "")
          {
            $this->registration->insert_criteria($data);
          }
          else
          {
            $this->registration->update_cce($data, $this->input->post('cid'));
          }
      }

    }
    function delete_cce($id)
    {
      $this->api->insert_log('CCE Deleted');
        $this->registration->delete_cce($id);
    }
    function edit_cce($id)
    {
        $data = $this->registration->edit_cce($id);
        $this->load->view('include/header');
        $this->load->view('include/nav');
        $this->load->view('page/add_cce', $data);
        $this->load->view('include/footer');
    }
    function list_evaluate()
    {
      $this->load->view('include/header');
      $this->load->view('include/nav');
      $this->load->view('page/list_evaluators');
      $this->load->view('include/footer');
    }
    function add_evaluators($id)
    {
      $this->registration->insert_eval($id);
    }
    function add_fac_user($id)
    {
      $this->api->insert_log('Added faculty user');

      $x = $this->registration->check_facs($id);
      if ($x <= 0) 
      {
        $this->load->model('faculty');
        $this->faculty->add_fac_user($id);    
      }
      else
      {
        $this->session->set_flashdata('message', $this->failedMessage() . 'This Faculty Already Exist.</div>');
      }
      redirect('/faculty_registration');
      
    
    }
    function ccevalue()
    {
        echo $this->api->qce_instruc(11);
    }

}
