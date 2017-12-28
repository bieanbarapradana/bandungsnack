<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Sellers_model extends CI_Model {

	function data_sellers($id_seller=null)

	{

		if (isset($id_seller)) 

		{

			$this->db->where('id_seller',$id_seller);

		}

		$this->db->order_by('id_seller desc');

		$query = $this->db->get('seller');

		return $query;

	}
	function get_menu()

	{
		$this->db->order_by('seller.id_seller desc');
		$this->db->limit(3);
		$this->db->select('seller.id_seller,seller_name');
		$this->db->select_sum('rating');
		$this->db->from('seller');
		$this->db->join('product','product.id_seller=seller.id_seller');
		$this->db->group_by('seller.seller_name,seller_name');
		$this->db->order_by('rating desc');

		$query = $this->db->get();
		//echo $this->db->last_query($query);
		return $query;

	}

	function insert_data($seller_name,$contact,$email,$address,$flag)

	{

		$this->seller_name = $seller_name;

		$this->contact =$contact;

		$this->address =$address;
		$this->email =$email;

		$this->flag =$flag;



		$query = $this->db->insert('seller',$this);

		return $query;

	}

	function delete($id_seller)

	{

		$query = $this->db->where('id_seller',$id_seller)->delete('seller');

		return $query;

	}

	function update_data($id_seller,$seller_name,$contact,$email,$address)

	{

		$this->seller_name = $seller_name;

		$this->contact =$contact;
		$this->email =$email;

		$this->address =$address;



		$query = $this->db->where('id_seller',$id_seller)->update('seller',$this);

		return $query;

	}

	function data1_sellers($id_seller=null)

	{

		if (isset($id_seller)) 

		{

			$this->db->where('id_seller !=',$id_seller);

		}

		$this->db->order_by('id_seller desc');

		$query = $this->db->get('seller');

		return $query;

	}

}

