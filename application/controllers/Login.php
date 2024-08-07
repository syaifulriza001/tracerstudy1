<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
	public function index()
	{
        // if ($this->session->userdata('isLogin')=="1") {
        //     $this->session->set_userdata('login','Anda sudah login !!');
        //     redirect(base_url('admin'));
        // }
		$this->load->view('login');
    }
    
    public function doLogin()
    {
        $this->load->model('users_model');
        $cek_user = $this->users_model->cek_user();
		if ($cek_user->num_rows() > 0) {
			foreach($cek_user->result() as $user){
				if ($user->status=="aktif") {
					$sess = array(
						'isLogin' => "1",
						'id' => $user->id,
						'id_user_grup' => $user->id_user_grup,
						'nama_depan'=> $user->nama_depan,
						'nama_belakang'=> $user->nama_belakang,
						'jenis_kelamin'=> $user->jenis_kelamin,
						'tgl_lahir' => $user->tgl_lahir,
						'telp' => $user->telp,
						'alamat' => $user->alamat,
						'email' => $user->email,
						'tahun_lulus' => $user->tahun_lulus,
						'angkatan' => $user->angkatan,
						'foto' => $user->foto,
						'status' => $user->status
					);
					$this->session->set_userdata($sess);
					if ($this->session->userdata('id_user_grup')==1) {
						$this->session->set_flashdata('login','Selamat Datang Admin!');
						redirect(base_url('admin'));
					}else if($this->session->userdata('id_user_grup')==2){
						$this->session->set_flashdata('login','Selamat Datang !');
						redirect(base_url('admin'));
					}else if($this->session->userdata('id_user_grup')==0){
						$this->session->set_flashdata('login','Selamat Datang !');
						redirect('dashboard');
					}
				}elseif($user->status=="nonaktif"){
					$this->session->set_flashdata('login','Akun anda belum aktif ! Silahkan tunggu 1x24jam atau bila sudah melebihi waktu tersebut silahkan hubungi dosen atau admin Program Studi Informatika');
					redirect('login');
				}else{
					$this->session->set_flashdata('login', 'Anda belum memverifikasi email anda, silahkan verifikasi untuk melanjutkan.');
					redirect('login');
				}
			}
			
		}else{
			$this->session->set_flashdata('login','Password atau Username anda tidak cocok !');
			redirect('login');
		}
    }

    public function logout()
    {
        $this->session->set_userdata('isLogin')=="0";
        $this->session->sess_destroy();
        redirect('login');
    }

	public function lupapass(){
		$this->load->model('users_model');
		
		$email = $this->input->post('email');
		$user = $this->users_model->get_email($email);
		$id = base64_encode($user->id);

		$subject = "Lupa Password";
		$message = 'Klik link berikut untuk mengubah password: <a href="' . base_url() . 'login/ubahpwd?id='. $id .'">Ubah Password</a>';
		_sendMail($email,$subject,$message);
		$this->session->set_flashdata('login', "Email Konfirmasi Sudah Dikirimkan.");
		redirect('login');
	}

	public function ubahpwd(){
		$this->load->model('users_model');

		$id = base64_decode($this->input->get('id'));
		$data['user'] = $this->users_model->getById($id)->row();

		$this->load->view('alumni/lupapass_v', $data);
		$this->load->view('alumni/include/footer');
	}

	public function ubahpass(){
		$this->load->model('users_model');

		$id = $this->input->post('id');

		$data = $this->users_model->gantiPass($id);
		
		if($data == true){
			$this->session->set_flashdata('login', "Password anda telah diperbarui, silahkan login.");
			redirect('login');
		}else{
			$this->session->set_flashdata('login', "Password anda gagal diperbarui, silahkan coba lagi nanti.");
			redirect('login');
		}
	}

	public function verifikasi(){
		$this->load->model('users_model');
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->users_model->get_email($email);

		if ($user) {
			if ($user->password == $token) {
				if ($this->users_model->verifikasi('aktif', $email)) {
				$this->session->set_flashdata('login', "Verifikasi email baru anda berhasil, silahkan login.");
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

}
