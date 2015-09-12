<?php

class Faculty extends CI_Model
{
    function all()
    {
        return $this->db->get('tbl_faculty')->result_array();
    }
}
