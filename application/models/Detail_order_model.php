<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_order_model extends CI_Model {

	function add($data)

	{

		$query = $this->db->insert_batch('order_details',$data);
		
		return $query;

	}
	function get_data_use_id_orders($id_orders)
	{

		$this->db->select('orders.id_orders,product.id_product,product_name,qty,product.product_price,order_details.discount');
		$this->db->where('orders.id_orders',$id_orders);
		$this->db->from('order_details');
		$this->db->join('product','product.id_product=order_details.id_product');
		$this->db->join('orders','orders.id_orders=order_details.id_orders');
		$query = $this->db->get('');
		return $query;
	}

}

