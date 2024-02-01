<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'exerciseview';
$route['main/ninja/(:any)'] = 'exerciseview/ninja/$1';
$route['ninja/(:any)'] = 'exerciseview/ninja/$1';
$route['main/world'] = 'exerciseview/world';
$route['world'] = 'exerciseview/world';
$route['users'] = 'exerciseview/users';
$route['create'] = 'exerciseview/create';
$route['users/count'] = 'exerciseview/count';
$route['users/create'] = 'exerciseview/create';
$route['users/reset'] = 'exerciseview/reset';
$route['users/new'] = 'exerciseview/new';
$route['users/mprep'] = 'exerciseview/mprep';
$route['users/say/(:any)/(:any)'] = 'exerciseview/say/$1/$2';
$route['world'] = 'exerciseview/world';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;