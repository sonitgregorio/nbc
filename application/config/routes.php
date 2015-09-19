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
$route['default_controller'] = 'main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['login']                 =   'main/verifylogin';
$route['faculty_registration']  =   'main/fac_reg';
$route['add_school']            =   'main/add_school';
$route['user_registration']     =   'main/user_reg';
$route['add_criteria']          =   'main/add_criteria';
$route['logout']                =   'main/logout';

//Faculty Data Management Routes
$route['insert_faculty']        =   'common/insert_faculty';
$route['delete_faculty/(:any)'] =   'common/delete_faculty/$1';
$route['edit_faculty/(:any)']   =   'common/edit_faculty/$1';

//School Data Management Routes
$route['save_school']           =   'common/save_school';
$route['edit/(:any)']           =   'common/edit_school/$1';
$route['delete/(:any)']         =   'common/delete_school/$1';

//User Registration
$route['user_reg']              =   'common/user_reg';
$route['edit_users/(:any)']     =   'common/edit_users/$1';
$route['delete_users/(:any)']   =   'common/delete_users/$1';

//Add Criteria
$route['insert_criteria']       =   'common/insert_criteria';
$route['delete_cce/(:any)']     =   'common/delete_cce/$1';
$route['edit_cce/(:any)']       =   'common/edit_cce/$1';

//CCE
$route['qce']                     =   'qce/criteria';
$route['evaluate']                =   'student/evaluate';
$route['instructor_eval/(:num)']  =   'student/ins_eval/$1';
$route['list_evaluate']           =   'common/list_evaluate';
$route['add_evaluators/(:num)']   =   'common/add_evaluators/$1';

$route['submit_evaluate']         =   'evaluate/evaluation';

$route['cce']                     = 'cce/show_instruc';
