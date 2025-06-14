<?php
class Customer_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function get_all_customers($limit = 20, $offset = 0, $search = null) {
        if ($search) {
            $this->db->group_start();
            $this->db->like('name', $search);
            $this->db->or_like('contact', $search);
            $this->db->or_like('tag', $search);
            $this->db->group_end();
        }
        $this->db->limit($limit, $offset);
        $query = $this->db->get('customers');
        return $query->result();
    }

    public function count_customers($search = null) {
        if ($search) {
            $this->db->group_start();
            $this->db->like('name', $search);
            $this->db->or_like('contact', $search);
            $this->db->or_like('tag', $search);
            $this->db->group_end();
        }
        return $this->db->count_all_results('customers');
    }

    public function count_all() {
        return $this->db->count_all('customers');
    }

    public function get_customer($id) {
        $query = $this->db->get_where('customers', array('id' => $id));
        return $query->row();
    }

    public function add_customer($data) {
        // Duplicate check
        $this->db->where('contact', $data['contact']);
        $this->db->or_where('tag', $data['tag']);
        $exists = $this->db->get('customers')->row();
        if ($exists) {
            return false;
        }
        $data['created_by'] = isset($data['created_by']) ? $data['created_by'] : null;
        $data['created_at'] = date('Y-m-d H:i:s');
        return $this->db->insert('customers', $data);
    }

    public function update_customer($id, $data) {
        $data['updated_by'] = isset($data['updated_by']) ? $data['updated_by'] : null;
        $data['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);
        return $this->db->update('customers', $data);
    }

    public function delete_customer($id) {
        $this->db->where('id', $id);
        return $this->db->delete('customers');
    }

    // Generate a unique tag (e.g., AA, AB, AC, ...)
    public function generate_unique_tag() {
        $this->db->select('tag');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('customers');
        if ($query->num_rows() > 0) {
            $last_tag = $query->row()->tag;
            $next_tag = $this->increment_tag($last_tag);
        } else {
            $next_tag = 'AA';
        }
        // Ensure uniqueness
        while ($this->db->where('tag', $next_tag)->count_all_results('customers') > 0) {
            $next_tag = $this->increment_tag($next_tag);
        }
        return $next_tag;
    }

    // Increment tag (e.g., AA -> AB, AZ -> BA)
    private function increment_tag($tag) {
        $length = strlen($tag);
        $tag = strtoupper($tag);
        $i = $length - 1;
        while ($i >= 0) {
            if ($tag[$i] != 'Z') {
                $tag[$i] = chr(ord($tag[$i]) + 1);
                break;
            } else {
                $tag[$i] = 'A';
                $i--;
            }
        }
        if ($i < 0) {
            $tag = 'A' . $tag;
        }
        return $tag;
    }

    public function get_username($user_id) {
        if (!$user_id) return '-';
        $query = $this->db->get_where('users', array('id' => $user_id));
        $user = $query->row();
        return $user ? $user->fullname : '-';
    }
}
