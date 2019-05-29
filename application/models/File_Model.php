<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class File_Model extends CI_Model
{
    public function get_by_author($author_id = '')
    {
        $this->db->select('files.*, users.nama AS author');
        $this->db->join('users', 'files.author = users.user_id');
        if ($author_id !== '') {
            $this->db->where('author', $author_id);
        }
        $data = $this->db->get('files');
        return $data->result();
    }

    public function insert_data($data)
    {
        $result = $this->db->insert('files', $data);        
        if ($result) {
            $id = $this->db->insert_id();
            $data = $this->db->get_where('files', ['file_id' => $id]);
            return $data->row();
        }

        return $result;
    }

    public function find_by_id($file_id)
    {
        $this->db->select('files.*, users.nama AS author');
        $this->db->join('users', 'files.author = users.user_id');
        $this->db->where('file_id', $file_id);
        $data = $this->db->get('files');
        return $data->row();
    }

    public function update_data($data, $file_id)
    {
        $this->db->where('file_id', $file_id);
        $result = $this->db->update('files', $data);
        if ($result) {
            $data = $this->db->get_where('files', ['file_id' => $file_id]);
            return $data->row();
        }

        return $result;
    }

    public function delete_data($file_id)
    {
        $this->db->where('file_id', $file_id);
        $result = $this->db->delete('files');
        return $result;
    }
}

