<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Api extends CI_Controller {

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

	function index()

	{

		$this->load->view('data/api');	

	}

	function data_sellers($id_seller=null)

	{

		if (isset($id_seller)) 

		{

			$data = $this->Sellers_model->data_sellers($id_seller)->result();

		}

		else

		{

			$data = $this->Sellers_model->data_sellers()->result();

		}

		foreach ($data as $value) {

			$hasil[] = array(

				'id_seller' => 'S0'.$value->id_seller,

				'seller_name'=> $value->seller_name,

				'contact'=> $value->contact,

				'address'=> $value->address,

				'flag'=> $value->flag,

			);

		}

		header('Content-Type: application/json');

		echo '{ "data":', json_encode($hasil),'}';

	//	echo json_decode($data);

	}

}

