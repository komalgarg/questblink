<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['template'] = 'home_page';
        $this->load->view("common/template", $data);
    }
	
	public function about_us() {
        $data['template'] = 'about_us';
        $this->load->view("common/template", $data);
    }
	
	public function blog() {
        $data['template'] = 'blog';
        $this->load->view("common/template", $data);
    }
	
	public function blog_details($blog_name) {
        $data['template'] = 'blog_details';
        $this->load->view("common/template", $data);
    }
	
	public function career() { 
		$data['template'] = 'careers';
        $this->load->view("common/template", $data);
    }
	
	public function contact_us() { 
		$data['template'] = 'contact_us';
        $this->load->view("common/template", $data);
    }
	
	public function faq() { 
		$data['template'] = 'faq';
        $this->load->view("common/template", $data);
    }
	
	public function portfolio($username) { 
		$data['template'] = 'portfolio';
        $this->load->view("common/template", $data);
    }
	
	public function privacy_policy() { 
		$data['template'] = 'privacy_policy';
        $this->load->view("common/template", $data);
    }
	
	public function term_conditions() { 
		$data['template'] = 'term_conditions';
        $this->load->view("common/template", $data);
    }
	
	public function save_user() {
		$this->load->library("form_validation");
        $this->form_validation->set_rules("fname", "First Name", "required");
        $this->form_validation->set_rules("lname", "Last Name", "required");
		$this->form_validation->set_rules("email", "Email", "required");
		$this->form_validation->set_rules("password", "Password", "required");
		$this->form_validation->set_rules("user_role", "User Role", "required");
        if ($this->form_validation->run() == false) {
            $data['template'] = 'sign-up';
			$this->load->view("backend/common/template", $data);
        } else {
			$check_user = $this->primary->get_where('users', array('email' => $this->input->post('email')));
			if(!empty($check_user)) {
				$this->session->set_flashdata('error', 'This email id already exists.');
                redirect(config_item(base_url()). 'sign-up');
			} else {
				if($_FILES['profile_pic']['name'] != '') {
					$config['upload_path'] = './uploads/profile_pic/';
					$config['allowed_types'] = 'jpeg|jpg|png|gif';
					$config['max_size'] = '0';
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('profile_pic')) {
						$data = array('error' => $this->upload->display_errors());
						$profile_photo = '';
					} else {
						$data = array('upload_data' => $this->upload->data());
						$profile_photo = $data['upload_data']['file_name'];
					}
				}
				$insert_user = array(
					'fname' => $this->input->post('fname'),
					'lname' => $this->input->post('lname'),
					'email' => $this->input->post('email'),
					'password' => md5($this->input->post('password')),
					'profile_photo' => $profile_photo,
					'user_role' => $this->input->post('user_role'),
					'deleted' => 0,
					'status' => 1,
					'updated_at' => gmdate('Y-m-d H:i:s'),
					'created_at' => gmdate('Y-m-d H:i:s')
				);
				$this->primary->insert('users', $insert_user);
				redirect(config_item(base_url()). 'login');
			}
        }
	}


    
	

}
