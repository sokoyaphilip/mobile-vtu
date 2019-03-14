<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct(){
        parent::__construct();

        if( !$this->session->userdata('logged_in') || ($this->session->userdata('is_admin') != 0) ){
            redirect( base_url() );
        }
    }


    public function index(){
        $page_data['page'] = 'home';
        $id = $this->session->userdata('logged_id');
        $page_data['user'] = $this->get_profile($id);
        $page_data['products'] = $this->site->get_result('products');

        $query = "SELECT * FROM transactions WHERE user_id = {$id} ORDER BY id DESC ";
        $start = $end = $transaction ='';
        if( $this->input->post() ){
            // start empty
            $start = $this->input->post('start');
            if( empty( $start) || !isset($start) ){
                $start = $_POST['start'] = date('Y-m-d', strtotime('first day of the year'));
            }else{
                $start = date('Y-m-d', strtotime($start));
            }
            $end = $this->input->post('end');
            if( empty( $end) || !isset($end) ){
                $end = $_POST['end'] = date('Y-m-d', strtotime('first day of the year'));
            }else{
                $end = date('Y-m-d', strtotime($end));
            }

            $query = "SELECT * FROM transactions WHERE date_initiated BETWEEN '{$start}' AND '{$end}' AND user_id ={$id} ";

            if( $this->input->post('transaction_type') ){
                $transaction = $this->input->post('transaction_type');
                $query .= " AND product_id = {$transaction} ORDER BY id DESC";
            }
        }

        $page_data['transactions'] = $this->site->run_sql( $query )->result();

//        var_dump( $page_data['transactions'] ); exit;
		$this->load->view('app/users/dashboard', $page_data);
	}

	// Data
    public function data(){
        $id = $this->session->userdata('logged_id');
        $page_data['page'] = 'data';
        $page_data['user'] = $this->get_profile($id);
        $page_data['networks'] = $this->site->run_sql("SELECT p.slug, s.id, s.title, s.network_name, discount FROM products p LEFT JOIN services s ON (p.id = s.product_id) WHERE p.title ='data' ")->result();
        $this->load->view('app/users/data', $page_data);
    }

    // Airtime
    public function airtime(){
        $id = $this->session->userdata('logged_id');
        $page_data['page'] = 'airtime';
        $page_data['user'] = $this->get_profile($id);
        $page_data['networks'] = $this->site->run_sql("SELECT p.slug, s.id, s.title, network_name, discount FROM products p LEFT JOIN services s ON (p.id = s.product_id) WHERE p.title ='airtime' ")->result();
        $this->load->view('app/users/airtime', $page_data);

    }

    // Tv subscription
    public function subscription(){
        $id = $this->session->userdata('logged_id');
        $page_data['page'] = 'subscription';
        $page_data['user'] = $this->get_profile($id);
        $page_data['networks'] = $this->site->run_sql("SELECT p.slug, s.id, s.title, network_name, discount FROM products p LEFT JOIN services s ON (p.id = s.product_id) WHERE p.slug ='tv-subscription' ")->result();
        $this->load->view('app/users/subscription', $page_data);

    }

    // electricity
    public function electricity(){
        $id = $this->session->userdata('logged_id');
        $page_data['page'] = 'electricity';
        $page_data['user'] = $this->get_profile($id);
        $page_data['plans'] = $this->site->run_sql("SELECT s.id service_id, network_name, discount, pl.id, pl.name FROM products p 
        LEFT JOIN services s ON (p.id = s.product_id) 
        JOIN plans pl ON (pl.sid = s.id)
        WHERE p.slug ='electricity-bill' ")->result();
        $this->load->view('app/users/electricity', $page_data);
    }

    // fund wallet
    public function wallet(){
        $id = $this->session->userdata('logged_id');
        $page_data['page'] = 'wallet';
        $page_data['user'] = $this->get_profile( $id );
        $page_data['fundings'] = $this->site->get_result('transactions', '*' , " user_id = {$id}");
        $this->load->view('app/users/wallet', $page_data);

    }

    public function airtime_to_cash(){
        $id = $this->session->userdata('logged_id');
        $page_data['page'] = 'airtime2cash';
        $page_data['title'] = "Airtime to Cash";
        $page_data['user'] = $this->get_profile( $id );
        $page_data['networks'] = $this->site->run_sql("SELECT p.slug, s.id, s.title, network_name, discount FROM products p LEFT JOIN services s ON (p.id = s.product_id) WHERE p.title ='airtime' ")->result();
        $page_data['fundings'] = $this->site->get_result('transactions', '*' , " user_id = {$id}");
        $this->load->view('app/users/airtime_to_cash', $page_data);
    }

    function airtime_process(){
        $post_type = $this->input->post('post_type', true);
        $network = $this->input->post('network');
        switch ($post_type) {
            case 'pin_transfer':
                $this->form_validation->set_rules('airtime_pin_network', 'Airtime Network','trim|required|xss_clean');
                $this->form_validation->set_rules('pin', 'Pin Network','trim|required|xss_clean');
                if( $this->form_validation->run() == false ){
                    $this->session->set_flashdata('error_msg', validation_errors());
                    redirect($_SERVER['HTTP_REFERER']);
                }
                $pin = trim($this->input->post('pin'));
                // Mtn - Airtel : 16, Glo - 9mobile : 15,
                $length = strlen( $pin );
                switch ( $network ) {
                    case 'glo':
                    case '9mobile':
                        if( $length != 15){
                            $this->session->set_flashdata('error_msg', "Sorry the " . strtoupper( $network) . " network pin is invalid");
                            redirect( $_SERVER['HTTP_REFERER']);
                        }
                        break;
                    case 'mtn':
                    case 'airtime':
                        if( $length != 16){
                            $this->session->set_flashdata('error_msg', "Sorry the " . strtoupper( $network) . " network pin is invalid");
                            redirect( $_SERVER['HTTP_REFERER']);
                        }
                        break;
                }
                break;
        }
    }

	function get_profile($id){
	    return $this->site->run_sql("SELECT phone, email, name, user_code, wallet, account_type FROM users where id = {$id}")->row();
    }
}
