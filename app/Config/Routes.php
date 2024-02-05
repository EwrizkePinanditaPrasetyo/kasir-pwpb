<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
//dashboard
$routes->get('/dashboard', 'DashboardController::index');

//kasir
$routes->get('/kasir', 'KasirController::ambilSemua');

//produk
$routes->get('/produk', 'ProdukController::index');
$routes->get('/produk/tampil', 'ProdukController::ambilSemua');
$routes->get('/produk/edit', 'ProdukController::edit');
$routes->post('/produk/simpan', 'ProdukController::simpan');
$routes->post('/produk/update', 'ProdukController::update');
$routes->post('/produk/delete', 'ProdukController::delete');

//pelanggan
$routes->get('/pelanggan', 'PelangganController::index');
$routes->get('/pelanggan/tampil', 'PelangganController::ambilSemua');
$routes->post('/pelanggan/simpan', 'PelangganController::simpan');
$routes->get('/pelanggan/edit', 'PelangganController::edit');
$routes->post('/pelanggan/update', 'PelangganController::update');
$routes->post('/pelanggan/delete', 'PelangganController::delete');

//user
$routes->get('/user', 'UserController::index');
$routes->get('/user/tampil', 'UserController::ambilSemua');
$routes->post('/user/simpan', 'UserController::simpan');
$routes->get('/user/edit', 'UserController::edit');
$routes->post('/user/update', 'UserController::update');
$routes->post('/user/delete', 'UserController::delete');

//penjualan
$routes->get('/penjualan','PenjualanController::index');