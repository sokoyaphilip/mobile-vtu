<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index(){
        $page_data['page'] = 'home';
        $page_data['user'] = '';
        if( $this->session->userdata('logged_in')){
            $page_data['user'] = $this->get_profile($this->session->userdata('logged_id'));
        }
        $page_data['services'] = $this->site->run_sql("SELECT id,title,network_name, discount FROM services WHERE product_id = '2'")->result();
		$this->load->view('landing/home', $page_data);
	}

    function get_profile($id){
        return $this->site->run_sql("SELECT phone, email, name, user_code, wallet, account_type FROM users where id = {$id}")->row();
    }
}
