<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Custom_model extends CI_Model {

    public function getAll()
    {
        return $this->db->get('custom')->result();
    }
	public function update($new_foto)
    {
		$data=array(
			'universitas'=>$this->input->post('universitas'),
			'prodi'=>$this->input->post('prodi'),
			'email'=>$this->input->post('email'),
			'telp'=>$this->input->post('telp'),
			'warna'=>$this->input->post('warna'),
			'warna2'=>$this->input->post('warna2'),
			'web'=>$this->input->post('web'),
			'logo'=>$new_foto
		);
        
        $this->db->where('id','1');
        $query=$this->db->update('custom',$data);
        if ($query ) {
            return true;
        }else{
            return false;
        }
    }
	public function update_old()
    {
		$data=array(
			'universitas'=>$this->input->post('universitas'),
			'prodi'=>$this->input->post('prodi'),
			'email'=>$this->input->post('email'),
			'telp'=>$this->input->post('telp'),
			'warna'=>$this->input->post('warna'),
			'warna2'=>$this->input->post('warna2'),
			'web'=>$this->input->post('web')
		);
        
        $this->db->where('id','1');
        $query=$this->db->update('custom',$data);
        if ($query ) {
            return true;
        }else{
            return false;
        }
    }
}
