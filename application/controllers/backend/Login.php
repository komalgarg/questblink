<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() { 
		$data['template'] = 'login';
        $this->load->view("backend/common/template", $data);
    }
	
	public function sign_up() { 
		$data['template'] = 'sign-up';
        $this->load->view("backend/common/template", $data);
    }
	
	public function forget_password() { 
		$data['template'] = 'forget-password';
        $this->load->view("backend/common/template", $data);
    }
	
	public function send_password_email() { 
	
	
		redirect(base_url().'login');
    }
	
	public function reset_password() { 
		$data['template'] = 'reset-password';
        $this->load->view("backend/common/template", $data);
    }
	
	public function update_password() { 
	
	
	
		redirect(base_url().'login');
    }
	
	public function register() {
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

    public function check_login() {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("email", "Email", "required");
        $this->form_validation->set_rules("password", "Password", "required");
        if ($this->form_validation->run() == false) {
            $data['template'] = 'login';
			$this->load->view("backend/common/template", $data);
        } else {
			$check_user = $this->primary->get_where('users', array('status'=> 1, 'deleted' => 0,'email' => $this->input->post('email')));
			if(!empty($check_user)) {
				if($check_user['password'] == md5($this->input->post('password'))) {
					$data=array(
						'user' => $check_user,
						'logged_in' => true
						);
					$this->session->set_userdata($data);
					if($check_user['user_role'] == 1) {
						redirect(config_item(base_url()). 'admin/dashboard');
					} else if($check_user['user_role'] == 2) {
						redirect(config_item(base_url()). 'seller/dashboard');
					} else if($check_user['user_role'] == 3) {
						redirect(config_item(base_url()). 'buyer/dashboard');
					} else if($check_user['user_role'] == 4) {
						redirect(config_item(base_url()). 'blogger/dashboard');
					}
				} else {
					$this->session->set_flashdata('error', 'Password is incorrect.');
					redirect(config_item(base_url()). 'login');
				}
			} else {
				$this->session->set_flashdata('error', 'This email id does not exists.');
                redirect(config_item(base_url()). 'login');
			}
        }
    }

}
