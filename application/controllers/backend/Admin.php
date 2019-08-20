<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $status = $this->primary->is_logged_in();
        if (!$status) {
			redirect(config_item(base_url()). 'login'); 
        }
    }

    public function index() {
        $data['template'] = "admin_dashboard";
		$data['sidebar'] = 1;
		$data['title'] = 'Dashboard';
        $this->load->view('backend/common/template', $data);
    }

    
	public function category() {
		$categories = $this->primary->get_where('category', array('status' => 1 ) , TRUE);
		$data['template'] = "all_categories";
		$data['sidebar'] = 1;
		$data['title'] = 'Categories';
		$data['categories'] = $categories;
        $this->load->view('backend/common/template', $data);
	}
	
	public function add_category() {
		
		$data['template'] = "add_category";
		$data['sidebar'] = 1;
		$data['title'] = 'Add New Category';
        $this->load->view('backend/common/template', $data);
	}

	public function save_category(){
		$category_name = $_POST['category_name'];
		$category_slug = $category_name;
		$category_slug = preg_replace('~[^\pL\d]+~u', '-', $category_slug);
		$category_slug = iconv('utf-8', 'us-ascii//TRANSLIT', $category_slug);
		$category_slug = preg_replace('~[^-\w]+~', '', $category_slug);
		$category_slug = trim($category_slug, '-');
		$category_slug = preg_replace('~-+~', '-', $category_slug);
		$category_slug = strtolower($category_slug);
		$category_status = 1;

		$insert_cat = array(
			'name' => $category_name,
			'slug' => $category_slug,
			'status' => $category_status,
			'created_at' =>  gmdate('Y-m-d H:i:s')
		);
		$this->primary->insert('category', $insert_cat);
		redirect(config_item(base_url()). 'admin/category');

	}

	public function delete_category($id){
		$this->primary->delete('category', array('id' => $id ));
		redirect(config_item(base_url()). 'admin/category');
	}

	public function portfolios() {
		$portfolios = $this->primary->get_where_group_by('portfolios', null, 'post_id', TRUE);	
		$data['template'] = "all_portfolios";
		$data['sidebar'] = 1;
		$data['title'] = 'Portfolios';
		$data['portfolios'] = $portfolios;
		$data['controller'] = $this;
        $this->load->view('backend/common/template', $data);
	}

	public function view_portfolio($post_id) {
		$portfolios = $this->primary->get_where('portfolios', array('post_id' => $post_id), TRUE);	
		$data['template'] = "view_portfolio";
		$data['sidebar'] = 1;
		$data['title'] = 'Portfolios';
		$data['portfolios'] = $portfolios;
		$data['controller'] = $this;
        $this->load->view('backend/common/template', $data);
	}
	public function approve_post($post_id, $id) {
		$this->primary->update('portfolios', array('status' => 1), array('id' => $id));
		redirect(base_url().'admin/view_portfolio/'.$post_id);
	}

	public function unapprove_post($post_id, $id) {
		$this->primary->update('portfolios', array('status' => 0), array('id' => $id));
		redirect(base_url().'admin/view_portfolio/'.$post_id);
	}
	public function get_username($id){
		$user = $this->primary->get_where('users', array('id' => $id));
		echo $user['fname'] . ' ' . $user['lname'];
	}

}

