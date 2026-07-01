<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserPanel extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_pelanggan_login');
        $this->load->model('M_transaksi');
        $this->load->model('M_layanan');
        $this->load->library('form_validation');

        if (!$this->session->userdata('customer_logged_in')) {
            redirect('login');
        }
    }

    public function index() {
        $id = $this->session->userdata('id_pelanggan');
        $data['pelanggan']   = $this->M_pelanggan_login->getById($id);
        $data['total']       = $this->M_transaksi->count_pelanggan($id);
        $data['diterima']    = $this->M_transaksi->count_pelanggan_status($id, 'Diterima');
        $data['diproses']    = $this->M_transaksi->count_pelanggan_status($id, 'Diproses');
        $data['selesai']     = $this->M_transaksi->count_pelanggan_status($id, 'Selesai');
        $data['diambil']     = $this->M_transaksi->count_pelanggan_status($id, 'Diambil');
        $data['pengeluaran'] = $this->M_transaksi->total_pengeluaran($id);
        $data['riwayat']     = $this->M_transaksi->get_by_pelanggan($id);
        $data['layanan']     = $this->M_layanan->get_all();
        $this->load->view('pelanggan/dashboard', $data);
    }

    public function riwayat() {
        $id = $this->session->userdata('id_pelanggan');
        $data['pelanggan'] = $this->M_pelanggan_login->getById($id);
        $data['riwayat']   = $this->M_transaksi->get_by_pelanggan($id);
        $this->load->view('pelanggan/riwayat', $data);
    }

    public function detail($id_transaksi) {
        $id = $this->session->userdata('id_pelanggan');
        $data['pelanggan'] = $this->M_pelanggan_login->getById($id);
        $data['transaksi'] = $this->M_transaksi->get_by_id($id_transaksi);

        // Keamanan: hanya tampilkan transaksi milik sendiri
        if (!$data['transaksi'] || $data['transaksi']['id_pelanggan'] != $id) {
            $this->session->set_flashdata('error', 'Transaksi tidak ditemukan!');
            redirect('user/dashboard');
        }
        $this->load->view('pelanggan/detail', $data);
    }

    public function profil() {
        $id = $this->session->userdata('id_pelanggan');
        $data['pelanggan'] = $this->M_pelanggan_login->getById($id);
        $this->load->view('pelanggan/profil', $data);
    }

    public function update_profil() {
        $id = $this->session->userdata('id_pelanggan');

        $this->form_validation->set_rules('nama_pelanggan', 'Nama',    'required|trim');
        $this->form_validation->set_rules('telepon',        'Telepon', 'required|trim');
        $this->form_validation->set_rules('email',          'Email',   'trim|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('user/profil');
        }

        $update = [
            'nama_pelanggan' => trim($this->input->post('nama_pelanggan')),
            'telepon'        => trim($this->input->post('telepon')),
            'alamat'         => trim($this->input->post('alamat')),
            'email'          => trim($this->input->post('email')),
        ];

        // Ganti password jika diisi
        $password_baru  = $this->input->post('password_baru');
        $konfirmasi_pw  = $this->input->post('konfirmasi_password');

        if (!empty($password_baru)) {
            if ($password_baru !== $konfirmasi_pw) {
                $this->session->set_flashdata('error', 'Konfirmasi password baru tidak cocok!');
                redirect('user/profil');
            }
            if (strlen($password_baru) < 6) {
                $this->session->set_flashdata('error', 'Password minimal 6 karakter!');
                redirect('user/profil');
            }
            $update['password'] = password_hash($password_baru, PASSWORD_DEFAULT);
        }

        $this->M_pelanggan_login->update($id, $update);
        // Update nama di session
        $this->session->set_userdata('nama_pelanggan', $update['nama_pelanggan']);

        $this->session->set_flashdata('success', 'Profil berhasil diperbarui.');
        redirect('user/profil');
    }

    public function logout() {
        $this->session->unset_userdata([
            'customer_logged_in',
            'id_pelanggan',
            'nama_pelanggan',
            'username_pelanggan',
        ]);
        redirect('login');
    }
}
