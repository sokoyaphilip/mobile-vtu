<?php
class Cron extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }

	public function index(){
		redirect(base_url());
	}


	public function contact(){

    }


    /*
     * Data pricing page for reseller
     * */
    public function reseller_pricing(){
	    $page_data['page'] = 'data';
        $page_data['data'] = $this->site->get_result('services', 'id, title, message', "(product_id = 1)");
	    $this->load->view('landing/pricing', $page_data);
    }

    /*
     * Data pricing page for retail
     * */
    public function retail_pricing(){
        $page_data['page'] = 'data';
        $page_data['data'] = $this->site->get_result('services', 'id, title, message', "(product_id = 1)");
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
