<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'bookmarks';
$route['bookmarks/delete/(:any)'] = 'bookmarks/delete/$1';
$route['bookmarks/delete/deleteProcess/(:any)'] = 'bookmarks/deleteProcess/$1';
$route['process'] = 'bookmarks/process';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
