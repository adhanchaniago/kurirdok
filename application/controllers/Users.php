<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('User_Model', 'user');
    }

    public function index()
    {
        $data['level'] = $this->uri->segment(1);
        $data['page_title'] = 'Users ';
        $data[$data['level'] . '_active'] = 'active';
        $data['users'] = $this->user->get_by_level(ucfirst($data['level']));
        return $this->template->load('template', 'users/list', $data);
    }

    public function add()
    {
        $data['level'] = $this->uri->segment(1);
        $data['page_title'] = 'Tambah Users ';
        $data[$data['level'] . '_active'] = 'active';
        return $this->template->load('template', 'users/add', $data);
    }



    public function store()
    {
        $post = $this->input->post();

        if (@$_FILES['foto']['error'] == 0) {
            $nama_file = $this->uploading_foto();
            // $data['foto'] = $nama_file;
        }

        $data = [
            'nama' => $post['nama'],
            'telp' => @$post['telp'],
            'divisi' => @$post['divisi'],
            'ruangan' => @$post['ruangan'],
            'username' => $post['username'],
            'password' => password_hash($post['password'], PASSWORD_DEFAULT),
            'level' => $post['level']
        ];

        $result = $this->user->insert_data($data);
        if ($result) {
            $this->session->set_flashdata(
                ['success' => 'Data' . ucfirst($post['level']) . ' telah ditambahkan']
            );
            redirect($post['level'] . '/index');
        } else {
            $this->session->set_flashdata(
                ['error' => 'Data' . ucfirst($post['level']) . ' gagal ditambahkan']
            );
            redirect($post['level'] . '/add');
        }
    }

    public function edit()
    {
        $user_id = $this->uri->segment('3');
        $data['level'] = $this->uri->segment(1);
        $data[$data['level'] . '_active'] = 'active';
        $data['page_title'] = 'Edit User ';
        $data['user'] = $this->user->find_by_id($user_id);
        return $this->template->load('template', 'users/edit', $data);
    }

    public function update()
    {
        $post = $this->input->post();
        if (@$_FILES['foto']['error'] == 0) {
            $nama_file = $this->uploading_foto();
            // $data['foto'] = $nama_file;
        }

        $data = [
            'nama' => $post['nama'],
            'telp' => @$post['telp'],
            'divisi' => @$post['divisi'],
            'ruangan' => @$post['ruangan'],
            'username' => $post['username'],
            'password' => password_hash($post['password'], PASSWORD_DEFAULT),
            // 'level' => $post['level']
        ];
        $user_id = $post['user_id'] ? $post['user_id'] : $this->session->user_id;
        
        if ($post['password']) {
            $data['password'] = password_hash($post['password'], PASSWORD_DEFAULT);
        }

        $result = $this->user->update_data($data, $user_id);
        if ($result) {
            if ($post['user_id']) {
                $this->session->set_flashdata(
                    ['success' => 'Data' . ucfirst($post['level']) . ' telah diubah']
                );
                
                redirect(strtolower($post['level']) . '/index');
            } else {
                if ($user_id == $this->session->user_id) {
                    $this->session->set_userdata(['nama' => $post['nama']]);
                }

                $this->session->set_flashdata(
                    ['success' => 'Profile telah diubah']
                );

                redirect('users/profile');
            }
        } else {
            if ($post['user_id']) {
                $this->session->set_flashdata(
                    ['error' => 'Data' . ucfirst($post['level']) . ' gagal diubah']
                );
                
                redirect(strtolower($post['level']) . '/edit/' . $post['user_id']);
            } else {
                $this->session->set_flashdata(
                    ['error' => 'Profile gagal diubah']
                );

                redirect('users/profile');
            }
        }
    }

    public function profile()
    {
        $user_id = $this->session->user_id;
        $data['page_title'] = 'User Profile ';
        $data['user'] = $this->user->find_by_id($user_id);
        return $this->template->load('template', 'users/profile', $data);
    }

    public function upload_foto()
    {
        $this->uploading_foto();
        redirect('users/profile');
    }

    private function uploading_foto()
    {
        $post = $this->input->post();
        $uploadPath = './uploads/foto/';
        if (file_exists($uploadPath)) {
            mkdir($uploadPath);
        }
        $config = [
            'upload_path' => $uploadPath,
            'allowed_types' => 'jpg|jpeg|png',
            'file_name' => round(microtime(date('d-Y H:i:s'))),
            'file_ext_tolower' => true,
            'overwrite' => true,
        ];

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')) {
            $this->session->set_flashdata(
                ['error' => $this->upload->display_errors()]
            );
        } else {
            $file_data = $this->upload->data();
            $data['foto'] = $file_data['file_name'];
            $result = $this->user->update_data($data, $this->session->user_id);
            if ($result) {
                $this->session->set_userdata(
                    ['foto' => $file_data['file_name']]
                );
                $this->session->set_flashdata(
                    ['success' => 'Foto profile berhasil diganti']
                );
                return $file_data['file_name'];
            } else {
                $this->session->set_flashdata(
                    ['error' => 'Foto gagal diganti']
                );
            }
        }
    }
}

