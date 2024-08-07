<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Survey_model extends CI_Model {

    public function getAll()
    {
		$this->db->order_by("id", "desc");
        return $this->db->get('survei');
    }
	public function getAva()
    {
		$this->db->order_by("id", "desc");
        return $this->db->get('surveitersedia_v');
    }

    public function getById($id)
    {
        $this->db->where('id',$id);
        return $this->db->get('survei');
    }

	public function getTotal()
    {
        return $this->db->query('SELECT COUNT(nama_survei) as total FROM surveitersedia_v;');
    }
    public function tambah()
    {
        $data = array(
            'nama_survei' => $this->input->post('nama_survei'),
            'deskripsi' => $this->input->post('deskripsi'),
            'tgl_mulai' => $this->input->post('tgl_mulai'),
            'tgl_berahkir' => $this->input->post('tgl_berahkir'),
            'tgl_update' => $this->input->post('tgl_update')
        );
        $query = $this->db->insert('survei',$data);
        if ($query) {
            return TRUE;
        }else{
            return FALSE;
        }
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

	public function submit($idSurvei)
	{
        $this->db->trans_begin();

		$jlh = $this->input->post('jlh');
		for ($i = $jlh; $i > 0 ; $i--) {
			$nameP = 'pertanyaan'.$i;
			$nameJ = 'jawaban'.$i;
			$idPertanyaan = $_POST[$nameP];
			$idJawaban = $_POST[$nameJ];
			$idUser =  $this->session->userdata('id');

			$this->db->query("INSERT INTO `jawaban_pertanyaan` (`id`, `id_pertanyaan`, `jawaban`, `id_user`) VALUES (NULL, $idPertanyaan, $idJawaban,$idUser);");
		}
        $this->db->query("INSERT INTO `history` VALUES (NULL,$idUser,'do_survei',now())");
        if ($this->db->trans_status() === FALSE)
        {
                $this->db->trans_rollback();
                return false;
        }
        else
        {
                $this->db->trans_commit();
                return true;
        }


        }
}
