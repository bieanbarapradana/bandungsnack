<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Shoppingcart extends CI_Controller {
	

	function __construct()
	
	{

		parent::__construct();

		$this->load->model('Products_model');
		
		
	}

	function add()

	{
		$id = $this->input->post('id');
		$dataproduct = $this->Products_model->data_products($id)->row();
		if ($dataproduct->discount==0) 
		{
			$harga_baru = $dataproduct->product_price;
			$harga_lama = 0;
		}
		else
		{
			$harga_baru = $dataproduct->product_price - ($dataproduct->product_price * ($dataproduct->discount / 100));
			$harga_lama = $dataproduct->product_price;

		}
		$data = array(
	        'id'      => $dataproduct->id_product,

	        'qty'     => 1,

	        'price'   => $dataproduct->product_price,

	        'harga_baru'   => $harga_baru,

	        'promo'   => $dataproduct->promo,

	        'discount'   => $dataproduct->discount,

	        'name'    => $dataproduct->product_name,

	        'photo'	  => $dataproduct->photo

		);


		$cek = $this->cart->insert($data);		
		if ($cek) 

		{
			$this->session->set_flashdata('sukses_ditambah', 'sukses_ditambah');
			//redirect(current_url());
			redirect($this->agent->referrer());
			//$this->agent->referrer();

		}
		else
		{
			$this->session->set_flashdata('gagal_ditambah', 'gagal_ditambah');
			redirect($this->agent->referrer());
		}
	}
	function delete()
	
	{
		$id = $this->input->post('id');


		$this->cart->update(array('rowid'=> $id, 'qty' => 0));

		redirect($this->agent->referrer());

	}

	function update()

	{

		$i =1;
		foreach ($this->cart->contents() as $key => $value) {
			$this->cart->update(array('rowid' =>$value['rowid'],'qty'=>$_POST['qty'.$i]));
			$i++;
		}
		redirect($this->agent->referrer());

	}
	function stock_abis()
	{
		$this->session->set_flashdata('stock_abis','stock_abis');
		redirect($this->agent->referrer());

	}
	function cart_destroy($status=null)
	{	

		if (isset($status)=='hapus') 
		{
			$this->session->set_flashdata('batal_transaksi','batal_transaksi');
		}
		elseif (isset($status)=='selesai_checkout') 
		{
			$this->session->set_flashdata('selesai_checkout','selesai_checkout');
		}

		$this->cart->destroy();
		redirect(base_url());
	
	}
	function total_cart()
	{
	 $total_jajanan_baru = 0;

            foreach ($this->cart->contents() as $key => $value) {

              $total_jajanan_baru = $total_jajanan_baru + $value['qty'];

              

            }
            echo $total_jajanan_baru;
              

    }
    function total_jajan()
	{
	 $total_jajanan_baru = 0;

            foreach ($this->cart->contents() as $key => $value) {

              $total_jajanan_baru = $total_jajanan_baru + $value['qty'];

              

            }
            echo $total_jajanan_baru." Jajan";
              

    }
    function info_cart_haeder()
    {
    	$tot_harga = 0;

        $total_barang_belanja = 0;

        foreach ($this->cart->contents() as $key => $value) {

            $total_barang_belanja = $total_barang_belanja + $value['qty'];

            $tot_harga = $tot_harga + ($value['qty'] * $value['harga_baru']);

        }

        echo $total_barang_belanja." items | Rp ".number_format($tot_harga);

    }
    function total_harga()
    {
    	$tot_harga = 0;

        foreach ($this->cart->contents() as $key => $value) {

            $tot_harga = $tot_harga + ($value['qty'] * $value['harga_baru']);

        }

        echo number_format($tot_harga);

    }

    function detail_cart()
    {

		$tot_harga = 0;

        $total_barang_belanja = 0;

        foreach ($this->cart->contents() as $key => $value) {

            $total_barang_belanja = $total_barang_belanja + $value['qty'];

            $tot_harga = $tot_harga + ($value['qty'] * $value['harga_baru']);

        }

       // echo $total_barang_belanja." items | Rp ".number_format($tot_harga);

    		echo '<div class="qc-row qc-row-heading"> 

                <span class="qc-col-qty">QTY.</span> 

                <span class="qc-col-name" >'.$total_barang_belanja.' Jajan</span> 
                <span class="qc-col-price" >'.number_format($tot_harga).'</span> 

                </div>';

                    foreach ($this->cart->contents() as $key => $value) {



                echo '<div class="qc-row qc-row-item"> <span class="qc-col-qty">'.$value['qty'].'</span> <span class="qc-col-name"><a href="'.base_url('Jajan/detail/'.$value['id']).'">'.$value['name'].'</a></span> <span class="qc-col-price">';


                     echo number_format($tot_harga_baru = ($value['qty'] * $value['harga_baru']));

/*
  		            <a type="button" value="'.$value['rowid'].'" class="delete_data"><i class="fa fa-times"></i></a>*/


  		            echo '</span> <span class="qc-col-remove"> 
 
  		             <button value="'.$value['rowid'].'" style="background:#009bdd" class="btn delete_data" data-toggle="tooltip" title="Tambahkan Ke Keranjang"> <i class="fa fa-times"></i> </button>
  		            </span> </div>';

                 


                    }
                     echo '<div class="qc-row-bottom"><a class="btn qc-btn-viewcart" href="'.base_url('cart').'">view

                  cart</a><a class="btn qc-btn-checkout" href="'.base_url('Checkout').'">check
                  out</a></div>';



    }
/*
      <button value="<?php echo $value->id_product; ?>" class="btn btn-default btn-addtocart pull-left addlabtype" data-toggle="tooltip" title="Tambahkan Ke Keranjang"> <i class="fa fa-shopping-cart fa-fw"></i> </button>*/

}

