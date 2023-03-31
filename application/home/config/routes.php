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
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['ai'] = '/ai/ai';
$route['zwhz'] = '/post/index';
$route['msjc'] = '/post/audition';
$route['zw(.+)'] = '/home/index/$1/';
$route['paiming'] = 'paiming/reg/index';
/*$route['paiming'] = 'history/index'; */
$route['paiming/shuju'] = 'paiming/shuju/home';
$route['paiming/shuju/search'] = 'paiming/shuju/search';
$route['paiming/shuju/search(\d+)'] = 'paiming/shuju/search/$1';

$route['paiming/shuju/([a-z]+)'] = 'paiming/shuju/city/$1';
$route['paiming/shuju/([a-z]+)/(.+).php'] = 'paiming/shuju/city/$1/$2';
$route['paiming/shuju/([a-z]+)/((\d+)|([a-z]+))'] = 'paiming/shuju/area/$1/$2';
$route['paiming/shuju/([a-z]+)/((\d+)(.+)|([a-z]+)(.+))'] = 'paiming/shuju/area/$1/$2/$3';
$route['paiming/shuju/(\d+)/(\d+)(.+)'] = 'paiming/shuju/detail/$1/$2';


$route['kscx/home'] = 'home/index';
$route['kscx/home/(\d+)(.+)'] = 'home/index/$1';
$route['kscx/index'] = 'post/index';
$route['kscx/search'] = 'post/search';
$route['kscx/search(\d+)'] = 'post/search/$1';
$route['kscx/duibi'] = 'post/duibi';

$route['kscx/bmtj'] = '/post/stat';
$route['kscx/bmtj/([a-z]+)(.+)'] = '/post/stat/$1/$2';
$route['kscx/bmtj/(\d+)(.+)'] = '/post/stat/$1';

$route['kscx/rank'] = '/post/rank';
$route['kscx/rank(\d+)'] = '/post/rank/$1';
$route['kscx/rank/([a-z]+).php'] = '/post/rank/$1';
$route['kscx/rank(\d+)/([a-z]+).php'] = '/post/rank/$1/$2';
$route['kscx/create_code'] = '/post/create_code';
$route['kscx/sendsms'] = '/post/sendsms';
$route['kscx/audition'] = '/post/audition';
$route['kscx/feedback'] = '/post/feedback';

$route['kscx/([a-z]+)'] = 'post/city/$1';
$route['kscx/([a-z]+)/(.+).php'] = 'post/city/$1/$2';
$route['kscx/([a-z]+)/((\d+)|([a-z]+))'] = 'post/area/$1/$2';
$route['kscx/([a-z]+)/((\d+)(.+)|([a-z]+)(.+))'] = 'post/area/$1/$2/$3';
$route['kscx/(\d+)/(\d+)(.+)'] = 'post/detail/$1/$2';


$route['lscx/home'] = 'history/home';
$route['lscx/home/(\d+)(.+)'] = 'history/home/$1';
$route['lscx/index'] = 'history/index';
$route['lscx/rank'] = 'history/rank';
$route['lscx/cjpm'] = 'history/rank';
$route['lscx/search'] = 'history/search';
$route['lscx/search(\d+)'] = 'history/search/$1';
$route['lscx/([a-z]+)'] = 'history/city/$1';
$route['lscx/([a-z]+)/(.+).php'] = 'history/city/$1/$2';
$route['lscx/([a-z]+)/((\d+)|([a-z]+))'] = 'history/area/$1/$2';
$route['lscx/([a-z]+)/((\d+)(.+)|([a-z]+)(.+))'] = 'history/area/$1/$2/$3';
$route['lscx/(\d+)/(\d+)(.+)'] = 'history/detail/$1/$2';

