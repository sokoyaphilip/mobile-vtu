<?php

if(! defined('ENVIRONMENT') )
{
    $domain = strtolower($_SERVER['HTTP_HOST']);

    switch($domain) {
        case 'gecharl.com' :
            define('ENVIRONMENT', 'production');
            break;

        case 'dev.gecharl.com' :
            //our staging server
            define('ENVIRONMENT', 'staging');
            break;

        default :
            define('ENVIRONMENT', 'development');
            break;
    }
}