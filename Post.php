<?php
class Post extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Post_model');
        $this->load->model('Category_model');
        $this->load->library('session');

        // Check if the user is logged in as admin
        if (!$this->session->userdata('user_id') || $this->session->userdata('role') !== 'admin') {
            redirect('auth/admin_login');
        }
    }

    public function index() {
        $data['posts'] = $this->Post_model->get_posts();
        $this->load->view('post/index', $data);
    }

    public function create() {
        if ($this->input->post()) {
            $data = [
                'title' => $this->input->post('title'),
                'body' => $this->input->post('body'),
                'category_id' => $this->input->post('category_id')
            ];
            $this->Post_model->create_post($data);
            redirect('post/index');
        }
        $data['categories'] = $this->Category_model->get_categories();
        $this->load->view('post/create', $data);
    }

    public function edit($id) {
        if ($this->input->post()) {
            $data = [
                'title' => $this->input->post('title'),
                'body' => $this->input->post('body'),
                'category_id' => $this->input->post('category_id')
            ];
            $this->Post_model->update_post($id, $data);
            redirect('post/index');
        }
        $data['post'] = $this->Post_model->get_post($id);
        $data['categories'] = $this->Category_model->get_categories();
        $this->load->view('post/edit', $data);
    }

    public function delete($id) {
        $this->Post_model->delete_post($id);
        redirect('post/index');
    }
}
