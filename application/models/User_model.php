<?php
class User_model extends CI_Model {
    public function get_username($user_id) {
        if (!$user_id) return '-';
        $query = $this->db->get_where('users', array('id' => $user_id));
        $user = $query->row();
        return $user ? $user->fullname : '-';
    }
}
