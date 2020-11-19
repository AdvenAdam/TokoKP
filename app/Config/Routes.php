<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
// Cassing
$routes->get('/casing/create', 'casing::create');
$routes->get('/casing/tambah', 'casing::tambah');
$routes->get('/casing/edit/(:segment)', 'casing::edit/$1');
$routes->get('/casing/addstok/(:segment)', 'casing::addstok/$1');
$routes->delete('/casing/(:num)', 'casing::delete/$1');
$routes->get('/casing/(:any)', 'casing::detail/$1');
// Memori
$routes->get('/memori/create', 'memori::create');
$routes->get('/memori/tambah', 'memori::tambah');
$routes->get('/memori/edit/(:segment)', 'memori::edit/$1');
$routes->get('/memori/addstok/(:segment)', 'memori::addstok/$1');
$routes->delete('/memori/(:num)', 'memori::delete/$1');
$routes->get('/memori/(:any)', 'memori::detail/$1');
// motherboard
$routes->get('/motherboard/create', 'motherboard::create');
$routes->get('/motherboard/tambah', 'motherboard::tambah');
$routes->get('/motherboard/edit/(:segment)', 'motherboard::edit/$1');
$routes->get('/motherboard/addstok/(:segment)', 'motherboard::addstok/$1');
$routes->delete('/motherboard/(:num)', 'motherboard::delete/$1');
$routes->get('/motherboard/(:any)', 'motherboard::detail/$1');
// procesor
$routes->get('/procesor/create', 'procesor::create');
$routes->get('/procesor/tambah', 'procesor::tambah');
$routes->get('/procesor/edit/(:segment)', 'procesor::edit/$1');
$routes->get('/procesor/addstok/(:segment)', 'procesor::addstok/$1');
$routes->delete('/procesor/(:num)', 'procesor::delete/$1');
$routes->get('/procesor/(:any)', 'procesor::detail/$1');
// psu
$routes->get('/psu/create', 'psu::create');
$routes->get('/psu/tambah', 'psu::tambah');
$routes->get('/psu/edit/(:segment)', 'psu::edit/$1');
$routes->get('/psu/addstok/(:segment)', 'psu::addstok/$1');
$routes->delete('/psu/(:num)', 'psu::delete/$1');
$routes->get('/psu/(:any)', 'psu::detail/$1');
// vga
$routes->get('/vga/create', 'vga::create');
$routes->get('/vga/tambah', 'vga::tambah');
$routes->get('/vga/edit/(:segment)', 'vga::edit/$1');
$routes->get('/vga/addstok/(:segment)', 'vga::addstok/$1');
$routes->delete('/vga/(:num)', 'vga::delete/$1');
$routes->get('/vga/(:any)', 'vga::detail/$1');
// ram
$routes->get('/ram/create', 'ram::create');
$routes->get('/ram/tambah', 'ram::tambah');
$routes->get('/ram/edit/(:segment)', 'ram::edit/$1');
$routes->get('/ram/addstok/(:segment)', 'ram::addstok/$1');
$routes->delete('/ram/(:num)', 'ram::delete/$1');
$routes->get('/ram/(:any)', 'ram::detail/$1');
// pendingin
$routes->get('/pendingin/create', 'pendingin::create');
$routes->get('/pendingin/tambah', 'pendingin::tambah');
$routes->get('/pendingin/edit/(:segment)', 'pendingin::edit/$1');
$routes->get('/pendingin/addstok/(:segment)', 'pendingin::addstok/$1');
$routes->delete('/pendingin/(:num)', 'pendingin::delete/$1');
$routes->get('/pendingin/(:any)', 'pendingin::detail/$1');
// pegawai
$routes->get('/pegawai/create', 'pegawai::create');
$routes->get('/pegawai/edit/(:segment)', 'pegawai::edit/$1');
$routes->delete('/pegawai/(:num)', 'pegawai::delete/$1');
// user
$routes->get('/user/create', 'user::create');
$routes->delete('/user/(:num)', 'user::delete/$1');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
