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

}
