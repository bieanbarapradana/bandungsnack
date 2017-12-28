<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Local_Discount extends CI_Controller {

	
	
	function __construct()
	
	{

		parent::__construct();

		$this->load->model('Products_model');
		
		$this->load->model('Sellers_model');

		$this->load->model('Temp_detail_order');
		


	}

	

	function _render_page($view, $data=null)

	{

		$this->data['data_seller'] = $this->Sellers_model->get_menu()->result();

		$this->data['data_product'] = $this->Products_model;

		if (!$this->session->userdata('login_in_customer')) 

		{


		}

		else

		{

			$this->data['cart']			= $this->Temp_detail_order->__count($this->session->userdata('id_customers'))->row();

		}
		
		$this->viewdata = (empty($data)) ? $this->data: $data;

		$this->load->view('front-end/include/header_single',$this->viewdata);

		for ($i=0; $i <count($view) ; $i++) 

		{ 
			
			$view_html = $this->load->view($view[$i]);

		}


		$this->load->view('front-end/include/footer');

	}

	function index()

	{

		$this->data['add_css'] = array(

	        base_url('assets/front-end/css/normalize.css'),

			base_url('assets/front-end/css/bootstrap.css'),

			base_url('assets/front-end/css/iview.css'),

			base_url('assets/front-end/css/menu3d.css'),

			base_url('assets/front-end/css/animate.css'),

			base_url('assets/front-end/css/custom.css'),

			base_url('assets/front-end/css/style-switch.css'),

			base_url('assets/front-end/css/color.css'),

    		base_url('assets/noty/demo/animate.css'),

		);

		$this->data['add_js'] = array(

	        base_url('assets/front-end/js/jquery-1.10.2.min.js'),

			base_url('assets/front-end/js/bootstrap.min.js'),

			base_url('assets/front-end/js/bootstrap-select.js'),

			base_url('assets/front-end/js/scripts.js'),

			base_url('assets/front-end/js/menu3d.js'),

			base_url('assets/front-end/js/raphael-min.js'),

			base_url('assets/front-end/js/jquery.easing.js'),

			base_url('assets/front-end/js/iview.js'),

			base_url('assets/front-end/js/retina-1.1.0.min.js'),

			 base_url('assets/noty/jquery.noty.packaged.min.js'),

	    	base_url('assets/noty/js/noty/packaged/jquery.noty.packaged.min.js'),

	    	base_url('assets/noty/demo/notification_html.js'),

		);

		$this->data['pemberitahuan_harus_login'] = array(

		   	base_url('assets/notif/auth/pemberitahuan_harus_login.js')

		);

		$this->data['sukses_ditambah'] = array(

		   	base_url('assets/notif/auth/sukses_ditambah.js')

		);

		$this->data['gagal_ditambah'] = array(

		   	base_url('assets/notif/auth/gagal_ditambah.js')

		);

		$this->data['invalid_login'] = array(

		   	base_url('assets/notif/auth/invalid_login.js')

		);

		$this->data['info_belum_login'] = array(

		   	base_url('assets/notif/auth/info_belum_login.js')

		);

		$this->data['stock_abis'] = array(

		   	base_url('assets/notif/products/stock_abis.js')

		);
		$this->data['sukses_registrasi'] = array(

		   	base_url('assets/notif/auth/sukses_registrasi.js')

		);
		$this->data['belum_aktivasi'] = array(

		   	base_url('assets/notif/auth/belum_aktivasi.js')

		);
		$this->data['aktivasi_berhasil'] = array(

		   	base_url('assets/notif/auth/aktivasi_berhasil.js')

		);
		$this->data['aktivasi_gagal'] = array(

		   	base_url('assets/notif/auth/aktivasi_gagal.js')

		);
		$this->data['account_telah_teraktivasi'] = array(

		   	base_url('assets/notif/auth/account_telah_teraktivasi.js')

		);
		

		$this->data['cek_jumlah'] = $this->Products_model->data_products()->result();



		$aa = $this->data['promo_spesial_1'] = $this->Products_model->_promo_spesial()->row(); 

		$this->data['promo_spesial_2'] = $this->Products_model->_promo_spesial_2()->row(); 

		$this->data['new_product'] = $this->Products_model->_new_product()->row(); 
		
		$this->data['terlaris_aktif'] = $this->Products_model->_jajan_terlaris()->result(); 

		$this->data['terlaris_non_aktif'] = $this->Products_model->_jajan_terlaris_1()->result(); 

		$this->data['total_barang_promo'] = $this->Products_model->total_barang_promo()->row();

		$oo=	$this->data['data_seller'] = $this->Sellers_model->get_menu()->result();
	//	var_dump($aa);

		if ($aa==null) 
		{
			$a =$this->data['data_product_atas'] = $this->Products_model->__product_atas(0,4)->result(); 
			//var_dump($a);
			$this->data['data_product_atas_next'] = $this->Products_model->__product_atas_next(4,4)->result(); 
		}
		else
		{
			$this->data['data_product_atas'] = $this->Products_model->__product_atas(0,3)->result(); 
			$this->data['data_product_atas_next'] = $this->Products_model->__product_atas_next(3,3)->result(); 
		}

		
		$this->data['paling_laris'] = $this->Products_model->_paling_terlaris()->row(); 
		$this->data['list_terlaris'] = $this->Products_model->_list_terlaris()->result(); 

		$tampilan_view[] = 'front-end/home/content-atas';

		$tampilan_view[] = 'front-end/home/content-terlaris';

		$tampilan_view[] = 'front-end/home/content-tengah';
		
		$tampilan_view[] = 'front-end/home/mitra';
		$this->_render_page($tampilan_view);

		

	}

}

