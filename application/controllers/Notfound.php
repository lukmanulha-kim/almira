<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notfound extends CI_Controller {
	public function index()
	{
		$header['judul'] = "Not Found";
		$this->load->view('v_notfound', $header);
	}
}
