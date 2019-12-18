<?php


class User_model extends CI_Model
{
	function __construct()
	{
		$this->load->database();
	}

	public function insert_user($username, $email)
	{
		$data = array(
			'username' => $username,
			'email' => $email
		);

		return $this->db->insert('users', $data);
	}

	public function get_users()
	{
		$query = $this->db->get('users');

		return $query->result_array();
	}
}
