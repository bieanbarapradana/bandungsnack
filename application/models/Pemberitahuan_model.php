<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Pemberitahuan_model extends CI_Model {

	function data_pemberitahuan($id_customers)

	{

		$this->db->where('id_customers',$id_customers);

		$query = $this->db->get('pemberitahuan');

		return $query;

	}
	function tambah_pemberitahuan($id_customers)

	{

		$this->id_customers = $id_customers;
		$this->new_product = 0;
		$this->promo = 0;
		$this->discount = 0;

		$query = $this->db->insert('pemberitahuan',$this);
		return $query;
	}
	function update_data_pemberitahuan($new_product,$promo,$discount)
	{
		$id_customers = $this->session->userdata('id_customers');
		$this->new_product = $new_product;
		$this->promo = $promo;
		$this->discount = $discount;

		$query = $this->db->where('id_customers',$id_customers)->update('pemberitahuan',$this);
		echo $this->db->last_query($query);
		return $query;
	}

}

