<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Customers extends CI_Controller {

	function __construct()

	{

		parent::__construct();

		$this->load->model('Custommers_model');

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

	function data_customers($id_customers=null)

	{

		if (isset($id_customers)) 

		{

			$data = $this->Custommers_model->data_customers($id_customers)->result();

		}

		else

		{

			$data = $this->Custommers_model->data_customers()->result();

		}

		$no = 1;

		foreach ($data as $value) {

			if ($value->flag==0) 

			{

				$flag = '<a href="'.base_url('Seller/flag/'.$value->id_customers).'" data-toggle="tooltip" title="Flag" class="btn btn-xs btn-default"><i class="fa fa-flag-o"></i></a>';

			}

			else

			{

				$flag = '<a href="'.base_url('Seller/unflag/'.$value->id_customers).'" data-toggle="tooltip" title="Unflag" class="btn btn-xs btn-default"><i class="fa fa-flag"></i></a>';

			}

			$hasil[] = array(

				'no' => $no,

				'id_customers' => 'C0'.$value->id_customers,

				'full_name'=> $value->first_name." ".$value->last_name,

				'username'=> $value->username,

				'email'=> $value->email,

				'address'=> $value->address,

				'contact'=> $value->contact,

				'profile'=> $value->profile,

				'active_code'=> $value->active_code,

				'link' =>'<a href="'.base_url('Customers/edit/'.$value->id_customers).'" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a><a href="'.base_url('Customers/delete/'.$value->id_customers).'" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>'.$flag

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

   				'parent' =>'Customers',

   				'link_parent' =>'Customers'

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

	      // base_url('assets/back-end/js/pages/tablesDatatables.js'),

	       	base_url('assets/back-end/data/customers/dataCustomers.js'),

	        base_url('assets/noty/jquery.noty.packaged.min.js'),

	    	base_url('assets/noty/js/noty/packaged/jquery.noty.packaged.min.js'),

	    	base_url('assets/noty/demo/notification_html.js'),

		);



   	

		

		$this->data['sukses_update_seller'] = array(

		   	base_url('assets/notif/seller/sukses_update_seller.js')

		);

		$this->data['sukses_delete_seller'] = array(

		   	base_url('assets/notif/seller/sukses_delete_seller.js')

		);

		



		//$this->data['data']=array($data);

		$script = "<script>$(function(){ TablesDatatables.init(); });</script>";



		$this->data['additional'] = array($script);

		$this->_render_page('admin/customers/data-customers');

	}

	

}

