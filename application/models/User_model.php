<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function create_user($data) {
        return $this->db->insert('user', $data);
    }

    public function get_user($id) {
        $query = $this->db->get_where('user', array('id' => $id));
        return $query->row_array();
    }

    public function get_all_users() {
        $query = $this->db->get('user');
        return $query->result_array();
    }

    public function update_user($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('user', $data);
    }

    public function delete_user($id) {
        $this->db->where('id', $id);
        return $this->db->delete('user');
    }
}
?>
