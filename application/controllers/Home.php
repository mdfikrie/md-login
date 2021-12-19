<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
        $data['title'] = "Data Mahasiswa";
        $this->load->view('templates/header',$data);
		$this->load->view('home/home');
        $this->load->view('templates/footer');
	}
}
