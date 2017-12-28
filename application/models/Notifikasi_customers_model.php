<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasi_customers_model extends CI_Model {
	
	function insert_data($id_customers,$link,$isi)
	{
		$this->id_customer=$id_customers;
		$this->link=$link;
		$this->isi=$isi;
		$this->status=0;

		$query = $this->db->insert('notif_customer',$this);
		return $query;
	}
	function get_data($id_customer=null)
	{
		if (isset($id_customer)) 
		{
			$this->db->where('id_customer',$id_customer);
		}
		$this->db->limit(10);
		$this->db->order_by('id desc');
		$query = $this->db->get('notif_customer');
//		echo $this->db->last_query($query);
		return $query;
	}
	function update_all()
	{
		$this->status=1;
		$query = $this->db->update('notif_customer',$this);
		return $query;
	}
	function get_data_pemberitahuan($id_customer=null)
	{
		if (isset($id_customer)) 
		{
			$this->db->where('id_customer',$id);
		}
		$query = $this->db->get('notif_customer');
	//	echo $this->db->last_query($query);
		return $query;
	}
	function update($id=null)
	{
		$this->status=1;
		$query = $this->db->where('id',$id)->update('notif_customer',$this);
		return $query;
	}
	function get_notif()
	{
		$id_customer = $this->session->userdata('id_customers');
		$status=0;
	//	$this->db->order_by('id desc');
		$this->db->where('status',$status);
		$this->db->where('id_customer',$id_customer);
		$query = $this->db->get('notif_customer')->result();
		//echo $this->db->last_query($query);
		return $query;
		if (count($query) >0) 
		{
			echo count($query);
		}
	}
	function get_detail_notif($id_pegawai=null)
	{
		$query = $this->db->get('notif');
		echo $this->db->last_query($query);
		return $query;
	}
}
