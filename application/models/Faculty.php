<?php

class Faculty extends CI_Model
{
    function all()
    {
        $this->db->where('usertype', 1);
        return $this->db->get('tbl_faculty')->result_array();
    }
}
