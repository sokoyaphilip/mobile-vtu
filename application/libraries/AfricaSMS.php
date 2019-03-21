<?php
use AfricasTalking\SDK\AfricasTalking;
defined('BASEPATH') OR exit('No direct script access allowed');
class AfricaSMS {

    protected $recipents;
    public function __construct( $recipents = array()){
        $this->recipents = $recipents;
    }

    public function sendsms(){
        // Set your app credentials
        // $username   = "onitshamarket";
        // $apikey     = "d69b04b7fd1cf8b156a2fc04139b37dbef25c8acc990718aae7d3ed11db2d141";
        $username   = "ArtisansUsers";
        $apikey     = "9ac256570d664969766b527a7635f13f84bad5633c1b34757be00bef961bf308";
//        die ( $username . ' and ' . $apikey );
        $AT         = new AfricasTalking($username, $apikey);
        $sms        = $AT->sms();
        if( is_array($this->recipents) && !empty($this->recipents)){
            foreach( $this->recipents as $key => $message  ){
                // remove the preceeding
                if( !empty( $key ) || !is_null($key) ){
                    $recipent = $this->remove( $key );
                    try {
                        $result = $sms->send(array(
                            'to' => $recipent,
                            'message' => $message,
                            'enqueue' => true
                        ));
                    } catch (Exception $e) {
                        echo $e;
                    }
                }
            }
        }
    }

    // Sanitize the phone number
    function remove( $recipent ){
        $recipent = preg_replace('/^0/','+234',$recipent);
        return $recipent;
    }
}
