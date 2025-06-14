<?php
class Service_item_model extends CI_Model {
    public function count_all() {
        return $this->db->count_all('service_items');
    }

    public function get_all_items() {
        return $this->db->get('service_items')->result();
    }
    public function get_item($id) {
        return $this->db->get_where('service_items', ['id' => $id])->row();
    }
    public function add_item($data) {
        $data['created_by'] = isset($data['created_by']) ? $data['created_by'] : null;
        $data['created_at'] = date('Y-m-d H:i:s');
        return $this->db->insert('service_items', $data);
    }
    public function update_item($id, $data) {
        $data['updated_by'] = isset($data['updated_by']) ? $data['updated_by'] : null;
        $data['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);
        return $this->db->update('service_items', $data);
    }
    public function delete_item($id) {
        $this->db->where('id', $id);
        return $this->db->delete('service_items');
    }
}
