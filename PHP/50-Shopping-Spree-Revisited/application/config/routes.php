<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Catalogs';
$route['cart'] = 'Catalogs/cart';
$route['cart/destroy/(:any)'] = 'Catalogs/destroy/$1';
$route['cart/Thank-you'] = 'Catalogs/thanks';
$route['cart/billing'] = 'Catalogs/billing';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
