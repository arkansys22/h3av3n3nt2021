<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home/v';
$route['404_override'] = 'Notfound';
$route['translate_uri_dashes'] = FALSE;
$route['aspanel/(:any)'] = "administrator";
$route['petacrawl\.xml'] = "petacrawl";
$route['about'] = "about/v";
$route['price'] = "price/v";
$route['services'] = "menu_1/v";
$route['services/(:any)'] = "menu_1/v_sub/$1";
$route['detail/(:any)'] = "menu_1/v_paket/$1";
$route['testimoni'] = "menu_2/v";
$route['gallery-video'] = "gallery/v";
$route['gallery-foto'] = "gallery/v_foto";
$route['galeri/(:any)'] = "gallery/info/$1";
$route['blogs'] = "blogs/v";
$route['blogs/(:any)'] = "blogs/info/$1";
$route['kontak'] = "kontak/v";
$route['events'] = "partners/v";
