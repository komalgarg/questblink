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
		
		$data['template'] = "all_categories";
		$data['sidebar'] = 1;
		$data['title'] = 'Dashboard';
        $this->load->view('backend/common/template', $data);
	}

}
