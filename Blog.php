<?php
class Blog extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Post_model');
        $this->load->model('Category_model');
        $this->load->library('session');
    }

    // public function index($category_id = null) {

    //     $category_id = $this->input->get($category_id);

    //     $data['posts'] = $this->Post_model->get_posts($category_id);
    //     $data['categories'] = $this->Category_model->get_categories();
    //     $this->load->view('blog/index', $data);
    // }


    public function index() {
        $category_id = $this->input->get('category');
        //$comment => $this->input->post('comment');
        $data['categories'] = $this->Category_model->get_categories();
    
        if ($category_id) {
            $data['posts'] = $this->Post_model->get_posts_by_category($category_id);

        } else {
            $data['posts'] = $this->Post_model->get_posts();
        }
    
        $this->load->view('blog/index', $data);
    }
    
    // public function comment(){
    // if ($this->input->post()) {
    //     $data = [
    //         'comment' => $this->input->post('comment');
    //     ];
    //     $this->User_model->comment($data);
    //     redirect('auth/login');
    // }
    // $this->load->view('auth/admin_login');
    // }

    public function submit_comment() {
        if ($this->input->post()) {
            $data = [
                'user_id' => $this->session->userdata('user_id'), // Get the logged-in user ID
                'post_id' => $this->input->post('post_id'), // Get the post ID from the form
                'comment' => $this->input->post('comment'), // Get the comment text from the form
                'created_at' => date('Y-m-d H:i:s') // Current timestamp
            ];
            $this->User_model->get_user($data); // Save the comment
            redirect('blog/index'); // Redirect back to the blog index or post page
        }
    }

    
    // Additional methods for handling posts will go here...
}
