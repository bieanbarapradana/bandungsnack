<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class History_pengiriman_model extends CI_Model {
	function get_data_use_id($id_orders)
    {
    	$this->db->order_by('idhistory desc');
    	
    	$this->db->where('kode_transaksi',$id_orders);
    	$this->db->from('orders');
    	$this->db->join('history_pengiriman','history_pengiriman.id_orders=orders.id_orders');
    	$query = $this->db->get('');
    	return $query;
             
    }
    function insert_data($id_orders,$status_lama,$shipping_status)
    {
    	$this->id_orders = $id_orders;
    	$this->status_sebelumnya = $status_lama;
    	$this->status = $shipping_status;
    	$query = $this->db->insert('history_pengiriman',$this);
    	return $query;

    }
 
}

