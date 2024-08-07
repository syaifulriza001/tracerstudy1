<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CI_Model
{

    public function cek_user()
    {
        $where = array(
            'email' => $this->input->post('your_email'),
            'password' => substr(md5($this->input->post('your_pass')), 0, 15)
        );
        return $this->db->get_where('user', $where);
    }

    public function get_email($email)
    {
        $this->db->where('email', $email);
        return $this->db->get('user')->row();
    }

    public function verifikasi($status, $email)
    {
        $data = array('status' => $status);
        $this->db->where('email', $email);
        $query = $this->db->update('user', $data);
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function getLevel($level)
    {
        $this->db->where('id_user_grup', $level);
        return $this->db->get('user');
    }

    public function getById($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('user_v');
    }

    public function getAll()
    {
        return $this->db->get('user_v');
    }

    public function gantiStatus($id, $status)
    {
        $data = array('status' => $status);
        $this->db->where('id', $id);
        $query = $this->db->update('user', $data);
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function tambah($foto, $level)
    {
        $data = array(
            'id_user_grup' => $level,
            'nama_depan' => $this->input->post('nama_depan'),
            'nama_belakang' => $this->input->post('nama_belakang'),
            'nim' => $this->input->post('nim'),
            'email' => $this->input->post('email'),
            'status' => 'nonaktif',
            'password' => md5($this->input->post('username')),
            'foto' => $foto
        );
        $query = $this->db->insert('user', $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function update($id, $new_foto)
    {
        if ($this->session->userdata('id_user_grup') == 0) {
            $data = array(
                'nama_depan' => $this->input->post('nama_depan'),
                'nama_belakang' => $this->input->post('nama_belakang'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'tahun_lulus' => $this->input->post('tahun_lulus'),
                'telp' => $this->input->post('telp'),
                'angkatan' => $this->input->post('angkatan'),
                'email' => $this->input->post('email'),
                'alamat' => $this->input->post('alamat'),
                'foto' => $new_foto
            );
        } else {
            $data = array(
                'nama_depan' => $this->input->post('nama_depan'),
                'nama_belakang' => $this->input->post('nama_belakang'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'telp' => $this->input->post('telp'),
                'email' => $this->input->post('email'),
                'alamat' => $this->input->post('alamat'),
                'foto' => $new_foto
            );
        }

        $this->db->where('id', $id);
        $query = $this->db->update('user', $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    public function updatepekerjaan($id)
    {
        $data = array(
            'instansi' => $this->input->post('instansi'),
            'jabatan' => $this->input->post('jabatan'),
            'id_bidang' => $this->input->post('id_bidang'),
            'mulai_bekerja' => $this->input->post('mulai_bekerja'),
            'alamat' => $this->input->post('alamat'),
            'kota' => $this->input->post('kota')
        );
        $this->db->where('id_user', $id);
        $query = $this->db->update('pekerjaan_alumni', $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function edit($id, $foto)
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'nomor_induk' => $this->input->post('nomor_induk'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'telepon' => $this->input->post('telepon'),
            'email' => $this->input->post('email'),
            'angkatan' => $this->input->post('angkatan'),
            'jabatan' => $this->input->post('jabatan'),
            'foto' => $foto
        );
        $this->db->where('id', $id);
        $query = $this->db->update('users', $data);
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->delete('user');
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function daftar($foto)
    {
        $data = array(
            'id_user_grup' => 0,
            'nama_depan' => $this->input->post('nama_depan'),
            'nama_belakang' => $this->input->post('nama_belakang'),
            'nim' => $this->input->post('nim'),
            'email' => $this->input->post('email'),
            'password' => substr(md5($this->input->post('password')), 0, 15),
            'foto' => $foto,
            'status' => '0'
        );
        $nim = $this->input->post('nim');
        $query = $this->db->insert('user', $data);
        if ($query) {
            $cek = $this->db->get_where('user', ['nim' => $nim]);
            foreach ($cek->result() as $user) {
                $pekerjaan = array(
                    'id_user' => $user->id,
                    'id_bidang' => $this->input->post('bidang_pekerjaan')
                );
            }
            $query1 = $this->db->insert('pekerjaan_alumni', $pekerjaan);
            return $data;
        } else {
            return false;
        }
    }

    public function ubahpassword($id)
    {
        $password_baru = array('password' => substr(md5($this->input->post('new_password')), 0, 15));
        $this->db->where('id', $id);
        $query = $this->db->update('user', $password_baru);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function addtesti($id)
    {
        $data = array(
            'id_user' => $this->input->post('id_user'),
            'testimoni' => $this->input->post('testimoni'),
            'kritik_saran' => $this->input->post('kritik_saran'),
            'status' => 'unpublish'
        );
        $query = $this->db->insert('testimoni', $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function updatetesti($id)
    {
        $data = array(
            'id_user' => $this->input->post('id_user'),
            'testimoni' => $this->input->post('testimoni'),
            'kritik_saran' => $this->input->post('kritik_saran'),
        );
        $this->db->where('id_user', $id);
        $query = $this->db->update('testimoni', $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function ubahEmail($id, $email)
    {
        $cek = $this->db->get_where('user', ['id' => $id]);

        $data = array(
            'email' => $email,
            'status' => '0'
        );

        if ($cek > 0) {
            $this->db->where('id', $id);
            $query = $this->db->update('user', $data);
            if ($query) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function gantiPass($id)
    {
        $password_baru = array('password' => substr(md5($this->input->post('newPass')), 0, 15));
        $this->db->where('id', $id);
        $query = $this->db->update('user', $password_baru);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function cekNim($nim)
    {
        $this->db->where('nim', $nim);
        $query = $this->db->get('user');
        
        if($query->num_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function cekEmail($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('user');

        if($query->num_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function cekPass($id, $pass)
    {
        $where = array(
            'id' => $id,
            'password' => substr(md5($pass), 0, 15)
        );

        $query = $this->db->get_where('user', $where);

        if($query->num_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

}
