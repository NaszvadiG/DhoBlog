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
$route['default_controller'] = 'blog';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['dashboard']= 'backend/dashboard/index';

$route['dashboard/posts/(:num)']= 'backend/posts/index/$1';
$route['dashboard/posts']= 'backend/posts/index';
$route['dashboard/newpost']= 'backend/posts/newpost';
$route['dashboard/editpost/(:num)']= 'backend/posts/editpost/$1';
$route['dashboard/deletepost/(:num)']= 'backend/posts/deletepost/$1';

$route['dashboard/pages/(:num)']= 'backend/pages/index/$1';
$route['dashboard/pages']= 'backend/pages/index';
$route['dashboard/newpage']= 'backend/pages/newpage';
$route['dashboard/editpage/(:num)']= 'backend/pages/editpage/$1';
$route['dashboard/deletepage/(:num)']= 'backend/pages/deletepage/$1';

$route['dashboard/categories/(:num)']= 'backend/categories/index/$1';
$route['dashboard/categories']= 'backend/categories/index';
$route['dashboard/newcategory']= 'backend/categories/newcategory';
$route['dashboard/editcategory/(:num)']= 'backend/categories/editcategory/$1';
$route['dashboard/deletecategory/(:num)']= 'backend/categories/deletecategory/$1';

$route['dashboard/menus/(:num)']= 'backend/menus/index/$1';
$route['dashboard/menus']= 'backend/menus/index';
$route['dashboard/newmenu']= 'backend/menus/newmenu';
$route['dashboard/editmenu/(:num)']= 'backend/menus/editmenu/$1';
$route['dashboard/deletemenu/(:num)']= 'backend/menus/deletemenu/$1';

$route['dashboard/backend']= 'backend/backendthemes/index';
$route['dashboard/frontend']= 'backend/frontendthemes/index';
$route['dashboard/general']= 'backend/general/index';
$route['dashboard/reading']= 'backend/reading/index';  
$route['dashboard/permalinks']= 'backend/permalinks/index';

$route['posts/(:num)'] = "blog/posts/$1";
$route['posts'] = "blog/posts";

$route['(:num)/(:num)/(:num)/(:any).html']= 'blog/post/$1/$2/$3/$4';
$route['post/(:num)']= 'blog/post/$1';
$route['(:any).html']= 'blog/post/$1';

$route['page/(:any).html'] = "blog/page/$1";
$route['category/(:any)/(:num)']= 'blog/category/$1/$2';
$route['category/(:any)']= 'blog/category/$1';
$route['tags/(:any)']= 'blog/tags/$1';
$route['search']= 'blog/search';