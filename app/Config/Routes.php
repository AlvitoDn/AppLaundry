<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('LoginController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Routes For Login & Logout
$routes->get('/login', 'LoginController::index');
$routes->add('plogin', 'LoginController::login');
$routes->get('/logout', 'LoginController::logout');

// Routes for Home
$routes->get('/home','Home::index',['filter'=>'auth']);

// Routes for Pelanggan 
$routes->get('/pelanggan', 'Pelanggan::tampil',['filter'=>'auth']);
$routes->get('/form', 'Pelanggan::form',['filter'=>'auth']);
$routes->add('/spelanggan', 'Pelanggan::save',['filter'=>'auth']);
$routes->get('/pelanggan/delete/(:segment)', 'Pelanggan::delete/$1',['filter'=>'auth']);
$routes->add('/pelanggan/edit/(:segment)', 'Pelanggan::edit/$1',['filter'=>'auth']);

// Routes for Paket 
$routes->get('/paket', 'Paket::tampil',['filter'=>'auth']);
$routes->get('/fpaket', 'Paket::form',['filter'=>'auth']);
$routes->get('/paket/delete/(:segment)', 'Paket::delete/$1',['filter'=>'auth']);
$routes->add('/paket/edit/(:segment)', 'Paket::edit/$1',['filter'=>'auth']);
$routes->add('/spaket', 'Paket::save',['filter'=>'auth']);

// Routes for User
$routes->get('/user', 'User::tampil',['filter'=>'auth']);
$routes->get('/fuser', 'User::form',['filter'=>'auth']);
$routes->get('/user/delete/(:segment)', 'User::delete/$1',['filter'=>'auth']);
$routes->add('/user/edit/(:segment)', 'User::edit/$1',['filter'=>'auth']);
$routes->add('/suser', 'User::save',['filter'=>'auth']);

// Routes for Transaksi
$routes->get('/transaksi','Transaksi::tampil',['filter'=>'auth']);
$routes->add('/addcart','Transaksi::addcart',['filter'=>'auth']);
$routes->get('/transaksi/hapus/(:segment)','Transaksi::hapusCart/$1',['filter'=>'auth']);
$routes->add('/stransaksi','Transaksi::simpan',['filter'=>'auth']);

// Routes for Laporan
$routes->get('/laporan','Transaksi::laporan',['filter'=>'auth']);
$routes->get('/laporan/ambil/(:segment)','Transaksi::ambil/$1',['filter'=>'auth']);
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
