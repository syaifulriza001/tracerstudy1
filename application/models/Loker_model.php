<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loker_model extends CI_Model {

    public function getAll()
    {
        return $this->db->get('lokertersedia_v');
    }
	public function getTotal()
    {
        return $this->db->query('SELECT COUNT(judul) as total FROM lokertersedia_v;');
    }
    public function tambah($id,$foto)
    {
        $data = array(
            'id_user' => $id,
            'judul' => $this->input->post('judul'),
            'deskripsi' => $this->input->post('deskripsi'),
            'tgl_buat'=> $this->input->post('tgl_buat'),
            'tgl_akhir'=> $this->input->post('tgl_akhir'),
            'foto'=> $foto,
            'status'=>'unpublish'
        );
        $query = $this->db->insert('loker',$data);
        if ($query) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function getById($id)
    {
        $this->db->where('id',$id);
        return $this->db->get('loker');
    }
	public function getByIdUser($id)
    {
        $this->db->where('id_user',$id);
        return $this->db->get('loker_v');
    }
}
