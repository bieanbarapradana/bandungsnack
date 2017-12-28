<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct()
	{
		parent::__construct();
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
	function index()
	{
		$this->data['add_css'] = array(
	       	base_url('assets/back-end/css/bootstrap.min.css'),
	        base_url('assets/back-end/css/plugins.css'),
	        base_url('assets/back-end/css/main.css'),
	        base_url('assets/back-end/css/themes.css'),
		);
		$this->data['add_js'] = array(
		    base_url('assets/back-end/js/vendor/bootstrap.min.js'),
	        base_url('assets/back-end/js/plugins.js'),
	        base_url('assets/back-end/js/app.js'),
	        base_url('assets/back-end/js/helpers/gmaps.min.js'),
	        base_url('assets/back-end/js/pages/index.js'),
		);
		$script = "<script>$(function(){ Index.init(); });</script>";

		$this->data['additional'] = array($script);
		
		$this->_render_page('admin/dashboard/dashboard');
	}
}
