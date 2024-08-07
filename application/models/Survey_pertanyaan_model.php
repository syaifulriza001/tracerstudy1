<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Survey_pertanyaan_model extends CI_Model {

    public function getKuesionerAll()
    {
      $this->db->order_by("pertanyaan", "asc");
      return $this->db->get('kuesioner_v');
    }
    public function getKuesionerPengisiAll()
    {
      //$this->db->order_by("id", "asc");
      return $this->db->get('kuesioner_v_pengisi');
    }

    public function getAll()
    {
        return $this->db->get('survei_pertanyaan');
    }

    public function tambah($id)
    {
        $data = array(
            'id_survei' => $id,
            'pertanyaan'=> $this->input->post('pertanyaan')
        );
        $query = $this->db->insert('survei_pertanyaan',$data);
        if ($query) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function getByIdPertanyaan($id)
    {
        $this->db->where('id',$id);
        return $this->db->get('survei_pertanyaan');
    }

    public function getByIdPertanyaanSatu($id)
    {
        $this->db->where('id_survei',$id);
        return $this->db->get('survei_pertanyaan',1);
    }

    public function getByIdPertanyaanLimit($id,$idPertanyaan)
    {
        $this->db->where('id_survei',$id);
        $this->db->where('id',$idPertanyaan);
        return $this->db->get('survei_pertanyaan',1);
    }

    public function getByIdPertanyaanLimitStart($id,$idPertanyaan)
    {
        $query = $this->db->query("SELECT * FROM survei_pertanyaan WHERE id_survei=$id AND id > $idPertanyaan ORDER BY id LIMIT 1 ");
        return $query;
    }
	public function getByIdPertanyaanLast($id)
    {
        $query = $this->db->query("SELECT min(id) as cek FROM survei_pertanyaan WHERE id_survei = $id");
        return $query;
    }

    public function getById($id)
    {
        $this->db->where('id_survei',$id);
        return $this->db->get('survei_pertanyaan');
    }
	public function getSurvei($id)
    {
        return $query;
    }

    public function edit($id)
    {
        $data = array(
            'pertanyaan'=> $this->input->post('pertanyaan')
        );
        $this->db->where('id',$id);
        $query = $this->db->update('survei_pertanyaan',$data);
        if ($query) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function delete($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->delete('survei_pertanyaan');
        if ($query) {
            return TRUE;
        }else{
            return FALSE;
        }
    }
}
