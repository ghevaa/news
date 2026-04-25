<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Berita::index');
$routes->get('/berita/(:num)', 'Berita::detail/$1');
$routes->get('/profile', 'Berita::profile');
