<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }

	public function index(){
		redirect(base_url());
	}


	public function login(){
	    $page_data['page'] = 'login';
	    $this->load->view('landing/login', $page_data);
    }

    public function create(){
        $page_data['page'] = 'login';
        $this->load->view('landing/create', $page_data);
    }

}
