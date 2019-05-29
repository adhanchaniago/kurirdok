<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Pesanan_Model extends CI_Model
{
    public function get_all()
    {
        $this->db->select('pengiriman.*, users.nama AS kurir, files.filename');
        $this->db->join('users', 'pengiriman.kurir = users.user_id', 'LEFT');
        $this->db->join('files', 'pengiriman.file = files.file_id');
        $this->db->order_by('created_at', 'DESC');
        $this->db->order_by('updated_at', 'DESC');
        $data = $this->db->get('pengiriman');
        return $data->result();
    }

    public function get_by_pengirim($user_id = '')
    {
        $this->db->select('pengiriman.*, users.nama AS pengirim, files.filename, files.file_path');
        $this->db->join('users', 'pengiriman.pengirim = users.user_id');
        $this->db->join('files', 'pengiriman.file = files.file_id');
        if (@$user_id !== '') {
            $this->db->where('kurir', $user_id);
            $this->db->where_not_in('status', 'Tunggu');
        } else {
            $this->db->where('kurir', NULL);
            $this->db->where('status', 'Tunggu');
        }
        
        $this->db->order_by('status', 'ASC');
        $this->db->order_by('created_at', 'DESC');
        $data = $this->db->get('pengiriman');
        return $data->result();
    }

    public function get_by_kurir($user_id = '', $finsih = false)
    {
        $this->db->select('pengiriman.*, users.nama AS kurir, files.filename');
        $this->db->join('users', 'pengiriman.kurir = users.user_id', 'LEFT');
        $this->db->join('files', 'pengiriman.file = files.file_id');
        if ($user_id !== '') {
            $this->db->where('pengirim', $user_id);
            // $this->db->where_not_in('status', 'Selesai');
        }
        if ($finsih == true) {
            $this->db->where('status', 'Selesai');
        } else {
            $this->db->where_not_in('status', 'Selesai');
        }
        
        $this->db->order_by('status', 'ASC');
        $this->db->order_by('created_at', 'DESC');
        $this->db->order_by('updated_at', 'DESC');
        $data = $this->db->get('pengiriman');
        return $data->result();
    }

    public function get_detail($pengiriman_id)
    {
        $this->db->select('pengiriman.status, pengiriman.note, files.filename, users.nama');
        $this->db->join('files', 'pengiriman.file = files.file_id');
        $this->db->join('users', 'pengiriman.kurir = users.user_id');
        $this->db->where('pengiriman.pengiriman_id', $pengiriman_id);
        $data = $this->db->get('pengiriman');
        return $data->row();
    }

    public function insert_data($data)
    {
        $result = $this->db->insert('pengiriman', $data);        
        if ($result) {
            $id = $this->db->insert_id();
            $data = $this->db->get_where('pengiriman', ['pengiriman_id' => $id]);
            return $data->row();
        }

        return $result;
    }

    public function find_by_id($pengiriman_id)
    {
        $this->db->where('pengiriman_id', $pengiriman_id);
        $data = $this->db->get('pengiriman');
        return $data->row();
    }

    public function update_data($data, $pengiriman_id)
    {
        $this->db->where('pengiriman_id', $pengiriman_id);
        $result = $this->db->update('pengiriman', $data);
        if ($result) {
            $data = $this->db->get_where('pengiriman', ['pengiriman_id' => $pengiriman_id]);
            return $data->row();
        }

        return $result;
    }

    public function delete_data($pengiriman_id)
    {
        $this->db->where('pengiriman_id', $pengiriman_id);
        $result = $this->db->delete('pengiriman');
    }
}

