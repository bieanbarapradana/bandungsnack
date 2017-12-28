<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Profile extends CI_Controller {

	function __construct()

	{

		parent::__construct();

		$this->load->model('Users_model');

		$this->load->model('Users_akses_model');

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

	       	base_url('assets/back-end/js/helpers/gmaps.min.js'),

       		base_url('assets/back-end/js/pages/readyProfile.js'),

	        base_url('assets/noty/jquery.noty.packaged.min.js'),

	    	base_url('assets/noty/js/noty/packaged/jquery.noty.packaged.min.js'),

	    	base_url('assets/noty/demo/notification_html.js'),

		);

		$this->data['sukses_update_users'] = array(

		   	base_url('assets/notif/Users/sukses_update_users.js')

		);

		$script = "<script>$(function(){ ReadyProfile.init(); });</script>";

		$this->data['additional'] = array($script);

		$this->data['data_profile'] = $this->Users_model->data_users_a($this->session->userdata('id_users'))->row();

		$this->_render_page('admin/profile/profile');

	}

	function edit($id_users)

	{



		$this->data['label'] = array(

				'home' =>'Dashboard',

   				'link_home' =>'Dashboard',

   				'parent' =>'Profile',

   				'link_parent' =>'Profile',

   				'sub_parent' => 'Form edit Profile',

   				'link_sub_parent' => 'Profile/edit/'.$id_users

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

		    base_url('assets/back-end/validasi/validasi-user.js'),

		    base_url('assets/noty/jquery.noty.packaged.min.js'),

	    	base_url('assets/noty/js/noty/packaged/jquery.noty.packaged.min.js'),

	    	base_url('assets/noty/demo/notification_html.js'),

		//	base_url('assets/notif/seller/sukses_add_seller.js')



		);

		$this->data['gagal_add_Users'] = array(

		   	base_url('assets/notif/users/gagal_add_users.js')

		);



		if (isset($view)) 

		{

			$this->data['view'] = 1;

			$get_id = $this->data['data_users'] = $this->Users_model->bloked_users($id_users)->row();

		}

		else

		{

			$this->data['view'] = 0;

			$get_id = $this->data['data_users'] = $this->Users_model->data_users_a($id_users)->row();

		}



		$aa = $this->data['akses'] = $this->Users_akses_model->data_users_akses_kecuali_super_admin($get_id->id_user_akses)->result();

	//	var_dump($get_id);

	//	echo $id_users;



		$script = "<script>$(function(){ FormsValidation.init(); });</script>";



		$this->data['additional'] = array($script);

		$this->_render_page('admin/profile/edit');

	}

	function proses_update($id_users,$view=null)

	{

		$username = $this->input->post('username');

		$email = $this->input->post('email');

		$first_name = $this->input->post('first_name');

		$last_name = $this->input->post('last_name');

		//$profile = $this->input->post('profile');

		$aa = $this->data['data_profile'] = $this->Users_model->data_users_a($this->session->userdata('id_users'))->row();

	$id_users_akses = $aa->id_user_akses;



	

		$cek = $this->Users_model->proses_update($id_users,$username,$email,$first_name,$last_name,$id_users_akses);

		if ($cek) 

		{

			$this->session->set_flashdata('sukses_update_users','sukses_update_users');

			redirect(base_url('Profile'));

		}

		else

		{

			$this->session->set_flashdata('gagal_update_users','gagal_update_users');

			redirect(base_url('Profile/edit/'.$id_users));

		}

	}

}

