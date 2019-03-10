<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('recaptcha');
    }

	public function index(){
		redirect(base_url());
	}


	public function contact(){
	    $page_data['page'] = 'contact';

	    if( $this->input->post() ){

            $recaptcha = $this->input->post('g-recaptcha-response');
            $response = $this->recaptcha->verifyResponse($recaptcha);
            if (!isset($response['success']) || $response['success'] !== true) {
                $this->session->set_flashdata('error_msg', 'There was an error validating the captcha, please try again.');
                redirect('contact');
            }
            $this->form_validation->set_rules('name', 'Contact name','trim|required|xss_clean|min_length[3]|max_length[15]');
            $this->form_validation->set_rules('email', 'Contact email','trim|required|xss_clean|valid_email');
            $this->form_validation->set_rules('message', 'Contact message','trim|required|xss_clean|min_length[3]|max_length[300]');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('error_msg', validation_errors() );
                redirect('contact');
            }else{
                // // send mail
                $name = $this->input->post('name');
                $email = $this->input->post('email');
                $message = $this->input->post('message');

                 $this->load->library('email');
                 $this->email->from($email, $name);
                 $this->email->to('hello@gecharl.com');
                 $this->email->subject( $name.' A new message from contact page');
                 if( $this->email->send() ) {
                     $this->session->set_flashdata('success_msg', "We received your messahe and will get back to you shortly");
                 }else{
                     $this->session->set_flashdata('error_msg', "There was an error sending your message... Please try again or use the chat widget.");
                 }
                 redirect('contact');
            }

        }
	    $this->load->view('landing/contact', $page_data);

    }


    /*
     * Data pricing page for reseller
     * */
    public function reseller_pricing(){
	    $page_data['page'] = 'data';
	    $this->load->view('landing/pricing', $page_data);
    }

    /*
     * Data pricing page for retail
     * */
    public function retail_pricing(){
        $page_data['page'] = 'data';
        $this->load->view('landing/retail_pricing', $page_data);
    }


    public function cabletv(){
        $page_data['page'] = 'cable';
        $this->load->view('landing/pricing', $page_data);
    }

    /*
     * Show all services we render
     * */
    public function all_services(){

    }

    public function about(){
        $page_data['page'] = 'about';
        $this->load->view('landing/about', $page_data);
    }

    public function sitemap(){
        header("Content-Type: text/xml;charset=iso-8859-1");
        $this->load->view('sitemap');
    }


    public function error404(){
        $page_data['page'] = '404';
        $this->load->view('landing/404', $page_data);
    }
}
