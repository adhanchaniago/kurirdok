<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Log_Model extends CI_Model
{
    public function insert_data($data)
    {
        $this->db->insert('log', $data);
    }

    public function get_log_by_pengiriman($pengiriman_id)
    {
        $this->db->where('pengiriman_id', $pengiriman_id);
        $data = $this->db->get('log');
        return $data->result();
    }
}

