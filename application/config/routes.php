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


$route['login']                 			=   'main/verifylogin';
$route['faculty_registration']  			=   'main/fac_reg';
$route['add_school']            			=   'main/add_school';
$route['user_registration']     			=   'main/user_reg';
$route['add_criteria']          			=   'main/add_criteria';
$route['logout']                			=   'main/logout';

//Faculty Data Management Routes
$route['insert_faculty']        			=   'common/insert_faculty';
$route['delete_faculty/(:any)'] 			=   'common/delete_faculty/$1';
$route['edit_faculty/(:any)']   			=   'common/edit_faculty/$1';
$route['add_fac_user/(:any)']   			=   'common/add_fac_user/$1';


//School Data Management Routes
$route['save_school']           			=   'common/save_school';
$route['edit/(:any)']           			=   'common/edit_school/$1';
$route['delete/(:any)']         			=   'common/delete_school/$1';

//User Registration
$route['user_reg']              			=   'common/user_reg';
$route['edit_users/(:any)']     			=   'common/edit_users/$1';
$route['delete_users/(:any)']   			=   'common/delete_users/$1';

//Add Criteria
$route['insert_criteria']       			=   'common/insert_criteria';
$route['delete_cce/(:any)']     			=   'common/delete_cce/$1';
$route['edit_cce/(:any)']       			=   'common/edit_cce/$1';

//CCE
$route['qce']                     			=   'qce/criteria';
$route['evaluate']                			=   'student/evaluate';
$route['instructor_eval/(:num)/(:num)']  	=   'student/ins_eval/$1/$2';
$route['list_evaluate']           			=   'common/list_evaluate';
$route['add_evaluators/(:num)']   			=   'common/add_evaluators/$1';

$route['submit_evaluate']         			=   'evaluate/evaluation';

$route['cce']                     			= 'cce/show_instruc';


//Reports

$route['reports_all']			  			= 'reports/view_all_rep';

#insert cce routes
$route['insert_this_cce']		  			= 'cce/insert_this_cce';
$route['set_cycle']				  			= 'cce/set_cycle';
$route['insert_cycle']			  			= 'cce/insert_cycle';


//Subject Route 
$route['add_subject']			  			= 'subject/add_subject';
$route['insert_subject']		  			= 'subject/insert_subject';
$route['delete_subject/(:num)']	  			= 'subject/delete_subject/$1';
$route['edit_subject/(:num)']	  			= 'subject/edit_subject/$1';
$route['cancel_subject']		  			= 'subject/cancel_subject';


//Faculty Management and adding evaluator.		
$route['faculty_list']			  		  	= 'faculty/faculty_list';
$route['add_faculty_evaluator/(:num)']	  	= 'faculty/add_faculty_evaluator/$1';
$route['insert_faculty_evaluator']		  	= 'faculty/insert_faculty_evaluator';	
$route['delete_evaluators/(:num)/(:num)'] 	= 'faculty/delete_evaluators/$1/$2';
$route['view_summary/(:num)']			  	= 'faculty/view_summary/$1';	


//Add Class

$route['add_class']						  	= 'addClassed/add_class';
$route['insert_class']						= 'addClassed/insert_class';
$route['add_stud/(:num)']					= 'addClassed/add_stud/$1';
$route['insert_student']					= 'addClassed/insert_student';




$route['set_sy']							= 'addClassed/set_sy';
$route['insert_sy']							= 'addClassed/insert_sy';
$route['set_active/(:num)']					= 'addClassed/set_active/$1';


//Generate Evaluators
$route['generate_eval/(:any)']				= 'addClassed/generate_eval/$1';
