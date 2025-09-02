<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Authentication
$routes->get('/login', 'UserAuthController::index');

// Authentication
