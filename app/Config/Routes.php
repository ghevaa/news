<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Berita::index');
$routes->get('/berita', 'Berita::index');
$routes->get('/berita/detail', 'Berita::detail');
$routes->get('/profile', 'Berita::profile');
