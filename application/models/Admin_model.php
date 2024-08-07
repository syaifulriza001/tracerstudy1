<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function getAll($table)
    {
        return $this->db->get($table);
    }

    public function survey_pengguna()
    {
      $this->db->order_by("id", "asc");
      return $this->db->get('survey_pengguna_v');
    }

    public function sudahIsi()
    {
        $this->db->group_by('id_user');
        return $this->db->get('jawaban_pertanyaan')->num_rows();
    }

    public function getById($id)
    {
        return $this->db->get_where('user_v', array('id' => $id))->result();
    }

    public function update_data($data) {
        $sql = "CALL upd_profil(?, ?, ?, ?, ?)";
        $this->db->query($sql, $data);
    }

    public function hapus_alumni($id)
    {
        $this->db->delete('user', array('id' => $id));
    }

    public function getNonaktif()
    {
        $this->db->select('id, nim, nama_depan, nama_belakang, tahun_lulus, status');
        $this->db->from('nonaktifuser_v');
        $this->db->order_by('id');
        return $this->db->get()->result();
    }

    public function aktivasi_akun($data) {
        $sql = "CALL aktivasi_akun(?)";
        $this->db->query($sql, $data);
    }

    public function getAktiv()
    {
        $this->db->select('id, nim, nama_depan, nama_belakang, tahun_lulus');
        $this->db->from('aktifuser_v');
        $this->db->order_by('nim DESC, tahun_lulus ASC');
        return $this->db->get()->result();
    }

    public function hapus_bidang($data) {
        $sql = "CALL hapus_bidang(?)";
        $this->db->query($sql, $data);
    }

    public function tambah_bidang($data) {
        $sql = "CALL tambah_bidang(?)";
        $this->db->query($sql, $data);
    }

    public function edit_bidang($data) {
        $sql = "CALL edit_bidang(?, ?)";
        $this->db->query($sql, $data);
    }

    public function getlokerV()
    {
        $this->db->select('id_loker, judul, nama_depan, nama_belakang, tgl_buat, status');
        $this->db->from('loker_v');
        $this->db->order_by('id_loker DESC');
        return $this->db->get()->result();
    }

    public function tambah_loker($data)
    {
        $sql = "CALL tambah_loker(?, ?, ?, ?, ?, ?, ?, ?)";
        $this->db->query($sql, $data);
    }

    public function publish_loker($data)
    {
        $sql = "CALL publish_loker(?)";
        $this->db->query($sql, $data);
    }

    public function unpublish_loker($data)
    {
        $sql = "CALL unpublish_loker(?)";
        $this->db->query($sql, $data);
    }

    public function hapus_loker($data)
    {
        $sql = "CALL hapus_loker(?)";
        $this->db->query($sql, $data);
    }

    public function edit_loker($data)
    {
        $sql = "CALL edit_loker(?, ?, ?, ?, ?, ?, ?, ?)";
        $this->db->query($sql, $data);
    }

    public function publish_testi($data)
    {
        $sql = "CALL publish_testi(?)";
        $this->db->query($sql, $data);
    }

    public function unpublish_testi($data)
    {
        $sql = "CALL unpublish_testi(?)";
        $this->db->query($sql, $data);
    }

    public function recent()
    {
        return $this->db->order_by('waktu', 'DESC')->get('history_v', 3)->result();
    }
}
