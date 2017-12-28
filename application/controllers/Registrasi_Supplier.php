<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Registrasi_Supplier extends CI_Controller {
	
	function __construct()
	
	{

		parent::__construct();

		$this->load->model('Products_model');
		
		$this->load->model('Sellers_model');

		$this->load->model('Pemberitahuan_model');

		$this->load->model('Custommers_model');

		if ($this->session->userdata('login_in_customer')) 

		{

			redirect(base_url());

		}

		else

		{

			

		}
		
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

		  // 	base_url('assets/notif/registrasi/coba.js')

		);

		$this->data['used_email'] = array(

		   	base_url('assets/notif/registrasi/used_email.js')

		);

		$this->data['used_username'] = array(

		   	base_url('assets/notif/registrasi/used_username.js')

		);


		$this->data['gagal_registrasi'] = array(

		   	base_url('assets/notif/auth/gagal_registrasi.js')

		);

		/// awal code buat validasi
		$validasi = "
			<script>

		    (function($){

		       jQuery.validator.setDefaults({

		      errorPlacement: function(error, element) {

		        error.appendTo('#invalid-' + element.attr('id'));

		      }

		    });

		       $(\"#validasi-registrasi\").validate({

		           	rules: {

			          username: { 

			            required : true, 

			          },

			          password: { 

			          	required: true,

			          },

			          re_password: { 

			          	equalTo: \"#password\"

			          },

			          first_name: { 

			          	required: true,

			          },

			          last_name: { 

			          	required: true,

			          },

			          email: { 

			          	required: true,

			          	email:true,

			          },

			          contact: { 

			          	required: true,

			          	number:true,

			          },

			          address: { 

			          	required: true,

			          }

			        },
			        messages: {

			         	username: 

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

	                    },

	                    first_name: 

	                    {

	                        required: 'Masukkan nama depan anda',

	                    },

	                    last_name: 

	                    {

	                        required: 'Masukkan nama belakang Anda',

	                    },

	                    email: 

	                    {

	                        required: 'Masukkan Password Anda',

	                    },

	                    contact: 

	                    {

	                        required: 'Masukkan nomer telp Anda',

	                    },

	                    address: 

	                    {

	                        required: 'Masukkan alamat Anda',

	                    }      

			        }

			     });

			    })($);

			  </script>";

		$this->data['validasi'] = array($validasi);

		$this->data['promo_spesial_1'] = $this->Products_model->_promo_spesial()->row(); 

		$this->data['promo_spesial_2'] = $this->Products_model->_promo_spesial_2()->row(); 

		$this->data['new_product'] = $this->Products_model->_new_product()->row(); 

		$this->data['data_product_atas'] = $this->Products_model->__product_atas()->result(); 

		$this->data['total_barang_promo'] = $this->Products_model->total_barang_promo()->row();

			$this->data['paling_laris'] = $this->Products_model->_paling_terlaris()->row(); 
		$this->data['list_terlaris'] = $this->Products_model->_list_terlaris()->result(); 
		$tengah[]='front-end/registrasi/content-registrasi_supplier';
		$tengah[]='front-end/home/content-tengah';
		$this->_render_page($tengah);
		

	}
	/*function coba()
	{
		$get_id_customers = $this->Custommers_model->get_id_customer()->row();
        	if ($get_id_customers!=null) 
        	{
        		$id_cust = 1;
        	}
        	else
        	{
        		$id_cust = $get_id_customers->id_customers +1;
        	}
        	echo $get_id_customers->id_customers;
        	//echo $id_cust;
        	//var_dump($get_id_customers);

	}*/
	function daftar()

	{

		$first_name 		= $this->input->post('first_name');

		$last_name 			= $this->input->post('last_name');

		$username 			= $this->input->post('username');

		$password 			= md5($this->input->post('password'));

		$email 				= $this->input->post('email');

		$address			= $this->input->post('address');

		$contact 			= $this->input->post('contact');

		$chars				= "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        
        $active_code		= substr( str_shuffle( $chars ), 0, 10 );

        
        $cek_username = $this->Custommers_model->cek_username($username)->row();
        if ($cek_username) 
        {
        	$data = array

			(
				'username' 			=> $username,

				'email' 			=> $email,

				'first_name' 		=> $first_name,

				'last_name' 		=> $last_name,

				'contact' 			=> $contact,

				'address' 			=> $address

			);

			$this->session->set_flashdata($data);

			$this->session->set_flashdata('used_username','used_username');
			
			redirect(base_url('Registrasi'));
        }
        else
        {

        

        $cek_email 			= $this->Custommers_model->cek_email($email)->row();

        if ($cek_email) 


        {

			$data = array

			(
				'username' 			=> $username,

				'email' 			=> $email,

				'first_name' 		=> $first_name,

				'last_name' 		=> $last_name,

				'contact' 			=> $contact,

				'address' 			=> $address

			);

			$this->session->set_flashdata($data);

			$this->session->set_flashdata('used_email','used_email');
			
			redirect(base_url('Registrasi'));

        }

        else

        {
        	$get_id_customers = $this->Custommers_model->get_id_customer()->row();
        	if ($get_id_customers==null) 
        	{
        		$id_cust = 1;
        	}
        	else
        	{
        		$id_cust = $get_id_customers->id_customers +1;
        	}

			$hasil 				= $this->Custommers_model->daftar($id_cust,$first_name,$last_name,$username,$password,$email,$address,$contact,$active_code);


			if ($hasil) 

			{
				$insert_pemberitahuan = $this->Pemberitahuan_model->tambah_pemberitahuan($id_cust);
				/*
			$this->load->helper(array('form', 'url'));
           $this->load->library('upload');
           $this->load->library('email');
		   $config = array();
           $config['charset'] = 'utf-8';
           $config['useragent'] = 'Codeigniter'; //bebas sesuai keinginan kamu
           $config['protocol']= "smtp";
           $config['mailtype']= "html";
           $config['smtp_host']= "ssl://smtp.gmail.com";
           $config['smtp_port']= "465";
           $config['smtp_timeout']= "465";
           $config['smtp_user']= "telukit@gmail.com";//isi dengan email kamu
           $config['smtp_pass']= "shigetta23?"; // isi dengan password kamu
           $config['crlf']="\r\n"; 
           $config['newline']="\r\n"; 
           
           $config['wordwrap'] = TRUE;
           //memanggil library email dan set konfigurasi untuk pengiriman email
            
           $this->email->initialize($config);
           //konfigurasi pengiriman
           $this->email->from('webpersonal0@gmail.com');
           $this->email->to($email);
           $this->email->cc('telukit@gmail.com');
           $this->email->subject('Selamat Bergabung '.$username); 
           */
           	             $message = "
                   
               <table style=\"width: 100%;border-collapse: collapse;box-shadow: 0 2px 3px 1px #ddd;overflow: hidden;border:10px solid #fff;\">
               	  <tr style='background:#11acee;'>
				<th colspan=7; style=\"vertical-align: top;padding:10px 7px;text-align: center;margin:0;\">
				<h1>Bandungsnack.com</h1><br/></th>
				</tr>
				
				 <tr style='background:#eee;'>
				<td colspan=7; style=\"vertical-align: top;padding:10px 7px;text-align: justify;margin:0;\">

				 Kepada Yth. <strong>Sdr/i. ".$username.",</strong>
                    <p>
                    
                    Selamat anda telah bergabung di Bandungsnack.com
                    <p>
                    	Silahkan melakukan aktivasi account agar dapat melakukan login dan lengkapi data account anda dalam mempermudah dalam melakukan transaksi.
                    </p>
                    <p>

                 </tr>
                <tr style=\"background:#ccc;\">
					<th colspan=2; style=\"vertical-align: top;padding:10px 7px;text-align: left;margin:0;\">Info</th>
					<th colspan=5; style=\"vertical-align: top;padding:10px 7px;text-align: left;margin:0;\">Detail </th>
				</tr>

				 <tr style=\"background:#fff;\">
					<th colspan=2; style=\"vertical-align: top;padding:10px 7px;text-align: left;margin:0;\">Username</th>
					<td colspan=5; style=\"vertical-align: top;padding:10px 7px;text-align: left;margin:0;\">".$username."</td>
				</tr>
				 <tr style=\"background:#fff;\">
					<th colspan=2; style=\"vertical-align: top;padding:10px 7px;text-align: left;margin:0;\">Email</th>
					<td colspan=5; style=\"vertical-align: top;padding:10px 7px;text-align: left;margin:0;\">".$email."</td>
				</tr>
				 <tr style=\"background:#fff;\">
					<th colspan=2; style=\"vertical-align: top;padding:10px 7px;text-align: left;margin:0;\">No Telfon</th>
					<td colspan=5; style=\"vertical-align: top;padding:10px 7px;text-align: left;margin:0;\">".$contact."</td>
				</tr>

				 <tr style=\"background:#fff;\">
					<th colspan=2; style=\"vertical-align: top;padding:10px 7px;text-align: left;margin:0;\">Kode aktivasi</th>
					<td colspan=5; style=\"vertical-align: top;padding:10px 7px;text-align: left;margin:0;\">".$active_code."</td>
				</tr>

				<hr/>
				<tr style=\"background:#ccc;\">
					<td colspan=5; style=\"vertical-align: top;padding:10px 7px;text-align: center;margin:0;\">
Anda memperoleh e-mail ini karena keanggotaan Anda pada Bandungsnack.com. Anda bisa mengubah pengaturan notifikasi kapanpun.
Harap jangan membalas e-mail ini, karena e-mail ini dikirimkan secara otomatis oleh sistem.
</td>
				</tr>
				 </table>
                ";  


$headers = "From: no-replay-admin@bandungsnack.com". "\r\n";
$headers .= "Reply-To: no-replay-admin@bandungsnack.com" . "\r\n";
$headers .= "CC: no-replay-admin@bandungsnack.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

               
               			$to      = $email;
                      $subject = 'Selamat Bergabung Di Bandungsnack.com';
                    $sent_mail=  mail($to, $subject, $message, $headers);
              		if ($sent_mail) {
				   		$this->session->set_flashdata('sukses_registrasi','sukses_registrasi');
             			redirect(base_url('auth/validate/'.$username.'/'.$password));
              		}
              		else
              		{
						$this->session->set_flashdata('sukses_registrasi','sukses_registrasi');
             			redirect(base_url('auth/validate/'.$username.'/'.$password));
              		}
              		/*
				$this->email->message($message);
            

	           //Configure upload.
	            
	           $this->upload->initialize(array(
	                                "upload_path"   => "./uploads/",
	           "allowed_types" => "*"
	           ));
	            
	            if($this->email->send()){

				   $this->session->set_flashdata('sukses_registrasi','sukses_registrasi');

	               redirect(base_url(''));
	            //	echo "sukses";
	            }
	            else
	            {
				
				   $this->session->set_flashdata('sukses_registrasi','sukses_registrasi');

	               redirect(base_url(''));
	            
			    }		
			    */		
			}


			else

			{

				$data = array

				(
					'username' 			=> $username,

					'email' 			=> $email,

					'first_name' 		=> $first_name,

					'last_name' 		=> $last_name,

					'contact' 			=> $contact,

					'address' 			=> $address

				);

				$this->session->set_flashdata($data);

				$this->session->set_flashdata('gagal_registrasi','gagal_registrasi');
				
				redirect(base_url('Registrasi'));

			}
		}
	}

	}

	function batal()

	{

		$this->session->sess_destroy();

        redirect(base_url(''));

	}

}

