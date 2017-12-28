<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Proses_orders extends CI_Controller {
	function __construct()
	
	{

		parent::__construct();

		$this->load->model('Orders_model');
		$this->load->model('Custommers_model');
		$this->load->model('Products_model');
		$this->load->model('Notifikasi_model');
		$this->load->model('Detail_order_model');

		
	}

	function add()
	
	{
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$contact = $this->input->post('contact');
		$address = $this->input->post('address');
		$update_data = $this->Custommers_model->update_data($this->session->userdata('id_customers'),$first_name,$last_name,$contact,$address);
		
		if ($update_data) 
		{
		
		
		$get_order_id = $this->Orders_model->get_id_orders();
		
		if ($get_order_id['id_orders']) {
			$id_orders =  $get_order_id['id_orders'] + 1;
		}
		else
		{
			$id_orders = 1;
		}

		$get_shipping_address = $this->Custommers_model->data_customers($this->session->userdata('id_customers'))->row();
		$order_date = date('Y-m-d');
		$shipping_address = $get_shipping_address->address;
		$shipping_status  = 'not confirmed';
		$payment_status  = 'not confirmed';

		$chars				= "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $kode_transaksi		= substr( str_shuffle( $chars ), 0, 10 ).''.$id_orders;

        $number_a			= "56789";
        $nomer_unique		= substr( str_shuffle( $number_a ), 0, 3 );

		$insert_orders = $this->Orders_model->add($id_orders,$this->session->userdata('id_customers'),$order_date,$shipping_address,$shipping_status,$payment_status,$kode_transaksi,$nomer_unique);

		if ($insert_orders) 
		{
			foreach ($this->cart->contents() as $key => $value) {
				$data[] = array(
					'id_product' => $value['id'],

					'id_orders' => $id_orders,
					
					'qty' => $value['qty'],
					
					'product_price' => $value['price'],

					'discount' => $value['discount']
					);
				
				$get_stock = $this->Products_model->data_products($value['id'])->row();
				
				$data1[] = array(
					'id_product' => $value['id'],

					'stock' => $get_stock->stock - $value['qty']
					);
				$data2[] = array(
					'id_product' => $value['id'],

					'rating' => $get_stock->rating + 1
					);
				
			}
            


			$insert_detail_orders = $this->Detail_order_model->add($data);
			$update_stock = $this->Products_model->update_bacth_product($data1);
			$update_rating = $this->Products_model->rating_bacth_product($data2);
		///	echo "sukses";
		//	$insert_notif = $this->Notifikasi_model->insert($from,$to,$url,$isi);
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
           $this->email->from('no-replay-admin@bandungsnack.com');
           $this->email->to($get_shipping_address->email);
           $this->email->cc('no-replay-admin@bandungsnack.com');
           $this->email->subject('BUKTI PEMESANAN '.$id_orders);
           */
             $message = "
                   
               <table style=\"width: 100%;border-collapse: collapse;box-shadow: 0 2px 3px 1px #ddd;overflow: hidden;border:10px solid #fff;\">
               	  <tr style='background:#11acee;'>
				<th colspan=7; style=\"vertical-align: top;padding:10px 7px;text-align: center;margin:0;\">
				<h1>Bandungsnack.com</h1><br/></th>
				</tr>
				
				 <tr style='background:#eee;'>
				<td colspan=7; style=\"vertical-align: top;padding:10px 7px;text-align: justify;margin:0;\">

				 Kepada Yth. <strong>Sdr/i. ".$get_shipping_address->first_name." ".$get_shipping_address->last_name.",</strong>
                    <p>
                    
                    Terima kasih atas pemesanan produk kami
                    <p>
                    Kami akan memproses order Anda setelah kami menerima bukti atau pembayaran yang telah Anda lakukan. Bila dalam waktu 1 minggu dari tanggal pendaftaran kami tidak menerima bukti atau info pembayaran dari Anda, kami menganggap Anda telah membatalkan order Anda. </p>
                    <p>

                 </tr>
                <tr style=\"background:#ccc;\">
					<th colspan=2; style=\"vertical-align: top;padding:10px 7px;text-align: left;margin:0;\">Info</th>
					<th colspan=5; style=\"vertical-align: top;padding:10px 7px;text-align: left;margin:0;\">Detail </th>
				</tr>

				 <tr style=\"background:#fff;\">
					<th colspan=2; style=\"vertical-align: top;padding:10px 7px;text-align: left;margin:0;\">Order ID </th>
					<td colspan=5; style=\"vertical-align: top;padding:10px 7px;text-align: left;margin:0;\"> MKT/".$id_orders."/".date('d')."/".date('m')."/".date('y')."</td>
				</tr>
					<tr style=\"background:#fff;\">
					<th colspan=2; style=\"vertical-align: top;padding:10px 7px;text-align: left;margin:0;\">Kode Transaksi </th>
					<td colspan=5; style=\"vertical-align: top;padding:10px 7px;text-align: left;margin:0;\"> ".$kode_transaksi."</td>
				</tr>
				 <tr style=\"background:#fff;\">
					<th colspan=2; style=\"vertical-align: top;padding:10px 7px;text-align: left;margin:0;\">Nama Lengkap</th>
					<td colspan=5; style=\"vertical-align: top;padding:10px 7px;text-align: left;margin:0;\">".$get_shipping_address->first_name." ".$get_shipping_address->last_name."</td>
				</tr>
				 <tr style=\"background:#eee;\">
					<th colspan=2; style=\"vertical-align: top;padding:10px 7px;text-align: left;margin:0;\">Alamat</th>
					<td colspan=5; style=\"vertical-align: top;padding:10px 7px;text-align: left;margin:0;\">".$get_shipping_address->address."</td>
				</tr>
				 <tr style=\"background:#fff;\">
					<th colspan=2; style=\"vertical-align: top;padding:10px 7px;text-align: left;margin:0;\">No Telfon</th>
					<td colspan=5; style=\"vertical-align: top;padding:10px 7px;text-align: left;margin:0;\">".$get_shipping_address->contact."</td>
				</tr>
				 
                  <tr style='background:#eee;'>
				
				 <tr style='background:#444444;'>
				<th colspan=7; style=\"vertical-align: top;padding:10px 7px;text-align: center;margin:0;\">
				<h2 style=\"color:#fff;\">Detail Orders</h2></th>
				</tr>
				</tr>
                    <tr style='background:#ccc;'>
				<th style=\"vertical-align: top;padding:10px 7px;text-align: center;margin:0;\">No</th>
				<th style=\"vertical-align: top;padding:10px 7px;text-align: left;margin:0;\">Kode Produk</th>
				<th style=\"vertical-align: top;padding:10px 7px;text-align: left;margin:0;\">Nama Produk</th>
				<th style=\"vertical-align: top;padding:10px 7px;text-align: right;margin:0;\">Harga Produk</th>
				<th style=\"vertical-align: top;padding:10px 7px;text-align: center;margin:0;\">QTY</th>
				<th style=\"vertical-align: top;padding:10px 7px;text-align: center;margin:0;\">Discount</th>
				<th style=\"vertical-align: top;padding:10px 7px;text-align: left;margin:0;\">Total</th>
				</tr>
                ";          
       		 	$no=1;
                $total_bayar = 0;
                foreach ($this->cart->contents() as $key => $value) {
                	if ($no % 2 == 0) {
                		$warna ='#eee';
                	}
                	else
                	{
                		$warna ='#fff';
                	}
                    $message .= "<tr  style=\"background:".$warna.";\">

                    <td  style=\"vertical-align: top;padding:10px 7px;text-align: center;margin:0;\" >".$no."</td>
                    <td  style=\"vertical-align: top;padding:10px 7px;text-align: left;margin:0;\" >".$value['id']."</td>
                    <td  style=\"vertical-align: top;padding:10px 7px;text-align: left;margin:0;\" >".$value['name']."</td>
                    <td  style=\"vertical-align: top;padding:10px 7px;text-align: right;margin:0;\" >Rp, ".number_format($value['price'])."</td>
                    <td  style=\"vertical-align: top;padding:10px 7px;text-align: center;margin:0;\" >".$value['qty']."</td>
                    <td  style=\"vertical-align: top;padding:10px 7px;text-align: center;margin:0;\" >".$value['discount']." % </td>
                    <td  style=\"vertical-align: top;padding:10px 7px;text-align: left;margin:0;\" >Rp ,".number_format($value['qty'] * $value['harga_baru'])."</td>
                    </tr>";
                    //echo $value->id_produk;
                 	$total_bayar = $total_bayar + ($value['qty'] * $value['harga_baru']);
                    $no++;
                }
                  $message .="<tr style='background:#ccc;'>
				<th colspan=6; style=\"vertical-align: top;padding:10px 7px;text-align: right;margin:0;\">Total Bayar</th>
				<th style=\"vertical-align: top;padding:10px 7px;text-align: left;margin:0;\">Rp ,".number_format($total_bayar + $nomer_unique)."</th>
				</tr>";

				$message .="<tr style='background:#fff;'>
				<th colspan=7 style=\"vertical-align: top;padding:10px 7px;text-align: center;margin:0;\">  </th>
				
				</tr>";
				 $message .="<tr style='background:#feaa37;'>
				<th colspan=7; style=\"vertical-align: top;padding:10px 7px;text-align: center;margin:0;\"><h2 style='color:#fff;'>OPSI TRANSFER</h2></th>
				
				</tr>";
 				$message .="<tr style='background:#ccc;'>
				<th style=\"vertical-align: top;padding:10px 7px;text-align: center;margin:0;\">No</th>
				<th colspan=3; style=\"vertical-align: top;padding:10px 7px;text-align: left;margin:0;\">BANK</th>
				<th style=\"vertical-align: top;padding:10px 7px;text-align: left;margin:0;\">No Rekening</th>
				<th colspan=2; style=\"vertical-align: top;padding:10px 7px;text-align: left;margin:0;\">Atas Nama </th>
				</tr>";
				 $message .="<tr style='background:#fff;'>
				<th style=\"vertical-align: top;padding:10px 7px;text-align: center;margin:0;\">1</th>
				<th colspan=3; style=\"vertical-align: top;padding:10px 7px;text-align: left;margin:0;\">BRI</th>
				<th style=\"vertical-align: top;padding:10px 7px;text-align: left;margin:0;\">168001000345536</th>
				<th colspan=2; style=\"vertical-align: top;padding:10px 7px;text-align: left;margin:0;\">Iman Ahmad Setyawan</th>
				</tr>";
				$message .="<tr style='background:#eee;'>
				<th style=\"vertical-align: top;padding:10px 7px;text-align: center;margin:0;\">2</th>
				<th colspan=3; style=\"vertical-align: top;padding:10px 7px;text-align: left;margin:0;\">MANDIRI</th>
				<th style=\"vertical-align: top;padding:10px 7px;text-align: left;margin:0;\">1390010778227</th>
				<th colspan=2; style=\"vertical-align: top;padding:10px 7px;text-align: left;margin:0;\">Iman Ahmad Setyawan</th>
				</tr>";
				$message .="<tr  style='border-bottom:1px solid #ccc;background:#fff;'>
				<th style=\"vertical-align: top;padding:10px 7px;text-align: center;margin:0;\">3</th>
				<th colspan=3; style=\"vertical-align: top;padding:10px 7px;text-align: left;margin:0;\">BNI</th>
				<th style=\"vertical-align: top;padding:10px 7px;text-align: left;margin:0;\">0461158360</th>
				<th colspan=2; style=\"vertical-align: top;padding:10px 7px;text-align: left;margin:0;\">Iman Ahmad Setyawan</th>
				</tr>";
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

               
               			$to      = $get_shipping_address->email;
                      $subject = 'Transaksi Belanja Bandungsnack.com';
                    //  $message = "Aktivasi Berhasil";
                      //$headers = 'From: no-replay-admin@bandungsnack.com' . "\r\n" .
                        //  'No-Reply: no-replay-admin@bandungsnack.com' . "\r\n" .
                          //'X-Mailer: PHP/' . phpversion();

                    $sent_mail=  mail($to, $subject, $message, $headers);
              		if ($sent_mail) {
               redirect(base_url('Shoppingcart/cart_destroy'));
             //	echo "sukses";		# code...
              		}
              		else
              		{
			redirect(base_url('Checkout'));
            //  			echo "gagal";
              		}
              		/*
            $this->email->message($message);
            

           //Configure upload.
            
           $this->upload->initialize(array(
                                "upload_path"   => "./uploads/",
           "allowed_types" => "*"
           ));
            
            if($this->email->send()){
               redirect(base_url('Shoppingcart/cart_destroy'));
            //	echo "sukses";
            }
            else{
			redirect(base_url('Checkout'));
             //  echo "gagal send";
            }
            */
			
		}
		else
		{
			redirect(base_url('Checkout'));

		}
		}
		
	}

	function send_aa()
	{

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
           $this->email->to('azharoce@gmail.com');
           $this->email->cc('telukit@gmail.com');
           $this->email->subject('Detail Order Telukit');
             $message ='<table style="width: 100%;border-collapse: collapse;box-shadow: 0 2px 3px 1px #ddd;overflow: hidden;border:10px solid #fff;">
		<thead>
			<tr style="background:#eee;">
				<th style="vertical-align: top;padding:10px 7px;text-align: left;margin:0;">No</th>
				<th style="vertical-align: top;padding:10px 7px;text-align: left;margin:0;">No</th>
				<th style="vertical-align: top;padding:10px 7px;text-align: left;margin:0;">No</th>
			</tr>
		</thead>
		<tbody>
		';
		for ($i=1; $i <= 10 ; $i++) { 
		if ($i % 2 ==0) {
			$warna ='#eee';
		}
		else
		{
			$warna ='#fff';
		}
		$message .='
			<tr style="background:'.$warna.';">
				<td style="vertical-align: top;padding:10px 7px;text-align: left;margin:0;">No</td>
				<td style="vertical-align: top;padding:10px 7px;text-align: left;margin:0;">No</td>
				<td style="vertical-align: top;padding:10px 7px;text-align: left;margin:0;">No</td>
				
			</tr>
		';
		}
		$message.='
		</tbody>
	</table>
';
            $this->email->message($message);
            

           //Configure upload.
            
           $this->upload->initialize(array(
                                "upload_path"   => "./uploads/",
           "allowed_types" => "*"
           ));
            
            if($this->email->send()){
               echo "sukses send";
            }
            else{
               echo "gagal send";
            }
	}
}

