<?php
class Payment_model extends CI_Model {
    public function count_all() {
        return $this->db->count_all('payments');
    }
}
