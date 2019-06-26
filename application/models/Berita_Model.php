<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Berita_Model extends CI_Model 
{
    public function insert_data($data)
    {
        $this->db->insert('berita_acara', $data);
    }
}

