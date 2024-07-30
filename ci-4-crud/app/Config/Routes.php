<?php

use CodeIgniter\Router\RouteCollection;
use Config\Services;

/**
 * @var RouteCollection $routes
 */

$routes = Services::routes();

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

$routes->get('/', 'Home::index');

$routes->group('api', function ($routes) {
  $routes->get('projects', 'Project::index');
  $routes->get('projects/(:num)', 'Project::show/$1');
  $routes->post('projects', 'Project::create');
  $routes->put('projects/(:num)', 'Project::update/$1');
  $routes->delete('projects/(:num)', 'Project::delete/$1');
});

if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
  require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
