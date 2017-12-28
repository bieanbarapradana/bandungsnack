<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {
	function login($username,$password)
	{
		$query 		= $this->db->query("select `id_users`, b.id_user_akses, `username`, `password`, `email`, `first_name`, `last_name`, `profile`, b.label, `flag` from users a left join user_akses b on (b.id_user_akses=a.id_user_akses) where username = '$username ' and password = '$password' ");		return $query;
	}
}
