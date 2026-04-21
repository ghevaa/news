<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Berita::index');
$routes->get('/berita/(:num)', 'Berita::detail/$1');
$routes->get('/upload', 'Berita::upload');
$routes->post('/upload/process', 'Berita::process_upload');
$routes->get('/profile', 'Berita::profile');
