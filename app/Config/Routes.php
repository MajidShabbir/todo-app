<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'TodoController::index');
$routes->post('/store', 'TodoController::store');
$routes->get('/delete/(:num)', 'TodoController::delete/$1');
$routes->get('/toggle/(:num)', 'TodoController::toggle/$1');
$routes->get('/edit/(:num)', 'TodoController::edit/$1');
$routes->post('/update/(:num)', 'TodoController::update/$1');

$routes->get('/register', 'AuthController::register');
$routes->post('/register', 'AuthController::store');

$routes->get('/login', 'AuthController::login');
$routes->post('/login', 'AuthController::auth');

$routes->get('/logout', 'AuthController::logout');
