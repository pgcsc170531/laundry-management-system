<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service_orders extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Service_order_model');
        $this->load->model('User_model');
        $this->load->model('Customer_model');
        $this->load->model('Service_item_model');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index() {
        $data = array();
        $data['page_title'] = 'Service Orders';
        $search = $this->input->get('search');
        $page = $this->input->get('page') ? (int)$this->input->get('page') : 1;
        $limit = 10;
        $offset = ($page - 1) * $limit;
        $data['search'] = $search;
        $data['orders'] = $this->Service_order_model->get_all_orders($limit, $offset, $search);
        $data['total'] = $this->Service_order_model->count_orders($search);
        $data['limit'] = $limit;
        $data['page'] = $page;
        $this->load->view('service_orders/index', $data);
    }

    public function add() {
        $data = array();
        $data['page_title'] = 'Add Service Order';
        $data['customers'] = $this->Customer_model->get_all_customers(1000, 0);
        $data['service_items'] = $this->Service_item_model->get_all_items();
        $this->form_validation->set_rules('customer_id', 'Customer', 'required');
        $this->form_validation->set_rules('sr_no', 'SR No', 'required|is_unique[service_orders.sr_no]');
        $this->form_validation->set_rules('total', 'Total', 'required|numeric');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('service_orders/add', $data);
        } else {
            $order_data = array(
                'customer_id' => $this->input->post('customer_id'),
                'sr_no' => $this->input->post('sr_no'),
                'total' => $this->input->post('total'),
                'created_by' => $this->session->userdata('user_id'),
            );
            $this->Service_order_model->add_order($order_data);
            $service_order_id = $this->db->insert_id();
            $items = $this->input->post('items'); // array of items
            $this->Service_order_item_model->add_items($service_order_id, $items, $this->session->userdata('user_id'));
            $this->session->set_flashdata('alert_msg', array('success', 'Order Added', 'Service order has been added successfully!'));
            redirect(base_url().'service_orders/receipt/'.$service_order_id);
        }
    }

    public function receipt($id) {
        $data = array();
        $data['page_title'] = 'Service Receipt';
        $data['order'] = $this->Service_order_model->get_order($id);
        $data['customer'] = $this->Customer_model->get_customer($data['order']->customer_id);
        $data['items'] = $this->Service_order_item_model->get_items_by_order($id);
        $this->load->view('service_orders/receipt', $data);
    }

    public function view($id) {
        $data = array();
        $data['page_title'] = 'View Service Order';
        $data['order'] = $this->Service_order_model->get_order($id);
        $data['customer'] = $this->Customer_model->get_customer($data['order']->customer_id);
        $this->load->view('service_orders/view', $data);
    }
}
