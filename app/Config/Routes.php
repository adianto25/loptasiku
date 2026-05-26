<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');

$routes->post('api/tickets', 'Ticket::create');
$routes->get('api/tickets', 'Ticket::myTickets');

$routes->get('/login', 'Auth::login');
$routes->post('/login/auth', 'Auth::loginAuth');
$routes->get('/register', 'Auth::register');
$routes->post('/register/auth', 'Auth::registerAuth');
$routes->get('/logout', 'Auth::logout');

$routes->get('/admin', 'Admin::index');
$routes->post('/admin/verify/(:num)', 'Admin::verifyTicket/$1');
