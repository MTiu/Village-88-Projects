<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'contacts';
$route['contacts/show/(:any)'] = 'contacts/show/$1';
$route['contacts/edit/(:any)'] = 'contacts/edit/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
