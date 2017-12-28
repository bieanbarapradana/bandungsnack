<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Tracking extends CI_Controller {

	
	
	function __construct()
	
	{

		parent::__construct();

		$this->load->model('Products_model');
		
		$this->load->model('Sellers_model');
		$this->load->model('History_pengiriman_model');
		$this->load->model('Orders_model');

		$this->load->model('Temp_detail_order');
		

	}

	function _render_page($view, $data=null)

	{

		if (!$this->session->userdata('login_in_customer')) 

		{


		}

		else

		{

			$this->data['cart']					= $this->Temp_detail_order->__count($this->session->userdata('id_customers'))->row();

			$this->data['cart_detail']			= $this->Temp_detail_order->get_data($this->session->userdata('id_customers'))->result();

			$this->data['sum_cart']				= $this->Temp_detail_order->__sum($this->session->userdata('id_customers'))->row();

		}
		
		$this->data['data_seller'] = $this->Sellers_model->get_menu()->result();

		$this->data['data_product'] = $this->Products_model;

		$this->viewdata = (empty($data)) ? $this->data: $data;

		$this->load->view('front-end/include/simple_header',$this->viewdata);

		$view_html = $this->load->view($view);

		$this->load->view('front-end/include/footer');

	}

	function index()

	{

		$this->load->view('front-end/tracking/coba');

	}
	function get_data_order()
	{
		$term =$this->input->post('judul');
		$hasil='';
		if (isset($term)) 
		{
			$query = $this->History_pengiriman_model->get_data_use_id($term)->result();
			if ($query) {
		//	var_dump($query);
				$no = 1;
				foreach ($query as $key => $value) {
				echo " 
					<tr>
                <td style='text-align:center;'>".$no."</td>
                <td>MKT/".$value->id_orders.'/'.substr($value->order_date,8,2).'/'.substr($value->order_date,5,2).'/'.substr($value->order_date,0,4)."</td>
                <td>".$value->kode_transaksi."</td>
                <td>".$value->order_date."</td>
                <td>".$value->status_sebelumnya."</td>
                <td>".$value->status."</td>
                <td>".$value->tanggal."</td>
            </tr>
            ";
				$no++;
				}
				//echo $hasil;
			}
			else
			{
			echo "<tr><td colspan='8' style='text-align:center;'><p class=\"text-error\">Data Tidak ada!</p></td></tr>";
			}
		}
		else {
			echo "<tr><td colspan='8' style='text-align:center;'><p class=\"text-error\">Data Tidak ada!</p></td></tr>";
			
		}
	}
	function coba()
	{
		  $number				= "0123456789";
        $nomer_unique		= substr( str_shuffle( $chars ), 0, 10 );
        echo $nomer_unique;
	}

}

