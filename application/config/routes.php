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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['kues_pengguna'] = 'kues_pengguna';

$route['alumni'] = "backend/users/alumni";
$route['detailLoker/(:any)'] = "frontend/loker/loker/$1";
$route['editProfil/(:any)'] = "backend/users/editProfil/$1";
$route['updateProfil/(:any)'] = "backend/users/update/$1";
$route['updatePekerjaan/(:any)'] = "backend/users/updatepekerjaan/$1";
$route['detailSurvey/(:any)'] = "backend/survey/survei/$1";
$route['lakukanSurvey/(:any)/(:any)'] = "alumni/dashboard/lakukansurvei/$1/$1";
$route['doSurvey/(:any)/(:any)'] = "alumni/dashboard/dosurvei/$1/$1";
$route['mulaiSurvey/(:any)'] = "alumni/dashboard/mulaiSurvey/$1";

$route['dashboard'] = "alumni/dashboard";
$route['data'] = "alumni/dashboard/data";
$route['pekerjaan'] = "alumni/dashboard/pekerjaan";
$route['loker'] = "alumni/dashboard/loker";
$route['testi'] = "alumni/dashboard/testi";
$route['tracer_study'] = "alumni/dashboard/trace";
$route['ubahpass'] = "alumni/dashboard/ubahpass";
$route['gantipass'] = "alumni/dashboard/gantipass";
$route['cekpass'] = "alumni/dashboard/cekpass";
$route['infoSurvey/(:any)'] = "alumni/dashboard/survei/$1";
$route['tambahTesti/(:any)'] = "alumni/dashboard/tambahtesti/$1";
$route['ubahTesti/(:any)'] = "alumni/dashboard/ubahtesti/$1";
$route['ubahEmail/(:any)'] = "alumni/dashboard/ubahemail/$1";
$route['formpengguna'] = "alumni/form_pengguna";
$route['formpengguna/submitKuesionerPengguna'] = "alumni/form_pengguna/submitKuesionerPengguna";
$route['logout'] = "login/logout";

// bagian admin
$route['admin'] = "backend/dashboard/index";
$route['admin/data'] = "backend/dashboard/data";
$route['admin/loker'] = "backend/dashboard/loker";
$route['admin/bidang-pekerjaan'] = "backend/dashboard/bidang_pekerjaan";
$route['admin/survei'] = "backend/dashboard/survei";
$route['admin/testi'] = "backend/dashboard/testi";
$route['admin/kritik-saran'] = "backend/dashboard/kritiksaran";
$route['admin/report'] = "backend/dashboard/report";
$route['admin/reportDetail/(:any)'] = "backend/dashboard/detailReport/$1";
$route['admin/custom'] = "backend/dashboard/custom";
$route['admin/history'] = "backend/history";
$route['admin/surveiDetail/(:any)'] = "backend/dashboard/surveiDetail/$1";
$route['admin/pertanyaanDetail/(:any)'] = "backend/dashboard/pertanyaanDetail/$1";
$route['profile'] = "backend/dashboard/profile_page";
$route['update-profile'] = "backend/dashboard/profile_upd";
$route['notifikasi'] = "backend/dashboard/notif_page";
$route['updateApp'] = "backend/dashboard/updateApp";
