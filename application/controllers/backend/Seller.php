<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Seller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $status = $this->primary->is_logged_in();
        if (!$status) {
			redirect(config_item(base_url()). 'login'); 
        }
    }

    public function index() {
        $data['template'] = "seller_dashboard";
		$data['sidebar'] = 1;
		$data['title'] = 'Dashboard';
        $this->load->view('backend/common/template', $data);
    }

    public function upload_file() {
		$data['template'] = "upload_new_file";
		$data['sidebar'] = 1;
		$data['title'] = 'Upload new file';
        $this->load->view('backend/common/template', $data);
    }
    
    public function save_uploaded_file(){
        print_r($_POST);
        die();
        $post_title = $_POST['post_title'];
        $post_description = $_POST['post_description'];
        $total_post = $_POST['total_post'];
        $file = $_POST['uploaded_file'];
        $config['upload_path'] = './uploads/portfolios/';
        $config['allowed_types'] = 'jpeg|jpg|png|gif';
        $config['max_size'] = '0';
        $this->load->library('upload', $config); 
        if (!$this->upload->do_upload('image')) {
            $data = array('error' => $this->upload->display_errors());
            $image = '';
        } else {
            $data = array('upload_data' => $this->upload->data());
            $image = $data['upload_data']['file_name'];
        }
            
        function generateRandomString($length = 10) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }
        for($i=1; $i <= $total_post; $i++){
            $data = array(
                'post_id' => generateRandomString(10),
                'user_id' => $this->session->userdata['user']['id'],
                'post_title' => $post_title,
                'post_description' => $post_description,
                'title' => $_POST['title'],
                'description' => $_POST['description'],
                'categories' => $_POST['categories'],
                'location' => $_POST['location'],
                'type' => $_POST['type'],
                'illus_clip_art' => $_POST['isllust_clipart'],
                'editorial' => $_POST['editorial'],
                'status' => 0,
                'tags' => $_POST['tags'],
                'file' => $_POST['uploaded_file'],
            );
            $this->primary->insert('portfolios', $data);
        }
    }

}
