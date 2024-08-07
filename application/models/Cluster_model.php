<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cluster_model extends CI_Model {

    public function getAll()
    {
        return $this->db->get('cluster');
    }
}
