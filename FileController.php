<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FileController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('upload'); // Load the Upload library
    }
    
        public function upload() {
            if ($this->input->post()) {
                // Set upload options
                $config['upload_path'] = './uploads/posts/'; // Directory to save images
                $config['allowed_types'] = 'jpg|jpeg|png|gif'; // Allowed file types
                $config['max_size'] = 2048; // Maximum file size in KB
    
                $this->upload->initialize($config);
    
                // Handle file upload
                if ($this->upload->uploads('image')) {
                    $upload_data = $this->upload->data(); // Get uploaded file data
                    // Process the uploaded data as needed, e.g., save to the database
                } else {
                    // Handle upload error
                    $data['error'] = $this->upload->display_errors();
                }
            }
            
            // Load the upload form view
            $this->load->view('admin/manage_posts', $data ?? []);
        }
}
    

