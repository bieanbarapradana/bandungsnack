<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Auth extends CI_Controller {

	function __construct()

	{

		parent::__construct();

		$this->load->model('Auth_model');

		$this->load->model('Custommers_model');

	}

	function _render_page($view, $data=null)

	{

		$this->viewdata = (empty($data)) ? $this->data: $data;

		$this->load->view('admin/auth/header',$this->viewdata);

		$view_html = $this->load->view($view);

		$this->load->view('admin/auth/footer');

	}

	function index()

	{

		if ($this->session->userdata('login_in')) 

		{

			redirect(base_url('dashboard'));

		}

		else

		{



		}

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

	        base_url('assets/back-end/js/pages/login.js'),

	        base_url('assets/noty/jquery.noty.packaged.min.js'),

	    	base_url('assets/noty/js/noty/packaged/jquery.noty.packaged.min.js'),

	    	base_url('assets/noty/demo/notification_html.js'),

		);

		$this->data['no_akses'] = array(

		   	base_url('assets/notif/auth/no_akses.js')

		);

		$this->data['lock_account'] = array(

		   	base_url('assets/notif/auth/lock_account.js')

		);

		$this->data['gagal_login'] = array(

		   	base_url('assets/notif/auth/gagal_login.js')

		);

		$this->_render_page('admin/auth/login');

	}

	function login()

	{

		

			$username = $this->input->post('login-user');

			$password = md5($this->input->post('login-password'));
	
		


		$cek = $this->Auth_model->login($username,$password)->row();

		//var_dump($cek);

		if ($cek) 

		{

			if ($cek->flag==0) {

				if ($cek->label=='super admin') 

				{

					$data = array(

						'id_users' =>$cek->id_users,

						'username' =>$cek->username,

						'full_name' =>$cek->first_name.' '.$cek->last_name,

						'akses' =>$cek->label,

						'profile' =>$cek->profile,

						'email' =>$cek->email,

						'login_in' =>true,

					);

					$this->session->set_userdata($data);



					$this->session->set_flashdata('sukses_login', 'sukses_login');

					redirect(base_url('Dashboard'));

				}

				elseif ($cek->label=='admin') 

				{

					$data = array(

						'id_users' =>$cek->id_users,

						'username' =>$cek->username,

						'full_name' =>$cek->first_name.' '.$cek->last_name,

						'akses' =>$cek->label,

						'profile' =>$cek->profile,

						'email' =>$cek->email,

						'login_in' =>true,

					);

					$this->session->set_userdata($data);

					

					$this->session->set_flashdata('sukses_login', 'sukses_login');

					redirect(base_url('Dashboard'));

				}

				elseif ($cek->label=='customer care') 

				{

					$data = array(

						'id_users' =>$cek->id_users,

						'username' =>$cek->username,

						'full_name' =>$cek->first_name.' '.$cek->last_name,

						'akses' =>$cek->label,

						'profile' =>$cek->profile,

						'email' =>$cek->email,

						'login_in' =>true,

					);

					$this->session->set_userdata($data);

					

					$this->session->set_flashdata('sukses_login', 'sukses_login');

					redirect(base_url('Dashboard'));

				}

				else

				{

					$this->session->set_flashdata('no_akses','no_akses');

					redirect(base_url('Auth'));

				}

			}

			else

			{

				$this->session->set_flashdata('lock_account','lock_account');

				redirect(base_url('Auth'));

			}

		}

		else

		{

			$this->session->set_flashdata('gagal_login','gagal_login');

			redirect(base_url('Auth'));

		}

	}

	function logout()

	{

		$data = array(

			'id_users' =>$this->session->userdata('id_users'),

			'username' =>$this->session->userdata('username'),

			'full_name' =>$this->session->userdata('full_name'),

			'akses' =>$this->session->userdata('akses'),

			'profile' =>$this->session->userdata('profile'),

			'email' =>$this->session->userdata('email'),

			'login_in' =>$this->session->userdata('login_in')

		);

		//$this->session->unset_userdata($data);
		$this->session->set_userdata('login_in',$data);

		$this->session->unset_userdata('login_in');

        redirect(base_url('Auth'));

	}

	function error()

	{

		$this->data['add_css'] = array(

			base_url('assets/back-end/css/bootstrap.min.css'),

	        base_url('assets/back-end/css/plugins.css'),

	        base_url('assets/back-end/css/main.css'),

	        base_url('assets/back-end/css/themes.css'),

    		base_url('assets/noty/demo/animate.css'),

		);

		$this->_render_page('admin/auth/error');

	}

	function validate($user=null,$pass=null)

	{
		if (isset($user) and isset($pass)) {

			$username = $user;

			$password = $pass;
		}
		else
		{
			$username		= $this->input->post('username');

			$password		= md5($this->input->post('password'));
		}
		//echo $username.' '.$password;

		$cek 			= $this->Custommers_model->validate($username,$password)->row();

	//	var_dump($cek);

		
		if ($cek) 

		{
			if ($cek->flag==1) 
			{
				$this->session->set_flashdata('belum_aktivasi','belum_aktivasi');

				redirect(base_url(''));
				//echo "brlum aktif";
			}
			else
			{
				$data 		= array
							(
								'id_customers'	=> $cek->id_customers,

								'first_name_customer' 	=> $cek->first_name,

								'last_name_customer' 	=> $cek->last_name,

								'email_customer' 		=> $cek->email,

								'profile_customer' 		=> $cek->profile,

								'contact_customer' 		=> $cek->contact,

								'address_customer' 		=> $cek->address,
								
								'login_in_customer' 		=>true,

							);

				$this->session->set_userdata($data);

				$this->session->set_flashdata('welcome_back','welcome_back');
				//var_dump($cek);
				//echo "sudah aktif";
				redirect(base_url(''));
			}

		}

		else

		{

			$this->session->set_flashdata('invalid_login','invalid_login');

			redirect(base_url());

		}

	}

	function logout_u()

	{

		$data 		= array
		(
	
			'id_customers'			=> $this->session->userdata('id_customers'),

			'first_name_customer' 	=> $this->session->userdata('first_name_customer'),

			'last_name_customer' 	=> $this->session->userdata('last_name_customer'),

			'email_customer' 		=> $this->session->userdata('email_customer'),

			'profile_customer' 		=> $this->session->userdata('profile_customer'),

			'contact_customer' 		=> $this->session->userdata('contact_customer'),

			'address_customer' 		=> $this->session->userdata('address_customer'),
							
			'login_in_customer' 		=>$this->session->userdata('login_in_customer')


		);

		$this->session->set_userdata('login_in_customer',$data);

		$this->session->unset_userdata('login_in_customer');

        redirect(base_url(''));

	}
	function belum_login()
	{
		$this->session->set_flashdata('info_belum_login','info_belum_login');
		redirect(base_url());
	}
	function active()
	{
		$username = $this->input->post('username');
		$activate_code = $this->input->post('activate_code');
		$cek_active = $this->Custommers_model->cek_username($username)->row();
		if ($cek_active->flag==0) 
		{
			$this->session->set_flashdata('account_telah_teraktivasi','account_telah_teraktivasi');

			redirect(base_url());		
		}
		else
		{
			$active_account = $this->Custommers_model->active_account($username,$activate_code);

			if ($active_account) 
			{
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
                    
                    Terima kasih anda telah melakukan aktivasi account
                    <p>
                    	anda telah terdaftar sebagai member dari Bandungsnack.com, silahkan lengkapi data pada menu account agar tidak adanya ke keliruan pada saat Transaksi dan pengiriman pemesanan
                    	 </p>
                    <p>

                 </tr>
                
				
                   
                ";          
       		 	
				$message .="<hr style='color:#ccc;'><tr style='background:#fff;'>
				<td colspan=7; ><p style='text-align:center;'>Anda memperoleh e-mail ini karena keanggotaan Anda pada Bandungsnack.com. Anda bisa mengubah pengaturan notifikasi kapanpun.
Harap jangan membalas e-mail ini, karena e-mail ini dikirimkan secara otomatis oleh sistem.</p></td>
				
				</tr>";

				

                $message .="</table>";


$headers = "From: no-replay-admin@bandungsnack.com". "\r\n";
$headers .= "Reply-To: no-replay-admin@bandungsnack.com" . "\r\n";
$headers .= "CC: no-replay-admin@bandungsnack.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

               
               			$to      = $cek_active->email;
                      $subject = 'Aktivasi account Berhasil Bandungsnack.com';
                    //  $message = "Aktivasi Berhasil";
                      //$headers = 'From: no-replay-admin@bandungsnack.com' . "\r\n" .
                        //  'No-Reply: no-replay-admin@bandungsnack.com' . "\r\n" .
                          //'X-Mailer: PHP/' . phpversion();

                    $sent_mail=  mail($to, $subject, $message, $headers);
              		if ($sent_mail) {
            	$this->session->set_flashdata('aktivasi_berhasil','aktivasi_berhasil');

				redirect(base_url());	
              		}
              		else
              		{
				$this->session->set_flashdata('aktivasi_berhasil','aktivasi_berhasil');

				redirect(base_url());	
            //  			echo "gagal";
              		}
				
			}
			else
			{
				$this->session->set_flashdata('aktivasi_gagal','aktivasi_gagal');

				redirect(base_url());	

			}
		}
	}

}

							