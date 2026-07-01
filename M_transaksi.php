<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model {

    public function get_all() {
        $this->db->select('t.*, p.nama_pelanggan, p.telepon, l.nama_layanan, l.harga_per_kg');
        $this->db->from('transaksi t');
        $this->db->join('pelanggan p', 'p.id_pelanggan = t.id_pelanggan');
        $this->db->join('layanan l', 'l.id_layanan = t.id_layanan');
        $this->db->order_by('t.id_transaksi', 'DESC');
        return $this->db->get()->result_array();
    }

    public function get_by_id($id) {
        $this->db->select('t.*, p.nama_pelanggan, p.telepon, p.alamat, l.nama_layanan, l.harga_per_kg, l.estimasi_hari');
        $this->db->from('transaksi t');
        $this->db->join('pelanggan p', 'p.id_pelanggan = t.id_pelanggan');
        $this->db->join('layanan l', 'l.id_layanan = t.id_layanan');
        $this->db->where('t.id_transaksi', $id);
        return $this->db->get()->row_array();
    }

    public function insert($data) {
        return $this->db->insert('transaksi', $data);
    }

    public function update($id, $data) {
        return $this->db->where('id_transaksi', $id)->update('transaksi', $data);
    }

    public function delete($id) {
        return $this->db->where('id_transaksi', $id)->delete('transaksi');
    }

    public function count() {
        return $this->db->count_all('transaksi');
    }

    public function count_by_status($status) {
        return $this->db->where('status', $status)->count_all_results('transaksi');
    }

    public function total_pendapatan() {
        $q = $this->db->select_sum('total_harga')->where('status', 'Diambil')->get('transaksi')->row_array();
        return $q['total_harga'] ?? 0;
    }

    public function generate_kode() {
        // Ambil id_transaksi terbesar supaya tidak duplikat
        $last = $this->db->select_max('id_transaksi')->get('transaksi')->row_array();
        $num  = ($last && $last['id_transaksi']) ? (int)$last['id_transaksi'] + 1 : 1;
        return 'TRX-' . str_pad($num, 3, '0', STR_PAD_LEFT);
    }

    public function get_by_pelanggan($id_pelanggan) {
        $this->db->select('t.*, l.nama_layanan');
        $this->db->from('transaksi t');
        $this->db->join('layanan l', 'l.id_layanan = t.id_layanan');
        $this->db->where('t.id_pelanggan', $id_pelanggan);
        $this->db->order_by('t.id_transaksi', 'DESC');
        return $this->db->get()->result_array();
    }

    public function count_pelanggan($id_pelanggan) {
        return $this->db->where('id_pelanggan', $id_pelanggan)->count_all_results('transaksi');
    }

    public function count_pelanggan_status($id_pelanggan, $status) {
        return $this->db
            ->where('id_pelanggan', $id_pelanggan)
            ->where('status', $status)
            ->count_all_results('transaksi');
    }

    public function total_pengeluaran($id_pelanggan) {
        $this->db->select_sum('total_harga');
        $this->db->where('id_pelanggan', $id_pelanggan);
        $hasil = $this->db->get('transaksi')->row_array();
        return $hasil['total_harga'] ?? 0;
    }
}
