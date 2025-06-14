<?php
class Service_order_item_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function add_items($service_order_id, $items, $user_id = null) {
        foreach ($items as $item) {
            $data = array(
                'service_order_id' => $service_order_id,
                'service_item_id' => $item['service_item_id'],
                'qty' => $item['qty'],
                'rate' => $item['rate'],
                'amount' => $item['amount'],
                'created_by' => $user_id,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('service_order_items', $data);
        }
    }

    public function get_items_by_order($service_order_id) {
        $this->db->select('service_order_items.*, service_items.name, service_items.description');
        $this->db->from('service_order_items');
        $this->db->join('service_items', 'service_items.id = service_order_items.service_item_id');
        $this->db->where('service_order_items.service_order_id', $service_order_id);
        return $this->db->get()->result();
    }
}
