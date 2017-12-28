<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_akses extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Users_akses_model');
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
	function data_users_akses($id_user_akses=null)
	{
		if (isset($id_user_akses)) 
		{
			$data = $this->Users_akses_model->data_users_akses($id_user_akses)->result();
		}
		else
		{
			$data = $this->Users_akses_model->data_users_akses()->result();
		}
		$no = 1;
		foreach ($data as $value) {
			$hasil[] = array(
				'no' => '<p style="text-align:center;">'.$no.'</i>',
				'id_user_akses' =>$value->id_user_akses,
				'label'=> $value->label,
				'description'=> $value->description,
				'link' =>'<p style="text-align:center;"><a href="'.base_url('Users/edit/'.$value->id_user_akses).'" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a><a href="'.base_url('Users/delete/'.$value->id_user_akses).'" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a></p>'
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
   				'parent' =>'Users akses',
   				'link_parent' =>'User_akses'
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
	       base_url('assets/back-end/data/users-akses/dataUsersAkses.js'),
	         base_url('assets/noty/jquery.noty.packaged.min.js'),
	    	base_url('assets/noty/js/noty/packaged/jquery.noty.packaged.min.js'),
	    	base_url('assets/noty/demo/notification_html.js'),
		);
		//$this->data['data']=array($data);
		$script = "<script>$(function(){ TablesDatatables.init(); });</script>";

		$this->data['additional'] = array($script);
		$this->_render_page('admin/users-akses/data-users-akses');
	}
}
