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

}
