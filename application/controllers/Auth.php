<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if( $this->session->userdata('logged_in') ){
            if( $this->session->userdata('is_admin') == 0 ){
                redirect('dashboard');
            }elseif ( $this->session->userdata('is_admin') == 1 ){
                redirect('admin');
            }else{
                redirect(base_url());
            }
        }
    }

	public function index(){
		redirect('auth/login/');
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
