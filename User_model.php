<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    public function register($data) {
        return $this->db->insert('users', $data);
    }

    public function login($username, $password) {
        $this->db->where('username', $username);
        $query = $this->db->get('users');
        $user = $query->row();

        if ($user && $user->password === $password) {
            return $user;
        }
        return false;
    }

    public function get_all_users() {
        return $this->db->get('users')->result();
    }

    public function create_user($data) {
        return $this->db->insert('users', $data);
    }

    public function update_user($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }

    public function delete_user($id) {
        return $this->db->delete('users', array('id' => $id));
    }

    public function get_user($id) {
        return $this->db->get_where('users', array('id' => $id))->row();
    }

    // public function get_comment($data){
    //     return $this->db->comment('users',$data)
    // }
}
