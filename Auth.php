<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_user');
        $this->load->model('M_pelanggan_login');
    }

    public function index() {
        if ($this->session->userdata('logged_in')) {
            redirect('dashboard');
        }
        if ($this->session->userdata('customer_logged_in')) {
            redirect('user/dashboard');
        }
        $this->load->view('auth/login');
    }

    public function proses_login() {
        $username = trim($this->input->post('username'));
        $password = $this->input->post('password');

        if (empty($username) || empty($password)) {
            $this->session->set_flashdata('error', 'Username dan password harus diisi!');
            redirect('login');
        }

        // Coba login sebagai admin/kasir
        $admin = $this->M_user->cek_login($username, $password);
        if ($admin) {
            $this->session->set_userdata([
                'logged_in' => true,
                'id_user'   => $admin['id_user'],
                'username'  => $admin['username'],
                'nama'      => $admin['nama_lengkap'],
                'role'      => $admin['role'],
            ]);
            redirect('dashboard');
            return;
        }

        // Coba login sebagai pelanggan
        $pelanggan = $this->M_pelanggan_login->cek_login($username, $password);
        if ($pelanggan) {
            $this->session->set_userdata([
                'customer_logged_in' => true,
                'id_pelanggan'       => $pelanggan['id_pelanggan'],
                'nama_pelanggan'     => $pelanggan['nama_pelanggan'],
                'username_pelanggan' => $pelanggan['username'],
            ]);
            redirect('user/dashboard');
            return;
        }

        $this->session->set_flashdata('error', 'Username atau password salah!');
        redirect('login');
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }
}
