<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HasilKmeans extends CI_Controller {

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
		if ($this->session->userdata('isLogin')!="1") {
			redirect('login');
		}
        $this->load->model('HasilKmeans_model');
	}
	
	public function index()
	{
        $this->load->model('users_model');
        $this->load->model('survey_model');
		$this->load->model('cluster_model');
		$data['cluster'] = $this->cluster_model->getAll()->result();
        // $data['user'] = $this->users_model->getLevel(3)->num_rows();
        // $data['userDosen'] = $this->users_model->getLevel(2)->num_rows();
        // $data['usersDosen'] = $this->users_model->getLevel(2)->result();
        $data['users'] = $this->users_model->getLevel(3)->result();
        // $data['survey'] = $this->survey_model->getAll()->num_rows();
		$this->load->view('backend/include/head');
		$this->load->view('backend/include/navbar');
		$this->load->view('backend/include/sider');
		$this->load->view('backend/hasilKmeans',$data);
		$this->load->view('backend/include/footer');
	}

	public function edit($id)
	{
		$j1 = $this->input->post('j1');
		$j2 = $this->input->post('j2');
		$data = $this->HasilKmeans_model->edit($id,$j1,$j2);
		echo json_encode($data);
	}
}
