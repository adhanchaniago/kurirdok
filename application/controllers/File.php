<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class File extends CI_Controller
{
    private $dir;

    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('File_Model', 'file');

        if (is_level('Pegawai')) {
            $this->dir = strtolower(str_replace(' ', '_', $this->session->nama));
            if (!file_exists(FCPATH . 'uploads\\files\\' . $this->dir)) {
                mkdir(FCPATH . 'uploads\\files\\' . $this->dir);
            }
        }
    }

    public function index()
    {
        if ($this->session->level == 'Pegawai') {
            $user_id = $this->session->user_id;
            $data['files'] = $this->file->get_by_author($user_id);
        } else {
            $data['files'] = $this->file->get_by_author();
        }
        $data['file_active'] = 'active';
        $data['page_title'] = 'Daftar File';

        return $this->template->load('template', 'files/list', $data);
    }

    public function add()
    {
        $data['file_active'] = 'active';
        $data['page_title'] = 'Daftar File';

        return $this->template->load('template', 'files/add', $data);
    }

    public function store()
    {
        $post = $this->input->post();

        $config = [
            'upload_path' => './uploads/files/' . $this->dir,
            'allowed_types' => 'jpg|jpeg|png|doc|docx|pdf|xls|xlsx|ppt|pptx',
            'file_name' => strtolower($post['filename']),
            'file_ext_tolower' => true,
            'overwrite' => true,
        ];

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('file')) {
            echo json_encode($this->upload->display_errors());
        } else {
            $file_data = $this->upload->data();
            $data = [
                'filename' => $post['filename'],
                'file_path' => str_replace(str_replace('\\', '/', FCPATH), '', $file_data['full_path']),
                'author' => $this->session->user_id
            ];
            $result = $this->file->insert_data($data);
            echo json_encode($result);
        }
    }

    public function edit()
    {
        $user_id = $this->uri->segment('3');
        $data = $this->file->find_by_id($user_id);
        echo json_encode($data);
    }

    public function update()
    {
        $post = $this->input->post();
        $data = [
            'filename' => $post['filename'],
        ];
        
        if (@$_FILES['file']) {
            $config = [
                'upload_path' => './uploads/files/' . $this->dir,
                'allowed_types' => 'jpg|jpeg|png|doc|docx|pdf|xls|xlsx|ppt|pptx',
                'file_name' => strtolower($post['filename']),
                'file_ext_tolower' => true,
                'overwrite' => true,
            ];
    
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('file')) {
                echo json_encode($this->upload->display_errors());
            } else {
                $file_data = $this->upload->data();
                $data['file_path'] = str_replace(str_replace('\\', '/', FCPATH), '', $file_data['full_path']);
                $this->delete_file($post['file_id']);
            }
        }

        $result = $this->file->update_data($data, $post['file_id']);
        echo json_encode($result);
    }

    public function destroy()
    {
        $file_id = $this->uri->segment(3);
        $this->delete_file($file_id);
        $result = $this->file->delete_data($file_id);
        print_r($result);
        if ($result) {
            $this->session->set_flashdata(
                ['error' => 'File berhasil dihapus']
            );
        } else {
            $this->session->set_flashdata(
                ['error' => 'File gagal dihapus']
            );
        }

        redirect('file/');
    }

    private function delete_file($file_id)
    {
        $file_data = $this->file->find_by_id($file_id);
        unlink(str_replace('\\', '/', FCPATH) . $file_data->file_path);
    }
}

