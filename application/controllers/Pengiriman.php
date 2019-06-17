<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Pengiriman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Pesanan_Model', 'pesanan');
        $this->load->model('Log_Model', 'log_pesanan');
    }

    public function index()
    {
        $get = $this->input->get();

        $data['pegawai'] = $this->user_pengirim();
        $data['pengiriman'] = $this->pesanan->get_all(@$get['start'], @$get['end']);
        $data['page_title'] = 'Pengiriman';
        $data['pengiriman_active'] = 'active';
        return $this->template->load('template', 'pengiriman/list', $data);
    }

    public function export()
    {
        $get = $this->input->get();
        $filename = 'Pengiriman Tanggal ' . $get['start'] . ' - ' . $get['end'] . '.xlsx';
        $no = 1;
        $pegawai = $this->user_pengirim();
        $pengiriman = $this->pesanan->get_all($get['start'], $get['end']);

        $this->load->library('PHPExcel');
        $this->phpexcel->setActiveSheetIndex(0);
        // set Header
        $this->phpexcel->getActiveSheet()->SetCellValue('A1', 'No');
        $this->phpexcel->getActiveSheet()->SetCellValue('B1', 'Pengirim');
        $this->phpexcel->getActiveSheet()->SetCellValue('C1', 'Judul');
        $this->phpexcel->getActiveSheet()->SetCellValue('D1', 'Tujuan');
        $this->phpexcel->getActiveSheet()->SetCellValue('E1', 'Kurir');
        $this->phpexcel->getActiveSheet()->SetCellValue('F1', 'Waktu');
        $this->phpexcel->getActiveSheet()->SetCellValue('G1', 'Status');

        $this->phpexcel->getActiveSheet()->getStyle('A1:G1')->getFont()->setBold(true);

        $row_count = 2;
        foreach ($pengiriman as $p) {
            $this->phpexcel->getActiveSheet()->SetCellValue('A' . $row_count, $no++);
            $this->phpexcel->getActiveSheet()->SetCellValue('B' . $row_count, $pegawai[$p->pengirim]);
            $this->phpexcel->getActiveSheet()->SetCellValue('C' . $row_count, $p->judul);
            $this->phpexcel->getActiveSheet()->SetCellValue('D' . $row_count, $p->tujuan);
            $this->phpexcel->getActiveSheet()->SetCellValue('E' . $row_count, $p->kurir);
            $this->phpexcel->getActiveSheet()->SetCellValue('F' . $row_count, $p->created_at);
            $this->phpexcel->getActiveSheet()->SetCellValue('G' . $row_count, $p->status);
            $row_count++;
        }

        $writer = new PHPExcel_Writer_Excel2007($this->phpexcel);
        $writer->save('export/' . $filename);
		// download file
        header("Content-Type: application/vnd.ms-excel");
        redirect('export/' . $filename);
    }

    // khusus pegawai
    public function pesananku()
    {
        $user_id = $this->session->user_id;
        $data['pesanan'] = $this->pesanan->get_by_kurir($user_id);
        $data['page_title'] = 'Pesananku';
        $data['pesananku_active'] = 'active';
        return $this->template->load('template', 'pengiriman/pesananku', $data);
    }

    // khusus kurir
    public function pesanan()
    {
        $data['pesanan'] = $this->pesanan->get_by_pengirim();
        $data['page_title'] = 'Pesanan';
        $data['pesanan_active'] = 'active';
        return $this->template->load('template', 'pengiriman/pesanan', $data);
    }

    // khusus kurir
    public function pengirimanku()
    {
        $user_id = $this->session->user_id;
        $data['pengiriman'] = $this->pesanan->get_by_pengirim($user_id);
        $data['page_title'] = 'Pengiriman';
        $data['pesanan_active'] = 'active';
        return $this->template->load('template', 'pengiriman/pengiriman', $data);
    }

    public function history()
    {
        $user_id = $this->session->user_id;
        $data['pesanan'] = $this->pesanan->get_by_kurir($user_id, true);
        $data['page_title'] = 'Pesananku';
        $data['pesananku_active'] = 'active';
        return $this->template->load('template', 'pengiriman/pesananku', $data);
    }

    public function detail()
    {
        $this->load->model('Log_Model', 'logs');
        $pengiriman_id = $this->uri->segment(3);
        $data['pengiriman'] = $this->pesanan->get_detail($pengiriman_id);
        $data['log'] = $this->logs->get_log_by_pengiriman($pengiriman_id);

        return $this->load->view('pengiriman/detail', $data);
    }

    public function store()
    {
        $post = $this->input->post();
        // print_r($post);
        $data = [
            'judul' => $post['judul'],
            'tujuan' => $post['tujuan'],
            'note' => @$post['note'],
            'pengirim' => $this->session->user_id
        ];

        $result = $this->pesanan->insert_data($data);
        if ($result) {
            $data_log = [
                'time' => date('Y-m-d H:i:s'),
                'keterangan' => $this->session->nama . ' mengajukan pengiriman dokumen ',
                'pengiriman_id' => $result->pengiriman_id
            ];
            $this->insert_log($data_log);
            $this->session->set_flashdata(
                ['success' => 'Pengajuan pengiriman telah ditambahkan']
            );
            redirect('pengiriman/pesananku');
        } else {
            $this->session->set_flashdata(
                ['error' => 'Pengajuan pengiriman gagal ditambahkan']
            );
            redirect('pengiriman/add');
        }
    }

    public function accept()
    {
        $pengiriman_id = $this->uri->segment(3);
        $data = [
            'status' => 'Kirim',
            'kurir' => $this->session->user_id
        ];
        $result = $this->pesanan->update_data($data, $pengiriman_id);
        if ($result) {
            $data_log = [
                'time' => date('Y-m-d H:i:s'),
                'keterangan' => $this->session->nama . ' mengirim dokumen ',
                'pengiriman_id' => $result->pengiriman_id
            ];
            $this->insert_log($data_log);
            $this->session->set_flashdata(
                ['success' => 'File sedang dikirim']
            );
            redirect('pengiriman/pengirimanku');
        }
    }

    public function uploadStruk()
    {
        $files = [];
        $jml_file = count($_FILES['struk']['name']);
        for ($i=0; $i < $jml_file; $i++) { 
            $_FILES['file']['name']     = $_FILES['struk']['name'][$i];
            $_FILES['file']['type']     = $_FILES['struk']['type'][$i];
            $_FILES['file']['tmp_name'] = $_FILES['struk']['tmp_name'][$i];
            $_FILES['file']['error']     = $_FILES['struk']['error'][$i];
            $_FILES['file']['size']     = $_FILES['struk']['size'][$i];
            
            // File upload configuration
            $uploadPath = 'uploads/struk/';
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath);
            }
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['overwrite'] = true;
            $config['file_name'] = $this->input->post('pengiriman_id') . '-' . $_FILES['file']['name'];
            
            // Load and initialize upload library
            $this->load->library('upload', $config);
            
            // Upload file to server
            if($this->upload->do_upload('file')){
                // Uploaded file data
                $fileData = $this->upload->data();
                $files[$i] = $fileData['file_name'];
            }
        }

        $files_uploaded = json_encode($files);
        $data['upload_struk'] = $files_uploaded;
        $result = $this->pesanan->update_data($data, $this->input->post('pengiriman_id'));

        if ($result) {
            $data_log = [
                'time' => date('Y-m-d H:i:s'),
                'keterangan' => $this->session->nama . ' mengupload struk ',
                'pengiriman_id' => $result->pengiriman_id
            ];
            $this->insert_log($data_log);
            $this->session->set_flashdata(
                ['success' => 'upload struk berhasil']
            );
            redirect('pengiriman/pengirimanku');
        }
    }

    public function finish()
    {
        $pengiriman_id = $this->input->post('pengiriman_id');
        $uploadPath = 'uploads/struk/';
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath);
        }
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = '*';
        $config['overwrite'] = true;
        $config['file_name'] = $pengiriman_id . '-' . $_FILES['bukti']['name'] . '-' . round(microtime(date('d-Y H:i:s')));
        
        // Load and initialize upload library
        $this->load->library('upload', $config);
        
        // Upload file to server
        if($this->upload->do_upload('bukti')){
            // Uploaded file data
            $fileData = $this->upload->data();
            $data = [
                'status' => 'Selesai',
                'upload_bukti' => $fileData['file_name']
            ];
        } else {
            $this->session->set_flashdata(
                ['error' => $this->upload->display_errors()]
            );
            print_r($this->session->flashdata());
            redirect('pengiriman/pengirimanku');
        }

        $result = $this->pesanan->update_data($data, $pengiriman_id);
        if ($result) {
            $data_log = [
                'time' => date('Y-m-d H:i:s'),
                'keterangan' => $this->session->nama . ' selesai mengirim dokumen ',
                'pengiriman_id' => $result->pengiriman_id
            ];
            $this->insert_log($data_log);
            $this->session->set_flashdata(
                ['success' => 'File bukti selesai dikirim']
            );
        }
        redirect('pengiriman/pengirimanku');
    }

    public function hapus_pesanan()
    {
        $pesanan_id = $this->uri->segment(3);
        $check_pesanan = $this->pesanan->find_by_id($pesanan_id);
        if ($check_pesanan->status == 'Tunggu') {
            $result = $this->pesanan->delete_data($pesanan_id);
            if ($result) {
                $this->session->set_flashdata(
                    ['error' => 'Pengiriman dibatalkan']
                );
            }
        }
        redirect('pengiriman/pesananku');
    }

    private function user_pengirim()
    {
        $this->load->model('User_Model', 'user');
        $list_pegawai = $this->user->get_by_level('Pegawai');
        $pegawai = [];
        foreach ($list_pegawai as $p) {
            $pegawai[$p->user_id] = $p->nama;
        }

        return $pegawai;
    }

    private function insert_log($data_log)
    {
        $this->log_pesanan->insert_data($data_log);
    }
}

