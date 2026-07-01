<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) redirect('login');
        $this->load->model(['M_transaksi','M_pelanggan','M_layanan']);
        $this->load->library('form_validation');
    }

    public function index() {
        $data = [
            'title'     => 'Data Transaksi',
            'transaksi' => $this->M_transaksi->get_all()
        ];
        $this->load->view('layouts/header', $data);
        $this->load->view('transaksi/index', $data);
        $this->load->view('layouts/footer');
    }

    public function tambah() {
        $data = [
            'title'     => 'Tambah Transaksi',
            'pelanggan' => $this->M_pelanggan->get_all(),
            'layanan'   => $this->M_layanan->get_all(),
            'kode'      => $this->M_transaksi->generate_kode(),
        ];
        $this->load->view('layouts/header', $data);
        $this->load->view('transaksi/form', $data);
        $this->load->view('layouts/footer');
    }

    public function get_harga($id) {
        $layanan = $this->M_layanan->get_by_id($id);
        if ($layanan) {
            echo json_encode(['harga' => $layanan['harga_per_kg'], 'estimasi' => $layanan['estimasi_hari']]);
        } else {
            echo json_encode(['harga' => 0, 'estimasi' => 0]);
        }
    }

    public function simpan() {
        $this->form_validation->set_rules('id_pelanggan', 'Pelanggan', 'required');
        $this->form_validation->set_rules('id_layanan',   'Layanan',   'required');
        $this->form_validation->set_rules('berat_kg',     'Berat',     'required|numeric|greater_than[0]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('transaksi/tambah');
        }

        $layanan     = $this->M_layanan->get_by_id($this->input->post('id_layanan'));
        $berat       = (float)$this->input->post('berat_kg');
        $estimasi    = (int)$this->input->post('estimasi_hari');

        // Multiplier harga berdasarkan estimasi (semakin cepat = lebih mahal)
        $multipliers = [4 => 1.0, 3 => 1.2, 2 => 1.5, 1 => 2.0];
        $multiplier  = isset($multipliers[$estimasi]) ? $multipliers[$estimasi] : 1.0;
        $harga_final = $layanan['harga_per_kg'] * $multiplier;
        $total       = $berat * $harga_final;
        $tgl_masuk   = date('Y-m-d');
        $tgl_selesai = date('Y-m-d', strtotime("+{$estimasi} days"));

        $this->M_transaksi->insert([
            'kode_transaksi'  => $this->M_transaksi->generate_kode(),
            'id_pelanggan'    => $this->input->post('id_pelanggan'),
            'id_layanan'      => $this->input->post('id_layanan'),
            'berat_kg'        => $berat,
            'total_harga'     => $total,
            'tanggal_masuk'   => $tgl_masuk,
            'tanggal_selesai' => $tgl_selesai,
            'status'          => 'Diterima',
            'catatan'         => $this->input->post('catatan'),
        ]);

        $this->session->set_flashdata('success', 'Transaksi berhasil ditambahkan!');
        redirect('transaksi');
    }

    public function edit($id) {
        $transaksi = $this->M_transaksi->get_by_id($id);
        if (!$transaksi) {
            $this->session->set_flashdata('error', 'Transaksi tidak ditemukan!');
            redirect('transaksi');
        }
        $data = [
            'title'     => 'Edit Transaksi',
            'transaksi' => $transaksi,
            'pelanggan' => $this->M_pelanggan->get_all(),
            'layanan'   => $this->M_layanan->get_all(),
        ];
        $this->load->view('layouts/header', $data);
        $this->load->view('transaksi/form', $data);
        $this->load->view('layouts/footer');
    }

    public function update($id) {
        $this->form_validation->set_rules('id_pelanggan', 'Pelanggan', 'required');
        $this->form_validation->set_rules('id_layanan',   'Layanan',   'required');
        $this->form_validation->set_rules('berat_kg',     'Berat',     'required|numeric|greater_than[0]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('transaksi/edit/'.$id);
        }

        $layanan     = $this->M_layanan->get_by_id($this->input->post('id_layanan'));
        $berat       = (float)$this->input->post('berat_kg');
        $estimasi    = (int)$this->input->post('estimasi_hari');
        $multipliers = [4 => 1.0, 3 => 1.2, 2 => 1.5, 1 => 2.0];
        $multiplier  = isset($multipliers[$estimasi]) ? $multipliers[$estimasi] : 1.0;
        $harga_final = $layanan['harga_per_kg'] * $multiplier;
        $total       = $berat * $harga_final;

        $this->M_transaksi->update($id, [
            'id_pelanggan'    => $this->input->post('id_pelanggan'),
            'id_layanan'      => $this->input->post('id_layanan'),
            'berat_kg'        => $berat,
            'total_harga'     => $total,
            'tanggal_selesai' => date('Y-m-d', strtotime("+{$estimasi} days", strtotime($this->M_transaksi->get_by_id($id)['tanggal_masuk']))),
            'status'          => $this->input->post('status'),
            'catatan'         => $this->input->post('catatan'),
        ]);

        $this->session->set_flashdata('success', 'Transaksi berhasil diperbarui!');
        redirect('transaksi');
    }

    public function update_status($id) {
        $status   = $this->input->post('status');
        $allowed  = ['Diterima','Diproses','Selesai','Diambil'];
        if (!in_array($status, $allowed)) {
            $this->session->set_flashdata('error', 'Status tidak valid!');
            redirect('transaksi');
        }
        $this->M_transaksi->update($id, ['status' => $status]);
        $this->session->set_flashdata('success', 'Status berhasil diperbarui!');
        redirect('transaksi');
    }

    public function hapus($id) {
        $this->M_transaksi->delete($id);
        $this->session->set_flashdata('success', 'Transaksi berhasil dihapus!');
        redirect('transaksi');
    }

    public function nota($id) {
        $transaksi = $this->M_transaksi->get_by_id($id);
        if (!$transaksi) {
            show_404();
        }
        $data = ['title' => 'Nota Transaksi', 'transaksi' => $transaksi];
        $this->load->view('transaksi/nota', $data);
    }
}
