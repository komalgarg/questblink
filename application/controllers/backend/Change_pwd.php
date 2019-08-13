<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Change_pwd extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $status = $this->primary->is_admin();
        if (!$status) {
            redirect(admin('login'));
        }
    }

    public function index() {
        $this->load->model("login_model");
        $this->load->library('form_validation');
        $this->form_validation->set_rules('password', 'New Password', 'trim|required');
        $this->form_validation->set_rules('password2', 'Confirm Password', 'trim|required|matches[password]');
        if ($this->form_validation->run() == FALSE) {
            $data['template'] = "admin/change_pwd";
            $this->load->view('admin/common/template', $data);
        } else {
            $reset = array(
                'password' => $this->login_model->password($this->input->post('password')),
                'update_at' => date("Y-m-d H:i:s", time())
            );
            $this->primary->update('admin', $reset, array('id' => 1));
            $this->session->set_flashdata('success', 'Successfully updated');
            redirect(base_url('admin/change_pwd'));
        }
    }

}
