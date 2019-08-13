<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Buyer extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $status = $this->primary->is_logged_in();
        if (!$status) {
			redirect(config_item(base_url()). 'login'); 
        }
    }

    public function index() {

//die("entered");

        $this->load->model('pagging');
        
        $data['template'] = "admin/dashboard";
        $this->load->view('admin/common/template', $data);
    }

    public function logout() {
        $this->primary->delete('auth_token', array("user_id" => $this->session->userdata('user_id')));
        if ($this->session->userdata('log_id')) {
            $log_id = $this->session->userdata('log_id');
        } else {
            $log_id = get_cookie('rememberme_log');
        }
        $this->primary->update('user_login_log', array('logout_time' => date('Y-m-d H:i:s', time())), array('log_id' => $log_id));
        $this->session->unset_userdata();
        $this->session->sess_destroy();
        delete_cookie('rememberme');
        delete_cookie('rememberme_log');
        redirect(base_url(), 'location');
    }

}
