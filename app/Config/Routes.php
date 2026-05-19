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

$routes->get('admin/dashboard', 'AdminController::dashboard');
$routes->get('admin/tasks', 'AdminController::tasks');
$routes->get('admin/users', 'AdminController::users');

$routes->get('/profile', 'ProfileController::index');
$routes->get('/profile/edit', 'ProfileController::edit');
$routes->post('/profile/update', 'ProfileController::update');
$routes->get('/profile/password', 'ProfileController::password');
$routes->post('/profile/password/update', 'ProfileController::updatePassword');
$routes->get('/profile/delete', 'ProfileController::deleteAccount');



$routes->get('admin/profile', 'AdminProfileController::index');
$routes->get('admin/profile/edit', 'AdminProfileController::edit');
$routes->post('admin/profile/update', 'AdminProfileController::update');
$routes->get('admin/profile/password', 'AdminProfileController::password');
$routes->post('admin/profile/password/update', 'AdminProfileController::updatePassword');
$routes->get('admin/profile/delete', 'AdminProfileController::deleteAccount');


$routes->get('admin/users', 'AdminController::users');
$routes->get('admin/user/edit/(:num)', 'AdminController::editUser/$1');
$routes->post('admin/user/update/(:num)', 'AdminController::updateUser/$1');
$routes->get('admin/user/delete/(:num)', 'AdminController::deleteUser/$1');

