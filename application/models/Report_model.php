<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_model extends CI_Model {

    public function getAll()
    {
		$this->db->order_by('id','desc');
        return $this->db->get('report_v');
    }
	public function getBySurvei()
    {
        return $this->db->get('jawaban_v');
    }
	public function getById($id)
    {
		$this->db->where('id',$id);
        return $this->db->get('report_v');
    }
	public function getCount()
    {
		$query = $this->db->query('SELECT * FROM report_v');
        return $query->num_rows();
    }

}
