<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lembaga extends CI_Controller {
	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('id_guru') == null){
			redirect("login");
		}
	}
	public function index()
	{	
		$header['judul'] = "Lembaga";
		$this->load->view('_/header', $header);
		$this->load->view('_/sidebar');
		$this->load->view('lembaga/v_lembaga');
		$this->load->view('_/footer');
	}
}
