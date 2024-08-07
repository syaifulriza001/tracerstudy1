<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
	}
	public function daftar()
	{
		$this->load->model('bidang_pekerjaan_model');
		$data['bidang_pekerjaan'] = $this->bidang_pekerjaan_model->getAll()->result();
		$this->load->view('frontend/register', $data);
	}
	public function aksidaftar()
	{
		
		$config['upload_path']          = './assets/user/';
		$config['allowed_types']        = 'jpg|png|jpeg';
		$config['overwrite']			= true;
		$config['max_size']             = 4096;
		$config['max_width']            = 4028;
		$config['max_height']           = 4028;
		
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('foto')) {
			$this->session->set_flashdata('msg', 'gagal upload');
			redirect('register/daftar');
		} else {
			$foto = $this->upload->data('file_name');
			$data = $this->users_model->daftar($foto);
			if ($data) {
				$email = $data['email'];
				$token = $data['password'];
				$message = 'Klik link berikut untuk verifikasi akun anda: <a href="' . base_url() . 'register/verifikasi?email=' . $email . '&token=' . $token . '">Activate</a>';
				$subject = 'Verifikasi Akun';
				_sendMail($email, $subject, $message);

				$this->session->set_flashdata('login', 'Registrasi telah berhasil dilakukan, silahkan verifikasi email anda.');
				redirect('login');
			} else {
				$this->session->set_flashdata('login', 'Pendaftaran gagal, silahkan coba lagi!');
				redirect('login');
			}
		}
	}

	public function verifikasi()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->users_model->get_email($email);

		if ($user) {
			if ($user->password == $token) {
				if ($this->users_model->verifikasi('nonaktif', $email)) {
					$this->session->set_flashdata('login', "Verifikasi akun berhasil, silahkan menunggu 1x24 jam hingga akun anda diaktifkan.");
					redirect('login');
				} else {
					$this->session->set_flashdata('login', "Verifikasi akun gagal. Coba lagi nanti.");
					redirect('login');
				}
			} else {
				$this->session->set_flashdata('login', "Token tidak sesuai. Coba lagi nanti.");
				redirect('login');
			}
		} else {
			$this->session->set_flashdata('login', "Email tidak ditemukan.");
			redirect('login');
		}
	}

	public function cekEmail()
	{
		$email = $this->input->post('email');

		$data = $this->users_model->cekEmail($email);

		if ($data == true) {
			echo true;
		} else {
			echo false;
		}
	}

	public function cekNim(){
		$nim = $this->input->post('nim');

		$data = $this->users_model->cekNim($nim);

		if ($data == true) {
			echo true;
		} else {
			echo false;
		}
	}
}
