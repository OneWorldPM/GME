<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->common->set_timezone();
        $login_type = $this->session->userdata('userType');
        if ($login_type != 'user') {
            redirect('login');
        }
		 if ($this->session->userdata('cid') != "100028") {
        $get_user_token_details = $this->common->get_user_details($this->session->userdata('cid'));
        if ($this->session->userdata('token') != $get_user_token_details->token) {
            redirect('login');
        }
		 }
    }

    public function index() {
        $this->load->view('header');
        $this->load->view('home');
        $this->load->view('footer');
    }

    function add_user_activity() {
        $post = $this->input->post();
        $int_array = array(
            'user_id' => $post['user_id'],
            'page_name' => $post['page_name'],
            'page_link' => $post['page_link'],
            'activity_date_time' => date("Y-m-d h:i:s")
        );
        $this->db->insert("user_activity", $int_array);
        return TRUE;
    }


}
