<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('id_guru') == null){
			redirect("login");
		}
	}
	public function index()
	{
		$header['judul'] = "Dashboard";
		$data['mapel'] = $this->almiraModels->whereQuery('tb_mapel', array('status_mapel'=>'1', 'kd_user'=>$this->session->userdata('id_guru') ));
		$this->load->view('_/header', $header);
		$this->load->view('_/sidebar', $data);
		$this->load->view('_/content');
		$this->load->view('_/footer');
	}
}
