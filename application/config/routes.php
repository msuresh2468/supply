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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['/'] = 'Home/index';
// Register
$route['register']['GET'] = 'Register/index';
$route['register/do_register']['POST'] = 'Register/do_register';
// Login
$route['login']['GET'] = 'Login/index';
$route['logout']['GET'] = 'Logout/index';
$route['login/do_login']['POST'] = 'Login/do_login';
// Dashboard Section
$route['portal/index']['GET'] = 'Dashboard/index';
$route['portal/purchase-orders']['GET'] = 'Dashboard/purchase';
$route['portal/supplied-items']['GET'] = 'Dashboard/supplied';
$route['portal/not-supplied-items']['GET'] = 'Dashboard/notsupplied';
$route['portal/installed-items']['GET'] = 'Dashboard/installed';
$route['portal/not-installed-items']['GET'] = 'Dashboard/notinstalled';
$route['portal/installed-items-after-cutoff-date']['GET'] = 'Dashboard/afterCutoff';
$route['portal/installed-items-before-cutoff-date']['GET'] = 'Dashboard/beforeCutoff';
$route['portal/supply-status']['GET'] = 'Dashboard/status';
$route['portal/add-purchase-order']['GET'] = 'Purchase_Orders/createPO';
$route['portal/edit-purchase-order/(:any)']['GET'] = 'Purchase_Orders/editPO/$1';
$route['portal/view-po/(:any)']['GET'] = 'Purchase_Orders/viewPODeials/$1';
$route['portal/view-purchase-order/(:any)']['GET'] = 'Purchase_Orders/viewPO/$1';
// $route['Admin/edit-post/(:any)']['GET'] = 'Blog/editPost/$1';
// $route['Admin/updatePost/(:any)']['POST'] = 'Blog/updatePost/$1';
$route['portal/addPO']['POST'] = 'Purchase_Orders/addPO';

