<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product');
        $this->load->model('Message');
        $this->output->enable_profiler(TRUE);
    }

    public function new()
    {
        $this->validate_user();
        if ($this->session->flashdata('errors')) {
            $data['validation'] = $this->session->flashdata('errors');
            $this->load->view('template/dashboard-header');
            $this->load->view('dashboard/Manage-Product', $data);
        } else {
            $data['success'] = $this->session->flashdata('success');
            $this->load->view('template/dashboard-header');
            $this->load->view('dashboard/Manage-Product', $data);
        }
    }

    public function addProcess()
    {
        $data = $this->Product->validate_manage();
        if ($data != 'success') {
            $this->session->set_flashdata('errors', $data);
            redirect('products/new');
        } else {
            $this->Product->add_product($this->input->post());
            $this->session->set_flashdata('success', "<p class='success-popup'>Product Successfully Added</p>");
            redirect('products/new');
        }
    }

    public function edit($id)
    {
        $this->validate_user();
        $data['products'] = $this->Product->get_product($id);

        if ($this->session->flashdata('errors')) {
            $data['validation'] = $this->session->flashdata('errors');
            $this->load->view('template/dashboard-header');
            $this->load->view('dashboard/Manage-Product', $data);
        } else {
            $data['success'] = $this->session->flashdata('success');
            $this->load->view('template/dashboard-header');
            $this->load->view('dashboard/Manage-Product', $data);
        }
    }

    public function editProcess($id)
    {
        $data = $this->Product->validate_manage();
        if ($data != 'success') {
            $this->session->set_flashdata('errors', $data);
            redirect('products/edit/' . $id);
        } else {
            $this->Product->edit_product($this->input->post(), $id);
            $this->session->set_flashdata('success', "<p class='success-popup'>Product Successfully Updated</p>");
            redirect('products/edit/' . $id);
        }
    }

    public function show($id)
    {
        $data['reviews'] = $this->Message->get_reviews($id);
        if ($data['reviews']) {
            $data['replies'] = $this->Message->get_replies();
        }
        $data['product'] = $this->Product->get_product($id);
        if ($this->session->flashdata('errors')) {
            $data['validation'] = $this->session->flashdata('errors');
            $this->load->view('template/dashboard-header');
            $this->load->view('dashboard/Product-Info', $data);
        } else {
            $data['success'] = $this->session->flashdata('success');
            $this->load->view('template/dashboard-header');
            $this->load->view('dashboard/Product-Info', $data);
        }
    }

    public function remove($id)
    {
        $this->validate_user();
        $data['product'] = $this->Product->get_product($id);
        $this->load->view('template/dashboard-header');
        $this->load->view('dashboard/remove', $data);
    }

    public function removeProcess($id)
    {
        $this->Product->remove_product($id);
        redirect('dashboard');
    }

    public function reviewProcess($product_id)
    {
        $data = $this->Message->validate_review();
        if ($data != 'success') {
            $this->session->set_flashdata('errors', $data);
            redirect('Products/show/' . $product_id);
        } else {
            $this->Message->make_review($product_id,$this->session->userdata('user_id'),$this->input->post('review'));
            $this->session->set_flashdata('success', "<p class='success-popup'>Review Successfully posted</p>");
            redirect('Products/show/' . $product_id);
        }
    }

    public function replyProcess($product_id, $review_id)
    {
        $data = $this->Message->validate_reply();

        if ($data != 'success') {
            $this->session->set_flashdata('errors', $data);
            redirect('Products/show/' . $product_id);
        } else {
            $this->Message->make_reply($review_id,$this->session->userdata('user_id'),$this->input->post('reply'));
            $this->session->set_flashdata('success', "<p class='success-popup'>Reply Successfully posted</p>");
            redirect('Products/show/' . $product_id);
        }
    }

    private function validate_user()
    {
        if (!$this->session->userdata('admin')) {
            redirect('dashboard');
        } else if ($this->session->userdata('admin')) {
            return 'admin';
        }
        return 'user';
    }
}
