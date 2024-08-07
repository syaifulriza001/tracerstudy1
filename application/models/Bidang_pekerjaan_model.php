<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bidang_pekerjaan_model extends CI_Model {

    public function getAll()
    {
        return $this->db->get('bidang_pekerjaan');
    }
}
