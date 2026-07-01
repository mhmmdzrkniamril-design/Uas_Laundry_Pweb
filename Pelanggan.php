<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) redirect('login');
        $this->load->model('M_pelanggan');
        $this->load->library('form_validation');
    }

    public function index() {
        $data = [
            'title'     => 'Data Pelanggan',
            'pelanggan' => $this->M_pelanggan->get_all()
        ];
        $this->load->view('layouts/header', $data);
        $this->load->view('pelanggan/index', $data);
        $this->load->view('layouts/footer');
    }

    public function tambah() {
        $data = ['title' => 'Tambah Pelanggan'];
        $this->load->view('layouts/header', $data);
        $this->load->view('pelanggan/form', $data);
        $this->load->view('layouts/footer');
    }

    public function simpan() {
        $this->form_validation->set_rules('nama_pelanggan', 'Nama',     'required|trim');
        $this->form_validation->set_rules('telepon',        'Telepon',  'required|trim');
        $this->form_validation->set_rules('email',          'Email',    'trim|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('pelanggan/tambah');
        }

        $this->M_pelanggan->insert([
            'nama_pelanggan' => trim($this->input->post('nama_pelanggan')),
            'telepon'        => trim($this->input->post('telepon')),
            'alamat'         => trim($this->input->post('alamat')),
            'email'          => trim($this->input->post('email')),
        ]);

        $this->session->set_flashdata('success', 'Pelanggan berhasil ditambahkan!');
        redirect('pelanggan');
    }

    public function edit($id) {
        $pelanggan = $this->M_pelanggan->get_by_id($id);
        if (!$pelanggan) {
            $this->session->set_flashdata('error', 'Pelanggan tidak ditemukan!');
            redirect('pelanggan');
        }
        $data = ['title' => 'Edit Pelanggan', 'pelanggan' => $pelanggan];
        $this->load->view('layouts/header', $data);
        $this->load->view('pelanggan/form', $data);
        $this->load->view('layouts/footer');
    }

    public function update($id) {
        $this->form_validation->set_rules('nama_pelanggan', 'Nama',    'required|trim');
        $this->form_validation->set_rules('telepon',        'Telepon', 'required|trim');
        $this->form_validation->set_rules('email',          'Email',   'trim|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('pelanggan/edit/'.$id);
        }

        $this->M_pelanggan->update($id, [
            'nama_pelanggan' => trim($this->input->post('nama_pelanggan')),
            'telepon'        => trim($this->input->post('telepon')),
            'alamat'         => trim($this->input->post('alamat')),
            'email'          => trim($this->input->post('email')),
        ]);

        $this->session->set_flashdata('success', 'Data pelanggan berhasil diperbarui!');
        redirect('pelanggan');
    }

    public function hapus($id) {
        $this->M_pelanggan->delete($id);
        $this->session->set_flashdata('success', 'Pelanggan berhasil dihapus!');
        redirect('pelanggan');
    }
}
