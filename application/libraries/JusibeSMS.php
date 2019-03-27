<?php
use Unicodeveloper\Jusibe\Jusibe;
defined('BASEPATH') OR exit('No direct script access allowed');
class JusibeSMS {

    protected $sms;
    public function __construct( $sms = array()){
        $this->sms = $sms;
    }

    public function sendsms(){
        // Set your app credentials
        $public_key   = "fc66215d8d3f0898d7aa8419ac4cb920";
        $access_token = "cd093576e43decd365f7eb8876833661";

        $jusibe = new Jusibe( $public_key, $access_token);
        $payload = array(
            'to' => $this->sms['to'],
            'from' => 'GecharlData',
            'message' => $this->sms['message']
        );

        try {
            return $jusibe->sendSMS($payload)->getResponse();;
        } catch(Exception $e) {
            echo $e->getMessage();
        }

    }
}
