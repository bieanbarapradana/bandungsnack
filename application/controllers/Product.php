<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Product extends CI_Controller {

	function __construct()

	{

		parent::__construct();

		$this->load->model('Products_model');

		$this->load->model('Categories_model');

		$this->load->model('Sellers_model');

		$this->load->model('Temp_detail_order');

		if (!$this->session->userdata('login_in')) 

		{

			$this->session->set_flashdata('pemberitahuan_harus_login','pemberitahuan_harus_login');
			
			redirect(base_url(''));

		}

		else

		{



		}

	}

	function _render_page($view, $data=null)

	{

		$this->viewdata = (empty($data)) ? $this->data: $data;

		$this->load->view('admin/include/header',$this->viewdata);

		$view_html = $this->load->view($view);

		$this->load->view('admin/include/footer');

	}

	function data_products($id_product=null)

	{

		if (isset($id_product)) 

		{

			$data = $this->Products_model->data_products($id_product)->result();

		}

		else

		{

			$data = $this->Products_model->data_products()->result();

		}

		$no = 1;

	//	var_dump($data);

		foreach ($data as $value) {

			if ($value->product_flag==0) 

			{

				$flag = '<a href="'.base_url('Product/flag/'.$value->id_product).'" data-toggle="tooltip" title="Flag" class="btn btn-xs btn-default"><i class="fa fa-flag-o"></i></a>';

			}

			else

			{

				$flag = '<a href="'.base_url('Product/unflag/'.$value->id_product).'" data-toggle="tooltip" title="Unflag" class="btn btn-xs btn-default"><i class="fa fa-flag"></i></a>';

			}

			if ($value->promo==0) 

			{

				$promo = '<a href="javascript:void(0)" class="label label-danger"><i><strike>Promo</strike/></i></a>';

			}

			else

			{

				$promo = '<a href="javascript:void(0)" class="label label-info"><i>Promo</i></a>';

			}

			//echo $value->product_name.' '.$value->product_flag;

			$hasil[] = array(

				'no' => '<p style="text-align:center;">'.$no.'</p>',

				'id_product' =>$value->id_product,

				'product_name' =>$value->product_name,

				'seller_name'=> $value->seller_name,

				'category_name'=> $value->category_name,

				'product_price'=> '<p style="text-align:right;"><i>Rp .'.number_format($value->product_price).'</i></p>',
				'price_reseller'=> '<p style="text-align:right;"><i>Rp .'.number_format($value->price_reseller).'</i></p>',
				'purchase_price'=> '<p style="text-align:right;"><i>Rp .'.number_format($value->purchase_price).'</i></p>',

				'netto'=> '<p style="text-align:center;">'.$value->netto.'</p>',
				'stock'=> '<p style="text-align:center;">'.$value->stock.'</p>',

				'rating'=> '<p style="text-align:center;">'.$value->rating.' Viewers</p>',

				'promo'=> '<p style="text-align:center;">'.$promo.'</p>',

				'discount'=> '<p style="text-align:center;">'.$value->discount.'</p>',

				'link' =>'<p style="text-align:center;"><a href="'.base_url('Product/edit/'.$value->id_product).'" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a><a href="'.base_url('Product/delete/'.$value->id_product).'" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>'.$flag.'<p>'

			);

		$no++;

		}

		header('Content-Type: application/json');

		echo '{ "data":', json_encode($hasil),'}';

	}
	function data_products_flag($id_product=null)

	{

		if (isset($id_product)) 

		{

			$data = $this->Products_model->data_products_flag($id_product)->result();

		}

		else

		{

			$data = $this->Products_model->data_products_flag()->result();

		}

		$no = 1;

	//	var_dump($data);

		foreach ($data as $value) {

			if ($value->product_flag==0) 

			{

				$flag = '<a href="'.base_url('Product/flag/'.$value->id_product).'" data-toggle="tooltip" title="Flag" class="btn btn-xs btn-default"><i class="fa fa-flag-o"></i></a>';

			}

			else

			{

				$flag = '<a href="'.base_url('Product/unflag/'.$value->id_product).'" data-toggle="tooltip" title="Unflag" class="btn btn-xs btn-default"><i class="fa fa-flag"></i></a>';

			}

			if ($value->promo==0) 

			{

				$promo = '<a href="javascript:void(0)" class="label label-danger"><i><strike>Promo</strike/></i></a>';

			}

			else

			{

				$promo = '<a href="javascript:void(0)" class="label label-info"><i>Promo</i></a>';

			}

			//echo $value->product_name.' '.$value->product_flag;

			$hasil[] = array(

				'no' => '<p style="text-align:center;">'.$no.'</p>',

				'id_product' =>$value->id_product,

				'product_name' =>$value->product_name,

				'seller_name'=> $value->seller_name,

				'category_name'=> $value->category_name,

				'product_price'=> '<p style="text-align:right;"><i>Rp .'.number_format($value->product_price).'</i></p>',

				'stock'=> '<p style="text-align:center;">'.$value->stock.'</p>',

				'rating'=> '<p style="text-align:center;">'.$value->rating.' Viewers</p>',

				'promo'=> '<p style="text-align:center;">'.$promo.'</p>',

				'discount'=> '<p style="text-align:center;">'.$value->discount.'</p>',

				'link' =>'<p style="text-align:center;">'.$flag.'<p>'

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

   				'parent' =>'Products',

   				'link_parent' =>'Product'

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

	      // base_url('assets/back-end/js/pages/tablesDatatables.js'),

	       base_url('assets/back-end/data/products/dataProducts.js'),

	       base_url('assets/noty/jquery.noty.packaged.min.js'),

	    	base_url('assets/noty/js/noty/packaged/jquery.noty.packaged.min.js'),

	    	base_url('assets/noty/demo/notification_html.js'),

		);

		$this->data['sukses_add_product'] = array(

		   	base_url('assets/notif/products/sukses_add_product.js')

		);



		$this->data['sukses_update_product'] = array(

		   	base_url('assets/notif/products/sukses_update_product.js')

		);

		$this->data['sukses_flag_product'] = array(

		   	base_url('assets/notif/products/sukses_flag_product.js')

		);



		$this->data['sukses_unflag_product'] = array(

		   	base_url('assets/notif/products/sukses_unflag_product.js')

		);



		$this->data['sukses_delete_product'] = array(

		   	base_url('assets/notif/products/sukses_delete_product.js')

		);





		//$this->data['data']=array($data);

		$script = "<script>$(function(){ TablesDatatables.init(); });</script>";



		$this->data['additional'] = array($script);

		$this->_render_page('admin/products/data-products');

	}
	function flag_product()

	{

		$this->data['label'] = array(

				'home' =>'Dashboard',

   				'link_home' =>'Dashboard',

   				'parent' =>'Products',

   				'link_parent' =>'Product'

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

	      // base_url('assets/back-end/js/pages/tablesDatatables.js'),

	       base_url('assets/back-end/data/products/dataProductsFlag.js'),

	       base_url('assets/noty/jquery.noty.packaged.min.js'),

	    	base_url('assets/noty/js/noty/packaged/jquery.noty.packaged.min.js'),

	    	base_url('assets/noty/demo/notification_html.js'),

		);

		$this->data['sukses_add_product'] = array(

		   	base_url('assets/notif/products/sukses_add_product.js')

		);



		$this->data['sukses_update_product'] = array(

		   	base_url('assets/notif/products/sukses_update_product.js')

		);

		$this->data['sukses_flag_product'] = array(

		   	base_url('assets/notif/products/sukses_flag_product.js')

		);



		$this->data['sukses_unflag_product'] = array(

		   	base_url('assets/notif/products/sukses_unflag_product.js')

		);



		$this->data['sukses_delete_product'] = array(

		   	base_url('assets/notif/products/sukses_delete_product.js')

		);





		//$this->data['data']=array($data);

		$script = "<script>$(function(){ TablesDatatables.init(); });</script>";



		$this->data['additional'] = array($script);

		$this->_render_page('admin/products/data-products');

	}

	function add()

	{

		$this->data['label'] = array(

				'home' =>'Dashboard',

   				'link_home' =>'Dashboard',

   				'parent' =>'Products',

   				'link_parent' =>'Product',

   				'sub_parent' => 'Form add products',

   				'link_sub_parent' => 'Product/add'

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

		    base_url('assets/back-end/validasi/validasi-product.js'),

		   	base_url('assets/noty/jquery.noty.packaged.min.js'),

	    	base_url('assets/noty/js/noty/packaged/jquery.noty.packaged.min.js'),

	    	base_url('assets/noty/demo/notification_html.js'),

		);

		$this->data['gagal_add_product'] = array(

		   	base_url('assets/notif/products/gagal_add_product.js')

		);

		$script = "<script>$(function(){ FormsValidation.init(); });</script>";

		$this->data['data_seller'] = $this->Sellers_model->data_sellers()->result();

		$this->data['data_category'] = $this->Categories_model->data_categories()->result();

		$this->data['additional'] = array($script);

		$this->_render_page('admin/products/add-new');

	}

	function proses_add()

	{

		$id_seller = $this->input->post('id_seller');

		$id_category = $this->input->post('id_category');

		$product_name = $this->input->post('product_name');

		$product_price = $this->input->post('product_price');

		$stock = $this->input->post('stock');

		$photo = $this->input->post('photo');

		$promo = $this->input->post('promo');

		$discount = $this->input->post('discount');

		$description = $this->input->post('description');



		$status ="";

		$msg ="";	

		$file_name = 'photo'; 

		//echo $file_name;

		if (empty($this->input->post('product_name'))) {

			$status="Error";

			$msg = "Please Enter Title";

		}

		if ($status != "Error") 

		{

			$config['upload_path'] = 'assets/products/';

			$config['allowed_types'] = 'gif|jpg|png';

			$config['max_size'] = 1024 * 8;

			$config['encrypt_name'] = true;

			$config1['width'] = 1080;

			$config1['height'] = 1440;

			$profile = $this->load->library('Upload',$config);

			$profile = $this->load->library('image_lib',$config1);

			$this->image_lib->resize();
			//echo $img;

			if (!$this->upload->do_upload($file_name)) 

			{

				$status = 'Error';

				$this->session->set_flashdata('invalid_image','invalid_image');

				//	echo "gagal";

				redirect(base_url('Product/add'));

				//echo "Your file not allowed, change your file <br/>";

				//echo "File Type 	: jpg|png|gif";

			}

			else

			{

				$data = $this->upload->data();

				//var_dump($data);

				

				$proses_tambah_data = $this->Products_model->insert($id_seller,$id_category,$product_name,$product_price,$stock,$data['file_name'],$promo,$discount,$description);



				if ($proses_tambah_data) 

				{

					//echo "sukses";

					$this->session->set_flashdata('sukses_add_product','sukses_add_product');

				 	redirect(base_url('Product'));

				}

				else

				{

					$this->session->set_flashdata('gagal_add_product','gagal_add_product');

					//echo "gagal";

				 	redirect(base_url('Product/add'));

				}

			}

			@unlink($_FILES['$file_name']);

		}	

		

	}

	function edit($id_product)

	{

		$this->data['label'] = array(

				'home' =>'Dashboard',

   				'link_home' =>'Dashboard',

   				'parent' =>'Products',

   				'link_parent' =>'Product',

   				'sub_parent' => 'Form edit products',

   				'link_sub_parent' => 'Product/edit/'.$id_product

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

		    base_url('assets/back-end/validasi/validasi-product.js'),

		   	base_url('assets/noty/jquery.noty.packaged.min.js'),

	    	base_url('assets/noty/js/noty/packaged/jquery.noty.packaged.min.js'),

	    	base_url('assets/noty/demo/notification_html.js'),

		);

		$this->data['gagal_update_product'] = array(

		   	base_url('assets/notif/products/gagal_update_product.js')

		);



		$script = "<script>$(function(){ FormsValidation.init(); });</script>";

		$aa = $this->data['data_products'] = $this->Products_model->data_products($id_product)->row();

		$this->data['data_seller'] = $this->Sellers_model->data1_sellers($aa->id_seller)->result();

		$this->data['data_category'] = $this->Categories_model->data1_categories($aa->id_category)->result();

		$this->data['additional'] = array($script);

		$this->_render_page('admin/products/edit');

	}		

	function proses_update($id_product)

	{

		$id_seller = $this->input->post('id_seller');

		$id_category = $this->input->post('id_category');

		$product_name = $this->input->post('product_name');

		$product_price = $this->input->post('product_price');

		$stock = $this->input->post('stock');

		//$photo = $this->input->post('photo');

		$promo = $this->input->post('promo');

		$discount = $this->input->post('discount');

		$description = $this->input->post('description');

		

		$proses_tambah_data = $this->Products_model->update($id_product,$id_seller,$id_category,$product_name,$product_price,$stock,$promo,$discount,$description);

		if ($proses_tambah_data) 

		{

			$this->session->set_flashdata('sukses_update_product','sukses_update_product');

			redirect(base_url('Product'));

		}

		else

		{

			$this->session->set_flashdata('gagal_update_product','gagal_update_product');

			redirect(base_url('Product/edit/'.$id_product));

		}

	}

	function flag($id_product)

	{

		$this->data['label'] = array(

				'home' =>'Dashboard',

   				'link_home' =>'Dashboard',

   				'parent' =>'Products',

   				'link_parent' =>'Product',

   				'sub_parent' => 'Flag confirmation ',

   				'link_sub_parent' => 'Product/flag/'.$id_product

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

		$this->data['gagal_flag_product'] = array(

		   	base_url('assets/notif/products/gagal_flag_product.js')

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

		$this->data['id_product'] = $id_product;

		$this->data['kode_capt'] = $str;



		/// awal code buat validasi

		

		$script = "<script>$(function(){ FormsValidation.init(); });</script>";



		$this->data['additional'] = array($script);

		$this->_render_page('admin/products/flag');

	}

	function unflag($id_product)

	{

		$this->data['label'] = array(

				'home' =>'Dashboard',

   				'link_home' =>'Dashboard',

   				'parent' =>'Products',

   				'link_parent' =>'Product',

   				'sub_parent' => 'Flag confirmation ',

   				'link_sub_parent' => 'Product/unflag/'.$id_product

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

		$this->data['gagal_unflag_product'] = array(

		   	base_url('assets/notif/products/gagal_unflag_product.js')

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

		$this->data['id_product'] = $id_product;

		$this->data['kode_capt'] = $str;



		/// awal code buat validasi

		

		$script = "<script>$(function(){ FormsValidation.init(); });</script>";



		$this->data['additional'] = array($script);

		$this->_render_page('admin/products/unflag');

	}

	function to_flag($id_product)

	{

		$flag = 1;

		$cek = $this->Products_model->flag($id_product,$flag);

		if ($cek) 

		{

			$this->session->set_flashdata('sukses_flag_product','sukses_flag_product');

			redirect(base_url('Product'));

		}

		else

		{

			$this->session->set_flashdata('gagal_flag_product','gagal_flag_product');

			redirect(base_url('Product/flag/'.$id_product));

		}

	}

	function to_unflag($id_product)

	{

		$flag = 0;

		$cek = $this->Products_model->flag($id_product,$flag);

		if ($cek) 

		{

			$this->session->set_flashdata('sukses_unflag_product','sukses_unflag_product');

			redirect(base_url('Product'));

		}

		else

		{

			$this->session->set_flashdata('gagal_unflag_product','gagal_unflag_product');

			redirect(base_url('Product/unflag/'.$id_product));

		}

	}

	function delete($id_product)

	{

		$this->data['label'] = array(

				'home' =>'Dashboard',

   				'link_home' =>'Dashboard',

   				'parent' =>'Products',

   				'link_parent' =>'Product',

   				'sub_parent' => 'Delete confirmation ',

   				'link_sub_parent' => 'Product/delete/'.$id_product

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

		$this->data['gagal_delete_product'] = array(

		   	base_url('assets/notif/products/gagal_delete_product.js')

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

		$this->data['id_product'] = $id_product;

		$this->data['kode_capt'] = $str;



		/// awal code buat validasi

		

		$script = "<script>$(function(){ FormsValidation.init(); });</script>";



		$this->data['additional'] = array($script);

		$this->_render_page('admin/products/delete');

	}

	function to_delete($id_product)

	{

		$cek = $this->Products_model->delete($id_product);

		if ($cek) 

		{

			$this->session->set_flashdata('sukses_delete_product','sukses_delete_product');

			redirect(base_url('Product'));

		}

		else

		{

			$this->session->set_flashdata('gagal_delete_product','gagal_delete_product');

			redirect(base_url('Product/delete/'.$id_product));

		}

	}

	function add_cart($id_product)
	{

		$use_id 	= $this->session->userdata('id_customers');

		$id_product = $id_product;

		$qty 		= 1;

		$cek_data 	= $this->Temp_detail_order->cek_data($use_id,$id_product)->row();

		if ($cek_data)

		{
			$new_qty 	= $cek_data->qty + 1;

			$update_qty =$this->Temp_detail_order->update_qty_order($cek_data->id,$new_qty);

			if ($update_qty)

			{
			
				redirect('Cart');

			}

		}
		else
		{

			$insert 	= $this->Temp_detail_order->insert_product($use_id,$id_product,$qty);

			if ($insert) 

			{

				redirect('Cart');

			}

			else

			{

				redirect(base_url());

			}
		}
		
	}

}

