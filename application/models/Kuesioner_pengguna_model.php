<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class Kuesioner_pengguna_model extends CI_Model
{

	// public function getAll()
	// {
	// 	$this->db->order_by("pertanyaan", "asc");
	// 	return $this->db->get('kuesioner_v');
	// }
	// public function getAva()
	// {
	// 	$this->db->order_by("id", "desc");
	// 	return $this->db->get('surveitersedia_v');
	// }
	//
	// public function getById($id)
	// {
	// 	$this->db->where('id', $id);
	// 	return $this->db->get('survei');
	// }
	//
	// public function getTotal()
	// {
	// 	return $this->db->query('SELECT COUNT(nama_survei) as total FROM surveitersedia_v;');
	// }
	public function submit()
	{
		$this->db->trans_begin();

		$jlh = 8; //$this->input->post('jlh');
		for ($i = $jlh; $i > 0; $i--) {
			$idJawaban = $this->input->post('jawaban' . $i);
			$this->db->query("INSERT INTO `kuesioner_jawaban` (`id`, `id_pertanyaan`, `jawaban`) VALUES (NULL, $i, $idJawaban);");
		}

		$id_value = 9;
		$id_jawaban = $this->input->post('inp_nama_instansi');
		$this->db->query("INSERT INTO `kuesioner_jawaban` (`id`, `id_pertanyaan`, `jawaban`) VALUES (NULL, $id_value, '" . $id_jawaban . "');");

		$id_value = 10;
		$id_jawaban = $this->input->post('inp_nama_kues');
		$this->db->query("INSERT INTO `kuesioner_jawaban` (`id`, `id_pertanyaan`, `jawaban`) VALUES (NULL, $id_value, '" . $id_jawaban . "');");

		$id_value = 11;
		$id_jawaban = $this->input->post('inp_jabatan');
		$this->db->query("INSERT INTO `kuesioner_jawaban` (`id`, `id_pertanyaan`, `jawaban`) VALUES (NULL, $id_value, '" . $id_jawaban . "');");

		$id_value = 12;
		$id_jawaban = $this->input->post('inp_nama_alumni');
		$this->db->query("INSERT INTO `kuesioner_jawaban` (`id`, `id_pertanyaan`, `jawaban`) VALUES (NULL, $id_value, '" . $id_jawaban . "');");
		//$this->db->query("INSERT INTO `history` VALUES (NULL,$idUser,'kuesioner_jawaban',now())");
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return false;
		} else {
			$this->db->trans_commit();
			return true;
		}
	}
}
