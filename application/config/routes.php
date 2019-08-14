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

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
 

$route['login'] = 'backend/login/index'; 
$route['sign-up'] = 'backend/login/sign_up'; 
$route['forget-password'] = 'backend/login/forget_password'; 
$route['reset-password'] = 'backend/login/reset_password';
$route['register'] = 'backend/login/register'; 
$route['check_login'] = 'backend/login/check_login'; 
$route['(:any)/dashboard'] = 'backend/$1/index'; 

/*Admin */
$route['admin/category'] = 'backend/admin/category'; 
$route['admin/add_category'] = 'backend/admin/add_category'; 
$route['admin/save_category'] = 'backend/admin/save_category';
$route['admin/delete_category/(:any)'] = 'backend/admin/delete_category/$1';


/*Seller */
$route['seller/upload-file'] = 'backend/seller/upload_file'; 



/*Buyer */



/*Blogger */
$route['blogger/add-blog'] = 'backend/blogger/add_blog'; 
$route['blogger/save_blog'] = 'backend/blogger/save_blog'; 
$route['blogger/update_blog/(:any)'] = 'backend/blogger/update_blog/$1'; 



$route['default_controller'] = 'Main';
