<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materi extends CI_Controller {
	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('id_guru') == null){
			redirect("login");
		}
	}
	public function index()
	{
		$data['judul'] = "Materi";
		$data['mapel'] = $this->almiraModels->whereQuery('tb_mapel', array('status_mapel'=>'1', 'kd_user'=>$this->session->userdata('id_guru') ));
		$this->load->view('_/header', $data);
		$this->load->view('_/sidebar');
		$this->load->view('mapel/v_materi', $data);
		$this->load->view('_/footer');
	}
	public function detail($id)
	{
		$idMateri = dekrip($id);
		$detail = $this->almiraModels->whereQuery('tb_mapel', array('id_mapel'=> $idMateri))->row();
		$data['judul'] = $detail->nama_mapel;
		$data['materi'] = $this->almiraModels->queryJoinWhere('tb_mapel', 'tb_materi', 'tb_materi.kd_mapel=tb_mapel.id_mapel','tb_materi.kd_mapel',$idMateri);
		$this->load->view('media/media', $data);
	}

	public function get_detail($referensi){		
		$detailMateri = $this->almiraModels->whereQuery('tb_materi', array('id_materi'=>$referensi))->row();

		$data = json_encode($detailMateri);
		echo $data;

	}

	public function tambah()
	{
		$idMapel=dekrip($this->input->post("i_id"));
		$id=$this->input->post("i_id");
		$field['kd_mapel'] = $idMapel;
		$field['judul_bab'] = $this->input->post("i_bab");
		$field['materi'] = $this->input->post("i_materi");
		$field['semester'] = $this->input->post("i_semester");

		$querr = $this->almiraModels->insert('tb_materi', $field);

		if ($querr == '1') {
			$message = array('status'=>'1','message'=>'Data Berhasil Ditambah');
		}else{
			$message = array('status'=>'0','message'=>'Sepertinya Ada Kesalahan');
		} 
            
        $this->session->set_flashdata($message);
		redirect('materi/detail/'.$id);
	}

	public function update()
	{
		$idMapel = $this->input->post("i_kdmateri");
		$id=$this->input->post("i_id");
		$field['judul_bab'] = $this->input->post("i_bab");
		$field['materi'] = $this->input->post("i_materi");
		$field['semester'] = $this->input->post("i_semesterr");

		$querr = $this->almiraModels->update('tb_materi', 'id_materi', $id, $field);

		if ($querr == '1') {
			$message = array('status'=>'1','message'=>'Data Berhasil Dirubah');
		}else{
			$message = array('status'=>'0','message'=>'Sepertinya Ada Kesalahan');
		} 
            
        $this->session->set_flashdata($message);
		redirect('materi/detail/'.$idMapel);
	}

	public function delete($id)
	{
		$querr = $this->almiraModels->delete('tb_materi', 'id_materi', $id);

		if ($querr=='1') {
			$result=array('status'=>'1', 'message'=>'Data Berhasil Dihapus');
		}else{
			$result=array('status'=>'0', 'message'=>'Sepertinya ada yang salah');
		}

		$data = json_encode($result);
		echo $data;
	}

	public function upimage()
	{
		if(isset($_FILES['upload']['name']))
        {
            $file = $_FILES['upload']['tmp_name'];
            $file_name = $_FILES['upload']['name'];
            $file_name_array = explode(".", $file_name);
            $extension = end($file_name_array);
            $new_image_name = rand() . '.' . $extension;
            $allowed_extension = array("jpg", "jpeg", "png","PNG","JPEG","JPG");
            if(in_array($extension, $allowed_extension))
            {
                move_uploaded_file($file, './assets/imgmateri/' . $new_image_name);
                $function_number = $_GET['CKEditorFuncNum'];
                $url = base_url().'assets/imgmateri/' . $new_image_name;
                $message = '';
                echo"<script>window.parent.CKEDITOR.tools.callFunction('$function_number','$url','$message')</script>";

            }
    	}
	}

	public function finish($id)
	{
		$field['status_bljr'] = "1";

		$querr = $this->almiraModels->update('tb_materi', 'id_materi', $id, $field);

		if ($querr=='1') {
			$result=array('status'=>'1', 'message'=>'Data Berhasil Dihapus');
		}else{
			$result=array('status'=>'0', 'message'=>'Sepertinya ada yang salah');
		}

		$data = json_encode($result);
		echo $data;
	}
}
