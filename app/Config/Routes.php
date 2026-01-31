<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Auth::index');
$routes->get('/register', 'Auth::register');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/barang', 'Barang::index');
$routes->get('/auth/logout', 'Auth::logoutProcess');

$routes->post('/auth/register', 'Auth::registerProcess');
$routes->post('/auth/login', 'Auth::loginProcess');

$routes->post('/barang/list', 'Barang::barangList');
$routes->post('/barang/insert', 'Barang::barangInsert');
$routes->post('/barang/edit', 'Barang::barangEdit');
$routes->post('/barang/update', 'Barang::barangUpdate');
$routes->post('/barang/delete', 'Barang::barangDelete');


$routes->post('/dashboard/totalKategori', 'Dashboard::totalKategori');
$routes->post('/dashboard/totalData', 'Dashboard::totalData');

$routes->post('/kategori/list', 'Barang::kategoriList');
