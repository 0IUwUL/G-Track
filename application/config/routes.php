<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['logout'] = "logouts/logout";
$route["sign_up/index"] = "sign_up/index";
$route["pages"]= "pages/view";
$route["pages/view/(:any)"]="pages/view/$1";
$route['default_controller'] = 'logins/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
