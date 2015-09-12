<?php
/**
 *
 */
class Common extends CI_Controller
{

    function save_school()
    {
        if ($this->input->post('shid') != "")
        {
          $data = array('id' => $this->input->post('shid'),
                        'sch_name' => $this->input->post('sch_name'),
                        'sch_address' => $this->input->post('sch_address'),
                        'sch_contact'=> $this->input->post('sch_contact')
                      );
          $this->registration->edit_school($data, $this->input->post('shid'));
        }
        else
        {
          $data = array('sch_name' => $this->input->post('sch_name'),
                        'sch_address' => $this->input->post('sch_address'),
                        'sch_contact'=> $this->input->post('sch_contact')
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
        $this->registration->delete_school($id);
    }
    function insert_faculty()
    {
        $data = array(
                        'firstname'       => ucwords($this->input->post('firstname')),
                        'middlename'      => ucwords($this->input->post('middlename')),
                        'lastname'        => ucwords($this->input->post('lastname')),
                        'address'         => ucwords($this->input->post('address')),
                        'emailaddress'    => $this->input->post('emailaddress'),
                        'contact'         => $this->input->post('contact'),
                        'position'        => $this->input->post('position'),
                        'school'          => $this->input->post('school')
                    );
        if ($this->input->post('fid') != "")
        {
          $this->registration->update_fac($data, $this->input->post('fid'));
        }
        else
        {
          $this->registration->insert_fac($data);
        }

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
                        'firstname'     => $this->input->post('firstname'),
                        'middlename'    => $this->input->post('middlename'),
                        'lastname'      => $this->input->post('lastname'),
                        'emailaddress'  => $this->input->post('emailaddress'),
                        'address'       => $this->input->post('address'),
                        'contact'       => $this->input->post('contact'),
                        'username'      => $this->input->post('username'),
                        'password'      => $this->input->post('password'),
                        'usertype'      => $this->input->post('usertype'),
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
            }
            else
            {
                $this->registration->update_users($data, $this->input->post('uid'));
            }
        }
        $this->session->set_flashdata('data', $data);
        redirect('/user_registration');

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
        $this->registration->delete_users($id);
    }
    function insert_criteria()
    {
      $criteria = $this->input->post('criteria');

      $checking = $this->registration->checkif($criteria);
      if ($checking >= 1)
      {
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

}
