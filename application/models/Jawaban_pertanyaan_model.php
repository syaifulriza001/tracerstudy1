<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jawaban_pertanyaan_model extends CI_Model {

    public function getAll()
    {
        return $this->db->get('jawaban_pertanyaan');
    }

    public function getById($id)
    {
        $this->db->select('*');
		$this->db->from('jawaban_pertanyaan');
		$this->db->join('survei_pertanyaan', 'jawaban_pertanyaan.id_pertanyaan = survei_pertanyaan.id','left');
		$this->db->where('survei_pertanyaan.id_survei',$id);
        $this->db->where('id_user',$this->session->userdata('id'));
        return $this->db->get();
    }

    public function tambah($idSurvei,$idPertanyaan)
    {
        $data = array(
            'id_pertanyaan' => $idPertanyaan,
            'jawaban' => $this->input->post('jawaban'),
            'id_user' => $this->session->userdata('id')
        );
        $query = $this->db->insert('jawaban_pertanyaan',$data);
    }

    public function edit($id)
    {
        $data = array(
            'nama_survei' => $this->input->post('nama_survei'),
            'deskripsi' => $this->input->post('deskripsi'),
            'tgl_mulai' => $this->input->post('tgl_mulai'),
            'tgl_berahkir' => $this->input->post('tgl_berahkir'),
            'tgl_update' => $this->input->post('tgl_update')
        );
        $this->db->where('id',$id);
        $query = $this->db->update('survei',$data);
        if ($query) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function delete($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->delete('survei');
        if ($query) {
            return TRUE;
        }else{
            return FALSE;
        }
    }
}
