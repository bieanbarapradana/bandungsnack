<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Blog extends CI_Controller {
	
	
	function __construct()
	
	{

		parent::__construct();

		$this->load->model('Products_model');
		
		$this->load->model('Sellers_model');

		redirect(base_url('info'));
	}

	function _render_page($view, $data=null)

	{
		$this->data['data_seller'] = $this->Sellers_model->get_menu()->result();

		$this->data['data_product'] = $this->Products_model;

		
		$this->viewdata = (empty($data)) ? $this->data: $data;

		$this->load->view('front-end/include/simple_header',$this->viewdata);

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
			base_url('assets/front-end/css/jquery.dataTables.min.css'),

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
			
			base_url('assets/front-end/js/jquery.dataTables.min.js'),



		);

		$this->data['terlaris_aktif'] = $this->Products_model->_jajan_terlaris()->result(); 

		$this->data['terlaris_non_aktif'] = $this->Products_model->_jajan_terlaris_1()->result(); 

		$this->data['total_barang_promo'] = $this->Products_model->total_barang_promo()->row();
		$tampilan_view[] = 'front-end/info/comming-soon';

		$tampilan_view[] = 'front-end/home/content-terlaris';
		$tampilan_view[] = 'front-end/home/content-tengah';
		

		$this->_render_page($tampilan_view);

	}
	/*

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

		);

		$this->data['paling_laris'] = $this->Products_model->_paling_terlaris()->row(); 
		$this->data['list_terlaris'] = $this->Products_model->_list_terlaris()->result(); 
		
		$this->data['data_product_atas'] = $this->Products_model->__product_atas()->result(); 

		$this->data['total_barang_promo'] = $this->Products_model->total_barang_promo()->row();

		$this->_render_page('front-end/blog/content-blog');

	}
	*/

}

