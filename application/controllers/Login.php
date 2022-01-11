<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function index()
	{
		$data['judul'] = "Login";
		$this->load->view('_/login', $data);
	}

	public function cek()
	{
		$NIP = $this->input->post('i_nip');
		$PWD = enkrip($this->input->post('i_pwd'));

		$cek = $this->almiraModels->whereQuery('tb_user', array('nip_nuptk'=>$NIP, 'password'=>$PWD))->row();
		// print_r($cek);
		if (null!==$cek) {
			$this->session->set_userdata(array("id_guru"=>$cek->id_guru,"nama_guru"=>$cek->nama_guru));
			redirect('dashboard');
		}else{
			$message = array('alert'=>'danger','message'=>'NIP atau Password Sepertinya Salah. Harap Periksa Kembali');
			$this->session->set_flashdata($message);
			redirect('login');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect("welcome");
	}

	public function register()
	{
		$data['judul'] = "Daftar";
		$this->load->view('_/v_register', $data);
	}

	public function doregis()
	{
		$field['nip_nuptk'] = $this->input->post('i_nip');
		$field['nama_guru'] = $this->input->post('i_nama');
		$field['alamat'] = $this->input->post('i_alamat');
		$field['password'] = enkrip($this->input->post('i_pwd'));

		$q = $this->almiraModels->insert('tb_user', $field);

		if ($q == '1') {
			$message = array('alert'=>'primary','message'=>'Berhasil Mendaftar. Silahkan Login');
		}else{
			$message = array('alert'=>'danger','message'=>'Sepertinya Ada Kesalahan');
		} 
            
        $this->session->set_flashdata($message);
		redirect('login');
	}
}
