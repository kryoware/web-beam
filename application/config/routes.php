<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* BROKEN AF */
$route['admin/manage'] = 'adminHome/manage_admins';
$route['admin/delete/(:num)'] = 'adminHome/delete_admin/$1';
$route['admin/view/(:num)'] = 'adminHome/view_admin/$1';
$route['admin/edit'] = 'adminHome/edit_admin';

/* CI STUFF */
$route['default_controller'] = 'landing';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
/* WORKING AF */
$route['admin/view/logs'] = 'adminHome/view_logs';
$route['admin/view/request/(:num)'] = 'adminHome/view_request/$1';
$route['admin/view/requests/pending'] = 'adminHome/view_requests';
$route['admin/view/accounts/pending'] = 'adminHome/view_accounts';

$route['admin/edit/teacher/disable/(:num)'] = 'adminHome/disable_teacher/$1';
$route['admin/edit/student/disable/(:num)'] = 'adminHome/disable_student/$1';
$route['admin/edit/disable/(:num)'] = 'adminHome/disable_admin/$1';

$route['admin/edit/teacher/enable/(:num)'] = 'adminHome/enable_teacher/$1';
$route['admin/edit/student/enable/(:num)'] = 'adminHome/enable_student/$1';
$route['admin/edit/enable/(:num)'] = 'adminHome/enable_admin/$1';

$route['admin/edit/teacher/reset/(:num)'] = 'adminHome/reset_teacher/$1';
$route['admin/edit/student/reset/(:num)'] = 'adminHome/reset_student/$1';
$route['admin/edit/reset/(:num)'] = 'adminHome/reset_admin/$1';

$route['admin/new/event'] = 'adminHome/create_event';
$route['admin/delete/poll/(:num)'] = 'adminHome/delete_poll/$1';
$route['view/poll/(:num)'] = 'adminHome/view_poll/$1';
$route['admin/view/log/(:num)'] = 'adminHome/view_log/$1';

$route['admin/view_all/students'] = 'adminHome/manage_students';
$route['admin/view_all/teachers'] = 'adminHome/manage_teachers';
$route['admin/view_all/events'] = 'adminHome/manage_events';
$route['admin/view_all/polls'] = 'adminHome/manage_polls';

$route['admin/delete/student/(:any)'] = 'adminHome/delete_student/$1';
$route['admin/view/student/(:any)'] = 'adminHome/view_student/$1';
$route['admin/edit/student'] = 'adminHome/edit_student';

$route['admin/delete/teacher/(:any)'] = 'adminHome/delete_teacher/$1';
$route['admin/view/teacher/(:any)'] = 'adminHome/view_teacher/$1';
$route['admin/edit/teacher'] = 'adminHome/edit_teacher';

$route['admin/delete/event/(:num)'] = 'adminHome/delete_event/$1';
$route['admin/view/event/(:any)'] = 'adminHome/view_event/$1';
$route['admin/edit/event'] = 'adminHome/edit_event';
$route['admin/create/event'] = 'adminHome/create_event';
$route['admin/create/event/process'] = 'adminHome/create_event_process';

$route['help'] = 'landing/help';
$route['teacher/signup'] = 'signup/teacher_signup';
$route['teacher/signup/process'] = 'signup/teacher_process';
$route['student/signup'] = 'signup/student_signup';
$route['student/signup/process'] = 'signup/student_process';
$route['admin/signup'] = 'signup/admin_signup';
$route['admin/signup/process'] = 'signup/admin_process';
$route['teacher/profile/verify'] = 'profile/verify_number';
$route['student/profile/verify'] = 'profile/verify_number';
$route['admin/profile/verify'] = 'profile/verify_number';
$route['teacher/profile/change_password'] = 'profile/change_password';
$route['student/profile/change_password'] = 'profile/change_password';
$route['admin/profile/change_password'] = 'profile/change_password';
$route['teacher/profile/change_number'] = 'profile/change_number';
$route['student/profile/change_number'] = 'profile/change_number';
$route['admin/profile/change_number'] = 'profile/change_number';
$route['student'] = 'studentLogin';
$route['student/login'] = 'studentLogin/login';
$route['student/dashboard'] = 'studentHome';
$route['student/profile'] = 'studentHome/profile';
$route['student/help'] = 'studentHome/help';
$route['student/logout'] = 'studentHome/logout';
$route['student/join_group'] = 'studentHome/join_group';
$route['student/group/view/(:num)'] = 'studentHome/view_group/$1';
$route['teacher'] = 'teacherLogin';
$route['teacher/login'] = 'teacherLogin/login';
$route['teacher/dashboard'] = 'teacherHome';
$route['teacher/profile'] = 'teacherHome/profile';
$route['teacher/help'] = 'teacherHome/help';
$route['teacher/logout'] = 'teacherHome/logout';
$route['teacher/create_group'] = 'teacherHome/create_group';
$route['teacher/group/view/(:num)'] = 'teacherHome/view_group/$1';
$route['teacher/group/delete/(:num)'] = 'teacherHome/delete_group/$1';
$route['teacher/group/update/(:num)'] = 'teacherHome/update_group/$1';
$route['admin'] = 'adminLogin';
$route['admin/login'] = 'adminLogin/login';
$route['admin/dashboard'] = 'adminHome';
$route['admin/profile'] = 'adminHome/profile';
$route['admin/help'] = 'adminHome/help';
$route['admin/logout'] = 'adminHome/logout';
