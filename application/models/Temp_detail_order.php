<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Temp_detail_order extends CI_Model {

	function insert_product($use_id,$id_product,$qty)

	{

		$this->use_id 		 	= $use_id;

		$this->id_product 		= $id_product;

		$this->qty 				= $qty;

		$query = $this->db->insert('temp_order_detail',$this);

		echo $this->db->last_query($query);

		return $query;

	}

	function get_data($use_id=null)

	{

		if (isset($use_id)) 

		{

			$this->db->where('use_id',$use_id);

		}

		$this->db->from('product');

		$this->db->join('temp_order_detail','temp_order_detail.id_product=product.id_product');

		$query 	= $this->db->get('');

		return $query;

	}

	function __count($use_id)

	{

		$this->db->select('count(id) as total');

		$this->db->where('use_id',$use_id);

		$query = $this->db->get('temp_order_detail');

		return $query;

	}

	function __sum($use_id)

	{

		$this->db->select('sum(qty) as total');

		$this->db->where('use_id',$use_id);

		$query = $this->db->get('temp_order_detail');

		return $query;

	}

	function cek_data($use_id,$id_product)

	{

		$this->db->where('id_product',$id_product);

		$this->db->where('use_id',$use_id);

		$query = $this->db->get('temp_order_detail');

		return $query;

	}

	function update_qty_order($id,$qty)
	{

		$this->qty 	= $qty;

		$this->db->where('id',$id);

		$query 	= $this->db->update('temp_order_detail',$this);

		return $query;

	}

}

