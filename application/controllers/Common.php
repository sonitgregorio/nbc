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
        $data = array('firstname' => $this->input->post('firstname'),
                      'middlename' => $this->input->post('middlename'),
                      'lastname' => $this->input->post('lastname'),
                      'address' => $this->input->post('address'),
                      'emailaddress' => $this->input->post('emailaddress'),
                      'contact' => $this->input->post('contact'),
                      'position' => $this->input->post('position'),
                      'school' => $this->input->post('school')
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
}
