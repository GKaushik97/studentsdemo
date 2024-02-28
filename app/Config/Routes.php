<?php

use CodeIgniter\Router\RouteCollection;
/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


$routes->get('home', 'Home::index');
$routes->get('home/(:any)', 'Home::$1');
$routes->get('pages', 'Pages::index');
$routes->get('pages/(:any)', 'Pages::$1');

$routes->get('states', 'States::index');
$routes->get('states/(:any)', 'States::$1');
$routes->post('states/(:any)', 'States::$1');

$routes->get('country', 'Country::index');
$routes->get('country/(:any)', 'Country::$1');
$routes->post('country/(:any)', 'Country::$1');

$routes->get('content', 'Content::index');
$routes->get('content/(:any)', 'Content::$1');
$routes->post('content/(:any)', 'Content::$1');

$routes->get('student', 'Student::index');
$routes->get('student/(:any)', 'Student::$1');
$routes->post('student/(:any)', 'Student::$1');

$routes->get('api', 'Api::index');
$routes->get('api/(:any)', 'Api::$1');
$routes->post('api/(:any)', 'Api::$1');
/**
 * Controllers Pages to load
 */ 
// $routes->get('home', 'Home::index');
// $routes->get('pages/(:any)', 'Pages::$1');


/**
 * Project routings
 * AutoRouting is set to false, Every controller needs routing here
 */

// Sample pages
/*$routes->get('content', 'Content::index');
$routes->get('content/(:any)', 'Content::$1');
// $routes->get('content/(:segment)/(:segment)', 'Content::$1/$2');
$routes->get('user', 'User::getIndex');

// Static theme pages
$routes->get('theme', 'Theme::index');
$routes->get('theme/(:any)', 'Theme::$1');*/

// Routing for speaking URLs
// $routes->get('/(:any)', 'Content::page/$1');
