<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		$this->load->model('Admin_model');
		if ($this->session->userdata('isLogin')!="1") {
			redirect('login');
		}else if ($this->session->userdata('id_user_grup') != "1") {
			$this->session->set_flashdata('gagal', 'Anda Tidak Memiliki Akses Silahkan Login atau Registrasi');
			redirect('login');
		}
		$this->load->model('Custom_model');
		$this->load->model('survey_model');
		$this->load->model('survey_pertanyaan_model');
		$this->load->model('jawaban_pertanyaan_model');
		$this->load->model('users_model');
		$this->load->model('loker_model');
		$this->load->model('Admin_model');
		$this->load->model('report_model');

	}

// DASHBOARD
	public function index()
	{
		$data['website'] = $this->Custom_model->getAll();
		$data['aktivitas'] = $this->Admin_model->recent();
    $data['jlh_alumni'] = $this->Admin_model->getAll('aktifuser_v')->num_rows();
		$data['jlh_loker'] = $this->Admin_model->getAll('loker_v')->num_rows();
		$data['jlh_survei'] = $this->Admin_model->getAll('surveitersedia_v')->num_rows();
		$data['jlh_testimoni'] = $this->Admin_model->getAll('testi_v')->num_rows();
		$data['sudahIsi'] = $this->Admin_model->sudahIsi();
		$data['survey_pengguna'] = $this->Admin_model->survey_pengguna()->result();

		$this->load->view('backend/include/header');
		$this->load->view('backend/include/sidebar',$data);
		$this->load->view('backend/dashboard',$data);
		$this->load->view('backend/include/footer');
	}
// END DASHBOARD

// PROFIL
	public function profile_page()
	{
		$data['data'] = $this->Admin_model->getById($this->session->userdata("id"));
		$data['website'] = $this->Custom_model->getAll();
		$this->load->view('backend/include/header');
		$this->load->view('backend/include/sidebar');
		$this->load->view('backend/profile', $data);
		$this->load->view('backend/include/footer');
	}

	public function profile_upd()
	{
		if ($this->input->post("pass") == NULL) {
			$data = array (
				'nama_depan' => $this->input->post("nama_depan"),
				'nama_belakang' => $this->input->post("nama_belakang"),
				'email' => $this->input->post("email"),
				'password' => '',
				'id' => $this->session->userdata("id")
			);
		} else {
			$data = array (
				'nama_depan' => $this->input->post("nama_depan"),
				'nama_belakang' => $this->input->post("nama_belakang"),
				'email' => $this->input->post("email"),
				'password' => md5($this->input->post("pass")),
				'id' => $this->session->userdata("id")
			);
		}
		$this->Admin_model->update_data($data);
		$this->session->set_flashdata('profil', 'Profil berhasil diperbarui!');
		redirect(base_url('profile'));
	}
// END PROFIL

// NOTIFIKASI
	public function notif_page()
	{
		$data['data'] = $this->Admin_model->getNonaktif();
		$data['website'] = $this->Custom_model->getAll();
		$this->load->view('backend/include/header');
		$this->load->view('backend/include/sidebar');
		$this->load->view('backend/notification', $data);
		$this->load->view('backend/include/footer');
	}

	public function aktiv_akun($id)
	{
		$this->Admin_model->aktivasi_akun($id);
		$this->session->set_flashdata('aktif','Akun berhasil diaktifkan!');
		redirect(base_url('notifikasi'));

	}

	public function get_total()
	{
		$total = $this->Admin_model->getAll('nonaktifuser_v')->num_rows();
		$hasil['total'] = $total;
		echo json_encode($hasil);
	}
// END NOTIFIKASI

// DATA ALUMNI
	public function data()
	{
		$data['website'] = $this->Custom_model->getAll();
        $data['data'] = $this->Admin_model->getAktiv();
		$data['website'] = $this->Custom_model->getAll();
		$this->load->view('backend/include/header');
		$this->load->view('backend/include/sidebar');
		$this->load->view('backend/data_alumni',$data);
		$this->load->view('backend/include/footer');
	}

	public function det_data($id)
	{
		$data['detail'] = $this->Admin_model->getById($id);
		$data['website'] = $this->Custom_model->getAll();
		$this->load->view('backend/include/header');
		$this->load->view('backend/include/sidebar');
		$this->load->view('backend/det_dataAlumni', $data);
		$this->load->view('backend/include/footer');
	}

	public function hapus_alumni()
	{
		$id = $this->input->post('idalumni');
		$this->Admin_model->hapus_alumni($id);
		$this->session->set_flashdata('hapus-alumni', 'Data alumni berhasil dihapus!');
		redirect(base_url('admin/data'));
	}
// END DATA ALUMNI

