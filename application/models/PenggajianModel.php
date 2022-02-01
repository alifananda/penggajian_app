<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PenggajianModel extends CI_Model {

    public function get_data($table)
    {
        return $this->db->get($table);
    }

    public function insert_data($data,$table)
    {
        $this->db->insert($table,$data);
    }

    public function update_data($table,$data,$where)
    {
        $this->db->update($table,$data,$where);
    }
}