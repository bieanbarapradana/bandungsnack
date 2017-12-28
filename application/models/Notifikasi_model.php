<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasi_model extends CI_Model {

	
	function insert($from,$to,$url,$isi)
	{
		$this->from=$from;
		$this->to=$to;
		$this->url=$url;
		$this->isi=$isi;
		$this->status=0;

		$query = $this->db->insert('notif',$this);
		return $query;
	}
	function get_data($id=null)
	{
		if (isset($id)) 
		{
			$this->db->where('id',$id);
		}
		$this->db->order_by('id desc');
		$query = $this->db->get('notif');
//		echo $this->db->last_query($query);
		return $query;
	}
	function get_data_pemberitahuan($id=null)
	{
		if (isset($id)) 
		{
			$this->db->where('id',$id);
		}
		$this->db->from('notif');
		$this->db->join('customers','customers.id_customers=notif.from');
		$this->db->order_by('id desc');
		$query = $this->db->get('');
	//	echo $this->db->last_query($query);
		return $query;
	}
	function update($id=null)
	{
		$this->status=1;
		$query = $this->db->where('id',$id)->update('notif',$this);
		return $query;
	}
	function get_notif()
	{
		$status=0;
	//	$this->db->order_by('id desc');
		$this->db->where('status',$status);
	//	$this->db->where('to',$id_pegawai);
		$query = $this->db->get('notif')->result();
		//echo $this->db->last_query($query);
		return $query;
		if (count($query) >0) 
		{
			echo count($query);
		}
	}
	function get_detail_notif($id_pegawai=null)
	{
		/*		
		$this->db->where('to',$id_pegawai);
		$status=0;
		$this->db->select('pegawai1.nama as nama_pengirim, pegawai2.nama as nama_penerima, notif.*');
		$this->db->order_by('id desc');
		$this->db->from('notif');
		$this->db->join('pegawai as pegawai1','notif.from=pegawai1.id_pegawai');
		$this->db->join('pegawai as pegawai2','notif.to=pegawai2.id_pegawai');
		$this->db->where('notif.status',$status);
		//echo $this->db->last_query($query);
		?*/
		$query = $this->db->get('notif');
		echo $this->db->last_query($query);
		return $query;
	}
}
