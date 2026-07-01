<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) redirect('login');
        $this->load->model('M_layanan');
        $this->load->library('form_validation');
    }

    public function index() {
        $data = ['title' => 'Data Layanan', 'layanan' => $this->M_layanan->get_all()];
        $this->load->view('layouts/header', $data);
        $this->load->view('layanan/index', $data);
        $this->load->view('layouts/footer');
    }

    public function tambah() {
        $data = ['title' => 'Tambah Layanan'];
        $this->load->view('layouts/header', $data);
        $this->load->view('layanan/form', $data);
        $this->load->view('layouts/footer');
    }

    public function simpan() {
        $this->form_validation->set_rules('nama_layanan','Nama Layanan','required');
        $this->form_validation->set_rules('harga_per_kg','Harga','required|numeric');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('layanan/tambah');
        }
        $this->M_layanan->insert([
            'nama_layanan'   => $this->input->post('nama_layanan'),
            'harga_per_kg'   => $this->input->post('harga_per_kg'),
            'keterangan'     => $this->input->post('keterangan'),
        ]);
        $this->session->set_flashdata('success', 'Layanan berhasil ditambahkan!');
        redirect('layanan');
    }

    public function edit($id) {
        $data = ['title' => 'Edit Layanan', 'layanan' => $this->M_layanan->get_by_id($id)];
        $this->load->view('layouts/header', $data);
        $this->load->view('layanan/form', $data);
        $this->load->view('layouts/footer');
    }

    public function update($id) {
        $this->M_layanan->update($id, [
            'nama_layanan'   => $this->input->post('nama_layanan'),
            'harga_per_kg'   => $this->input->post('harga_per_kg'),
            'keterangan'     => $this->input->post('keterangan'),
        ]);
        $this->session->set_flashdata('success', 'Layanan berhasil diperbarui!');
        redirect('layanan');
    }

    public function hapus($id) {
        $this->M_layanan->delete($id);
        $this->session->set_flashdata('success', 'Layanan berhasil dihapus!');
        redirect('layanan');
    }
}
