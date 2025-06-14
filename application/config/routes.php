<?php

defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = false;

$route['setting/outlets/(:num)'] = 'setting/outlets/$1';
$route['setting/users/(:num)'] = 'setting/users/$1';
$route['products/product_category/(:num)'] = 'products/product_category/$1';
$route['products/list_products/(:num)'] = 'products/list_products/$1';
$route['sales/list_sales/(:num)'] = 'sales/list_sales/$1';
$route['sales/opened_bill/(:num)'] = 'sales/opened_bill/$1';
$route['setting/payment_methods/(:num)'] = 'setting/payment_methods/$1';
$route['expenses/view/(:num)'] = 'expenses/view/$1';
$route['products/print_label/(:num)'] = 'products/print_label/$1';
$route['customers/view/(:num)'] = 'customers/view/$1';
$route['setting/suppliers/(:num)'] = 'setting/suppliers/$1';
$route['purchase_order/po_view/(:num)'] = 'purchase_order/po_view/$1';
$route['inventory/view/(:num)'] = 'inventory/view/$1';
$route['debit/view/(:num)'] = 'debit/view/$1';

// In application/config/routes.php
$route['fuel/get_last_reading'] = 'fuel/get_last_reading';

$route['maintenance/create/(:num)'] = 'maintenance/create/$1';
$route['maintenance/store/(:num)'] = 'maintenance/store/$1';
$route['vehicles/view/(:num)'] = 'vehicles/view/$1';

$route['maintenance/history'] = 'maintenance/history';
$route['maintenance/edit/(:num)'] = 'maintenance/edit/$1';
$route['maintenance/update/(:num)'] = 'maintenance/update/$1';
$route['maintenance/delete/(:num)'] = 'maintenance/delete/$1';
$route['maintenance/schedule'] = 'maintenance/schedule';


$route['inspections'] = 'inspections/index';
$route['inspections/create'] = 'inspections/create';
$route['inspections/create/(:num)'] = 'inspections/create/$1';
$route['inspections/store'] = 'inspections/store';
$route['inspections/view/(:num)'] = 'inspections/view/$1';

$route['inspections/edit/(:num)'] = 'inspections/edit/$1';
