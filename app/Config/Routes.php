<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/tambah', 'Home::tambah');
$routes->post('/tambah', 'Home::tambahProduk');
$routes->get('/edit/(:num)', 'Home::edit/$1');
$routes->post('/edit', 'Home::editProduk');
$routes->get('/delete/(:num)', 'Home::delete/$1');
