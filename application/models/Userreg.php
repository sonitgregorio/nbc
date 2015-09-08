<?php

class Userreg extends CI_Model
{

    function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $r = $this->db->get_where('tbl_userreg', array('username' => $username))->result_array();
        foreach ($r as $key)
        {
            if(password_verify($password, $key['password']) AND $key['username'] == $username)
            {
                return $key['id'];
            }
        }
        return 'error';
    }
}
