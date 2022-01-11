<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends CI_Controller {
	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('id_guru') == null){
			redirect("login");
		}
	}
	public function index($id)
	{
		$detail = $this->almiraModels->whereQuery('tb_mapel', 'id_mapel', $id)->row();
		$data['judul'] = "Materi ".$detail->nama_mapel;
		$data['materi'] = $this->almiraModels->queryJoinWhere('tb_mapel', 'tb_materi', 'tb_materi.kd_mapel=tb_mapel.id_mapel','tb_materi.kd_mapel',$id);
		$this->load->view('media/media', $data);
	}
}
