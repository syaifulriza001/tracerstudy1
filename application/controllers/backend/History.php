<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller {

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
		$this->load->model('Custom_model');
		$this->load->model('Admin_model');
		$this->load->model('Log_model');
	}
	
	public function index()
	{

        $data['website'] = $this->Custom_model->getAll();
        $data['log'] = $this->Log_model->getAll();
        $data['tanggal'] = $this->Log_model->getdate();
		$this->load->view('backend/include/header');
		$this->load->view('backend/include/sidebar');
		$this->load->view('backend/history',$data);
		$this->load->view('backend/include/footer');
	}

	public function search()
	{
		$keyword = $this->input->post('keyword');
        $data['website'] = $this->Custom_model->getAll();
        $data['log'] = $this->Log_model->gettanggal($keyword);
        $data['tanggal'] = $this->Log_model->getdates($keyword);
		$this->load->view('backend/include/header');
		$this->load->view('backend/include/sidebar');
		$this->load->view('backend/history',$data);
		$this->load->view('backend/include/footer');
	}
}
