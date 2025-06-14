<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Customer_model');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('session');
        // User authentication check (optional, add if needed)
    }

    public function add() {
        $data = array();
        $data['page_title'] = 'Register Customer';
        $data['tag'] = $this->Customer_model->generate_unique_tag();

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('contact', 'Contact', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('customers/add', $data);
        } else {
            $customer_data = array(
                'name' => $this->input->post('name'),
                'contact' => $this->input->post('contact'),
                'address' => $this->input->post('address'),
                'tag' => $this->input->post('tag'),
                'created_by' => $this->session->userdata('user_id'),
            );
            $result = $this->Customer_model->add_customer($customer_data);
            if ($result) {
                $this->session->set_flashdata('alert_msg', array('success', 'Customer Added', 'Customer has been added successfully!'));
                redirect(base_url().'customers/add');
            } else {
                $this->session->set_flashdata('alert_msg', array('error', 'Error', 'Failed to add customer!'));
                redirect(base_url().'customers/add');
            }
        }
    }

    public function index() {
        $data = array();
        $data['page_title'] = 'All Customers';
        $search = $this->input->get('search');
        $page = $this->input->get('page') ? (int)$this->input->get('page') : 1;
        $limit = 10;
        $offset = ($page - 1) * $limit;
        $data['search'] = $search;
        $data['customers'] = $this->Customer_model->get_all_customers($limit, $offset, $search);
        $data['total'] = $this->Customer_model->count_customers($search);
        $data['limit'] = $limit;
        $data['page'] = $page;
        $this->load->view('customers/index', $data);
    }

    public function edit($id) {
        $data = array();
        $data['page_title'] = 'Edit Customer';
        $data['customer'] = $this->Customer_model->get_customer($id);
        if (empty($data['customer'])) {
            $this->session->set_flashdata('alert_msg', array('error', 'Error', 'Customer not found!'));
            redirect(base_url().'customers');
        }
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('contact', 'Contact', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('customers/edit', $data);
        } else {
            $customer_data = array(
                'name' => $this->input->post('name'),
                'contact' => $this->input->post('contact'),
                'address' => $this->input->post('address'),
                'updated_by' => $this->session->userdata('user_id'),
            );
            $result = $this->Customer_model->update_customer($id, $customer_data);
            if ($result) {
                $this->session->set_flashdata('alert_msg', array('success', 'Customer Updated', 'Customer has been updated successfully!'));
                redirect(base_url().'customers');
            } else {
                $this->session->set_flashdata('alert_msg', array('error', 'Error', 'Failed to update customer!'));
                redirect(base_url().'customers/edit/'.$id);
            }
        }
    }

    public function view($id) {
        $data = array();
        $data['page_title'] = 'View Customer';
        $data['customer'] = $this->Customer_model->get_customer($id);
        if (empty($data['customer'])) {
            $this->session->set_flashdata('alert_msg', array('error', 'Error', 'Customer not found!'));
            redirect(base_url().'customers');
        }
        $this->load->view('customers/view', $data);
    }

    public function delete($id) {
        $customer = $this->Customer_model->get_customer($id);
        if (empty($customer)) {
            $this->session->set_flashdata('alert_msg', array('error', 'Error', 'Customer not found!'));
            redirect(base_url().'customers');
        }
        $result = $this->Customer_model->delete_customer($id);
        if ($result) {
            $this->session->set_flashdata('alert_msg', array('success', 'Customer Deleted', 'Customer has been deleted successfully!'));
        } else {
            $this->session->set_flashdata('alert_msg', array('error', 'Error', 'Failed to delete customer!'));
        }
        redirect(base_url().'customers');
    }

    public function export_csv() {
        $search = $this->input->get('search');
        $customers = $this->Customer_model->get_all_customers(10000, 0, $search);
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=customers.csv');
        $output = fopen('php://output', 'w');
        fputcsv($output, array('ID', 'Name', 'Contact', 'Address', 'Tag'));
        foreach ($customers as $c) {
            fputcsv($output, array($c->id, $c->name, $c->contact, $c->address, $c->tag));
        }
        fclose($output);
        exit;
    }
}
