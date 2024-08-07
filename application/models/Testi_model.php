<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testi_model extends CI_Model {

    public function getAll()
    {
        return $this->db->get('testimoni');
    }
	public function getById($id)
    {
		$this->db->where($id);
        return $this->db->get('testimoni');
    }
	public function getCount()
    {
		$query = $this->db->query('SELECT * FROM testimoni');
        return $query->num_rows();
    }

	public function getbyStatus()
	{
		return $this->db->get_where('testi_v', array('status' => 'publish'))->result();
	}
}
