<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_akses_model extends CI_Model {
	function data_users_akses($id_user_akses=null)
	{
		if (isset($id_user_akses)) 
		{
			$this->db->where('id_user_akses',$id_user_akses);
		}
		$query = $this->db->get('user_akses');
		return $query;
	}
	function data_users_akses_kecuali_super_admin($id_user_akses=null)
	{	
		if (isset($id_user_akses)) 
		{
			$this->db->where('id_user_akses !=',$id_user_akses);
		}
		$label ='super admin';
		$this->db->where('label !=',$label);
		$query = $this->db->get('user_akses');
		return $query;
	}
}
