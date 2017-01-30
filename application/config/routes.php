<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['guests/(:any)'] = 'guests/view/$1';
$route['guests/create'] = 'guests/create';
$route['guests'] = 'guests/index';
$route['default_controller'] = 'guests/index';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
