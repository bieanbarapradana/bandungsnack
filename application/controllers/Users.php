<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
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
	function data_users($id_users=null)
	{
		if (isset($id_users)) 
		{
			$data = $this->Users_model->data_users($id_users)->result();
		}
		else
		{
			$data = $this->Users_model->data_users()->result();
		}
		$no = 1;
		foreach ($data as $value) {
			if ($value->flag==0) 
			{
				$flag = '<a href="'.base_url('Users/flag/'.$value->id_users).'" data-toggle="tooltip" title="Flag" class="btn btn-xs btn-default"><i class="fa fa-flag-o"></i></a>';
			}
			else
			{
				$flag = '<a href="'.base_url('Users/unflag/'.$value->id_users).'" data-toggle="tooltip" title="Unflag" class="btn btn-xs btn-default"><i class="fa fa-flag"></i></a>';
			}
			$hasil[] = array(
				'no' => '<p style="text-align:center;">'.$no.'</i>',
				'id_users' =>$value->id_users,
				'username'=> $value->username,
				'full_name'=> $value->first_name.' '.$value->last_name,
				'akses'=> $value->label,
				'link' =>'<p style="text-align:center;"><a href="'.base_url('Users/edit/'.$value->id_users).'" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a><a href="'.base_url('Users/delete/'.$value->id_users).'" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>'.$flag.'</p>'
			);
		$no++;
		}
		header('Content-Type: application/json');
		echo '{ "data":', json_encode($hasil),'}';
	}
	function bloked_users($id_users=null)
	{
		if (isset($id_users)) 
		{
			$data = $this->Users_model->bloked_users($id_users)->result();
		}
		else
		{
			$data = $this->Users_model->bloked_users()->result();
		}
		$no = 1;
		foreach ($data as $value) {
			if ($value->flag==0) 
			{
				$flag = '<a href="'.base_url('Users/flag/'.$value->id_users).'" data-toggle="tooltip" title="Flag" class="btn btn-xs btn-default"><i class="fa fa-flag-o"></i></a>';
			}
			else
			{
				$flag = '<a href="'.base_url('Users/unflag/'.$value->id_users).'" data-toggle="tooltip" title="Unflag" class="btn btn-xs btn-default"><i class="fa fa-flag"></i></a>';
			}
			$hasil[] = array(
				'no' => '<p style="text-align:center;">'.$no.'</i>',
				'id_users' =>$value->id_users,
				'username'=> $value->username,
				'full_name'=> $value->first_name.' '.$value->last_name,
				'akses'=> $value->label,
				'link' =>'<p style="text-align:center;"><a href="'.base_url('Users/edit/'.$value->id_users.'/bloked').'" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a><a href="'.base_url('Users/delete/'.$value->id_users.'/bloked').'" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>'.$flag.'</p>'
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
   				'parent' =>'Users',
   				'link_parent' =>'Users'
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
	       base_url('assets/back-end/data/users/dataUsers.js'),
	         base_url('assets/noty/jquery.noty.packaged.min.js'),
	    	base_url('assets/noty/js/noty/packaged/jquery.noty.packaged.min.js'),
	    	base_url('assets/noty/demo/notification_html.js'),
		);
		$this->data['sukses_add_users'] = array(
		   	base_url('assets/notif/users/sukses_add_users.js')
		);
		$this->data['sukses_update_users'] = array(
		   	base_url('assets/notif/Users/sukses_update_users.js')
		);
		
		$this->data['sukses_delete_user'] = array(
		   	base_url('assets/notif/users/sukses_delete_user.js')
		);
		$this->data['sukses_flag_user'] = array(
		   	base_url('assets/notif/users/sukses_flag_user.js')
		);
		//$this->data['data']=array($data);
		$script = "<script>$(function(){ TablesDatatables.init(); });</script>";

		$this->data['additional'] = array($script);
		$this->_render_page('admin/users/data-users');
	}
	function bloked()
	{
		$this->data['label'] = array(
				'home' =>'Dashboard',
   				'link_home' =>'Dashboard',
   				'parent' =>'Users',
   				'link_parent' =>'Users'
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
	       base_url('assets/back-end/data/users/dataBlokedUsers.js'),
	         base_url('assets/noty/jquery.noty.packaged.min.js'),
	    	base_url('assets/noty/js/noty/packaged/jquery.noty.packaged.min.js'),
	    	base_url('assets/noty/demo/notification_html.js'),
		);
		$this->data['sukses_add_users'] = array(
		   	base_url('assets/notif/users/sukses_add_users.js')
		);
		$this->data['sukses_update_users'] = array(
		   	base_url('assets/notif/Users/sukses_update_users.js')
		);
		
		$this->data['sukses_delete_user'] = array(
		   	base_url('assets/notif/users/sukses_delete_user.js')
		);
		$this->data['sukses_unflag_user'] = array(
		   	base_url('assets/notif/users/sukses_unflag_user.js')
		);
		//$this->data['data']=array($data);
		$script = "<script>$(function(){ TablesDatatables.init(); });</script>";

		$this->data['additional'] = array($script);
		$this->_render_page('admin/users/data-bloked-users');
	}
	function add()
	{
		$this->data['label'] = array(
				'home' =>'Dashboard',
   				'link_home' =>'Dashboard',
   				'parent' =>'Users',
   				'link_parent' =>'Users',
   				'sub_parent' => 'Form add Users',
   				'link_sub_parent' => 'Users/add'
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
		$this->data['invalid_image'] = array(
		   	base_url('assets/notif/users/invalid_image.js')
		);


		$aa = $this->data['akses'] = $this->Users_akses_model->data_users_akses_kecuali_super_admin()->result();
		//var_dump($aa);
		$script = "<script>$(function(){ FormsValidation.init(); });</script>";

		$this->data['additional'] = array($script);
		$this->_render_page('admin/users/add-new');
	}
	function proses_add()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$email = $this->input->post('email');
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		//$profile = $this->input->post('profile');
		$id_users_akses = $this->input->post('example_chosen');
		//echo $id_users_akses;
		$activation_code = 'null';
		$flag =0;
		//////// upload foto 
		$status ="";
		$msg ="";	
		$file_name = 'profile'; 
		//echo $file_name;

		if (empty($this->input->post('username'))) {
			$status="Error";
			$msg = "Please Enter Title";
		}
		if ($status != "Error") 
		{
			$config['upload_path'] = 'assets/profile/admin/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = 1024 * 8;
			$config['encrypt_name'] = true;

			$profile = $this->load->library('Upload',$config);
			//echo $img;
			if (!$this->upload->do_upload($file_name)) 
			{
				$status = 'Error';
				$this->session->set_flashdata('invalid_image','invalid_image');
				//	echo "gagal";
				redirect(base_url('Users/add'));
				//echo "Your file not allowed, change your file <br/>";
				//echo "File Type 	: jpg|png|gif";
			}
			else
			{
				$data = $this->upload->data();
				//var_dump($data);
				
				$proses_tambah_data = $this->Users_model->insert($id_users_akses,$username,$password,$email,$first_name,$last_name,$data['file_name'],$activation_code,$flag);

				if ($proses_tambah_data) 
				{
					//echo "sukses";
					$this->session->set_flashdata('sukses_add_users','sukses_add_users');
				 	redirect(base_url('Users'));
				}
				else
				{
					$this->session->set_flashdata('gagal_add_users','gagal_add_users');
				//	echo "gagal";
				 	redirect(base_url('Users/add'));
				}
	
			
			}
			@unlink($_FILES['$file_name']);
		}	
		
	}
	function edit($id_users,$view=null)
	{
		$this->data['label'] = array(
				'home' =>'Dashboard',
   				'link_home' =>'Dashboard',
   				'parent' =>'Users',
   				'link_parent' =>'Users',
   				'sub_parent' => 'Form edit Users',
   				'link_sub_parent' => 'Users/edit/'.$id_users
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
			$get_id = $this->data['data_users'] = $this->Users_model->data_users($id_users)->row();
		}

		$aa = $this->data['akses'] = $this->Users_akses_model->data_users_akses_kecuali_super_admin($get_id->id_user_akses)->result();
	//	var_dump($get_id);
	//	echo $id_users;

		$script = "<script>$(function(){ FormsValidation.init(); });</script>";

		$this->data['additional'] = array($script);
		$this->_render_page('admin/users/edit');
	}
	function proses_update($id_users,$view=null)
	{
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		//$profile = $this->input->post('profile');
		$id_users_akses = $this->input->post('example_chosen');

		$cek = $this->Users_model->proses_update($id_users,$username,$email,$first_name,$last_name,$id_users_akses);
		if ($cek) 
		{
			$this->session->set_flashdata('sukses_update_users','sukses_update_users');
			if (isset($view)) 
			{
				redirect(base_url('Users/bloked'));
			}
			else
			{
				redirect(base_url('Users'));
			}
		}
		else
		{
			$this->session->set_flashdata('gagal_update_users','gagal_update_users');
			redirect(base_url('Users/edit/'.$id_users));
		}
	}
	function flag($id_users)
	{
		$this->data['label'] = array(
				'home' =>'Dashboard',
   				'link_home' =>'Dashboard',
   				'parent' =>'Users',
   				'link_parent' =>'Users',
   				'sub_parent' => 'Flag Confirmation',
   				'link_sub_parent' => 'Users/flag/'.$id_users
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
		$this->data['gagal_flag_user'] = array(
		   	base_url('assets/notif/seller/gagal_flag_user.js')
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
		$this->data['id_users'] = $id_users;
		$this->data['kode_capt'] = $str;

		/// awal code buat validasi
		
		$script = "<script>$(function(){ FormsValidation.init(); });</script>";

		$this->data['additional'] = array($script);
		$this->_render_page('admin/users/flag');
	}
	function to_flag($id_users)
	{
		$cek = $this->Users_model->flag($id_users);
		if ($cek) 
		{
			$this->session->set_flashdata('sukses_flag_user','sukses_flag_user');
			redirect(base_url('Users'));
		}
		else
		{
			$this->session->set_flashdata('gagal_flag_user','gagal_flag_user');
			redirect(base_url('Users/flag/'.$id_users));
		}
	}
	function unflag($id_users)
	{
		$this->data['label'] = array(
				'home' =>'Dashboard',
   				'link_home' =>'Dashboard',
   				'parent' =>'Users',
   				'link_parent' =>'Users',
   				'sub_parent' => 'Unflag Confirmation',
   				'link_sub_parent' => 'Users/unflag/'.$id_users
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
		$this->data['gagal_unflag_user'] = array(
		   	base_url('assets/notif/seller/gagal_unflag_user.js')
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
		$this->data['id_users'] = $id_users;
		$this->data['kode_capt'] = $str;

		/// awal code buat validasi
		
		$script = "<script>$(function(){ FormsValidation.init(); });</script>";

		$this->data['additional'] = array($script);
		$this->_render_page('admin/users/unflag');
	}
	
	function to_unflag($id_users)
	{
		$cek = $this->Users_model->unflag($id_users);
		if ($cek) 
		{
			$this->session->set_flashdata('sukses_unflag_user','sukses_unflag_user');
			redirect(base_url('Users/bloked'));
		}
		else
		{
			$this->session->set_flashdata('gagal_unflag_user','gagal_unflag_user');
			redirect(base_url('Users/flag/'.$id_users));
		}
	}
	function delete($id_users,$view=null)
	{
		if (isset($view)) 
   		{
   			$aaa ='Users/delete/'.$id_users.'/bloked';
   		}
   		else
   		{
   			$aaa ='Users/delete/'.$id_users;
   		}
		$this->data['label'] = array(
				'home' =>'Dashboard',
   				'link_home' =>'Dashboard',
   				'parent' =>'Users',
   				'link_parent' =>'Users',
   				'sub_parent' => 'Delete Confirmation',
   				'link_sub_parent' =>$aaa
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
		$this->data['gagal_delete_user'] = array(
		   	base_url('assets/notif/seller/gagal_delete_user.js')
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
		$this->data['id_users'] = $id_users;
		$this->data['kode_capt'] = $str;

		if (isset($view)) 
		{
			$this->data['view'] = 1;
		}
		else
		{
			$this->data['view'] = 0;
		}
		/// awal code buat validasi
		
		$script = "<script>$(function(){ FormsValidation.init(); });</script>";

		$this->data['additional'] = array($script);
		$this->_render_page('admin/users/delete');
	}
	function to_delete($id_users,$view=null)
	{
		$cek = $this->Users_model->delete($id_users);
		if ($cek) 
		{
			$this->session->set_flashdata('sukses_delete_user','sukses_delete_user');
			if (isset($view))
			{
				redirect(base_url('Users/bloked'));
			}
			else
			{
				redirect(base_url('Users'));
			}
		}
		else
		{
			$this->session->set_flashdata('gagal_delete_user','gagal_delete_user');
			if (isset($view))
			{
				redirect(base_url('Users/bloked'));
			}
			else
			{
				redirect(base_url('Users'));
			}
		}
	}
}
