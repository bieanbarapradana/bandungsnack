<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Orders_model extends CI_Model {
	function get_id_orders()
    {
    
        $this->db->select_max('id_orders');
    
        $query = $this->db->get('orders');
    
        if($query->num_rows() > 0) {
    
             return $query->row_array(); 
    
        }           
    }
     function get_count_new_order($shipping_status=null,$payment_status=null)
    {
    	
    	if (isset($shipping_status)) 
    	{
	    	$this->db->where('shipping_status',$shipping_status);
    	}
    	if (isset($payment_status)) 
    	{
	    	$this->db->where('payment_status',$payment_status);
    	}
    	$query = $this->db->get('orders');

		return $query;
    }
	function data_orders($id_orders=null)

	{

		if (isset($id_orders)) 

		{

			$this->db->where('id_orders',$id_orders);

		}
		$this->db->order_by('id_orders desc');
		$this->db->from('customers');

		$this->db->join('orders','customers.id_customers=orders.id_customers');

		$query = $this->db->get();

		return $query;

	}
	function data_payment_orders($id_orders=null)

	{

		if (isset($id_orders)) 

		{

			$this->db->where('id_orders',$id_orders);

		}
		$this->db->where('payment_status','confirmed');

		$this->db->order_by('id_orders desc');
		$this->db->from('customers');

		$this->db->join('orders','customers.id_customers=orders.id_customers');

		$query = $this->db->get();

		return $query;

	}
	function add($id_orders,$id_customers,$order_date,$shipping_address,$shipping_status,$payment_status,$kode_transaksi,$nomer_unique)
	{
		$this->id_orders = $id_orders;
		$this->id_customers = $id_customers;
		$this->order_date = $order_date;
		$this->shipping_address = $shipping_address;
		$this->shipping_status = $shipping_status;
		$this->payment_status = $payment_status;
		$this->kode_transaksi = $kode_transaksi;
		$this->nomer_unique = $nomer_unique;

		$query = $this->db->insert('orders',$this);
		
		return $query;
		//INSERT INTO `orders`(`id_orders`, `id_customers`, `order_date`, `shipping_address`, `shipping_status`, `payment_status`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6])
	}
	function data_transaksi($id_customers=null)
	{
		if (isset($id_customers)) 
		{
			$this->db->where('customers.id_customers',$id_customers);
		}
		$this->db->select('orders.id_orders,first_name,last_name,payment_status,shipping_status,order_date,(qty * (product_price - (product_price * (discount / 100)))) as total_harga');
		$this->db->order_by('orders.id_orders desc');
		$this->db->group_by('orders.id_orders,payment_status,shipping_status,order_date');
		$this->db->from('customers');

		$this->db->join('orders','customers.id_customers=orders.id_customers');
		$this->db->join('order_details','orders.id_orders=order_details.id_orders');

		$query = $this->db->get();

		return $query;

	}
	function update_payment($id_orders)
	{
		$this->payment_status ='confirmed';
		$this->db->where('id_orders',$id_orders);

		$query = $this->db->update('orders',$this);
		return $query;
	}
	function proses_update($id_orders,$status,$payment_status)
	{
		$this->shipping_status =$status;
		$this->payment_status =$payment_status;
		$this->db->where('id_orders',$id_orders);

		$query = $this->db->update('orders',$this);
		return $query;

	}
	
	function get_new_order_for_customer()
	{
		$payment_status = 'not confirmed';
		$id_customers = $this->session->userdata('id_customers');

	    $this->db->where('payment_status',$payment_status);
	    $this->db->where('id_customers',$id_customers);
    	
    	$query = $this->db->get('orders');
    //	echo $this->db->last_query($query);
		return $query;
	}
}

