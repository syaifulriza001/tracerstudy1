<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HasilKmeans_model extends CI_Model {

    public function getAll()
    {
        return $this->db->get('hasilkmeans');
    }

    public function edit($id,$j1,$j2)
    {
        $this->db->where('id',$id);
        $data = array(
            'jumlahData1' => $j1,
            'jumlahData2' => $j2
        );
        $this->db->update('hasilkmeans',$data);
    }
}
