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
$route['default_controller'] = 'Home';
$route['index'] = 'Home';
$route['allcategory'] = 'Home/allcategory';
$route['contact'] = 'Home/contact';
$route['privacy'] = 'Home/privacy';
$route['searchresult'] = 'Home/searchresult';
$route['productlist/(:any)'] = 'Home/productlist/$1';
$route['productlist/(:any)/(:any)']='Home/productlist/$1/$2';  
$route['comboproduct/(:any)'] = 'Home/comboproduct/$1';
$route['comboproduct/(:any)/(:any)'] = 'Home/comboproduct/$1/$2';
$route['singleproduct/(:any)'] = 'Home/singleproduct/$1';
$route['singleproduct/(:any)/(:any)'] = 'Home/singleproduct/$1/$2';
$route['logout'] = 'Home/logout';
$route['cart'] = 'Home/cart';
$route['ordersuccess'] = 'Home/ordersuccess';
$route['checkout'] = 'Home/checkout';
$route['myaccount'] = 'Home/myaccount';
$route['myorders'] = 'Home/myorders';
$route['orderview/(:any)'] = 'Home/orderview/$1';
$route['orderviewcombo/(:any)'] = 'Home/orderviewcombo/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
