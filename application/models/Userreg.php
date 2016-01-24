<?php

class Userreg extends CI_Model
{

    function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        // $this->db->insert('tbl_userreg', array('password' => password_hash($password, PASSWORD_BCRYPT)));
        
        $r = $this->db->get_where('tbl_userreg', array('username' => $username, 'password' => $password))->row_array();
        

        if ($r['id'] == 0 OR $r['id'] == "") {
            return 'error';
        }else{
            return $r['id'];
        }

        // foreach ($r as $key)
        // {
        //     if(password_verify($password, $key['password']) AND $key['username'] == $username)
        //     {
        //         return $key['id'];
        //     }
        // }
        // return 'error';
    }
}
