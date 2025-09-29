<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Authentication
$routes->get('/auth', 'UserAuthController::index');
$routes->post('/login', 'UserAuthController::login');
$routes->get('/dashboard', 'UserAuthController::dashboard');
$routes->get('/register', 'UserAuthController::register');
$routes->post('/registerAccount', 'UserAuthController::registerAccount');
// Authentication

// Utilities / Testing
$routes->get('/test-email', 'UserAuthController::testEmail');
