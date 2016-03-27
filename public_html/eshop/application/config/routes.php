<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	http://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'welcome';
$route['404_override'] = 'welcome';
$route['translate_uri_dashes'] = TRUE;
$route['category'] = 'welcome';
$route['category/(:any)'] = 'category/index/$1';
$route['item'] = 'welcome';
$route['item/(:any)'] = 'item/index/$1';
$route['basket'] = 'basket';
$route['basket/(:any)'] = 'basket/index/$1';
$route['order'] = 'order/list';
$route['order/(:any)'] = 'order/index/$1';
$route['profile'] = 'profile';
$route['profile/(:any)'] = 'profile/index/$1';
$route['registration'] = 'registration';
$route['registration/(:any)'] = 'registration/index/$1';
$route['edit_item'] = 'edit_item';
$route['edit_item/(:any)'] = 'edit_item/index/$1';
$route['delete_item'] = 'delete_item';
$route['delete_item/(:any)'] = 'delete_item/index/$1';
$route['add_item'] = 'add_item';
$route['add_item/(:any)'] = 'add_item/index/$1';
$route['edit_cat'] = 'edit_cat';
$route['edit_cat/(:any)'] = 'edit_cat/index/$1';
$route['delete_cat'] = 'delete_cat';
$route['delete_cat/(:any)'] = 'delete_cat/index/$1';
$route['add_cat'] = 'add_cat';
$route['add_cat/(:any)'] = 'add_cat/index/$1';
$route['edit_orders'] = 'edit_orders';
$route['edit_orders/(:any)'] = 'edit_orders/index/$1';
$route['activate'] = 'activate';
$route['activate/(:any)'] = 'activate/index/$1';