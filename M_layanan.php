<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_layanan extends CI_Model {

    public function get_all() {
        return $this->db->order_by('id_layanan','ASC')->get('layanan')->result_array();
    }

    public function get_by_id($id) {
        return $this->db->where('id_layanan', $id)->get('layanan')->row_array();
    }

    public function insert($data) {
        return $this->db->insert('layanan', $data);
    }

    public function update($id, $data) {
        return $this->db->where('id_layanan', $id)->update('layanan', $data);
    }

    public function delete($id) {
        return $this->db->where('id_layanan', $id)->delete('layanan');
    }

    public function count() {
        return $this->db->count_all('layanan');
    }
}
