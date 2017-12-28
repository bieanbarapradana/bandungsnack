<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notif extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Notifikasi_model');
	}
	
	function cek_notif()
	{
	//	$id_penerima = $this->session->userdata('id_user');
		$data=$this->Notifikasi_model->get_notif();
		echo count($data);
		
	}
	function lihat_pesan()
	{
		$id_penerima = $this->session->userdata('id_user');
		$data=$this->Notifikasi_model->get_detail_notif($id_penerima)->result();

		if(count($data) > 0){
    		echo " <div>";
		}else{
		    die("<font color=red size=1>Tidak ada pesan baru yang belum dibaca</font>");
		}

		foreach ($data as $key => $value) {
		    echo "
		     <a href=".base_url('notif/update/'.$value->id)."><strong>".$value->from."</strong>  <small class='pull-right text-muted'><span class='glyphicon glyphicon-time p-r-5'></span>".date('Y')."
                            </small> <p>".$value->isi."</p></a>";
		}
		echo "</div>";
	}
	function update($id=null)
	{
		if (isset($id)) 
		{
			$this->Notifikasi_model->update($id);
			$url = $this->Notifikasi_model->get_data($id)->row();
			redirect(base_url($url->url));
		}
		else
		{
			redirect(base_url());
		}
	}

                            
}