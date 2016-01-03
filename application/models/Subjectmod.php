<?php

	/**
	* Subject Management Queries
	*/
	class Subjectmod extends CI_model
	{
		
		function insert_subject($data)
		{
			$this->db->insert('tbl_subject', $data);
		}
		function get_all_subject()
		{
			return $this->db->get('tbl_subject')->result_array();
		}
		function delete_subject($id)
		{
			$this->db->where('id', $id);
			$this->db->delete('tbl_subject');
		}
		function check_sub($code, $descr)
		{
			$this->db->where('code', $code);
			$this->db->where('description', $descr);
			return $this->db->get('tbl_subject')->num_rows();
		}
		function get_spec_subject($id)
		{
			$this->db->where('id', $id);
			return $this->db->get('tbl_subject')->row_array();
		}
		function update_subject($data, $id)
		{
			$this->db->where('id', $id);
			$this->db->update('tbl_subject', $data);
		}
	}