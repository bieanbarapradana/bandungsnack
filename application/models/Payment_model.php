<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Payment_model extends CI_Model {
	
	function add_payment($id_orders,$payment_date,$file_name,$atas_nama,$no_factur,$bank,$nominal,$ke)
	{

		$this->id_orders=$id_orders;
		$this->payment_date=$payment_date;
		$this->bukti=$file_name;
		$this->atas_nama=$atas_nama;
		$this->no_factur=$no_factur;
		$this->bank=$bank;
		$this->nominal=$nominal;
		$this->ke=$ke;

		$query = $this->db->insert('payment',$this);
		return $query;

	}	

	function get_data_use_id_order($id_orders=null)
	{
		if (isset($id_orders)) {
		$this->db->where('id_orders',$id_orders);
			
		}
		$query = $this->db->get('payment');
	//	echo $this->db->last_query($query);
		return $query;
	}

}

