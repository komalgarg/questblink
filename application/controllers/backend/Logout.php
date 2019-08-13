<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
    }

    public function index() {
        $this->loggedout();
    }

    public function loggedout() {
        $array_items = array('user' => '', 'logged_in' => '');
        $this->session->unset_userdata($array_items);
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }

}
