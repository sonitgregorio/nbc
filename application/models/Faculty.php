<?php

class Faculty extends CI_Model
{
    function all()
    {
        return $this->db->get('tbl_faculty')->result_array();
    }
    function add_fac_user($id)
    {
        $password = array('password' => 'welcome');
        $this->db->query("INSERT INTO tbl_userreg (firstname, middlename, lastname, emailaddress, address, contact, username, fid, usertype)
                        SELECT firstname, middlename, lastname, emailaddress, address, contact, LOWER(CONCAT(firstname, '.', lastname)), id, 1
                        FROM tbl_faculty WHERE id = '$id'");
        $this->db->where('fid', $id);
        $this->db->update('tbl_userreg', $password);
    }
    
    
}
