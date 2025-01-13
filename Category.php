<?php
class Category extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Category_model');
        $this->load->library('session');
        
        // Check if the user is logged in as admin
        if (!$this->session->userdata('user_id') || $this->session->userdata('role') !== 'admin') {
            redirect('auth/admin_login');
        }
    }

    public function index() {
        $data['categories'] = $this->Category_model->get_categories();
        $this->load->view('category/index', $data);
    }

    public function create() {
        if ($this->input->post()) {
            $data = [
                'name' => $this->input->post('name'),
            ];
            $this->Category_model->create_category($data);
            redirect('category/index');
        }
        $this->load->view('category/create');
    }

    public function edit($id) {
        if ($this->input->post()) {
            $data = [
                'name' => $this->input->post('name'),
            ];
            $this->Category_model->update_category($id, $data);
            redirect('category/index');
        }
        $data['category'] = $this->Category_model->get_category($id);
        $this->load->view('category/edit', $data);
    }

    public function delete($id) {
        $this->Category_model->delete_category($id);
        redirect('category/index');
    }
}
