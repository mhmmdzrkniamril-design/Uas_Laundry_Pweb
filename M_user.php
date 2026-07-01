<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

    public function cek_login($username, $password) {
        $user = $this->db->where('username', $username)->get('users')->row_array();
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
}
