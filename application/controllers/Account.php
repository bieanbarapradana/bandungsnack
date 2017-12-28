<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {
	
	function __construct()
	
	{

		parent::__construct();

		$this->load->model('Products_model');
		
		$this->load->model('Custommers_model');

		$this->load->model('Sellers_model');

		$this->load->model('Temp_detail_order');

		$this->load->model('Pemberitahuan_model');

		
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

  			base_url('assets/back-end/css/bootstrap.min.css'),

	        base_url('assets/front-end/css/normalize.css'),

			base_url('assets/front-end/css/bootstrap.css'),

			base_url('assets/front-end/css/iview.css'),

			base_url('assets/front-end/css/menu3d.css'),

			base_url('assets/front-end/css/animate.css'),

			base_url('assets/front-end/css/custom.css'),

			base_url('assets/front-end/css/style-switch.css'),

			base_url('assets/front-end/css/color.css'),

		base_url('assets/front-end/css/upload/component.css'),

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

			base_url('assets/front-end/js/custom-file-input.js'),
			 base_url('assets/noty/jquery.noty.packaged.min.js'),

	    	base_url('assets/noty/js/noty/packaged/jquery.noty.packaged.min.js'),

	    	base_url('assets/noty/demo/notification_html.js'),


		 //  	base_url('assets/notif/account/update_password_gagal.js'),

		);
		
		$this->data['invalid_image'] = array(

		   	base_url('assets/notif/account/invalid_image.js')

		);
		$this->data['sukses_update_foto_profile'] = array(

		   	base_url('assets/notif/account/sukses_update_foto_profile.js')

		);
		$this->data['gagal_update_foto_profile'] = array(

		   	base_url('assets/notif/account/gagal_update_foto_profile.js')

		);
		$this->data['password_lama_tidak_sama'] = array(

		   	base_url('assets/notif/account/password_lama_tidak_sama.js')

		);
		$this->data['update_password_sukses'] = array(

		   	base_url('assets/notif/account/update_password_sukses.js')

		);

		$this->data['update_password_gagal'] = array(

		   	base_url('assets/notif/account/update_password_gagal.js')

		);

		$this->data['used_email'] = array(

		   	base_url('assets/notif/registrasi/used_email.js')

		);

		$this->data['sukses_change_email'] = array(

		   	base_url('assets/notif/account/sukses_change_email.js')

		);

		$this->data['gagal_change_email'] = array(

		   	base_url('assets/notif/account/gagal_change_email.js')

		);
		$this->data['tidak_ada_perubahan_email'] = array(

		   	base_url('assets/notif/account/tidak_ada_perubahan_email.js')

		);
		$this->data['update_data_customer_sukses'] = array(

		   	base_url('assets/notif/account/update_data_customer_sukses.js')

		);
		$this->data['update_data_customer_gagal'] = array(

		   	base_url('assets/notif/account/update_data_customer_gagal.js')

		);
		$this->data['update_pemberitahuan_sukses'] = array(

		   	base_url('assets/notif/account/update_pemberitahuan_sukses.js')

		);
		$this->data['update_pemberitahuan_gagal'] = array(

		   	base_url('assets/notif/account/update_pemberitahuan_gagal.js')

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

			          old_password: { 

			            required : true, 

			          },

			          password: { 

			          	required: true,

			          },

			          re_password: { 

			          	equalTo: \"#password\"

			          }

			        },
			        messages: {

			         	old_password: 

	                    {

	                        required: 'Masukkan Username anda',

	                    },

	                    password: 

	                    {

	                        required: 'Masukkan Password Anda',

	                    },

	                    re_password: 

	                    {

	                        required: 'Ulangi Password anda',

	                        equalTo:'Password Tidak Sama'

	                    }

			        }

			     });

			    })($);

			  </script>
			  <script>

		    (function($){

		       jQuery.validator.setDefaults({

		      errorPlacement: function(error, element) {

		        error.appendTo('#invalid-' + element.attr('id'));

		      }

		    });

		       $(\"#validasi-change_email\").validate({

		           	rules: {

			          email: { 

			            required : true,
			            email:true 

			          }

			        },
			        messages: {

			         	email: 

	                    {

	                        required: 'Masukkan Email  anda',

	                    }

			        }

			     });

			    })($);

			  </script>
			  ";

		$this->data['validasi'] = array($validasi);

		$this->data['data_account'] = $this->Custommers_model->data_customers($this->session->userdata('id_customers'))->row(); 
		$this->data['pemberitahuan'] = $this->Pemberitahuan_model->data_pemberitahuan($this->session->userdata('id_customers'))->row();
				$this->data['paling_laris'] = $this->Products_model->_paling_terlaris()->row(); 
		$this->data['list_terlaris'] = $this->Products_model->_list_terlaris()->result(); 

		$tampilan_view[] = 'front-end/account/info';

		$this->_render_page($tampilan_view);

	}
	function change_pic_profile()
	{

		$_FILES['file']['type'] = $this->input->post('photo'); 
	//	var_dump($_FILES);
	//	echo $_FILES['photo']['name'];
		$status ="";

		$msg ="";	

		$file_name = 'photo'; 

	//	echo $photo;

		
		if (empty( $_FILES['photo']['name'])) {

			$status="Error";

			$msg = "Please Enter Title";

		}

		if ($status != "Error") 

		{

			$config['upload_path'] = 'assets/profile/cust/';

			$config['allowed_types'] = 'gif|jpg|png';

			$config['max_size'] = 1024 * 50;

			$config['encrypt_name'] = true;


			$this->load->library('Upload',$config);


			if (!$this->upload->do_upload($file_name)) 

			{

				$status = 'Error';

				$this->session->set_flashdata('invalid_image','invalid_image');

				redirect(base_url('Account'));


			}

			else

			{

				$data = $this->upload->data();

				//var_dump($data);

				
				$get_image = $this->Custommers_model->data_customers($this->session->userdata('id_customers'))->row();
					
					unlink('assets/profile/cust/'.$get_image->profile);

				$update_profile = $this->Custommers_model->ganti_profile($this->session->userdata('id_customers'),$data['file_name']);



				if ($update_profile) 

				{


					$this->session->set_flashdata('sukses_update_foto_profile','sukses_update_foto_profile');

					redirect(base_url('Account'));

				}

				else

				{

					$this->session->set_flashdata('gagal_update_foto_profile','gagal_update_foto_profile');

					redirect(base_url('Account'));

				}

			}

			@unlink($_FILES['$file_name']);

		}	
		

		
	}
	function change_password()
	{
		$get_old_password = $this->Custommers_model->data_customers($this->session->userdata('id_customers'))->row();

		//var_dump($get_old_password);
		$old_password = md5($this->input->post('old_password'));
		$password_new = md5($this->input->post('password'));
		//echo $old_password.' '.$get_old_password->password;
		
		if ($old_password==$get_old_password->password) 
		{
			$update_password = $this->Custommers_model->update_password($this->session->userdata('id_customers'),$password_new);
			if ($update_password) 
			{
			//	echo "sukses";
				$this->session->set_flashdata('update_password_sukses','update_password_sukses');
				redirect(base_url('Account'));
			}
			else
			{
				$this->session->set_flashdata('update_password_gagal','update_password_gagal');
				redirect(base_url('Account'));
				//echo "ggal";

			}
			
			//echo "Sama";
		}
		else
		{
			//echo "ggassl";

			$this->session->set_flashdata('password_lama_tidak_sama','password_lama_tidak_sama');
			redirect(base_url('Account'));
		}
		
	}
	function change_email()
	{
		$email = $this->input->post('email');

		$cek_kesamaan_email = $this->Custommers_model->data_customers($this->session->userdata('id_customers'))->row();

		if ($email == $cek_kesamaan_email->email) 
		{
			$this->session->set_flashdata('tidak_ada_perubahan_email','tidak_ada_perubahan_email');
			redirect(base_url('Account'));
		}
		else
		{

			$cek_email = $this->Custommers_model->cek_email($email)->row();

			if ($cek_email) 
			{
				$this->session->set_flashdata('used_email','used_email');
				redirect(base_url('Account'));
			}
			else
			{
				$update_email = $this->Custommers_model->change_email($this->session->userdata('id_customers'),$email);
				if ($update_email) 
				{
					$this->session->set_flashdata('sukses_change_email','sukses_change_email');
					redirect(base_url('Account'));
				}
				else
				{
					$this->session->set_flashdata('gagal_change_email','gagal_change_email');
					redirect(base_url('Account'));
				}
			}
		}
	}
	function update_data()
	{
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$contact = $this->input->post('contact');
		$address = $this->input->post('address');
		$update_data = $this->Custommers_model->update_data($this->session->userdata('id_customers'),$first_name,$last_name,$contact,$address);
		
		if ($update_data) 
		{
			$this->session->set_flashdata('update_data_customer_sukses','update_data_customer_sukses');
			redirect(base_url('Account'));
		}
		else
		{
		//	echo "gagal_change_email";
			$this->session->set_flashdata('update_data_customer_gagal','update_data_customer_gagal');
			redirect(base_url('Account'));
		}
	}
	function pemberitahuan_update()
	{
		$new_product = $this->input->post('new_product');
		$promo = $this->input->post('promo');
		$discount = $this->input->post('discount');


		$update_pemberitahuan = $this->Pemberitahuan_model->update_data_pemberitahuan($new_product,$promo,$discount);
		
		if ($update_pemberitahuan) 
		{
			//echo "suses";
			$this->session->set_flashdata('update_pemberitahuan_sukses','update_pemberitahuan_sukses');
			redirect(base_url('Account'));
		}
		else
		{
			//echo "ggsuses";
			$this->session->set_flashdata('update_pemberitahuan_gagal','update_pemberitahuan_gagal');
			redirect(base_url('Account'));
		}
		//echo 
		//$new_product = $this->input->post('new_product');
	}

}

