<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service_items extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Service_item_model');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index() {
        $data['page_title'] = 'Service Items';
        $data['items'] = $this->Service_item_model->get_all_items();
        $this->load->view('service_items/index', $data);
    }

    public function add() {
        $data['page_title'] = 'Add Service Item';
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required|numeric');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('service_items/add', $data);
        } else {
            $item_data = array(
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'price' => $this->input->post('price'),
                'created_by' => $this->session->userdata('user_id'),
            );
            $this->Service_item_model->add_item($item_data);
            $this->session->set_flashdata('alert_msg', array('success', 'Item Added', 'Service item has been added successfully!'));
            redirect(base_url().'service_items');
        }
    }

    public function edit($id) {
        $data['page_title'] = 'Edit Service Item';
        $data['item'] = $this->Service_item_model->get_item($id);
        if (empty($data['item'])) {
            $this->session->set_flashdata('alert_msg', array('error', 'Error', 'Service item not found!'));
            redirect(base_url().'service_items');
        }
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required|numeric');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('service_items/edit', $data);
        } else {
            $item_data = array(
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'price' => $this->input->post('price'),
                'updated_by' => $this->session->userdata('user_id'),
            );
            $this->Service_item_model->update_item($id, $item_data);
            $this->session->set_flashdata('alert_msg', array('success', 'Item Updated', 'Service item has been updated successfully!'));
            redirect(base_url().'service_items');
        }
    }

    public function delete($id) {
        $this->Service_item_model->delete_item($id);
        $this->session->set_flashdata('alert_msg', array('success', 'Item Deleted', 'Service item has been deleted successfully!'));
        redirect(base_url().'service_items');
    }
}
