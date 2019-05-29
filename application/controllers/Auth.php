<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return $this->load->view('login');
    }

    public function login()
    {
        $this->load->model('User_Model', 'user');
        $post = $this->input->post();

        $check_user = $this->user->find_by_username($post['username']);
        if ($check_user) {
            if (password_verify($post['password'], $check_user->password)) {
                $user_session = [
                    'user_id' => $check_user->user_id,
                    'nama' => $check_user->nama,
                    'level' => $check_user->level,
                    'foto' => $check_user->foto,
                    'logged_in' => true
                ];

                $this->session->set_userdata($user_session);
                $this->session->set_flashdata(['success' => 'Selamat Datang ' . $check_user->nama]);
                redirect('dashboard');
            } else {
                $this->session->set_flashdata(['error' => 'Login gagal! <br>Password Salah!']);
            }
        } else {
            $this->session->set_flashdata(['error' => 'Login gagal! <br>User tidak ditemukan!']);
        }

        redirect('auth');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        session_destroy();

        redirect('auth');
    }
}

