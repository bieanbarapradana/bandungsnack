<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Transaksi extends CI_Controller {
	
	function __construct()
	
	{

		parent::__construct();

		$this->load->model('Products_model');
		$this->load->model('Custommers_model');
		$this->load->model('Detail_order_model');
		$this->load->model('Payment_model');
		
		$this->load->model('Sellers_model');
		$this->load->model('Orders_model');

		
	}

	function _render_page($view, $data=null)

	{
		$this->data['data_seller'] = $this->Sellers_model->get_menu()->result();

		$this->data['data_product'] = $this->Products_model;

		$this->viewdata = (empty($data)) ? $this->data: $data;

		$this->load->view('front-end/include/simple_header',$this->viewdata);

		$view_html = $this->load->view($view);

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
			base_url('assets/front-end/css/jquery.dataTables.min.css'),

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
			
			base_url('assets/front-end/js/jquery.dataTables.min.js'),



		);
		$this->data['sukses_payment_conf'] = array(

		   	base_url('assets/notif/transaksi/sukses_payment_conf.js')

		);
		$this->data['gagal_payment_conf'] = array(

		   	base_url('assets/notif/transaksi/gagal_payment_conf.js')

		);

		$validasi = "
			<script>

		    (function($){

		       jQuery.validator.setDefaults({

		      errorPlacement: function(error, element) {

		        error.appendTo('#invalid-' + element.attr('id'));

		      }

		    });

		       $(\"#validasi-konfirmasi-pembayaran\").validate({

		           	nama_account: {

			          old_password: { 

			            required : true, 

			          },

			          no_faktur: { 

			          	required: true,

			          },

			          atas_nama: { 

			          	required:true,
			          },
			          \"select[]\": { required:true }

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

	                    atas_nama: 

	                    {

	                        required: 'Masukkan Nama pemilik rekening',


	                    }

			        }

			     });

			    })($);

			  </script>";
		$this->data['validasi'] = array($validasi);

		$this->data['data_product_atas'] = $this->Products_model->__product_atas()->result(); 

		$this->data['total_barang_promo'] = $this->Products_model->total_barang_promo()->row();

		$this->data['data_transaksi'] = $this->Orders_model->data_transaksi($this->session->userdata('id_customers'))->result();
			$this->data['data_pembayaran'] = $this->Payment_model;
		$this->data['paling_laris'] = $this->Products_model->_paling_terlaris()->row(); 
		$this->data['list_terlaris'] = $this->Products_model->_list_terlaris()->result(); 

		$this->_render_page('front-end/transaksi/data-transaksi');

	}

	function detail($id_orders=null)
	{
		if (isset($id_orders)) 
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
			base_url('assets/front-end/css/jquery.dataTables.min.css'),

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
			
			base_url('assets/front-end/js/jquery.dataTables.min.js'),



		);

		
		$aa = $this->Orders_model->data_orders($id_orders)->row(); 
		if ($aa==null) 
		{
			
			$this->session->set_flashdata('no_detail_data','no_detail_data');
			
			redirect(base_url('Transaksi'));
		}
		else
		{
		
			$this->data['data_order'] = $this->Orders_model->data_orders($id_orders)->row();

			$this->data['data_detail_order'] = $this->Detail_order_model->get_data_use_id_orders($id_orders)->result();
		

		}

		$this->_render_page('front-end/transaksi/detail-transaksi');

		}
		else
		{
			
			$this->session->set_flashdata('no_detail_data','no_detail_data');
			
			redirect(base_url('Transaksi'));
		}
	}

	function update_payment_status($id_orders=null)
	{
		if (isset($id_orders)) 
		{

		$payment_date = $this->input->post('tanggal_transfer');

		$atas_nama =$this->input->post('atas_nama');

		$bank =$this->input->post('bank');

		$ke =$this->input->post('ke');

		$nominal =$this->input->post('nominal');

		$no_faktur =$this->input->post('no_faktur');

		$status ="";

		$msg ="";	

		$file_name = 'photo'; 

	//	echo $photo;

		
		if (empty($id_orders)) {

			$status="Error";

			$msg = "Please Enter Title";

		}

		if ($status != "Error") 

		{

			$config['upload_path'] = 'assets/bukti/transaksi/';

			$config['allowed_types'] = 'gif|jpg|png';

			$config['max_size'] = 1024 * 50;

			$config['encrypt_name'] = true;


			$this->load->library('Upload',$config);


			if (!$this->upload->do_upload($file_name)) 

			{

				$status = 'Error';

				$this->session->set_flashdata('invalid_image','invalid_image');

				redirect(base_url('Transaksi'));


			}

			else

			{

				$data = $this->upload->data();

				$insert_payment_conf = $this->Payment_model->add_payment($id_orders,$payment_date,$data['file_name'],$atas_nama,$no_faktur,$bank,$nominal,$ke);

				if ($insert_payment_conf) 

				{
					/// awal email
					$get_id_customers = $this->session->userdata('id_customers');
					$get_data_customer = $this->Custommers_model->data_customers($get_id_customers)->row();
					$ambil_data_order = $this->Orders_model->data_orders($id_orders)->row();
					var_dump($get_data_customer);
						 $message = "
                   
               				<table style=\"width: 100%;border-collapse: collapse;box-shadow: 0 2px 3px 1px #ddd;overflow: hidden;border:10px solid #fff;\">
               	  				<tr style='background:#11acee;'>
									<th colspan=7; style=\"vertical-align: top;padding:10px 7px;text-align: center;margin:0;\">
										<h1>Bandungsnack.com</h1><br/></th>
								</tr>
				
								<tr style='background:#eee;'>
								
								<td colspan=7; style=\"vertical-align: top;padding:10px 7px;text-align: justify;margin:0;\">

				 					Kepada Yth. <strong>Sdr/i. ".$get_data_customer->first_name." ".$get_data_customer->last_name.",</strong>
                    					<p>
                    
                    				Terima kasih anda telah melakukan Konfirmasi Pembayaran transaksi pemesanan dengan nomer pemesanan MKT/".$ambil_data_order->id_orders."/".substr($ambil_data_order->order_date,8,2)."/".substr($ambil_data_order->order_date,5,2)."/".substr($ambil_data_order->order_date,0,4)."
                    				<p>
                    					Dengan ini Sdr/i. ".$get_data_customer->first_name." ".$get_data_customer->last_name." mendapatkan bukti konfirmasi Pembayaran yang sah, jika nanti ada kekeliruan dalam melakukan konfirmasi pihak Bandungsnack.com tidak bertanggung jawab atas kesalahan tersebut dan jika nanti setelah melakukan konfirmasi pihak Bandungsnack.com tidak melakukan update status pengiriman ataupun yang berkaitan dengang pemesanan Sdr/i. ".$get_data_customer->first_name." ".$get_data_customer->last_name.", Sdr/i. ".$get_data_customer->first_name." ".$get_data_customer->last_name." dapat melakukan Klaim terhadap pemesanan Sdr/i. ".$get_data_customer->first_name." ".$get_data_customer->last_name."
                    					.
                    				 </p>
                    			<p>

                 				</tr>
                 				<tr style=\"background:#ccc;\">
									<th colspan=2; style=\"vertical-align: top;padding:10px 7px;text-align: left;margin:0;\">Info</th>
									<th colspan=5; style=\"vertical-align: top;padding:10px 7px;text-align: left;margin:0;\">Detail </th>
								</tr>

								 <tr style=\"background:#fff;\">
									<th colspan=2; style=\"vertical-align: top;padding:10px 7px;text-align: left;margin:0;\">Order ID / No Faktur </th>
									<td colspan=5; style=\"vertical-align: top;padding:10px 7px;text-align: left;margin:0;\"> MKT/".$ambil_data_order->id_orders."/".substr($ambil_data_order->order_date,8,2)."/".substr($ambil_data_order->order_date,5,2)."/".substr($ambil_data_order->order_date,0,4)."</td>
								</tr>
								 <tr style=\"background:#fff;\">
									<th colspan=2; style=\"vertical-align: top;padding:10px 7px;text-align: left;margin:0;\">Nama Lengkap</th>
									<td colspan=5; style=\"vertical-align: top;padding:10px 7px;text-align: left;margin:0;\">".$get_data_customer->first_name." ".$get_data_customer->last_name."</td>
								</tr>

								 <tr style=\"background:#fff;\">
									<th colspan=2; style=\"vertical-align: top;padding:10px 7px;text-align: left;margin:0;\">Tanggal Pembayaran</th>
									<td colspan=5; style=\"vertical-align: top;padding:10px 7px;text-align: left;margin:0;\">".$payment_date."</td>
								</tr>
								 <tr style=\"background:#eee;\">
									<th colspan=2; style=\"vertical-align: top;padding:10px 7px;text-align: left;margin:0;\">Pemilik Rekening</th>
									<td colspan=5; style=\"vertical-align: top;padding:10px 7px;text-align: left;margin:0;\">".$bank." ".$atas_nama." </td>
								</tr>
								 <tr style=\"background:#fff;\">
									<th colspan=2; style=\"vertical-align: top;padding:10px 7px;text-align: left;margin:0;\">Bank Tujuan</th>
									<td colspan=5; style=\"vertical-align: top;padding:10px 7px;text-align: left;margin:0;\">".$ke."</td>
								</tr>

								 <tr style=\"background:#fff;\">
									<th colspan=2; style=\"vertical-align: top;padding:10px 7px;text-align: left;margin:0;\">Nominal</th>
									<td colspan=5; style=\"vertical-align: top;padding:10px 7px;text-align: left;margin:0;\">Rp ".number_format($nominal)."</td>
								</tr>
			                	";          
       		 	
						$message .="
						<hr style='color:#ccc;'>
							<tr style='background:#fff;'>
								<td colspan=7; ><p style='text-align:center;'>Anda memperoleh e-mail ini karena keanggotaan Anda pada Bandungsnack.com. Anda bisa mengubah pengaturan notifikasi kapanpun. Harap jangan membalas e-mail ini, karena e-mail ini dikirimkan secara otomatis oleh sistem.</p></td>
				
						</tr>";

				

	                	$message .="</table>";


						$headers = "From: no-replay-admin@bandungsnack.com". "\r\n";
						$headers .= "Reply-To: no-replay-admin@bandungsnack.com" . "\r\n";
						$headers .= "CC: no-replay-admin@bandungsnack.com\r\n";
						$headers .= "MIME-Version: 1.0\r\n";
						$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

               
              			$to      = $get_data_customer->email;
	                    $subject = 'Aktivasi account Berhasil Bandungsnack.com';
                    //  $message = "Aktivasi Berhasil";
                      //$headers = 'From: no-replay-admin@bandungsnack.com' . "\r\n" .
                        //  'No-Reply: no-replay-admin@bandungsnack.com' . "\r\n" .
                          //'X-Mailer: PHP/' . phpversion();

                    $sent_mail=  mail($to, $subject, $message, $headers);
              		if ($sent_mail) 
              		{

						$this->session->set_flashdata('sukses_payment_conf','sukses_payment_conf');

						$update_status =  $this->Orders_model->update_payment($id_orders);

						redirect(base_url('Transaksi'));
              		}
              		else
              		{
						$this->session->set_flashdata('sukses_payment_conf','sukses_payment_conf');

						$update_status =  $this->Orders_model->update_payment($id_orders);

						redirect(base_url('Transaksi'));            //  			echo "gagal";
              		}
					/// akhir email email


				}

				else

				{

					$this->session->set_flashdata('gagal_payment_conf','gagal_payment_conf');
					//echo "gagal";

					redirect(base_url('Transaksi'));

				}

			}

			@unlink($_FILES['$file_name']);

		}	
				//$insert_payment_conf = $this->Payment_model->add_payment($id_orders,$file_name);
			}
			else
			{

			}
		//}
	//	else
		//{

		//}
	}

}

