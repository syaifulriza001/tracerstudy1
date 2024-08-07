<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		if ($this->session->userdata('isLogin')=="1")
		{
			if($this->session->userdata('id_user_grup')=="0"){
				redirect('dashboard');
			}
		}
			else if($this->session->userdata('id_user_grup')=="1")
		{
			redirect('admin');
		}
		$this->load->model('Custom_model');
		$data['website'] = $this->Custom_model->getAll();
		$this->load->model('Testi_model');
		$data['testimoni'] = $this->Testi_model->getbyStatus();
		$this->load->view('frontend/header',$data);
		$this->load->view('frontend/index',$data);
		$this->load->view('frontend/footer',$data);
	}
}
