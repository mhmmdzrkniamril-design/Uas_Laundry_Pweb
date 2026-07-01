<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) redirect('login');
        $this->load->model(['M_pelanggan','M_layanan','M_transaksi']);
    }

    public function index() {
        // Build 6-month chart data
        $bulan_labels = [];
        $bulan_data   = [];
        $bulan_id     = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];
        for ($i = 5; $i >= 0; $i--) {
            $ts     = mktime(0,0,0, date('n')-$i, 1, date('Y'));
            $m      = date('n', $ts);
            $y      = date('Y', $ts);
            $count  = $this->db
                        ->where('MONTH(tanggal_masuk)', $m)
                        ->where('YEAR(tanggal_masuk)', $y)
                        ->count_all_results('transaksi');
            $bulan_labels[] = $bulan_id[$m-1];
            $bulan_data[]   = (int) $count;
        }

        $data = [
            'title'              => 'Dashboard',
            'total_pelanggan'    => $this->M_pelanggan->count(),
            'total_layanan'      => $this->M_layanan->count(),
            'total_transaksi'    => $this->M_transaksi->count(),
            'total_pendapatan'   => $this->M_transaksi->total_pendapatan(),
            'status_diterima'    => $this->M_transaksi->count_by_status('Diterima'),
            'status_diproses'    => $this->M_transaksi->count_by_status('Diproses'),
            'status_selesai'     => $this->M_transaksi->count_by_status('Selesai'),
            'status_diambil'     => $this->M_transaksi->count_by_status('Diambil'),
            'transaksi_terbaru'  => array_slice($this->M_transaksi->get_all(), 0, 5),
            'bulan_labels'       => $bulan_labels,
            'bulan_data'         => $bulan_data,
        ];
        $this->load->view('layouts/header', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('layouts/footer');
    }
}