// SURVEI
	public function survei()
	{
		$data['website'] = $this->Custom_model->getAll();
		$data['survei'] = $this->survey_model->getAll()->result();
		$data['survei1'] = $this->survey_model->getAll()->result();
		$this->load->view('backend/include/header');
		$this->load->view('backend/include/sidebar');
		$this->load->view('backend/survei',$data);
		$this->load->view('backend/include/footer');
	}
	public function surveiDetail($id)
	{
		$data['website'] = $this->Custom_model->getAll();
		$data['title'] = $id;
		$data['survey'] = $this->survey_model->getById($id)->row();
		$data['surveyPertanyaan'] = $this->survey_pertanyaan_model->getById($id)->result();
		$data['surveyPertanyaan2'] = $this->survey_pertanyaan_model->getById($id)->result();
		$this->load->view('backend/include/header');
		$this->load->view('backend/include/sidebar');
		$this->load->view('backend/detailSurvei',$data);
		$this->load->view('backend/include/footer');
	}
	public function pertanyaanDetail($idPertanyaan){
		$this->load->model('survey_jawaban_model');
		$data['website'] = $this->Custom_model->getAll();
		$data['titlePertanyaan'] = $idPertanyaan;
		$data['surveyPertanyaan'] = $this->survey_pertanyaan_model->getByIdPertanyaan($idPertanyaan)->row();
		$data['surveyJawaban'] = $this->survey_jawaban_model->getById($idPertanyaan)->result();
		$data['surveyJawaban2'] = $this->survey_jawaban_model->getById($idPertanyaan)->result();
		$this->load->view('backend/include/header');
		$this->load->view('backend/include/sidebar');
		$this->load->view('backend/detailPertanyaan',$data);
		$this->load->view('backend/include/footer');
	}
// END SURVEI

// TESTIMONI
	public function testi()
	{
		$data['website'] = $this->Custom_model->getAll();
		$data ['testi'] = $this->Admin_model->getAll('testi_v')->result();

		$this->load->view('backend/include/header');
		$this->load->view('backend/include/sidebar');
		$this->load->view('backend/testi', $data);
		$this->load->view('backend/include/footer');
	}

	public function publish_testi($id)
	{
		$this->Admin_model->publish_testi($id);
		$this->session->set_flashdata('publish-testi', 'Testimoni Diposting!');
		redirect(base_url('admin/testi'));
	}

	public function unpublish_testi($id)
	{
		$this->Admin_model->unpublish_testi($id);
		$this->session->set_flashdata('unpublish-testi', 'Testimoni Diturunkan!');
		redirect(base_url('admin/testi'));
	}

	public function kritiksaran()
	{
		$data['website'] = $this->Custom_model->getAll();
		$data ['sdank'] = $this->Admin_model->getAll('testi_v')->result();

		$this->load->view('backend/include/header');
		$this->load->view('backend/include/sidebar');
		$this->load->view('backend/kritiksaran', $data);
		$this->load->view('backend/include/footer');
	}
// END TESTIMONI

// REPORT
	public function report()
	{
		$data['website'] = $this->Custom_model->getAll();
		$data['survey'] = $this->report_model->getAll()->result();
		$this->load->view('backend/include/header');
		$this->load->view('backend/include/sidebar');
		$this->load->view('backend/report', $data);
		$this->load->view('backend/include/footer');
	}
	public function detailReport($id)
	{
		$data['website'] = $this->Custom_model->getAll();
		$data['kuesioner_jawaban'] = $this->survey_pertanyaan_model->getKuesionerAll()->result();
		$data['kuesioner_jawaban_pengisi'] = $this->survey_pertanyaan_model->getKuesionerPengisiAll()->result();
		$data['survey'] = $this->survey_model->getById($id)->result();
		$data['pertanyaan'] = $this->survey_pertanyaan_model->getById($id)->result();
		$data['jawaban'] = $this->report_model->getBySurvei($id)->result();
		$this->load->view('backend/include/header');
		$this->load->view('backend/include/sidebar');
		$this->load->view('backend/detailReport', $data);
		$this->load->view('backend/include/footer');

	}
	public function exportPdf($id){

		$data['website'] = $this->Custom_model->getAll();
		$data['survey'] = $this->report_model->getById($id)->result();
		$data['pertanyaan'] = $this->survey_pertanyaan_model->getById($id)->result();
		$data['jawaban'] = $this->report_model->getBySurvei($id)->result();

		$html = $this->load->view('backend/exportPdf', $data, true);

		// panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');

        // title dari pdf
        $data['title_pdf'] = 'Laporan Tracer Study';

        // filename dari pdf ketika didownload
        $file_pdf = 'Laporan Tracer Study';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";


        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
	}
// END REPORT

