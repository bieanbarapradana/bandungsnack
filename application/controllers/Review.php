<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Review extends CI_Controller {
	
	
	function __construct()
	
	{

		parent::__construct();

		$this->load->model('Products_model');
		
		$this->load->model('Sellers_model');

		
	}
	function index()
	{
		redirect(base_url('info'));
		
	}
}