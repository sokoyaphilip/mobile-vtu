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

    // forgoet
    public function forgot(){
        $this->load->library('recaptcha');
        if( $this->input->post() ){
            $recaptcha = $this->input->post('g-recaptcha-response');
            $response = $this->recaptcha->verifyResponse($recaptcha);
            if (!isset($response['success']) || $response['success'] !== true) {
                $this->session->set_flashdata('error_msg', 'There was an error validating the captcha, please try again.');
                redirect('auth/forgot/');
            }
            $this->form_validation->set_rules('email', 'Email address','trim|required|xss_clean|valid_email');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('error_msg', validation_errors() );
                redirect('auth/forgot/');
            }else{
                // // send mail
                $email = $this->input->post('email');
                // check the email
                $row = $this->site->run_sql("SELECT id, name FROM users WHERE email = '{$email}'")->row();
                if( !$row ){
                    $this->session->set_flashdata('error_msg', "Oops sorry, we can't find your detail in our system");
                    redirect('auth/forgot/');
                }else{
                    $new_password = random_string('alnum', 10);
                    if( $this->site->change_password( $new_password , $row->id) ){
                        // send mail
                        $message = "Hi {$row->name}, \r\n\r\nYou requested to retrieve your password, please find below your new password.\r\n\r\n {$new_password}\r\nAfter login in to your account, you can change it to your preferred password.\r\n\r\nHave a great day.\r\n\r\nBest Regards,\r\n\r\nGecharl.com";

                        $this->email->clear(TRUE);
                        $this->email->set_newline("\r\n");
                        $this->email->from('hello@gecharl.com', 'Gecharl.com');
                        $this->email->to($email);
                        $this->email->subject('Password Retrieve From Gecharl.com');
                        $this->email->message($message);
                        if( $this->email->send()){
                            $this->session->set_flashdata('success_msg', "Congrats, a new password has been sent to your mail.");
                            redirect('auth/login/');
                        }else{
                            $this->session->set_flashdata('error_msg',"There was an error sending the mail...");
                            redirect('auth/forgot/');
                        }
                    }

                }
            }

        }else{
            $page_data['page'] = 'forgot';
            $this->load->view('landing/forgot', $page_data);
        }
    }

}
