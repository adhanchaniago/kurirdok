<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Pesanan_Model extends CI_Model
{
    public function get_all($start = '', $end = '')
    {
        $this->db->select('pengiriman.*, users.nama AS kurir');
        $this->db->join('users', 'pengiriman.kurir = users.user_id', 'LEFT');

        if ($start !== '' AND $end !== '') {
            if ($start == $end) {
                $this->db->like('`pengiriman`.`created_at`', $start);
                $this->db->or_like('`pengiriman`.`updated_at`', $start);
            } else {
                $end = date('Y-m-d H:i:s', strtotime($end . ' +1 day'));
                $this->db->where("`created_at` BETWEEN '$start' AND '$end'");
                $this->db->or_where("`updated_at` BETWEEN '$start' AND '$end'");
            }
        }


        // $this->db->order_by('created_at', 'DESC');
        $this->db->order_by('updated_at', 'DESC');
        $data = $this->db->get('pengiriman');
        return $data->result();
    }

    public function get_by_pengirim($user_id = '')
    {
        $this->db->select('pengiriman.*, users.nama AS pengirim');
        $this->db->join('users', 'pengiriman.pengirim = users.user_id');
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
        $this->db->select('pengiriman.*, users.nama AS kurir');
        $this->db->join('users', 'pengiriman.kurir = users.user_id', 'LEFT');
        if ($user_id !== '') {
            $this->db->where('pengirim', $user_id);
            // $this->db->where_not_in('status', 'Selesai');
        }
        if ($finsih == true) {
            $this->db->where_in('status', ['Selesai', 'Batal']);
            // $this->db->or_where('status', 'Batal');
        } else {
            $this->db->where_not_in('status', ['Batal', 'Selesai']);
            // $this->db->where_not_in('status', 'Batal');
        }
        
        $this->db->order_by('status', 'ASC');
        $this->db->order_by('created_at', 'DESC');
        $this->db->order_by('updated_at', 'DESC');
        $data = $this->db->get('pengiriman');
        return $data->result();
    }

    public function get_detail($pengiriman_id)
    {
        $this->db->select('pengiriman.*, p.nama AS pengirim, k.nama AS kurir, p.divisi AS p_divisi, p.ruangan AS p_ruangan, berita_acara.berita');
        $this->db->join('users p', 'pengiriman.pengirim = p.user_id');
        $this->db->join('users k', 'pengiriman.kurir = k.user_id', 'LEFT');
        $this->db->join('berita_acara', 'pengiriman.pengiriman_id = berita_acara.pengiriman_id', 'LEFT');
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

    // public function delete_data($pengiriman_id)
    // {
    //     $this->db->where('pengiriman_id', $pengiriman_id);
    //     $result = $this->db->delete('pengiriman');
    // }
}

