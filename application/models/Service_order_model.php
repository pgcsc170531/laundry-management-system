<?php
class Service_order_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function get_all_orders($limit = 20, $offset = 0, $search = null) {
        if ($search) {
            $this->db->group_start();
            $this->db->like('sr_no', $search);
            $this->db->or_like('customer_id', $search);
            $this->db->group_end();
        }
        $this->db->limit($limit, $offset);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('service_orders');
        return $query->result();
    }

    public function count_orders($search = null) {
        if ($search) {
            $this->db->group_start();
            $this->db->like('sr_no', $search);
            $this->db->or_like('customer_id', $search);
            $this->db->group_end();
        }
        return $this->db->count_all_results('service_orders');
    }

    public function count_all() {
        return $this->db->count_all('service_orders');
    }

    public function get_order($id) {
        $query = $this->db->get_where('service_orders', array('id' => $id));
        return $query->row();
    }

    public function add_order($data) {
        $data['created_by'] = isset($data['created_by']) ? $data['created_by'] : null;
        $data['created_at'] = date('Y-m-d H:i:s');
        return $this->db->insert('service_orders', $data);
    }

    public function update_order($id, $data) {
        $data['updated_by'] = isset($data['updated_by']) ? $data['updated_by'] : null;
        $data['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);
        return $this->db->update('service_orders', $data);
    }

    public function delete_order($id) {
        $this->db->where('id', $id);
        return $this->db->delete('service_orders');
    }
}
