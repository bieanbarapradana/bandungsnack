<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Checkout extends CI_Controller {
	
	function __construct()
	
	{

		parent::__construct();

		$this->load->model('Products_model');
		
		$this->load->model('Sellers_model');
		$this->load->model('Custommers_model');


		
	}

	function _render_page($view, $data=null)

	{
		$this->data['data_seller'] = $this->Sellers_model->get_menu()->result();

		$this->data['data_product'] = $this->Products_model;

		$this->viewdata = (empty($data)) ? $this->data: $data;

		$this->load->view('front-end/include/simple_header',$this->viewdata);

		$view_html = $this->load->view($view);

		$this->load->view('front-end/include/footer');

	}

	function index()

	{

		$this->data['add_css'] = array(

  			base_url('assets/back-end/css/bootstrap.min.css'),
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

  			base_url('assets/front-end/js/jquery.validate.min.js'),
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

		$this->data['no_cart'] = array(

		   	base_url('assets/notif/checkout/no_cart.js')

		);
				$validasi = "
			<script>

		    (function($){

		       jQuery.validator.setDefaults({

		      errorPlacement: function(error, element) {

		        error.appendTo('#invalid-' + element.attr('id'));

		      }

		    });

		       $(\"#validasi-reset_password\").validate({

		           	rules: {

			          first_name: { 

			            required : true, 

			          },

			          last_name: { 

			          	required: true,

			          },

			          contact: { 

			          	required: true,

			          },

			          address: { 

			          	required: true,

			          }

			        },
			        messages: {

			         	first_name: 

	                    {

	                        required: 'Masukkan Nama depan anda',

	                    },

	                    last_name: 

	                    {

	                        required: 'Masukkan Nama Belakang Anda',

	                    },

	                    contact: 

	                    {

	                        required: 'Masukkan No Telp anda',


	                    },

	                    address: 

	                    {

	                        required: 'Masukkan alamat pengiriman anda',


	                    }

			        }

			     });

			    })($);

			  </script>";
		$this->data['validasi'] = array($validasi);

		
		$this->data['data_product_atas'] = $this->Products_model->__product_atas()->result(); 

		$this->data['total_barang_promo'] = $this->Products_model->total_barang_promo()->row();
		$this->data['data_account'] = $this->Custommers_model->data_customers($this->session->userdata('id_customers'))->row(); 

		$this->_render_page('front-end/checkout/checkout-content');

	}
	function no_cart()
	{

		$this->session->set_flashdata('no_cart', 'no_cart');

		redirect(base_url('Checkout'));

	}

}

