<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Paket extends CI_Controller {

	function __construct()

	{

		parent::__construct();

		$this->load->model('Categories_model');

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

	function data_categories($id_category=null)

	{

		if (isset($id_category)) 

		{

			$data = $this->Categories_model->data_categories($id_category)->result();

		}

		else

		{

			$data = $this->Categories_model->data_categories()->result();

		}

		$no = 1;

		foreach ($data as $value) {

			$hasil[] = array(

				'no' => '<p style="text-align:center;">'.$no.'</i>',

				'id_category' =>'C0001'.$value->id_category,

				'category_name'=> $value->category_name,

				'description'=> $value->description,

				'link' =>'<p style="text-align:center;"><a href="'.base_url('Categories/edit/'.$value->id_category).'" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a><a href="'.base_url('Categories/delete/'.$value->id_category).'" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a></p>'

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

   				'parent' =>'Categories',

   				'link_parent' =>'Categories'

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

	       base_url('assets/back-end/data/categories/dataCategories.js'),

	         base_url('assets/noty/jquery.noty.packaged.min.js'),

	    	base_url('assets/noty/js/noty/packaged/jquery.noty.packaged.min.js'),

	    	base_url('assets/noty/demo/notification_html.js'),

		);

		$this->data['sukses_add_categories'] = array(

		   	base_url('assets/notif/categories/sukses_add_categories.js')

		);

		$this->data['sukses_update_categories'] = array(

		   	base_url('assets/notif/categories/sukses_update_categories.js')

		);

		

		$this->data['sukses_delete_categories'] = array(

		   	base_url('assets/notif/categories/sukses_delete_categories.js')

		);

		//$this->data['data']=array($data);

		$script = "<script>$(function(){ TablesDatatables.init(); });</script>";



		$this->data['additional'] = array($script);

		$this->_render_page('admin/categories/data-categories');

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

	function edit($id_category)

	{

		$this->data['label'] = array(

				'home' =>'Dashboard',

   				'link_home' =>'Dashboard',

   				'parent' =>'Categories',

   				'link_parent' =>'Categories',

   				'sub_parent' => 'Form edit Categories',

   				'link_sub_parent' => 'Categories/edit/'.$id_category

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

		$this->data['data_categories'] = $this->Categories_model->data_categories($id_category)->row();

		$this->data['additional'] = array($script);

		$this->_render_page('admin/categories/edit');

	}

	function proses_update($id_category)

	{

		$category_name = $this->input->post('category_name');

		$description = $this->input->post('deskripsi');



		$cek = $this->Categories_model->proses_update($id_category,$category_name,$description);

		if ($cek) 

		{

			$this->session->set_flashdata('sukses_update_categories','sukses_update_categories');

			redirect(base_url('Categories'));

		}

		else

		{

			$this->session->set_flashdata('gagal_update_categories','gagal_update_categories');

			redirect(base_url('Categories/edit/'.$id_category));

		}

	}

	function delete($id_category)

	{

		$this->data['label'] = array(

				'home' =>'Dashboard',

   				'link_home' =>'Dashboard',

   				'parent' =>'Categories',

   				'link_parent' =>'Categories',

   				'sub_parent' => 'Delete Confirmation',

   				'link_sub_parent' => 'Categories/delete/'.$id_category

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

		$this->data['id_category'] = $id_category;

		$this->data['kode_capt'] = $str;



		/// awal code buat validasi

		

		$script = "<script>$(function(){ FormsValidation.init(); });</script>";



		$this->data['additional'] = array($script);

		$this->_render_page('admin/categories/delete');

	}

	function proses_delete($id_category)

	{

		$cek = $this->Categories_model->proses_delete($id_category);

		if ($cek) 

		{

			$this->session->set_flashdata('sukses_delete_categories','sukses_delete_categories');

			redirect(base_url('Categories'));

		}

		else

		{

			$this->session->set_flashdata('gagal_delete_categories','gagal_delete_categories');

			redirect(base_url('Categories/delete/'.$id_category));

		}

	}

}

