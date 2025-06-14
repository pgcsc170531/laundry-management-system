<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Customer_model');
        $this->load->model('Service_order_model');
        $this->load->model('Payment_model');
        $this->load->model('Collection_model');
        $this->load->model('Service_item_model');
        $this->load->model('Expense_model');
    }

    public function index()
    {
        $data['page_title'] = 'Dashboard';
        $data['total_customers'] = $this->Customer_model->count_all();
        $data['total_orders'] = $this->Service_order_model->count_all();
        $data['total_payments'] = $this->Payment_model->count_all();
        $data['total_collections'] = $this->Collection_model->count_all();
        $data['total_service_items'] = $this->Service_item_model->count_all();
        $data['total_expenses'] = $this->Expense_model->count_all();
        $this->load->view('dashboard/index', $data);
    }
}
