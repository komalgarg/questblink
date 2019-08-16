<?php

class Mail_model extends CI_Model {

    private $host;
    private $port;
    private $username;
    private $password;
    private $config;

    public function __construct() {
        parent::__construct();
        $this->load->library('email');

        $this->host = 'mail.dribbbleinvite.co';
        $this->port = 25;
        $this->username = 'smtp@dribbbleinvite.co';
        $this->password = '53m8$o5w,kO]';

        $this->config['protocol'] = "smtp";
        $this->config['smtp_host'] = $this->host;
        $this->config['smtp_port'] = $this->port;
        $this->config['smtp_user'] = $this->username;
        $this->config['smtp_pass'] = $this->password;
        $this->config['validate'] = 'TRUE';
        $this->config['priority'] = '2';
        $this->config['charset'] = "utf-8";
        $this->config['mailtype'] = "html";
        $this->config['crlf'] = "\r\n";
        $this->config['newline'] = "\r\n";
    }

    public function send($from_email, $from_name, $to, $subject, $message) {
        $this->email->initialize($this->config);
        $this->email->from($from_email, $from_name);
        $this->email->reply_to($from_email, $from_name);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        $num = $this->email->send();
        echo $this->email->print_debugger();
        die();
        unset($this->config);
        return $num;
    }

    public function transnational($from_email, $from_name, $to, $subject, $message) {
        $this->email->initialize($this->config);
        $this->email->from($from_email, $from_name);
        $this->email->reply_to($from_email, $from_name);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        $num = $this->email->send();
//        echo $this->email->print_debugger();
//        die;
        unset($this->config);
        return $num;
    }

}
