<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
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

// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Pages::index', ['filter' => 'auth']);

//$routes->get('/komik/create', 'Komik::create');
$routes->get('/login', 'Login::index');

$routes->get('/muser/l_user', 'Muser::l_user', ['filter' => 'auth']);
$routes->get('/muser/c_user', 'Muser::c_user', ['filter' => 'auth']);
$routes->delete('/muser/(:num)', 'Muser::delete/$1');

$routes->get('/mpegawai/l_pegawai', 'Mpegawai::l_pegawai', ['filter' => 'auth']);
$routes->get('/mpegawai/c_pegawai', 'Mpegawai::c_pegawai', ['filter' => 'auth']);
$routes->get('/mpegawai/edit/(:segment)', 'Mpegawai::edit/$1');
$routes->delete('/mpegawai/(:num)', 'Mpegawai::delete/$1');

$routes->get('/mbarang/l_barang', 'Mbarang::l_barang', ['filter' => 'auth']);
$routes->get('/mbarang/c_barang', 'Mbarang::c_barang', ['filter' => 'auth']);
$routes->get('/mbarang/edit/(:segment)', 'Mbarang::edit/$1');
$routes->delete('/mbarang/(:num)', 'Mbarang::delete/$1');

$routes->get('/mtrans/t_lokasi', 'Mtrans::l_lokasi', ['filter' => 'auth']);
$routes->get('/mtrans/c_lokasi', 'Mtrans::c_lokasi', ['filter' => 'auth']);
$routes->get('/mtrans/(:num)', 'Mtrans::dLokasi', ['filter' => 'auth']);

$routes->get('/mpinjam/c_pinjam', 'Mpinjam::c_pinjam', ['filter' => 'auth']);
$routes->get('/mpinjam/cetak/(:num)', 'Mpinjam::cetak/$1', ['filter' => 'auth']);
// $routes->get('/mpinjam/generate/(:num)', 'Mpinjam::generate/$1', ['filter' => 'auth']);

$routes->get('/mpinjam/print/(:num)', 'Mpinjam::print/$1', ['filter' => 'auth']);

$routes->get('getState', 'Dropdown::getState');
$routes->get('getPerDrop', 'Dropdown::getPerDrop');

$routes->get('/mpegawai/(:any)', 'Home::noFound');


/*
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
