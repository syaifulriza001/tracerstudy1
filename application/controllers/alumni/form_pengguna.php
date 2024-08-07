<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
	// public function __construct()
	// {
	// 	parent::__construct();
	// 	if ($this->session->userdata('isLogin') != "1") {
	// 		$this->session->set_flashdata('gagal', 'Anda Tidak Memiliki Akses Silahkan Login atau Registrasi');
	// 		redirect('login');
	// 	} else if ($this->session->userdata('id_user_grup') != "0") {
	// 		$this->session->set_flashdata('gagal', 'Anda Tidak Memiliki Akses Silahkan Login atau Registrasi');
	// 		redirect('login');
	// 	}
	// 	$this->load->model('users_model');
	// 	$this->load->model('Custom_model');
	// }

	public function index()
	{
		$this->load->model('loker_model');
		$this->load->model('survey_model');
		$this->load->model('bidang_pekerjaan_model');
		$data2['website'] = $this->Custom_model->getAll();
		$data['user'] = $this->users_model->getById($this->session->userdata('id'))->row();
		$data['total_loker'] = $this->loker_model->getTotal()->result();
		$data['total_survey'] = $this->survey_model->getTotal()->result();
		$data['bidang_pekerjaan'] = $this->bidang_pekerjaan_model->getAll()->result();
		$this->load->view('alumni/include/header', $data2);
		$this->load->view('alumni/home_v', $data);
		$this->load->view('alumni/include/footer', $data2);
	}
	public function data()
	{
		$data['user'] = $this->users_model->getById($this->session->userdata('id'))->row();
		$data2['website'] = $this->Custom_model->getAll();
		$this->load->view('alumni/include/header', $data2);
		$this->load->view('alumni/datadiri_v', $data);
		$this->load->view('alumni/include/footer', $data2);
	}
	public function ubahpass()
	{
		$data['user'] = $this->users_model->getById($this->session->userdata('id'))->row();
		$data2['website'] = $this->Custom_model->getAll();
		$this->load->view('alumni/ubahpass_v', $data);
		$this->load->view('alumni/include/footer', $data2);
	}
	public function gantipass()
	{
		$id = $this->session->userdata('id');
		$user = $this->users_model->getById($this->session->userdata('id'))->row();

		$old_pass = substr(md5($this->input->post('old_password')), 0, 15);
		$pass = $user->password;

		if ($old_pass == $pass) {
			$data = $this->users_model->ubahpassword($id);
			if ($data == true) {
				$this->session->set_flashdata('kondisi', '1');
				$this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissible fade show" role="alert">
							 Berhasil Mengubah Password!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						  </button>
						</div>');
				redirect('data');
			} else {
				$this->session->set_flashdata('kondisi', '0');
				$this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					 	Gagal Mengubah Password!
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
				redirect('data');
			}
		} else {
			$this->session->set_flashdata('kondisi', '0');
			$this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					 	Password lama salah!
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
			redirect('data');
		}
	}

	public function cekpass()
	{
		$id = $this->session->userdata('id');
		$old_passowrd = $this->input->post('old_password');

		$data = $this->users_model->cekPass($id, $old_passowrd);

		if ($data == true) {
			echo true;
		} else {
			echo false;
		}
	}

	public function pekerjaan()
	{
		$this->load->model('loker_model');
		$this->load->model('bidang_pekerjaan_model');
		$data['user'] = $this->users_model->getById($this->session->userdata('id'))->row();
		$data['bidang_pekerjaan'] = $this->bidang_pekerjaan_model->getAll()->result();
		$data2['website'] = $this->Custom_model->getAll();
		$this->load->view('alumni/include/header', $data2);
		$this->load->view('alumni/datapekerjaan_v', $data);
		$this->load->view('alumni/include/footer', $data2);
	}
	public function loker()
	{
		$this->load->model('loker_model');
		$data['user'] = $this->users_model->getById($this->session->userdata('id'))->row();
		$data['total_loker'] = $this->loker_model->getTotal()->result();
		$data['loker'] = $this->loker_model->getAll()->result();
		$data['myloker'] = $this->loker_model->getByIdUser($this->session->userdata('id'))->result();
		$data['website'] = $this->Custom_model->getAll();
		$this->load->view('alumni/include/header', $data);
		$this->load->view('alumni/loker_v', $data);
		$this->load->view('alumni/include/footer', $data);
	}
	public function tambah_loker()
	{
		$this->load->model('Admin_model');
		$data = array (
			'id' => $this->session->userdata("id"),
			'judul' => $this->input->post("jdl"),
			'kota' => $this->input->post("kota"),
			'instansi' => $this->input->post("inst"),
			'email' => $this->input->post("email"),
			'syarat' => $this->input->post("syarat"),
			'deskripsi' => $this->input->post("desk"),
			'tgl_akhir' => $this->input->post("tgl_tutup")
		);

		$this->Admin_model->tambah_loker($data);
		$this->session->set_flashdata('berhasil', 'lowongan pekerjaan Berhasil Ditambahkan');
		redirect(base_url('loker'));
	}
	public function hapus_loker($id)
	{
		$this->load->model('Admin_model');
		$this->Admin_model->hapus_loker($id);
		$this->session->set_flashdata('berhasil', 'lowongan pekerjaan Berhasil Dihapuskan');
		redirect(base_url('loker'));
	}
	public function trace()
	{
		$this->load->model('survey_model');
		$data['survey'] = $this->survey_model->getAva()->result();
		$data2['website'] = $this->Custom_model->getAll();
		$this->load->view('alumni/include/header', $data2);
		$this->load->view('alumni/tracestudy_v', $data);
		$this->load->view('alumni/include/footer', $data2);
	}
	public function testi()
	{
		$data['user'] = $this->users_model->getById($this->session->userdata('id'))->row();
		$data2['website'] = $this->Custom_model->getAll();
		$this->load->view('alumni/include/header', $data2);
		$this->load->view('alumni/testi_v', $data);
		$this->load->view('alumni/include/footer', $data2);
	}
	public function survei($id)
	{
		$this->load->model('survey_model');
		$this->load->model('survey_pertanyaan_model');
		$this->load->model('jawaban_pertanyaan_model');
		$data['title'] = $id;
		$data['survey'] = $this->survey_model->getById($id)->row();
		$data['surveyPertanyaan'] = $this->survey_pertanyaan_model->getByIdPertanyaanSatu($id, 1)->row();
		$data['cekPertanyaan'] = $this->survey_pertanyaan_model->getByIdPertanyaan($id)->num_rows();
		$data['cekJawabanUser'] = $this->jawaban_pertanyaan_model->getById($id)->num_rows();
		$data2['website'] = $this->Custom_model->getAll();
		$this->load->view('alumni/include/header', $data2);
		$this->load->view('alumni/infosurvei_v', $data);
		$this->load->view('alumni/include/footer', $data2);
	}

	public function lakukansurvei()
	{
		$idSurvei = $this->uri->segment(2);
		$idPertanyaan = $this->uri->segment(3);
		$this->load->model('jawaban_pertanyaan_model');
		$this->load->model('survey_pertanyaan_model');
		$this->load->model('jawaban_pertanyaan_model');
		if ($this->input->post('submit')) {

			$input = $this->jawaban_pertanyaan_model->tambah($idSurvei, $idPertanyaan);
			$idBaru;
			$pertanyaan = $this->survey_pertanyaan_model->getById($idSurvei);
			foreach ($pertanyaan->result() as $pertanyaan) {
				if ($pertanyaan->id > $idPertanyaan) {
					$idPertanyaan = $pertanyaan->id;
					break;
				}
			}
		} else if ($this->input->post('back')) {
			$idBaru;
			$pertanyaan = $this->survey_pertanyaan_model->getById($idSurvei);
			foreach ($pertanyaan->result() as $pertanyaan) {
				$idPertanyaan = $pertanyaan->id - 1;
				break;
			}
		} else if ($this->input->post('save')) {

			$input = $this->jawaban_pertanyaan_model->tambah($idSurvei, $idPertanyaan);
			$this->session->set_flashdata('hasilSurvey', 'Pengisian Survey Berhasil ! Terimakasih. Silahkan klik Home untuk Kembali atau Logout untuk keluar dari aplikasi. ');
			redirect('detailSurvey/' . $idSurvei);
		}
		$this->load->model('survey_pertanyaan_model');
		$this->load->model('survey_jawaban_model');
		$data['idSurvei'] = $idSurvei;
		$data['idPertanyaan'] = $idPertanyaan;
		$data['surveyPertanyaanLimitStart'] = $this->survey_pertanyaan_model->getByIdPertanyaanLimitStart($idSurvei, $idPertanyaan);
		$data['surveyPertanyaanLimit'] = $this->survey_pertanyaan_model->getByIdPertanyaanLimit($idSurvei, $idPertanyaan)->row();
		$data['surveyPertanyaanLast'] = $this->survey_pertanyaan_model->getByIdPertanyaanLast($idSurvei)->result();
		$data['surveyJawaban'] = $this->survey_jawaban_model->getByIdJawaban($idSurvei, $idPertanyaan)->result();
		$data2['website'] = $this->Custom_model->getAll();
		$this->load->view('alumni/include/header', $data2);
		$this->load->view('alumni/pertanyaan_v', $data);
		$this->load->view('alumni/include/footer', $data2);
	}
	public function doSurvei($idSurvei)
	{

		if($this->input->post('save')){
			$this->load->model('jawaban_pertanyaan_model');
			$input = $this->jawaban_pertanyaan_model->tambah($idSurvei,$idPertanyaan);
			$this->session->set_flashdata('hasilSurvey','Pengisian Survey Berhasil ! Terimakasih. Silahkan klik Home untuk Kembali atau Logout untuk keluar dari aplikasi. ');
			redirect('infoSurveyy/'.$idSurvei);
		}

		$this->load->model('survey_model');
		$this->load->model('survey_jawaban_model');
		$this->load->model('survey_pertanyaan_model');
		$this->load->model('jawaban_pertanyaan_model');
		$data['lastJwb'] = $this->survey_jawaban_model->getLast($idSurvei)->result();
		$data['survei'] = $this->survey_model->getById($idSurvei)->result();
		$data['pertanyaan'] = $this->survey_pertanyaan_model->getById($idSurvei)->result();
		$data['jawaban'] = $this->survey_jawaban_model->getByIdSurvei($idSurvei)->result();
		$data['cekJawaban'] = $this->survey_jawaban_model->getById($idSurvei)->num_rows();
		$data2['website'] = $this->Custom_model->getAll();
		$this->load->view('alumni/include/header', $data2);
		$this->load->view('alumni/pertanyaansurvei_v', $data);
		$this->load->view('alumni/include/footer', $data2);
	}
	public function submitSurvei($idSurvei)
	{
		$this->load->model('survey_model');

		$data = $this->survey_model->submit($idSurvei);
		if ($data == true) {
			$this->session->set_flashdata('berhasil', 'survei Berhasil dikirim');
			redirect('infoSurvey/'.$idSurvei);
		} else {
			$this->session->set_flashdata('gagal', 'survei gagal dikirim');
					redirect('infoSurvey/'.$idSurvei);
		}


	}

	public function submitKuesionerPengguna($idSurvei)
	{
		$this->load->model('Kuesioner_pengguna_model');

		$data = $this->Kuesioner_pengguna_model->submit($idSurvei);
		if ($data == true) {
			$this->session->set_flashdata('berhasil', 'survei Berhasil dikirim');
			redirect('infoSurvey/'.$idSurvei);
		} else {
			$this->session->set_flashdata('gagal', 'survei gagal dikirim');
					redirect('infoSurvey/'.$idSurvei);
		}
	}

	public function tambahtesti($id)
	{

		$data = $this->users_model->addtesti($id);
		if ($data == true) {
			$this->session->set_flashdata('kondisi', '1');
			$this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissible fade show" role="alert">
					 	Berhasil Dikirim!
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
			redirect('testi');
		} else {
			$this->session->set_flashdata('kondisi', '0');
			$this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					 	Gagal Dikirim!
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
		}
	}

	public function ubahtesti($id)
	{

		$data = $this->users_model->updatetesti($id);
		if ($data == true) {
			$this->session->set_flashdata('kondisi', '1');
			$this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissible fade show" role="alert">
					 	Berhasil Diupdate!
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
			redirect('testi');
		} else {
			$this->session->set_flashdata('kondisi', '0');
			$this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					 	Gagal Diupdate!
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
		}
	}

	public function ubahemail()
	{
		$email = $this->input->post('email');
		$user = $this->users_model->getById($this->session->userdata('id'))->row();
		$token = $user->password;

		$subject = 'Verifikasi Perubahan Email';
		$message = 'Klik link berikut untuk verifikasi akun anda: <a href="' . base_url() . 'login/verifikasi?email=' . $email . '&token=' . $token . '">Activate</a>';
		_sendMail($email, $subject, $message);

		$data = $this->users_model->ubahEmail($user->id, $email);
		if ($data == true) {
			$this->session->set_userdata('isLogin') == "0";
			$this->session->sess_destroy();

			$this->session->set_flashdata('login', "Email berhasil diubah, silahkan verifikasi untuk lanjut login.");
			redirect('login');
		} else {
			$this->session->set_flashdata('kondisi', '0');
			$this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					 Gagal mengubah email, silahkan coba lagi nanti.
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				  </button>
				</div>');
		}
	}

}
