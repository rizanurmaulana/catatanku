<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Login::index');
$routes->post('/login', 'Login::auth');
$routes->get('/logout', 'Login::logout');

// Dashboard
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);

// Users
$routes->get('/users', 'Users::index');
$routes->match(['get', 'post'], '/users/create', 'Users::create');
$routes->match(['get', 'post'], '/users/update/(:num)', 'Users::update/$1');
$routes->get('/users/delete/(:num)', 'Users::delete/$1');

// Customer
$routes->get('/customers', 'Customers::index');
$routes->match(['get', 'post'], '/customers/create', 'Customers::create');
$routes->match(['get', 'post'], '/customers/update/(:num)', 'Customers::update/$1');
$routes->get('/customers/delete/(:num)', 'Customers::delete/$1');

// Payments
$routes->get('/customers/(:num)', 'Payment::index/$1');
$routes->match(['get', 'post'], '/customers/(:num)/payment', 'Payment::create/$1');
$routes->match(['get', 'post'], '/payment/(:num)/update', 'Payment::update/$1');
$routes->get('/payment/(:num)/delete', 'Payment::delete/$1');

// Profile
$routes->get('/profile/(:num)', 'Profile::index/$1');