// LOKER
	public function loker()
	{
		$data['loker'] = $this->Admin_model->getlokerV();
		$data['detLoker'] = $this->Admin_model->getAll('loker_v')->result();
		$data['website'] = $this->Custom_model->getAll();

		$this->load->view('backend/include/header');
		$this->load->view('backend/include/sidebar');
		$this->load->view('backend/loker',$data);
		$this->load->view('backend/include/footer');
	}

	public function tambah_loker()
	{
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
		$this->session->set_flashdata('tambah-loker', 'Loker berhasil ditambah');
		redirect(base_url('admin/loker'));
	}

	public function publish_loker($id)
	{
		$this->Admin_model->publish_loker($id);
		$this->session->set_flashdata('publish-loker', 'Loker Diposting!');
		redirect(base_url('admin/loker'));
	}

	public function unpublish_loker($id)
	{
		$this->Admin_model->unpublish_loker($id);
		$this->session->set_flashdata('unpublish-loker', 'Loker Diturunkan!');
		redirect(base_url('admin/loker'));
	}

	public function hapus_loker()
	{
		$id = $this->input->post('idloker');
		$this->Admin_model->hapus_loker($id);
		$this->session->set_flashdata('hapus-loker', 'Loker berhasil dihapus');
		redirect(base_url('admin/loker'));
	}

	public function edit_loker($id)
	{
		$data = array (
			'id' => $id,
			'judul' => $this->input->post("jdl"),
			'kota' => $this->input->post("kota"),
			'instansi' => $this->input->post("inst"),
			'email' => $this->input->post("email"),
			'syarat' => $this->input->post("syarat"),
			'deskripsi' => $this->input->post("desk"),
			'tgl_akhir' => $this->input->post("tgl_tutup")
		);

		$this->Admin_model->edit_loker($data);
		$this->session->set_flashdata('edit-loker', 'Loker berhasil diperbarui');
		redirect(base_url('admin/loker'));
	}

	public function bidang_pekerjaan()
	{
		$this->load->model('users_model');
		$data['bidang'] = $this->Admin_model->getAll('bidang_pekerjaan_v')->result();
		$data['user'] = $this->users_model->getAll()->result();
		$data['website'] = $this->Custom_model->getAll();
		$this->load->view('backend/include/header');
		$this->load->view('backend/include/sidebar');
		$this->load->view('backend/bidang_pekerjaan', $data);
		$this->load->view('backend/include/footer');
	}

	public function hapus_bdgPekerjaan()
	{
		$id = $this->input->post('idbidang');
		$this->Admin_model->hapus_bidang($id);
		$this->session->set_flashdata('hapus-job', 'Bidang pekerjaan berhasil dihapus');
		redirect(base_url('admin/bidang-pekerjaan'));
	}

	public function tambah_bdgPekerjaan()
	{
		$this->Admin_model->tambah_bidang($this->input->post("nama_bdg"));
		$this->session->set_flashdata('tambah-job', 'Bidang pekerjaan berhasil ditambah');
		redirect(base_url('admin/bidang-pekerjaan'));
	}

	public function edit_bdgPekerjaan($id)
	{
		$data = array (
			'id' => $id,
			'nama' => $this->input->post("nama_bdg")
		);

		$this->Admin_model->edit_bidang($data);
		$this->session->set_flashdata('edit-job', 'Bidang pekerjaan berhasil diperbarui');
		redirect(base_url('admin/bidang-pekerjaan'));
	}
// END LOKER

// CUSTOM WEB
	public function custom()
	{
		$data['website'] = $this->Custom_model->getAll();

		$this->load->view('backend/include/header');
		$this->load->view('backend/include/sidebar');
		$this->load->view('backend/custom',$data);
		$this->load->view('backend/include/footer');
	}
	public function updateApp()
	{

        $config['upload_path']          = './assets/user/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['overwrite']			= true;
        $config['max_size']             = 15000; // 1MB
        $config['max_width']            = 5000;
        $config['max_height']           = 5000;
		$new_name = time().$_FILES["userfiles"]['app'];
		$config['file_name'] = $new_name;

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('new_logo')){
			// $error = array('error' => $this->upload->display_errors());
            // $this->load->view('v_upload', $error);
            $data=$this->Custom_model->update_old();
            if($data==true){
                $this->session->set_flashdata('kondisi','1');
                $this->session->set_flashdata('berhasil','update berhasil !');
                redirect('admin/custom');
            }else {
                $this->session->set_flashdata('kondisi','0');
                $this->session->set_flashdata('gagal','update gagal !');
                redirect('admin/custom');
            }
		}else {
            $new_logo=$this->upload->data('file_name');
            $data=$this->Custom_model->update($new_logo);
            if($data==true){
                $this->session->set_flashdata('kondisi','1');
                $this->session->set_flashdata('berhasil','update berhasil !');
                redirect('admin/custom');
            }else {
                $this->session->set_flashdata('kondisi','0');
                $this->session->set_flashdata('gagal','update gagal !');
                redirect('admin/custom');
            }
        }
	}


}
