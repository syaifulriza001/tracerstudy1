<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loker extends CI_Controller {

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
        $this->load->model('loker_model');
    }

	public function tambah($id)
	{
        $config['upload_path']          = './assets/loker/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 15000;
		$config['max_width']            = 10000;
        $config['max_height']           = 10000;
        
        $this->load->library('upload', $config);
        if (! $this->upload->do_upload('foto')) {
            $this->session->set_flashdata('kondisi','0');
            $this->session->set_flashdata('msg','Tambah Loker Gagal');
            redirect('backend/users/alumni');
        }else{
            $foto = $this->upload->data('file_name');
            $data = $this->loker_model->tambah($id,$foto);
            if ($data == TRUE) {
                $this->session->set_flashdata('kondisi','1');
                $this->session->set_flashdata('msg','Tambah Loker Berhasil');
                redirect('backend/users/alumni');
            }else{
                $this->session->set_flashdata('kondisi','0');
                $this->session->set_flashdata('msg','Tambah Loker Gagal');
                redirect('backend/users/alumni');
            }
        }
    }
    
    public function loker($id)
    {
        $this->load->model('users_model');
        $data['user'] = $this->users_model->getAll()->result();
        $data['loker'] = $this->loker_model->getById($id)->row();
        $this->load->view('frontend/alumni/loker',$data);
    }


}
