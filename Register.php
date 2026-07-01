<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_pelanggan_login');
        $this->load->library('form_validation');
    }

    public function index() {
        // Jika sudah login, redirect
        if ($this->session->userdata('customer_logged_in')) {
            redirect('user/dashboard');
        }
        if ($this->session->userdata('logged_in')) {
            redirect('dashboard');
        }
        $this->load->view('auth/register');
    }

    public function proses() {
        $nama       = trim($this->input->post('nama_pelanggan'));
        $telepon    = trim($this->input->post('telepon'));
        $alamat     = trim($this->input->post('alamat'));
        $email      = trim($this->input->post('email'));
        $username   = trim($this->input->post('username'));
        $password   = $this->input->post('password');
        $konfirmasi = $this->input->post('konfirmasi_password');

        // Validasi field kosong
        if (empty($nama) || empty($telepon) || empty($alamat) || empty($email) || empty($username) || empty($password)) {
            $this->session->set_flashdata('error', 'Semua field wajib diisi.');
            redirect('register');
        }

        // Validasi email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->session->set_flashdata('error', 'Format email tidak valid.');
            redirect('register');
        }

        // Validasi password
        if (strlen($password) < 6) {
            $this->session->set_flashdata('error', 'Password minimal 6 karakter.');
            redirect('register');
        }

        // Konfirmasi password
        if ($password !== $konfirmasi) {
            $this->session->set_flashdata('error', 'Konfirmasi password tidak sama.');
            redirect('register');
        }

        // Cek username sudah digunakan
        if ($this->M_pelanggan_login->cek_username($username)) {
            $this->session->set_flashdata('error', 'Username sudah digunakan, silakan pilih username lain.');
            redirect('register');
        }

        // Cek email sudah digunakan
        if ($this->M_pelanggan_login->cek_email($email)) {
            $this->session->set_flashdata('error', 'Email sudah terdaftar, silakan gunakan email lain.');
            redirect('register');
        }

        $data = [
            'nama_pelanggan' => $nama,
            'telepon'        => $telepon,
            'alamat'         => $alamat,
            'email'          => $email,
            'username'       => $username,
            'password'       => password_hash($password, PASSWORD_DEFAULT),
            'created_at'     => date('Y-m-d H:i:s'),
        ];

        $this->M_pelanggan_login->register($data);

        $this->session->set_flashdata('success', 'Registrasi berhasil! Silakan login menggunakan akun Anda.');
        redirect('login');
    }
}
