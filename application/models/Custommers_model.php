<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Custommers_model extends CI_Model {
	function get_id_customer()
    {
        $this->db->select_max('id_customers');
        $query = $this->db->get('customers');
             return $query; 
    }
	function data_customers($id_customers=null)

	{

		if (isset($id_customers)) 

		{

			$this->db->where('id_customers',$id_customers);

		}

		$this->db->order_by('id_customers desc');

		$query = $this->db->get('customers');

		return $query;

	}

	function daftar($id_customers,$first_name,$last_name,$username,$password,$email,$address,$contact,$active_code)

	{

		$this->id_customers		= $id_customers;

		$this->first_name		= $first_name;

		$this->last_name		= $last_name;

		$this->username 		= $username;

		$this->password 		= $password;

		$this->email 			= $email;

		$this->address 			= $address;

		$this->contact 			= $contact;

		$this->profile 			= null;

		$this->active_code		= $active_code;

		$this->flag 			= 0;

		$query					= $this->db->insert('customers',$this);

		return $query;

	}

	function cek_email($email)

	{

		$this->db->where('email',$email);

		$query = $this->db->get('customers');

		return $query;

	}
	function cek_username($username)

	{

		$this->db->where('username',$username);

		$query = $this->db->get('customers');

		return $query;

	}

	function validate($username,$password)

	{

		$this->db->where('username',$username);

		$this->db->where('password',$password);

		$query = $this->db->get('customers');

		return $query;
	}
	function  ganti_profile($id_customers,$file_name)
	{
		$this->profile = $file_name;
		$query = $this->db->where('id_customers',$id_customers)->update('customers',$this);
		//echo $this->db->last_query($query);
		return $query;
	}
	function update_password($id_customers,$password)
	{
		$this->password = $password;
		$query = $this->db->where('id_customers',$id_customers)->update('customers',$this);
		//echo $this->db->last_query($query);
		return $query;
	}
	function change_email($id_customers,$email)
	{
		$this->email = $email;
		$query = $this->db->where('id_customers',$id_customers)->update('customers',$this);
		//echo $this->db->last_query($query);
		return $query;
	}
	function update_data($id_customers,$first_name,$last_name,$contact,$address)
	{

		$this->first_name		= $first_name;

		$this->last_name		= $last_name;

		$this->address 			= $address;

		$this->contact 			= $contact;

		$query = $this->db->where('id_customers',$id_customers)->update('customers',$this);
		//echo $this->db->last_query($query);
		return $query;
	}
	function active_account($username,$activate_code)
	{
		$this->flag = 0;
		$this->db->where('username',$username);
		$this->db->where('active_code',$activate_code);
		$query = $this->db->update('customers',$this);
		return $query;
	}
}

