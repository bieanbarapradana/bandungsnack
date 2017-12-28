<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Orders extends CI_Controller {
	

	function __construct()

	{

		parent::__construct();

		$this->load->model('Orders_model');
		$this->load->model('History_pengiriman_model');
		$this->load->model('Notifikasi_customers_model');	
		

		if (!$this->session->userdata('login_in')) 

		{

			redirect(base_url(''));

		}

		else

		{



		}

	}
	function order_baru()
	{
		$shipping_status='not confirmed';
		echo count($this->Orders_model->get_count_new_order($shipping_status)->result());
	}
	function confirmed_payment()
	{
		$shipping_status='not confirmed';
		$payment_status='confirmed';
		echo count($this->Orders_model->get_count_new_order($shipping_status,$payment_status)->result());
	}

	function _render_page($view, $data=null)

	{

		$this->viewdata = (empty($data)) ? $this->data: $data;

		$this->load->view('admin/include/header',$this->viewdata);

		$view_html = $this->load->view($view);

		$this->load->view('admin/include/footer');

	}

	function data_orders($id_orders=null)

	{

		if (isset($id_orders)) 

		{

			$data = $this->Orders_model->data_orders($id_orders)->result();

		}

		else

		{

			$data = $this->Orders_model->data_orders()->result();

		}



		$no = 1;

		//var_dump($data);

		foreach ($data as $value) {

			if ($value->shipping_status=='packing') 

			{

				$shipping_status = '<a href="javascript:void(0)" class="label label-info"><i>'.$value->shipping_status.'</i></a>';

			}

			elseif ($value->shipping_status=='not confirmed') 

			{

				$shipping_status = '<a href="javascript:void(0)" class="label label-danger"><i>'.$value->shipping_status.'</i></a>';

			}

			else{

				$shipping_status = '<a href="javascript:void(0)" class="label label-success"><i>'.$value->shipping_status.'</i></a>';

			}



			if ($value->payment_status=='confirmed') 

			{

				$payment_status = '<a href="javascript:void(0)" class="label label-success"><i>'.$value->payment_status.'</i></a>';

			}

			elseif ($value->payment_status=='approved') 

			{

				$payment_status = '<a href="javascript:void(0)" class="label label-danger"><i>'.$value->payment_status.'</i></a>';

			}

			else

			{

				$payment_status = '<a href="javascript:void(0)" class="label label-danger"><i>unknown </i></a>';

			}

			$hasil[] = array(

				'no' => '<p style="text-align:center;">'.$no.'</i>',

				'id_orders' =>'MKT/'.$value->id_orders.'/'.substr($value->order_date,8,2).'/'.substr($value->order_date,5,2).'/'.substr($value->order_date,0,4),

				'full_name'=> $value->first_name.' '.$value->last_name,

				'order_date'=> $value->order_date,

				'shipping_status'=> '<p style="text-align:center;">'.$shipping_status.'</p>',

				'payment_status'=> '<p style="text-align:center;">'.$payment_status.'</p>',

				'link' =>'
				<p style="text-align:center;"><a href="'.base_url('Orders/edit/'.$value->id_orders).'" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>

				
				</p>'

			);

		$no++;

		}

		header('Content-Type: application/json');

		echo '{ "data":', json_encode($hasil),'}';

	}
	function data_payment_orders($id_orders=null)

	{

		if (isset($id_orders)) 

		{

			$data = $this->Orders_model->data_payment_orders($id_orders)->result();

		}

		else

		{

			$data = $this->Orders_model->data_payment_orders()->result();

		}



		$no = 1;

		//var_dump($data);

		foreach ($data as $value) {

			if ($value->shipping_status=='packing') 

			{

				$shipping_status = '<a href="javascript:void(0)" class="label label-info"><i>'.$value->shipping_status.'</i></a>';

			}

			elseif ($value->shipping_status=='not confirmed') 

			{

				$shipping_status = '<a href="javascript:void(0)" class="label label-danger"><i>'.$value->shipping_status.'</i></a>';

			}

			else{

				$shipping_status = '<a href="javascript:void(0)" class="label label-success"><i>'.$value->shipping_status.'</i></a>';

			}



			if ($value->payment_status=='confirmed') 

			{

				$payment_status = '<a href="javascript:void(0)" class="label label-success"><i>'.$value->payment_status.'</i></a>';

			}

			elseif ($value->payment_status=='not confirmed') 

			{

				$payment_status = '<a href="javascript:void(0)" class="label label-danger"><i>'.$value->payment_status.'</i></a>';

			}

			else

			{

				$payment_status = '<a href="javascript:void(0)" class="label label-danger"><i>unknown </i></a>';

			}

			$hasil[] = array(

				'no' => '<p style="text-align:center;">'.$no.'</i>',

				'id_orders' =>'MKT/'.$value->id_orders.'/'.substr($value->order_date,8,2).'/'.substr($value->order_date,5,2).'/'.substr($value->order_date,0,4),

				'full_name'=> $value->first_name.' '.$value->last_name,

				'order_date'=> $value->order_date,

				'shipping_status'=> '<p style="text-align:center;">'.$shipping_status.'</p>',

				'payment_status'=> '<p style="text-align:center;">'.$payment_status.'</p>',

				'link' =>'<p style="text-align:center;"><a href="'.base_url('Orders/edit/'.$value->id_orders.'/od_py').'" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i>

				</p>'

			);

		$no++;

		}

		header('Content-Type: application/json');

		echo '{ "data":', json_encode($hasil),'}';

	}

	function index()

	{

		$this->data['label'] = array(

				'home' =>'Dashboard',

   				'link_home' =>'Dashboard',

   				'parent' =>'Orders',

   				'link_parent' =>'Orders'

   		);

		$this->data['add_css'] = array(

	       	base_url('assets/back-end/css/bootstrap.min.css'),

	        base_url('assets/back-end/css/plugins.css'),

	        base_url('assets/back-end/css/main.css'),

	        base_url('assets/back-end/css/themes.css'),

    		base_url('assets/noty/demo/animate.css'),

		);

		$this->data['add_js'] = array(

	       base_url('assets/back-end/js/vendor/bootstrap.min.js'),

	       base_url('assets/back-end/js/plugins.js'),

	       base_url('assets/back-end/js/app.js'),

	       base_url('assets/back-end/data/orders/dataOrders.js'),

	         base_url('assets/noty/jquery.noty.packaged.min.js'),

	    	base_url('assets/noty/js/noty/packaged/jquery.noty.packaged.min.js'),

	    	base_url('assets/noty/demo/notification_html.js'),

		);

		$this->data['sukses_add_categories'] = array(

		   	base_url('assets/notif/categories/sukses_add_categories.js')

		);

		

		$script = "<script>$(function(){ TablesDatatables.init(); });</script>";



		$this->data['additional'] = array($script);

		$this->_render_page('admin/orders/data-orders');

	}
	function orders_payment()

	{

		$this->data['label'] = array(

				'home' =>'Dashboard',

   				'link_home' =>'Dashboard',

   				'parent' =>'Orders',

   				'link_parent' =>'Orders'

   		);

		$this->data['add_css'] = array(

	       	base_url('assets/back-end/css/bootstrap.min.css'),

	        base_url('assets/back-end/css/plugins.css'),

	        base_url('assets/back-end/css/main.css'),

	        base_url('assets/back-end/css/themes.css'),

    		base_url('assets/noty/demo/animate.css'),

		);

		$this->data['add_js'] = array(

	       base_url('assets/back-end/js/vendor/bootstrap.min.js'),

	       base_url('assets/back-end/js/plugins.js'),

	       base_url('assets/back-end/js/app.js'),

	       base_url('assets/back-end/data/orders/dataPaymentOrders.js'),

	         base_url('assets/noty/jquery.noty.packaged.min.js'),

	    	base_url('assets/noty/js/noty/packaged/jquery.noty.packaged.min.js'),

	    	base_url('assets/noty/demo/notification_html.js'),

		);

		$this->data['sukses_add_categories'] = array(

		   	base_url('assets/notif/categories/sukses_add_categories.js')

		);

		

		$script = "<script>$(function(){ TablesDatatables.init(); });</script>";



		$this->data['additional'] = array($script);

		$this->_render_page('admin/orders/data-orders');

	}

	function add()

	{

		$this->data['label'] = array(

				'home' =>'Dashboard',

   				'link_home' =>'Dashboard',

   				'parent' =>'Categories',

   				'link_parent' =>'Categories',

   				'sub_parent' => 'Form add Categories',

   				'link_sub_parent' => 'Categories/add'

   		);

		$this->data['add_css'] = array(

	       	base_url('assets/back-end/css/bootstrap.min.css'),

	        base_url('assets/back-end/css/plugins.css'),

	        base_url('assets/back-end/css/main.css'),

	        base_url('assets/back-end/css/themes.css'),

    		base_url('assets/noty/demo/animate.css'),

	        

		);

		$this->data['add_js'] = array(

		    base_url('assets/back-end/js/vendor/bootstrap.min.js'),

		    base_url('assets/back-end/js/plugins.js'),

		    base_url('assets/back-end/js/app.js'),

		    base_url('assets/back-end/validasi/validasi-categories.js'),

		    base_url('assets/noty/jquery.noty.packaged.min.js'),

	    	base_url('assets/noty/js/noty/packaged/jquery.noty.packaged.min.js'),

	    	base_url('assets/noty/demo/notification_html.js'),

		//	base_url('assets/notif/seller/sukses_add_seller.js')



		);

		$this->data['gagal_add_categories'] = array(

		   	base_url('assets/notif/categories/gagal_add_categories.js')

		);





		

		$script = "<script>$(function(){ FormsValidation.init(); });</script>";



		$this->data['additional'] = array($script);

		$this->_render_page('admin/categories/add-new');

	}

	function add_data()

	{

		$category_name = $this->input->post('category_name');

		$description = $this->input->post('deskripsi');



		$cek = $this->Categories_model->add_data($category_name,$description);

		if ($cek) 

		{

			$this->session->set_flashdata('sukses_add_categories','sukses_add_categories');

			redirect(base_url('Categories'));

		}

		else

		{

			$this->session->set_flashdata('gagal_add_categories','gagal_add_categories');

			redirect(base_url('Categories/add'));

		}

	}

	function edit($id_orders,$status=null)

	{
		if (isset($status)) 
		{
		$this->data['link'] ='od_py';
		}
		else
		{
		$this->data['link'] =null;
		}
		$this->data['label'] = array(

				'home' =>'Dashboard',

   				'link_home' =>'Dashboard',

   				'parent' =>'Orders',

   				'link_parent' =>'Orders',

   				'sub_parent' => 'Form edit Orders',

   				'link_sub_parent' => 'Orders/edit/'.$id_orders

   		);

		$this->data['add_css'] = array(

	       	base_url('assets/back-end/css/bootstrap.min.css'),

	        base_url('assets/back-end/css/plugins.css'),

	        base_url('assets/back-end/css/main.css'),

	        base_url('assets/back-end/css/themes.css'),

    		base_url('assets/noty/demo/animate.css'),

	        

		);

		$this->data['add_js'] = array(

		    base_url('assets/back-end/js/vendor/bootstrap.min.js'),

		    base_url('assets/back-end/js/plugins.js'),

		    base_url('assets/back-end/js/app.js'),

		    base_url('assets/back-end/validasi/validasi-categories.js'),

		    base_url('assets/noty/jquery.noty.packaged.min.js'),

	    	base_url('assets/noty/js/noty/packaged/jquery.noty.packaged.min.js'),

	    	base_url('assets/noty/demo/notification_html.js'),

		//	base_url('assets/notif/seller/sukses_add_seller.js')



		);

		$this->data['gagal_update_categories'] = array(

		   	base_url('assets/notif/categories/gagal_update_categories.js')

		);

		$script = "<script>$(function(){ FormsValidation.init(); });</script>";

		$this->data['data_orders'] = $this->Orders_model->data_orders($id_orders)->row();

		$this->data['additional'] = array($script);

		$this->_render_page('admin/orders/edit');

	}

	function proses_update($id_orders,$status=null)

	{

	//	$category_name = $this->input->post('category_name');

		$shipping_status = $this->input->post('shipping_status');
		$payment_status = $this->input->post('payment_status');

		$cek_status_shipping = $this->Orders_model->data_orders($id_orders)->row();

		if ($cek_status_shipping->shipping_status==$shipping_status) 
		{
			if (isset($status)) 
			{
				redirect(base_url('Orders/orders_payment'));
			}
			else
			{
				redirect(base_url('Orders'));
			}		
		}
		else
		{
			$status_lama = $cek_status_shipping->shipping_status;
			$cek = $this->Orders_model->proses_update($id_orders,$shipping_status,$payment_status);
			$insert_history_pengiriman = $this->History_pengiriman_model->insert_data($id_orders,$status_lama,$shipping_status);

			if ($cek) 

			{
				$id_customers = $cek_status_shipping->id_customers;
				$link = 'Transaksi/detail/'.$id_orders;
				$isi ='Telah Mengupdate status pengiriman anda dengan nomer order MKT/'.$id_orders.'/'.substr($cek_status_shipping->order_date,8,2).'/'.substr($cek_status_shipping->order_date,5,2).'/'.substr($cek_status_shipping->order_date,0,4).' dari '.$status_lama.' ke '.$shipping_status;
				$insert_notif_buat_customers = $this->Notifikasi_customers_model->insert_data($id_customers,$link,$isi);

				$this->session->set_flashdata('sukses_ubah_status','sukses_ubah_status');

				if (isset($status)) 
				{
					redirect(base_url('Orders/orders_payment'));
				}
				else
				{
					redirect(base_url('Orders'));
				}

			}

			else

			{

				$this->session->set_flashdata('gagal_update_status','gagal_update_status');
				if (isset($status)) 
				{
					redirect(base_url('Orders/orders_payment'));
				}
				else
				{
					redirect(base_url('Orders'));
				}

			}
		}

	}

	function delete($id_orders)

	{

		$this->data['label'] = array(

				'home' =>'Dashboard',

   				'link_home' =>'Dashboard',

   				'parent' =>'Categories',

   				'link_parent' =>'Categories',

   				'sub_parent' => 'Delete Confirmation',

   				'link_sub_parent' => 'Categories/delete/'.$id_orders

   		);

		$this->data['add_css'] = array(

	       	base_url('assets/back-end/css/bootstrap.min.css'),

	        base_url('assets/back-end/css/plugins.css'),

	        base_url('assets/back-end/css/main.css'),

	        base_url('assets/back-end/css/themes.css'),

    		base_url('assets/noty/demo/animate.css'),

	        

		);

		$this->data['add_js'] = array(

		    base_url('assets/back-end/js/vendor/bootstrap.min.js'),

		    base_url('assets/back-end/js/plugins.js'),

		    base_url('assets/back-end/js/app.js'),

		    base_url('assets/back-end/js/pages/validasi-captcha.js'),

		    base_url('assets/noty/jquery.noty.packaged.min.js'),

	    	base_url('assets/noty/js/noty/packaged/jquery.noty.packaged.min.js'),

	    	base_url('assets/noty/demo/notification_html.js'),

		);

		$this->data['gagal_delete_categories'] = array(

		   	base_url('assets/notif/seller/gagal_delete_categories.js')

		);

		$path = './assets/captcha/';



		if ( !file_exists($path) )

		{

			$create = mkdir($path, 0777);

			if ( !$create)

			return;

		}



		//Menampilkan huruf acak untuk dijadikan captcha

		$word = array_merge(range('0', '9'), range('A', 'Z'));

		$acak = shuffle($word);

		$str  = substr(implode($word), 0, 5);



		//Menyimpan huruf acak tersebut kedalam session

		$data_ses = array('captcha_str' => $str	);

		$this->session->set_userdata($data_ses);



		//array untuk menampilkan gambar captcha

		$vals = array(

		    'word'	=> $str, //huruf acak yang telah dibuat diatas

		    'img_path'	=> $path, //path untuk menyimpan gambar captcha

		    'img_url'	=> base_url().'assets/captcha/', //url untuk menampilkan gambar captcha

		    'img_width'	=> '220', //lebar gambar captcha

		    'img_height' => 30, //tinggi gambar captcha

		    'expiration' => 7200 //expired time per captcha

		);



		$cap = create_captcha($vals);

		$this->data['captcha_image'] = $cap['image']; //variable array untuk menampilkan captcha pada view

		$this->data['id_orders'] = $id_orders;

		$this->data['kode_capt'] = $str;



		/// awal code buat validasi

		

		$script = "<script>$(function(){ FormsValidation.init(); });</script>";



		$this->data['additional'] = array($script);

		$this->_render_page('admin/categories/delete');

	}

	function proses_delete($id_orders)

	{

		$cek = $this->Categories_model->proses_delete($id_orders);

		if ($cek) 

		{

			$this->session->set_flashdata('sukses_delete_categories','sukses_delete_categories');

			redirect(base_url('Categories'));

		}

		else

		{

			$this->session->set_flashdata('gagal_delete_categories','gagal_delete_categories');

			redirect(base_url('Categories/delete/'.$id_orders));

		}

	}

}

