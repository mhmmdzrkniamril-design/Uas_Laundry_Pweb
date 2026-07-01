<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pelanggan extends CI_Model {

    public function get_all() {
        return $this->db->order_by('id_pelanggan','DESC')->get('pelanggan')->result_array();
    }

    public function get_by_id($id) {
        return $this->db->where('id_pelanggan', $id)->get('pelanggan')->row_array();
    }

    public function insert($data) {
        return $this->db->insert('pelanggan', $data);
    }

    public function update($id, $data) {
        return $this->db->where('id_pelanggan', $id)->update('pelanggan', $data);
    }

    public function delete($id) {
        return $this->db->where('id_pelanggan', $id)->delete('pelanggan');
    }

    public function count() {
        return $this->db->count_all('pelanggan');
    }
}
