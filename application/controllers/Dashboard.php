<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Pesanan_Model', 'pesanan');
    }

    public function index()
    {
        $data = $this->{$this->session->level}();
        $data['page_title'] = 'Dashboard';
        $this->template->load('template', 'dashboard', $data);
    }

    public function admin()
    {
        $data['pesanan'] = $this->pesanan->get_by_pengirim();
        return $data;
    }
    
    public function kurir()
    {
        $data['pengirimanku'] = $this->pesanan->get_by_pengirim($this->session->user_id);
        $data['pesanan'] = $this->pesanan->get_by_pengirim();
        return $data;
    }

    public function pegawai()
    {
        $data['pesanan'] = $this->pesanan->get_by_kurir($this->session->user_id);
        return $data;
    }
}

