<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route["pages"]= "pages/view";
$route["pages/view/(:any)"]="pages/view/$1";
$route['default_controller'] = 'pages/view';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
