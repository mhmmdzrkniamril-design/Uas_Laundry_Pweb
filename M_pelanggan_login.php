<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pelanggan_login extends CI_Model {

    // Login pelanggan
    public function cek_login($username, $password)
    {
        $user = $this->db
                    ->where('username', $username)
                    ->get('pelanggan')
                    ->row_array();

        if ($user) {

            if (password_verify($password, $user['password'])) {

                return $user;

            }

        }

        return false;
    }

    // Cek username sudah digunakan atau belum
    public function cek_username($username)
    {
        return $this->db
                    ->where('username', $username)
                    ->get('pelanggan')
                    ->row_array();
    }

    // Cek email sudah digunakan atau belum
    public function cek_email($email)
    {
        return $this->db
                    ->where('email', $email)
                    ->get('pelanggan')
                    ->row_array();
    }

    // Simpan data pelanggan
    public function register($data)
    {
        return $this->db->insert('pelanggan', $data);
    }

    // Ambil data pelanggan berdasarkan ID
    public function getById($id_pelanggan)
    {
        return $this->db
                    ->where('id_pelanggan', $id_pelanggan)
                    ->get('pelanggan')
                    ->row_array();
    }

    // Update profil pelanggan
    public function update($id_pelanggan, $data)
    {
        $this->db->where('id_pelanggan', $id_pelanggan);

        return $this->db->update('pelanggan', $data);
    }

}