<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel extends CI_Controller {
	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('id_guru') == null){
			redirect("login");
		}
	}
	public function index()
	{
		$data['judul'] = "Mata Pelajaran";
		$data['mapel'] = $this->almiraModels->whereQuery('tb_mapel', array('kd_user'=>$this->session->userdata('id_guru')));
		$this->load->view('_/header', $data);
		$this->load->view('_/sidebar');
		$this->load->view('mapel/v_mapel', $data);
		$this->load->view('_/footer');
	}
	public function tambah()
	{
		$field['nama_mapel'] = $this->input->post('i_mapel');
		$field['status_mapel'] = '1';
		$field['kd_user'] = dekrip($this->input->post('i_user'));

		$querr = $this->almiraModels->insert('tb_mapel', $field);

		if ($querr == '1') {
			$message = array('status'=>'1','message'=>'Data Berhasil Ditambah');
		}else{
			$message = array('status'=>'0','message'=>'Sepertinya Ada Kesalahan');
		} 
            
        $this->session->set_flashdata($message);
		redirect('mapel');
	}
	public function edit($id)
	{
		$idMapel = dekrip($id);
        $e = $this->db->where('id_mapel', $idMapel)->get('tb_mapel')->row();

        $kirim['id'] = $e->id_mapel;
        $kirim['nama'] = $e->nama_mapel;
        $kirim['status'] = $e->status_mapel;
        $kirim['user'] = $e->kd_user;

        $this->output->set_content_type('application/json')->set_output(json_encode($kirim));
	}
	public function update()
	{
		$params = dekrip($this->input->post('i_id'));
		$field['nama_mapel'] = $this->input->post('i_mapel');
		$field['status_mapel'] = $this->input->post('i_status');
		$field['kd_user'] = dekrip($this->input->post('i_user'));
		$querr = $this->almiraModels->update('tb_mapel', 'id_mapel', $params, $field);
		if ($querr == '1') {
			$message = array('status'=>'1','message'=>'Data Berhasil Dirubah');
		}else{
			$message = array('status'=>'0','message'=>'Sepertinya Ada Kesalahan');
		}            
        	$this->session->set_flashdata($message);
		redirect('mapel');
	}
}
