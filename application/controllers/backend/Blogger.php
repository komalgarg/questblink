<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Blogger extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $status = $this->primary->is_logged_in();
        if (!$status) {
			redirect(config_item(base_url()). 'login'); 
        }
    }

    public function index() {
		$data['all_blogs'] = $this->primary->get_where_order('blogs', array('created_at' => 'DESC'), array('user_id' => $this->session->userdata('user')['id']), TRUE);
		$data['template'] = "blogger_dashboard";
		$data['sidebar'] = 1;
		$data['title'] = 'Blogs';
        $this->load->view('backend/common/template', $data);
    }
	
	public function add_blog() {
		$data['template'] = "add_blog";
		$data['sidebar'] = 1;
		$data['title'] = 'Add New Blog';
        $this->load->view('backend/common/template', $data);
    }
	
	public function save_blog() {
		$image = $this->input->post('hidden_image');
		if(($image == '' || $image != $_FILES['image']['name']) && $_FILES['image']['name'] != '') {
			$config['upload_path'] = './uploads/blogs/';
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
		}
		if($this->input->post('blog_id') > 0) {
			$update_data = array(
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'image'=> $image,
				'status' => $this->input->post('status'),
			);
			$this->primary->update('blogs', $update_data, array('id' => $this->input->post('blog_id')));
		} else {
			$insert_data = array(
				'user_id' => $this->session->userdata('user')['id'],
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'image'=> $image,
				'status' => $this->input->post('status'),
				'created_at' => gmdate('Y-m-d H:i:s')
			);
			$this->primary->insert('blogs', $insert_data);
		}
		redirect(base_url().'blogger/dashboard');
	}
	
	public function update_blog($id) {
		$data['blog'] = $this->primary->get_where('blogs', array('id', $id));
		$data['template'] = "add_blog";
		$data['sidebar'] = 1;
		$data['title'] = 'Update Blog';
        $this->load->view('backend/common/template', $data);
	}



}
