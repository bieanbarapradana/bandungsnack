<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Jajan extends CI_Controller {
	
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

		$this->viewdata = (empty($data)) ? $this->data: $data;

		$this->load->view('front-end/include/simple_header',$this->viewdata);

		for ($i=0; $i <count($view) ; $i++) 

		{ 

			$view_html = $this->load->view($view[$i]);

		}

		$this->load->view('front-end/include/footer');

	}

	function detail($id_product)

	{
		if (isset($id_product)) 

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

			base_url('assets/front-end/js/http://maps.google.com/maps/api/js?sensor=false&amp;language=en'),

			base_url('assets/front-end/js/js/gmap3.js'),

			base_url('assets/front-end/js/jquery.elevatezoom.js'),

			 base_url('assets/noty/jquery.noty.packaged.min.js'),

	    	base_url('assets/noty/js/noty/packaged/jquery.noty.packaged.min.js'),

	    	base_url('assets/noty/demo/notification_html.js'),

		 //  	base_url('assets/notif/products/stock_abis.js')
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



		$this->data['paling_laris'] = $this->Products_model->_paling_terlaris()->row(); 
		$this->data['list_terlaris'] = $this->Products_model->_list_terlaris()->result(); 
		
		$aa = $this->data['data_product_detail'] = $this->Products_model->data_products($id_product)->row(); 

		$this->data['data_product_atas'] = $this->Products_model->__product_atas()->result(); 

		$this->data['data_product_atas_next'] = $this->Products_model->__product_atas_next()->result(); 

		$this->data['promo_spesial_1'] = $this->Products_model->_promo_spesial()->row(); 

		$this->data['promo_spesial_2'] = $this->Products_model->_promo_spesial_2()->row(); 

		$this->data['new_product'] = $this->Products_model->_new_product()->row(); 
		
		$this->data['terlaris_aktif'] = $this->Products_model->_jajan_terlaris()->result(); 
		$this->data['terlaris_non_aktif'] = $this->Products_model->_jajan_terlaris_1()->result(); 

		$this->data['total_barang_promo'] = $this->Products_model->total_barang_promo()->row();

		$script= "<script>

			(function($) {
			  \"use strict\";
			  //Mega Menu
			 $('#menuMega').menu3d();
			             
			              //Help/Contact Number/Quick Message
						$('.quickbox').carousel({
							interval: 10000
						});
						
						//SPECIALS
						$('#productc2').carousel({
							interval: 4000
						}); 
						//RELATED PRODUCTS
						$('#productc3').carousel({
							interval: 4000
						}); 
						
						//Zoom Product
						$(\"#product-image\").elevateZoom({
															  zoomType : \"inner\",
															  cursor : \"crosshair\",
															  easing: true,
															   gallery: \"thumbs\",
															   galleryActiveClass: \"active\",
															  loadingIcon : true
															});	
						$(\"#product-image\").bind(\"click\", function(e) {  
			  var ez =   $('#product-image').data('elevateZoom');
			  ez.closeAll(); //NEW: This function force hides the lens, tint and window	
				//$.fancybox(ez.getGalleryList());     
			  return false;
			});
			})(jQuery);

			 </script>
		";
		$this->data['additional'] = array($script);
		
		$tampilan_view[] = 'front-end/product/product-preview';
		$tampilan_view[] = 'front-end/home/content-terlaris';
		$tampilan_view[] = 'front-end/home/content-tengah';
		
		$this->_render_page($tampilan_view);	

		}

		else 

		{

			redirect(base_url());

		}

		

	}

}

