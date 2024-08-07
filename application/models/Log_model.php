<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_model extends CI_Model {

    public function getAll()
    {
       $result =  $this->db->query('SELECT * FROM history_v WHERE DATE(waktu) = CURRENT_DATE() ORDER BY waktu DESC;');
       if($result->num_rows() > 0){
			return $result->result();
		}else {
			
			print '<center><div class="alert alert-danger alert-dismissible fade show" role="alert">
					 Hari ini Belum Terdapat Aktivitas Apapun
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div></center>';
			return array();
		}
    }
    public function getdate()
    {
       $result =  $this->db->query('SELECT * FROM history_v WHERE DATE(waktu) = CURRENT_DATE() ORDER BY waktu DESC LIMIT 1;');
        return $result->result();
    }

    public function gettanggal($keyword)
	{
		$result = $this->db->select('id_user, nama_depan, nama_belakang, aksi, waktu')
				 ->from('history_v')
				 ->order_by('waktu', 'DESC')
				 ->like('waktu', $keyword)
				 ->get();
		if($result->num_rows() > 0){
			return $result->result();
		}else {
			
			print '<center><div class="alert alert-danger alert-dismissible fade show" role="alert">
					  Aktivitas Pada Tanggal '.$keyword.' Tidak Ditemukan
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div></center>';
			return array();
		}
	}

	public function getdates($keyword)
	{
		$result = $this->db->select('id_user, nama_depan, nama_belakang, aksi, waktu')
				 ->from('history_v')
				 ->order_by('waktu', 'DESC')
				 ->like('waktu', $keyword)
				 ->LIMIT(1)
				 ->get();
		return $result->result();
	}
}
