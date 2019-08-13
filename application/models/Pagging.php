<?php

class Pagging extends CI_Model {

    public function __construct() {
        parent:: __construct();
        $this->load->helper("url");
        $this->load->library("pagination");
    }

    public function make($url, $total_rows, $per_page) {
        $p = $this->input->get('p');
        if (null !== $p && (!empty($p))) {
            $cur_page = $p;
        } else {
            $cur_page = '0';
        }
        $queryStringFinal = removeQueryStringParameter($_SERVER['QUERY_STRING'], 'p');
        $config["base_url"] = $url . $queryStringFinal;
        $config["total_rows"] = $total_rows;
        $config["per_page"] = $per_page;
        $config['cur_page'] = $cur_page;
        $config['num_links'] = 8;
        $config['query_string_segment'] = "p";
        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['first_tag_open'] = '<li>';
        $config['last_tag_open'] = '<li>';
        $config['next_tag_open'] = '<li class="next">';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['num_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_close'] = '</li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_close'] = '</li>';
        $config['num_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['cur_tag_open'] = "<li class='active'><a target='_self' href='javascript:void(0)'>";
        $config['cur_tag_close'] = "</a></li>";
        $this->pagination->initialize($config);
        $offset = ($cur_page == 0) ? 0 : ($cur_page * $config['per_page']) - $config['per_page'];
        $limit = array(
            'per_page' => $config["per_page"],
            'cur_page' => $offset
        );

        return $limit;
    }

    public function makeNextPrev($url, $total_rows, $per_page, $login = false) {
        $p = $this->input->get('p');
        if (null !== $p && (!empty($p))) {
            $cur_page = $p;
        } else {
            $cur_page = '0';
        }
        $queryStringFinal = removeQueryStringParameter($_SERVER['QUERY_STRING'], 'p');

        $config["base_url"] = $url . $queryStringFinal;
        $config["total_rows"] = $total_rows;
        $config["per_page"] = $per_page;
        $config['cur_page'] = $cur_page;
        $config['num_links'] = 8;
        $config['query_string_segment'] = "p";
        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['display_pages'] = FALSE;
        $config['first_link'] = FALSE;
        $config['last_link'] = FALSE;
        $config['first_tag_open'] = '<li>';
        $config['last_tag_open'] = '<li>';
        $config['next_tag_open'] = '<li class="next">';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['num_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_close'] = '</li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_close'] = '</li>';
        $config['num_tag_close'] = '</li>';
        $config['next_link'] = 'Next Page <i class="fa fa-angle-right" aria-hidden="true"></i>';
        $config['prev_link'] = '<i class="fa fa-angle-left" aria-hidden="true"></i> Prev Page';
        $config['login_required'] = $login;
        $config['cur_tag_open'] = "<li class='active'><a target='_self' href='javascript:void(0)'>";
        $config['cur_tag_close'] = "</a></li>";
        $this->pagination->initialize($config);
        $offset = ($cur_page == 0) ? 0 : ($cur_page * $config['per_page']) - $config['per_page'];
        $limit = array(
            'per_page' => $config["per_page"],
            'cur_page' => $offset
        );

        return $limit;
    }

}
