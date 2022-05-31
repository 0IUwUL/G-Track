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

// Expense
$route["expense_page/Expense/input/(:any)"] = "Expense/input/$1";
$route["Expense/view/Expense/input/(:any)"] = "Expense/input/$1";
$route["expense_page/Cedit"] = "Expense/Cedit";
$route["Expense/view/Cedit"] = "Expense/Cedit";
$route["expense_page/Eedit/(:any)"] = "Expense/Eedit/$1";
$route["Expense/view/Eedit/(:any)"] = "Expense/Eedit/$1";
$route["Expense/view/Ddelete/(:any)"] = "Expense/Ddelete/$1";
$route["expense_page/Ddelete/(:any)"] = "Expense/Ddelete/$1";
$route["Expense/view/(:any)"]="Expense/view/$1";
$route["expense_page/(:any)"]="Expense/view/$1";

