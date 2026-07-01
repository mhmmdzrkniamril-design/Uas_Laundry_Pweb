<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) redirect('login');
        $this->load->model(['M_transaksi','M_pelanggan','M_layanan']);
    }

    public function index() {
        $data['title']         = 'Laporan';
        $data['transaksi']     = $this->M_transaksi->get_all();
        $data['total_transaksi'] = $this->M_transaksi->count();
        $data['total_pendapatan'] = $this->M_transaksi->total_pendapatan();
        $data['status_diterima'] = $this->M_transaksi->count_by_status('Diterima');
        $data['status_diproses'] = $this->M_transaksi->count_by_status('Diproses');
        $data['status_selesai']  = $this->M_transaksi->count_by_status('Selesai');
        $data['status_diambil']  = $this->M_transaksi->count_by_status('Diambil');
        $this->load->view('layouts/header', $data);
        $this->load->view('laporan/index', $data);
        $this->load->view('layouts/footer');
    }
}
