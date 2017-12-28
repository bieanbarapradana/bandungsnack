<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
	
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

	function search($page=null,$limit=null,$sort=null,$keyword=null)

	{	
		if (isset($sort)) 
		{
			
			if ($sort=='sort_asc') 
			{
				$sort='product_name asc';
				$this->data['sort']='sort_asc';
			}
			elseif ($sort=='sort_desc') 
			{
				$sort='product_name desc';
				$this->data['sort']='sort_desc';
			}
			elseif ($sort=='low_price') 
			{
				$sort='product_price asc';
				$this->data['sort']='low_price';
			}
			elseif ($sort=='high_price') 
			{
				$sort='product_price desc';
				$this->data['sort']='high_price';
			}
			elseif ($sort=='high_rate') 
			{
				$sort='rating desc';
				$this->data['sort']='high_rate';
			}
			elseif ($sort=='low_rate') 
			{
				$sort='rating asc';
				$this->data['sort']='low_rate';
			}
			elseif ($sort=='new_product') 
			{
				$sort='product.id_product desc';
				$this->data['sort']='new_product';
			}
			else
			{
				$sort='rating desc';
				$this->data['sort']='high_rate';
			}
		
		if (isset($page)) {
			if (isset($limit))
			{
				 $get_batas_akhir = ($page - 1 ) * $limit ; 

				$get_batas_awal  = $limit ;
				$this->data['get_batas_awal'] = $get_batas_awal;
				$this->data['get_batas_akhir'] = $get_batas_akhir;
				$this->data['limit'] = $limit;
				$aa = $this->data['search'] = $this->Products_model->search($keyword,$get_batas_awal,$get_batas_akhir,$sort)->result();
				//echo count($aa);
				if (isset($keyword)) {
					if ($keyword==null) 
					{
					$this->data['keyword'] = null;
					$this->data['search_1'] = $this->Products_model->search($keyword,$get_batas_awal,$get_batas_akhir,$sort)->result();
					$key ='';
					$this->data['search_2'] = $this->Products_model->search($key)->result();

					$this->data['page'] = $page;
					}
					else
					{
					$this->data['keyword'] = $keyword;
					$this->data['search_1'] = $this->Products_model->search($keyword,$get_batas_awal,$get_batas_akhir,$sort)->result();
					$key ='';
					$this->data['search_2'] = $this->Products_model->search($key)->result();

					$this->data['page'] = $page;

					}
				}
				else
				{
					$this->data['keyword'] = $keyword;
					$this->data['search_1'] = $this->Products_model->search($keyword,$get_batas_awal,$get_batas_akhir,$sort)->result();
						$key ='';
					$this->data['search_2'] = $this->Products_model->search($key)->result();

					$this->data['page'] = $page;
				}
			}
			else
			{
				$get_batas_akhir = ($page - 1 ) * 20 ; 

				$get_batas_awal  = 20 ;
				$this->data['get_batas_awal'] = $get_batas_awal;
				$this->data['get_batas_akhir'] = $get_batas_akhir;
				$this->data['limit'] = 20;
				$aa = $this->data['search'] = $this->Products_model->search($keyword,$get_batas_awal,$get_batas_akhir,$sort)->result();
				//echo count($aa);
				if (isset($keyword)) {
					if ($keyword==null) 
					{
					$this->data['keyword'] = null;
					$this->data['search_1'] = $this->Products_model->search($keyword,$get_batas_awal,$get_batas_akhir,$sort)->result();
					$this->data['search_2'] = $this->Products_model->search($keyword)->result();

					$this->data['page'] = $page;
					}
					else
					{
					$this->data['keyword'] = $keyword;
					$this->data['search_1'] = $this->Products_model->search($keyword,$get_batas_awal,$get_batas_akhir,$sort)->result();
					$this->data['search_2'] = $this->Products_model->search($keyword)->result();

					$this->data['page'] = $page;

					}
				}
				else
				{
					$this->data['keyword'] = $keyword;
					$this->data['search_1'] = $this->Products_model->search($keyword,$get_batas_awal,$get_batas_akhir,$sort)->result();
					$this->data['search_2'] = $this->Products_model->search($keyword)->result();

					$this->data['page'] = $page;
				}
			}
			
				

			


		}
		else
		{
			$this->data['limit'] = 20;
			$get_batas_akhir = 20 ; 
			$get_batas_awal  = 0;
			// get batas = 20 
				$this->data['get_batas_awal'] = $get_batas_awal;
				$this->data['get_batas_akhir'] = $get_batas_akhir;
			if (isset($keyword)) {
				$this->data['keyword'] = $this->input->post('search');
				$aa = $this->data['search'] = $this->Products_model->search($this->input->post('search'),20,0,$sort)->result();
			$aa1 = $this->data['search_1'] = $this->Products_model->search($this->input->post('search'))->result();
					$this->data['search_2'] = $this->Products_model->search($keyword)->result();
			//echo ceil( count($aa1) / 20);
			$this->data['page'] = 1;
			}
			else
			{
				$this->data['keyword'] = $this->input->post('search');
				$aa = $this->data['search'] = $this->Products_model->search($this->input->post('search'),20,0,$sort)->result();
			$aa1 = $this->data['search_1'] = $this->Products_model->search($this->input->post('search'))->result();
					$this->data['search_2'] = $this->Products_model->search($keyword)->result();
			//echo ceil( count($aa1) / 20);
			$this->data['page'] = 1;
			}
			
			//echo count($aa);
		}

		}
		else
		{
				$sort='rating desc';
					$this->data['sort']='high_rate';
		if (isset($page)) {
			if (isset($limit))
			{
				 $get_batas_akhir = ($page - 1 ) * $limit ; 

				$get_batas_awal  = $limit ;
				$this->data['get_batas_awal'] = $get_batas_awal;
				$this->data['get_batas_akhir'] = $get_batas_akhir;
				$this->data['limit'] = $limit;
				$aa = $this->data['search'] = $this->Products_model->search($keyword,$get_batas_awal,$get_batas_akhir)->result();
				//echo count($aa);
				
				if (isset($keyword)) {
					if ($keyword==null) 
					{
					$this->data['keyword'] = null;
					$this->data['search_1'] = $this->Products_model->search($keyword,$get_batas_awal,$get_batas_akhir,$sort,$keyword)->result();
					$key ='';
					$this->data['search_2'] = $this->Products_model->search($key)->result();

					$this->data['page'] = $page;
					}
					else
					{
					$this->data['keyword'] = $keyword;
					$this->data['search_1'] = $this->Products_model->search($keyword,$get_batas_awal,$get_batas_akhir,$sort,$keyword)->result();
					$key ='';
					$this->data['search_2'] = $this->Products_model->search($key)->result();

					$this->data['page'] = $page;

					}
				}
				else
				{
					$this->data['keyword'] = $keyword;
					$this->data['search_1'] = $this->Products_model->search($keyword,$get_batas_awal,$get_batas_akhir,$sort,$keyword)->result();
						$key ='';
					$this->data['search_2'] = $this->Products_model->search($key)->result();

					$this->data['page'] = $page;
				}
			}
			else
			{
				$get_batas_akhir = ($page - 1 ) * 20 ; 

				$get_batas_awal  = 20 ;
				$this->data['get_batas_awal'] = $get_batas_awal;
				$this->data['get_batas_akhir'] = $get_batas_akhir;
				$this->data['limit'] = 20;
				$aa = $this->data['search'] = $this->Products_model->search($keyword,$get_batas_awal,$get_batas_akhir,$sort)->result();
				//echo count($aa);
				if (isset($keyword)) {
					if ($keyword==null) 
					{
					$this->data['keyword'] = null;
					$this->data['search_1'] = $this->Products_model->search($keyword,$get_batas_awal,$get_batas_akhir,$sort,$keyword)->result();
					$this->data['search_2'] = $this->Products_model->search($keyword)->result();

					$this->data['page'] = $page;
					}
					else
					{
					$this->data['keyword'] = $keyword;
					$this->data['search_1'] = $this->Products_model->search($keyword,$get_batas_awal,$get_batas_akhir,$sort,$keyword)->result();
					$this->data['search_2'] = $this->Products_model->search($keyword)->result();

					$this->data['page'] = $page;

					}
				}
				else
				{
					$this->data['keyword'] = $keyword;
					$this->data['search_1'] = $this->Products_model->search($keyword,$get_batas_awal,$get_batas_akhir,$sort)->result();
					$this->data['search_2'] = $this->Products_model->search($keyword)->result();

					$this->data['page'] = $page;
				}
			}
			
				

			


		}
		else
		{
			$this->data['limit'] = 20;
			$get_batas_akhir = 20 ; 
			$get_batas_awal  = 0;
			// get batas = 20 
				$this->data['get_batas_awal'] = $get_batas_awal;
				$this->data['get_batas_akhir'] = $get_batas_akhir;
			if (isset($keyword)) {
				$this->data['keyword'] = $this->input->post('search');
				$aa = $this->data['search'] = $this->Products_model->search($this->input->post('search'),20,0)->result();
			$aa1 = $this->data['search_1'] = $this->Products_model->search($this->input->post('search'))->result();
					$this->data['search_2'] = $this->Products_model->search($keyword)->result();
			//echo ceil( count($aa1) / 20);
			$this->data['page'] = 1;
			}
			else
			{
				$this->data['keyword'] = $this->input->post('search');
				$aa = $this->data['search'] = $this->Products_model->search($this->input->post('search'),20,0)->result();
			$aa1 = $this->data['search_1'] = $this->Products_model->search($this->input->post('search'))->result();
					$this->data['search_2'] = $this->Products_model->search($keyword)->result();
			//echo ceil( count($aa1) / 20);
			$this->data['page'] = 1;
			}
			
			//echo count($aa);
		}
		}
	//	var_dump($aa);

		
	
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
		 //  	base_url('assets/notif/auth/sukses_ditambah.js')

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

//aa = $this->data['data_product_detail'] = $this->Products_model->data_products($id_product)->row(); 

		$this->data['data_product_atas'] = $this->Products_model->__product_atas()->result(); 

		$this->data['data_product_atas_next'] = $this->Products_model->__product_atas_next()->result(); 

		$this->data['promo_spesial_1'] = $this->Products_model->_promo_spesial()->row(); 

		$this->data['promo_spesial_2'] = $this->Products_model->_promo_spesial_2()->row(); 

		$this->data['new_product'] = $this->Products_model->_new_product()->row(); 
		
		$this->data['terlaris_aktif'] = $this->Products_model->_jajan_terlaris()->result(); 
		$this->data['terlaris_non_aktif'] = $this->Products_model->_jajan_terlaris_1()->result(); 

		$this->data['total_barang_promo'] = $this->Products_model->total_barang_promo()->row();
		
		$this->data['paling_laris'] = $this->Products_model->_paling_terlaris()->row(); 
		$this->data['list_terlaris'] = $this->Products_model->_list_terlaris()->result(); 
		//$tampilan_view[] = 'front-end/product/product-preview';
		//$tampilan_view[] = 'front-end/home/content-atas';
		$tampilan_view[] = 'front-end/search/search';
		$tampilan_view[] = 'front-end/home/content-terlaris';
		$tampilan_view[] = 'front-end/home/content-tengah';
		
		$this->_render_page($tampilan_view);	
		
	}

}

