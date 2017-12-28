<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {
	function data_users($id_users=null)
	{
		if (isset($id_users)) 
		{
			$this->db->where('id_users',$id_users);
		}
		
		$flag =0;
		$this->db->where('flag',$flag);
		$label ='super admin';
		$this->db->where('label !=',$label);
		$this->db->from('users');
		$this->db->join('user_akses','users.id_user_akses=user_akses.id_user_akses');
		$query = $this->db->get();
		return $query;
	}
	function data_users_a($id_users=null)
	{
		if (isset($id_users)) 
		{
			$this->db->where('id_users',$id_users);
		}
		
		$this->db->from('users');
		$this->db->join('user_akses','users.id_user_akses=user_akses.id_user_akses');
		$query = $this->db->get();
		return $query;
	}
	
	function bloked_users($id_users=null)
	{
		if (isset($id_users)) 
		{
			$this->db->where('id_users',$id_users);
		}
		
		$flag =1;
		$this->db->where('flag',$flag);
		$label ='super admin';
		$this->db->where('label !=',$label);
		$this->db->from('users');
		$this->db->join('user_akses','users.id_user_akses=user_akses.id_user_akses');
		$query = $this->db->get();
		return $query;
	}
	function insert($id_users_akses,$username,$password,$email,$first_name,$last_name,$file_name,$activation_code,$flag)
	{
		$this->id_user_akses = $id_users_akses;
		$this->username = $username;
		$this->password = $password;
		$this->email = $email;
		$this->first_name = $first_name;
		$this->last_name = $last_name;
		$this->profile = $file_name;
		$this->activation_code = $activation_code;
		$this->flag = $flag;

		$query = $this->db->insert('users',$this);
		return $query;
	}
	function proses_update($id_users,$username,$email,$first_name,$last_name,$id_users_akses)
	{
		$this->id_user_akses = $id_users_akses;
		$this->username = $username;
		$this->email = $email;
		$this->first_name = $first_name;
		$this->last_name = $last_name;

		$query = $this->db->where('id_users',$id_users)->update('users',$this);
		return $query;
	}
	function flag($id_users)
	{
		$this->flag = 1;
		$query = $this->db->where('id_users',$id_users)->update('users',$this);
		return $query;
	}
	function unflag($id_users)
	{
		$this->flag = 0;
		$query = $this->db->where('id_users',$id_users)->update('users',$this);
		return $query;
	}
	function delete($id_users)
	{
		$query = $this->db->where('id_users',$id_users)->delete('users');
		return $query;
	}

}
