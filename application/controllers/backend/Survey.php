<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Survey extends CI_Controller {

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

	public function __construct(){
        parent::__construct();
        if ($this->session->userdata('isLogin')!="1") {
			redirect('login');
		}
        $this->load->model('survey_model');
	}
	
	public function index()
	{
		$data['survey'] = $this->survey_model->getAll()->result();
		$data['survey2'] = $this->survey_model->getAll()->result();
		$this->load->view('backend/include/head');
		$this->load->view('backend/include/navbar');
		$this->load->view('backend/include/sider');
		$this->load->view('backend/survey',$data);
		$this->load->view('backend/include/footer');
	}

	public function detail($id)
	{
		$this->load->model('survey_pertanyaan_model');
		$data['title'] = $id;
		$data['survey'] = $this->survey_model->getById($id)->row();
		$data['surveyPertanyaan'] = $this->survey_pertanyaan_model->getById($id)->result();
		$data['surveyPertanyaan2'] = $this->survey_pertanyaan_model->getById($id)->result();
		$this->load->view('backend/include/head');
		$this->load->view('backend/include/navbar');
		$this->load->view('backend/include/sider');
		$this->load->view('backend/surveyDetail',$data);
		$this->load->view('backend/include/footer');
	}

	public function tambah()
	{
        $data=$this->survey_model->tambah($id);
		if($data==true){
            $this->session->set_flashdata('kondisi','1');
			$this->session->set_flashdata('berhasil','Data berhasil ditambahkan !');
			redirect('admin/survei');
		}else {
            $this->session->set_flashdata('kondisi','0');
			$this->session->set_flashdata('gagal','Data gagal ditambahkan !');
			redirect('admin/survei');
        }
	}

	public function update($id)
	{
        $data=$this->survey_model->edit($id);
		if($data==true){
            $this->session->set_flashdata('kondisi','1');
			$this->session->set_flashdata('berhasil','Data berhasil ditambahkan !');
			redirect('admin/survei');
		}else {
            $this->session->set_flashdata('kondisi','0');
			$this->session->set_flashdata('gagal','Data gagal ditambahkan !');
			redirect('admin/survei');
        }
	}

	public function delete(){
		$id=$this->input->post('idsurvei');
        $data=$this->survey_model->delete($id);
        if($data==true){
            $this->session->set_flashdata('kondisi','1');
			$this->session->set_flashdata('berhasil','delete berhasil !');
			redirect('admin/survei');
		}else {
            $this->session->set_flashdata('kondisi','0');
			$this->session->set_flashdata('gagal','delete gagal !');
			redirect('admin/survei');
        }
	}

	public function survei($id)
	{
		$this->load->model('survey_pertanyaan_model');
		$this->load->model('jawaban_pertanyaan_model');
		$data['title'] = $id;
		$data['survey'] = $this->survey_model->getById($id)->row();
		$data['surveyPertanyaan'] = $this->survey_pertanyaan_model->getByIdPertanyaanSatu($id,1)->row();
		$data['cekPertanyaan'] = $this->survey_pertanyaan_model->getByIdPertanyaan($id)->num_rows();
		$data['cekJawabanUser'] = $this->jawaban_pertanyaan_model->getById($id)->num_rows();
		$this->load->view('frontend/alumni/survei',$data);
	}

	public function lakukansurvei()
	{
		$idSurvei = $this->uri->segment(2);
		$idPertanyaan = $this->uri->segment(3);
		
		if ($this->input->post('submit')) {
			$this->load->model('jawaban_pertanyaan_model');
			$this->load->model('survey_pertanyaan_model');
			$input = $this->jawaban_pertanyaan_model->tambah($idSurvei,$idPertanyaan);
			$idBaru;
			$pertanyaan = $this->survey_pertanyaan_model->getById($idSurvei);
			foreach($pertanyaan->result() as $pertanyaan){
				if ($pertanyaan->id > $idPertanyaan) {
					$idPertanyaan = $pertanyaan->id;
					break;
				}
			}
		}else if($this->input->post('save')){
			$this->load->model('jawaban_pertanyaan_model');
			$input = $this->jawaban_pertanyaan_model->tambah($idSurvei,$idPertanyaan);
			$this->session->set_flashdata('hasilSurvey','Pengisian Survey Berhasil ! Terimakasih. Silahkan klik Home untuk Kembali atau Logout untuk keluar dari aplikasi. ');
			redirect('detailSurvey/'.$idSurvei);
		}
		$this->load->model('survey_pertanyaan_model');
		$this->load->model('survey_jawaban_model');
		$data['idSurvei'] = $idSurvei;
		$data['idPertanyaan'] = $idPertanyaan;
		$data['surveyPertanyaanLimitStart'] = $this->survey_pertanyaan_model->getByIdPertanyaanLimitStart($idSurvei,$idPertanyaan);
		$data['surveyPertanyaanLimit'] = $this->survey_pertanyaan_model->getByIdPertanyaanLimit($idSurvei,$idPertanyaan)->row();
		$data['surveyJawaban'] = $this->survey_jawaban_model->getByIdJawaban($idSurvei,$idPertanyaan)->result();
		$this->load->view('frontend/alumni/lakukanSurvei',$data);
	}

	public function hasilSurvey()
	{
		$this->load->model('survey_pertanyaan_model');
		$this->load->model('survey_jawaban_model');
		$this->load->model('jawaban_pertanyaan_model');

		$data['survey'] = $this->survey_model->getAll()->result();
		$data['surveyPertanyaan'] = $this->survey_pertanyaan_model->getAll()->result();
		$data['surveyJawaban'] = $this->survey_jawaban_model->getAll()->result();
		$data['cekJawabanUser'] = $this->jawaban_pertanyaan_model->getAll()->result();
		$this->load->view('backend/include/head');
		$this->load->view('backend/include/navbar');
		$this->load->view('backend/include/sider');
		$this->load->view('backend/hasilSurvey',$data);
		$this->load->view('backend/include/footer');
	}

}
