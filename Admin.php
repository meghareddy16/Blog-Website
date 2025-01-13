<?php
class Admin extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Post_model');
        $this->load->model('Category_model');
        $this->load->library('session');
        $this->load->library('upload'); // Load upload library

        // Check if the user is logged in and is an admin
        // if (!$this->session->userdata('user_id') || $this->session->userdata('role') !== 'admin') {
        //     redirect('auth/admin_login');
        // }
    }

    public function index() {
        $this->load->view('admin/dashboard');
    }

    // User Management
    public function manage_users() {
        $data['users'] = $this->User_model->get_all_users();
        $this->load->view('admin/manage_users', $data);
    }
    public function create_user() {


        if ($this->input->post()) {


            // Set upload options
            $config['upload_path'] = './uploads/'; // Ensure this directory exists and is writable
            $config['allowed_types'] = 'jpg|jpeg|png|gif'; // Allowed file types
            $config['max_size'] = 2048; // Max file size in KB

            $this->upload->initialize($config); // Initialize upload settings

            // print_r($config['upload_path']);die;
            // Handle file upload
            if ($this->upload->do_upload('profile')) 
            {
                $upload_data = $this->upload->data(); // Get uploaded file data
                $data = [
                    'username' => $this->input->post('username'),
                    'profile' => $upload_data['file_name'], // Store image filename
                    'password' =>'1234',
                    'role' => $this->input->post('role'),
                ];

                // Create post in the database
                if ($this->User_model->create_user($data)) {
                   
                    redirect('admin/manage_users'); // Redirect after successful upload
                } else {
                    $data['error'] = 'Failed to save user to the database.';
                }
            } else {
                $data['error'] = $this->upload->display_errors(); // Capture upload errors
            }
        }

        // Load categories and the form view
        // $data['users'] = $this->User_model->get_all_users();
        // $data['categories'] = $this->Category_model->get_categories();
        // $this->load->view('admin/create_user', $data);
    }

    // public function create_user() {
    //     if ($this->input->post()) {
    //         $data = [
    //             'username' => $this->input->post('username'),
    //             'password' => '1234', // Set simple password for new users
    //             // 'profile' => $this->input->post('profile'),
    //             'role' => $this->input->post('role'),
    //         ];
    //         $this->User_model->create_user($data);
    //         redirect('admin/manage_users');
    //     }
    //     $this->load->view('admin/create_user');
    // }


    public function edit_user($id) {
        // Fetch the existing user data
        $data['users'] = $this->User_model->get_user($id);
        $data['categories'] = $this->Category_model->get_categories();

        if ($this->input->post()) {
            // Set upload options
            $config['upload_path'] = './uploads/'; // Ensure this directory exists and is writable
            $config['allowed_types'] = 'jpg|jpeg|png|gif'; // Allowed file types
            $config['max_size'] = 2048; // Max file size in KB

            $this->upload->initialize($config); // Initialize upload settings

            // Prepare data for updating
            $dataToUpdate = [
                'username' => $this->input->post('username'),
                'password' => '1234',
                'role' => $this->input->post('role'),
            ];

            // Handle file upload
            if ($this->upload->do_upload('profile')) {
                // If a new image is uploaded, get the file data
                $upload_data = $this->upload->data(); // Get uploaded file data
                $dataToUpdate['profile'] = $upload_data['file_name']; // Store new image filename

                // Optionally, delete the old image if you want to clean up
                if (file_exists('./uploads/' . $data['user']->profile)) {
                    unlink('./uploads/' . $data['user']->profile); // Delete old image
                }
            } else {
                // If no new image is uploaded, keep the old image
                $dataToUpdate['profile'] = $data['user']->profile; // Keep the old image filename
                $data['error'] = $this->upload->display_errors(); // Capture upload errors
            }
            // Update post in the database
            $this->User_model->update_user($id, $dataToUpdate);
            redirect('admin/manage_users'); // Redirect after successful update
        }
        // Load the edit post view
        $this->load->view('admin/edit_user', $data);
    }


    // public function edit_user($id) {
    //     if ($this->input->post()) {
    //         $data = [
    //             'username' => $this->input->post('username'),
    //             'profile' => $this->input->post('file_name'),
    //             'role' => $this->input->post('role'),
    //         ];
    //         // If password is provided, use simple password
    //         if ($this->input->post('password')) {
    //             $data['password'] = '1234'; // Set simple password for editing
    //         }
    //         $this->User_model->update_user($id, $data);
    //         redirect('admin/manage_users');
    //     }
    //     $data['user'] = $this->User_model->get_user($id);
    //     $this->load->view('admin/edit_user', $data);
    // }

    public function delete_user($id) {
        $this->User_model->delete_user($id);
        redirect('admin/manage_users');
    }

     // Post Management
     public function manage_posts() {
         $data['posts'] = $this->Post_model->get_posts();
         $this->load->view('admin/manage_posts', $data);
    }

    // public function create_post() {
    //     if ($this->input->post()) {
    //         $data = [
    //             'title' => $this->input->post('title'),
    //             'body' => $this->input->post('body'),
    //             'category_id' => $this->input->post('category_id'),
    //             'image' => $this->input->post('image'),
    //         ];
    //         $this->Post_model->create_post($data);
    //         redirect('admin/manage_posts');
    //     }
    //     $data['categories'] = $this->Category_model->get_categories();
    //     $this->load->view('admin/create_post', $data);
    // }

    public function create_post() {

        if ($this->input->post()) {
            // Set upload options
            $config['upload_path'] = './uploads/'; // Ensure this directory exists and is writable
            $config['allowed_types'] = 'jpg|jpeg|png|gif'; // Allowed file types
            $config['max_size'] = 2048; // Max file size in KB

            $this->upload->initialize($config); // Initialize upload settings

            // Handle file upload
            if ($this->upload->do_upload('image')) {
                $upload_data = $this->upload->data(); // Get uploaded file data
                $data = [
                    'title' => $this->input->post('title'),
                    'body' => $this->input->post('body'),
                    'category_id' => $this->input->post('category_id'),
                    'image' => $upload_data['file_name'], // Store image filename
                ];

                // Create post in the database
                if ($this->Post_model->create_post($data)) {
                    redirect('admin/manage_posts'); // Redirect after successful upload
                } else {
                    $data['error'] = 'Failed to save post to the database.';
                }
            } else {
                $data['error'] = $this->upload->display_errors(); // Capture upload errors
            }
        }
        // Load categories and the form view

        $data['categories'] = $this->Category_model->get_categories();
        $this->load->view('admin/create_post', $data);
    }


        // public function edit_post($id) {
        //    if ($this->input->post()) {
        //         $data = [
        //             'title' => $this->input->post('title'),
        //             'body' => $this->input->post('body'),
        //             'image' => $upload_data['file_name'], // Store image filename
        //             'category_id' => $this->input->post('category_id'),
        //         ];
        //         $this->Post_model->update_post($id, $data);
        //         redirect('admin/manage_posts');
        //     }
        //     $data['post'] = $this->Post_model->get_post($id);
        //     $data['categories'] = $this->Category_model->get_categories();
        //     $this->load->view('admin/edit_post', $data);

        // }
        //edit post new code

            public function edit_post($id) {
                // Fetch the existing post data
                $data['post'] = $this->Post_model->get_post($id);
                $data['categories'] = $this->Category_model->get_categories();
        
                if ($this->input->post()) {
                    // Set upload options
                    $config['upload_path'] = './uploads/'; // Ensure this directory exists and is writable
                    $config['allowed_types'] = 'jpg|jpeg|png|gif'; // Allowed file types
                    $config['max_size'] = 2048; // Max file size in KB
        
                    $this->upload->initialize($config); // Initialize upload settings
        
                    // Prepare data for updating
                    $dataToUpdate = [
                        'title' => $this->input->post('title'),
                        'body' => $this->input->post('body'),
                        'category_id' => $this->input->post('category_id'),
                    ];
        
                    // Handle file upload
                    if ($this->upload->do_upload('image')) {
                        // If a new image is uploaded, get the file data
                        $upload_data = $this->upload->data(); // Get uploaded file data
                        $dataToUpdate['image'] = $upload_data['file_name']; // Store new image filename
        
                        // Optionally, delete the old image if you want to clean up
                        if (file_exists('./uploads/' . $data['post']->image)) {
                            unlink('./uploads/' . $data['post']->image); // Delete old image
                        }
                    } else {
                        // If no new image is uploaded, keep the old image
                        $dataToUpdate['image'] = $data['post']->image; // Keep the old image filename
                        $data['error'] = $this->upload->display_errors(); // Capture upload errors
                    }
                    // Update post in the database
                    $this->Post_model->update_post($id, $dataToUpdate);
                    redirect('admin/manage_posts'); // Redirect after successful update
                }
                // Load the edit post view
                $this->load->view('admin/edit_post', $data);
            }

    
        public function delete_post($id) {
            $this->Post_model->delete_post($id);
            redirect('admin/manage_posts');
        }

    // Category Management
    public function manage_categories() {
        $data['categories'] = $this->Category_model->get_categories();
        $this->load->view('admin/manage_categories', $data);
    }

    public function create_category() {
        if ($this->input->post()) {
            $data = [
                'name' => $this->input->post('name'),
            ];
            $this->Category_model->create_category($data);
            redirect('admin/manage_categories');
        }
        $this->load->view('admin/create_category');
    }

    public function edit_category($id) {
        if ($this->input->post()) {
            $data = [
                'name' => $this->input->post('name'),
            ];
            $this->Category_model->update_category($id, $data);
            redirect('admin/manage_categories');
        }
        $data['category'] = $this->Category_model->get_category($id);
        $this->load->view('admin/edit_category', $data);
    }

    public function delete_category($id) {
        $this->Category_model->delete_category($id);
        redirect('admin/manage_categories');
    }

}
