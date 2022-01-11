<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perangkatrpp extends CI_Controller {
	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('id_guru') == null){
			redirect("login");
		}
	}
	public function index()
	{
		$data['judul'] = "RPP";
		$data['mapel'] = $this->almiraModels->whereQuery('tb_mapel', array('status_mapel'=>'1', 'kd_user'=>$this->session->userdata('id_guru') ));
		$this->load->view('_/header', $data);
		$this->load->view('_/sidebar', $data);
		$this->load->view('perangkat/rpp', $data);
		$this->load->view('_/footer');
	}

	public function detail($id)
	{
		$idMapel = dekrip($id);
		$RPP = $this->almiraModels->whereQuery("tb_mapel", array('id_mapel'=>$idMapel))->row();
		$data['judul'] = "RPP ".$RPP->nama_mapel;
		$data['mapel'] = $this->almiraModels->whereQuery('tb_mapel', array('status_mapel'=>'1', 'kd_user'=>$this->session->userdata('id_guru') ));
		$data['detailmapel'] = $this->almiraModels->whereQuery('tb_mapel', array('id_mapel'=>$idMapel,'status_mapel'=>'1'));
		$this->load->view('_/header', $data);
		$this->load->view('_/sidebar', $data);
		$this->load->view('perangkat/rpp', $data);
		$this->load->view('_/footer');
	}
}
