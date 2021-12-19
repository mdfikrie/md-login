<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('password','Password','trim|required');

		if($this->form_validation->run() == false){
			$data['title'] = 'Halaman login';
			$this->load->view('templates/header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/footer');
		}else{
			$this->_login();
		}
	}

	private function _login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$user = $this->db->get_where('users',['email'=> $email])->row_array();
		if($user){
			if($user['is_active'] == 1){
				var_dump($password);
				if(password_verify($password, $user['password'])){
					redirect('home');
				}else{
					$this->session->set_flashdata('pesan','<div class="alert alert-success">Password salah!</div>');
					redirect('auth');
				}
			}else{
				$this->session->set_flashdata('pesan','<div class="alert alert-success">Akun belum aktif!</div>');
				redirect('auth');
			}
		}else{
			$this->session->set_flashdata('pesan','<div class="alert alert-success">User tidak ditemukan!</div>');
			redirect('auth');
		}
	}

	public function registration(){
		var_dump( $this->input->post('name'));
		$this->form_validation->set_rules('name','Name','required|trim');
		$this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[users.email]',[
			'is_unique' => "Email sudah digunakan!",
		]);
		$this->form_validation->set_rules('password1','Password1','required|trim|min_length[3]');
		$this->form_validation->set_rules('password2','Password2','required|trim|matches[password1]',[
			'matches'=>'Password not matches!',
		]);

		if($this->form_validation->run()==false){
			$data['title'] = 'Halaman register';
			$this->load->view('templates/header', $data);
			$this->load->view('auth/registration');
			$this->load->view('templates/footer');
		}else{
			$data = [
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'password' => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
				'role' => 'user',
				'is_active' => 0,
				'created_at' => time(),
			];

			$this->db->insert('users',$data);
			$this->session->set_flashdata('pesan','
			<div class="alert alert-success">Registrasi berhasil!</div>');
			redirect('auth');
		}
	}
}
