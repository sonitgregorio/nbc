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
        
    }
}
