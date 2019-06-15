<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class User_Model extends CI_Model
{
    public function get_by_level($level)
    {
        $this->db->select('user_id, nama, username, foto, level');
        $this->db->where('level', $level);
        $data = $this->db->get('users');
        return $data->result();
    }

    public function find_by_username($username)
    {
        $this->db->where('username', $username);
        $data = $this->db->get('users');
        return $data->row();
    }

    public function insert_data($data)
    {
        $result = $this->db->insert('users', $data);        
        if ($result) {
            $id = $this->db->insert_id();
            $data = $this->db->get_where('users', ['user_id' => $id]);
            return $data->row();
        }

        return $result;
    }

    public function find_by_id($user_id)
    {
        $this->db->select('user_id, nama, username, foto, telp, divisi, ruangan, level');
        $this->db->where('user_id', $user_id);
        $data = $this->db->get('users');
        return $data->row();
    }

    public function update_data($data, $user_id)
    {
        $this->db->where('user_id', $user_id);
        $result = $this->db->update('users', $data);
        if ($result) {
            $data = $this->db->get_where('users', ['user_id' => $user_id]);
            return $data->row();
        }

        return $result;
    }
}

