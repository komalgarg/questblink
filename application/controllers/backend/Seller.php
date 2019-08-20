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
        $categories = $this->primary->get_where('category', array('status' => 1 ) , TRUE);
		$data['template'] = "upload_new_file";
		$data['sidebar'] = 1;
        $data['title'] = 'Upload new file';
        $data['categories'] = $categories;
        $this->load->view('backend/common/template', $data);
    }
    
    public function save_uploaded_file(){
        $post_title = $_POST['post_title'];
        $post_description = $_POST['post_description'];
        $total_post = $_POST['total_post'];
        $type = $_POST['type'];
        
            
        function generateRandomString($length = 10) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }
        $post_id = generateRandomString(10);

        for($i=1; $i <= $total_post; $i++){
            $_FILES['file']['name']       = $_FILES['uploaded_file']['name'][$i];
            $_FILES['file']['type']       = $_FILES['uploaded_file']['type'][$i];
            $_FILES['file']['tmp_name']   = $_FILES['uploaded_file']['tmp_name'][$i];
            $_FILES['file']['error']      = $_FILES['uploaded_file']['error'][$i];
            $_FILES['file']['size']       = $_FILES['uploaded_file']['size'][$i];
            //echo '<pre>'; print_r($_FILES);

            $config['upload_path'] = './uploads/portfolios/';
            $config['allowed_types'] = 'jpeg|jpg|png|gif|mp4|avi|mp3|';
            $config['max_size'] = 0;

            $this->load->library('upload', $config); 
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('file')) {
                $data = array('error' => $this->upload->display_errors());
                $image = '';
                echo"not upoaded";

            } else {
                $data = array('upload_data' => $this->upload->data());
                $image = $data['upload_data']['file_name'];
            }

            $data = array(
                'post_id' => $post_id,
                'user_id' => $this->session->userdata['user']['id'],
                'post_title' => $post_title,
                'post_description' => $post_description,
                'title' => $_POST['title'][$i],
                'description' => $_POST['description'][$i],
                'categories' => $_POST['category'][$i],
                'location' => $_POST['location'][$i],
                'type' => $type,
                'illus_clip_art' => $_POST['isllust_clipart'][$i],
                'editorial' => $_POST['editorial'][$i],
                'status' => 0,
                'tags' => $_POST['tags'][$i],
                'file' => $image,
            );
            //print_r($data);
            $this->primary->insert('portfolios', $data);
        }
        redirect(base_url().'seller/dashboard');
        
    }

}
