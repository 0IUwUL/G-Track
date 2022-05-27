<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['logout'] = "logouts/logout";
$route["sign_up"] = "sign_up/index";
$route["dashboard"]= "pages/view";
$route["pages/view/(:any)"]="pages/view/$1";
$route['default_controller'] = 'logins/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Category
$route["Category/delete/(:any)"]="Category/delete/$1";