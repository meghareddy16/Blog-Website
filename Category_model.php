<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {
    public function get_categories() {
        return $this->db->get('categories')->result();
    }

    public function get_category($id) {
        return $this->db->get_where('categories', array('id' => $id))->row();
    }

    public function create_category($data) {
        return $this->db->insert('categories', $data);
    }

    public function update_category($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('categories', $data);
    }

    public function delete_category($id) {
        return $this->db->delete('categories', array('id' => $id));
    }
}
