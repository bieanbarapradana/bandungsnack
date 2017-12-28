<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Seller extends CI_Controller {
	

	function __construct()

	{

		parent::__construct();

		$this->load->model('Sellers_model');

		if (!$this->session->userdata('login_in')) 

		{

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

	function index()

	{

		$this->data['label'] = array(

				'home' =>'Dashboard',

   				'link_home' =>'Dashboard',

   				'parent' =>'Sellers',

   				'link_parent' =>'Seller'

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

	       base_url('assets/back-end/data/sellers/dataSellers.js'),

	         base_url('assets/noty/jquery.noty.packaged.min.js'),

	    	base_url('assets/noty/js/noty/packaged/jquery.noty.packaged.min.js'),

	    	base_url('assets/noty/demo/notification_html.js'),

		);



   	

		

		$this->data['sukses_update_seller'] = array(

		   	base_url('assets/notif/seller/sukses_update_seller.js')

		);

		$this->data['sukses_delete_seller'] = array(

		   	base_url('assets/notif/seller/sukses_delete_seller.js')

		);
			$this->data['sukses_add_seller'] = array(

		   	base_url('assets/notif/seller/sukses_add_seller.js')

		);

		



		//$this->data['data']=array($data);

		$script = "<script>$(function(){ TablesDatatables.init(); });</script>";



		$this->data['additional'] = array($script);

		$this->_render_page('admin/sellers/data-sellers');

	}

	

	function data_seller($id_seller=null)

	{

		if (isset($id_seller)) 

		{

			$data = $this->Sellers_model->data_sellers($id_seller)->result();

		}

		else

		{

			$data = $this->Sellers_model->data_sellers()->result();

		}

		$no = 1;

		foreach ($data as $value) {

			if ($value->flag==0) 

			{

				$flag = '<a href="'.base_url('Seller/flag/'.$value->id_seller).'" data-toggle="tooltip" title="Flag" class="btn btn-xs btn-default"><i class="fa fa-flag-o"></i></a>';

			}

			else

			{

				$flag = '<a href="'.base_url('Seller/unflag/'.$value->id_seller).'" data-toggle="tooltip" title="Unflag" class="btn btn-xs btn-default"><i class="fa fa-flag"></i></a>';

			}

			$hasil[] = array(

				'no' => '<p style="text-align:center;">'.$no.'</p>',

				'id_seller' => 'S0'.$value->id_seller,

				'seller_name'=> $value->seller_name,

				'contact'=> $value->contact,
				'email'=> $value->email,

				'address'=> $value->address,

				'flag'=> '<p style="text-align:center;">'.$flag.'</p>',

				'link' =>'<p style="text-align:center;"><a href="'.base_url('Seller/edit/'.$value->id_seller).'" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a><a href="'.base_url('Seller/delete/'.$value->id_seller).'" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a></p>'

			);

		$no++;

		}

		header('Content-Type: application/json');

		echo '{ "data":', json_encode($hasil),'}';

	}

	

	function add()

	{

		$this->data['label'] = array(

				'home' =>'Dashboard',

   				'link_home' =>'Dashboard',

   				'parent' =>'Sellers',

   				'link_parent' =>'Seller',

   				'sub_parent' => 'Form add seller',

   				'link_sub_parent' => 'Seller/add'

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

		    base_url('assets/back-end/js/pages/formsValidation.js'),

		    base_url('assets/noty/jquery.noty.packaged.min.js'),

	    	base_url('assets/noty/js/noty/packaged/jquery.noty.packaged.min.js'),

	    	base_url('assets/noty/demo/notification_html.js'),

		//	base_url('assets/notif/seller/sukses_add_seller.js')



		);

		$this->data['gagal_add_seller'] = array(

		   	base_url('assets/notif/seller/gagal_add_seller.js')

		);

		$script = "<script>$(function(){ FormsValidation.init(); });</script>";



		$this->data['additional'] = array($script);

		$this->_render_page('admin/sellers/add-new');

	}

	function add_data()

	{

		$seller_name = $this->input->post('seller_name');

		$contact = $this->input->post('contact');
		$email = $this->input->post('email');

		$address = $this->input->post('address');

		$flag = 0;



		$hasil = $this->Sellers_model->insert_data($seller_name,$contact,$email,$address,$flag);

		if ($hasil) 

		{

			//echo "sukses";

			$this->session->set_flashdata('sukses_add_seller','sukses_add_seller');

			redirect(base_url('Seller'));

		}

		else

		{

			$this->session->set_flashdata('gagal_add_seller','gagal_add_seller');
			//echo "gagal";
			redirect(base_url('Seller/add'));

		}

	}

	function delete($id_seller)

	{

		$this->data['label'] = array(

				'home' =>'Dashboard',

   				'link_home' =>'Dashboard',

   				'parent' =>'Sellers',

   				'link_parent' =>'Seller',

   				'sub_parent' => 'Delete Confirmation',

   				'link_sub_parent' => 'Seller/delete/'.$id_seller

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

		$this->data['gagal_delete_seller'] = array(

		   	base_url('assets/notif/seller/gagal_delete_seller.js')

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

		$this->data['id_seller'] = $id_seller;

		$this->data['kode_capt'] = $str;



		/// awal code buat validasi

		

		$script = "<script>$(function(){ FormsValidation.init(); });</script>";



		$this->data['additional'] = array($script);

		$this->_render_page('admin/sellers/delete');

	}

	function to_delete($id_seller)

	{

		$cek = $this->Sellers_model->delete($id_seller);

		if ($cek) 

		{

			$this->session->set_flashdata('sukses_delete_seller','sukses_delete_seller');

			redirect(base_url('Seller'));

		}

		else

		{

			$this->session->set_flashdata('gagal_delete_seller','gagal_delete_seller');

			redirect(base_url('Seller/delete/'.$id_seller));

		}

	}

	function edit($id_seller)

	{

		$this->data['label'] = array(

				'home' =>'Dashboard',

   				'link_home' =>'Dashboard',

   				'parent' =>'Sellers',

   				'link_parent' =>'Seller',

   				'sub_parent' => 'Form edit seller',

   				'link_sub_parent' => 'Seller/edit/'.$id_seller

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

		    base_url('assets/back-end/js/pages/formsValidation.js'),

		    base_url('assets/noty/jquery.noty.packaged.min.js'),

	    	base_url('assets/noty/js/noty/packaged/jquery.noty.packaged.min.js'),

	    	base_url('assets/noty/demo/notification_html.js'),

		);

		$this->data['gagal_update_seller'] = array(

		   	base_url('assets/notif/seller/gagal_update_seller.js')

		);

		$script = "<script>$(function(){ FormsValidation.init(); });</script>";



		$this->data['additional'] = array($script);



		$this->data['data_sellers'] = $this->Sellers_model->data_sellers($id_seller)->row();



		$this->_render_page('admin/sellers/edit');

	}

	function update($id_seller)

	{

		$seller_name = $this->input->post('seller_name');

		$contact = $this->input->post('contact');
		$email = $this->input->post('email');

		$address = $this->input->post('address');



		$cek =  $this->Sellers_model->update_data($id_seller,$seller_name,$contact,$address);

		if ($cek) 

		{

			$this->session->set_flashdata('sukses_update_seller','sukses_update_seller');

			redirect(base_url('Seller'));

		}

		else

		{

			$this->session->set_flashdata('gagal_update_seller','gagal_update_seller');

			redirect(base_url('Seller/edit/'.$id_seller));

		}

	}

}

