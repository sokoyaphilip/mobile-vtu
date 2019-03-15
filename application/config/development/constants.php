<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code


$nigeria_telcos = array(

    'mtn' => array('0703', '234703', '0706', '234706' ,'0803', '234803', '0806', '234806', '0810', '234810','0813', '234813','0814', '234814', '0816','234816',
        '0903', '234903', '0906', '234906'),
    'airtel' => array('0701', '234701', '0708', '234708', '0802', '234802', '0808', '234808', '0812', '234812', '0902', '234902', '0907', '234907'),
    'glo' =>  array('0705', '234705', '0805', '234805', '0807', '234807', '0811', '234811', '0815', '234815', '0905', '234905'),
    'etisalat' => array('0809', '234909', '0817', '234817', '0818', '234818', '0909', '234909', '0908', '234908')
);

defined('NIGERIA_TELCOS') OR define('NIGERIA_TELCOS', $nigeria_telcos);


// API
defined('CK_USER_ID')      OR define('CK_USER_ID', "CK10073078"); //Clubkonnect User ID
defined('CK_KEY')      OR define('CK_KEY', "57E90LT10E07S132AUM7JV10B6HT4Y4IVDCT50U8L8TQP3R458S14G9AWO679XO3"); //Clubkonnect User Key
defined('CK_AIRTIME_URL')      OR define('CK_AIRTIME_URL', "https://www.nellobytesystems.com/APIBuyAirTime.asp"); //Clubkonnect Airtime


// VT PASS
defined('VTPASS_HOST') OR define('VTPASS_HOST', "http://sandbox.vtpass.com/api/payfix");
defined('VTPASS_USERNAME') OR define('VTPASS_USERNAME', "sandbox@vtpass.com");
defined('VTPASS_PASSWORD') OR define('VTPASS_PASSWORD', "sandbox");


//Paystack
defined('S_KEY') OR define('S_KEY', 'sk_test_7f9e0d2c426861d566a1abf1bffee4839a1176ea');
defined('P_KEY') OR define('P_KEY', 'pk_test_89ca6e3e4316cc4ec8f983eea76a5c3ba32631e4');

