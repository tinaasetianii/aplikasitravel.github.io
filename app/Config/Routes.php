<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes(true);

//Load the system routing files first.
//can override as needed.
if(file_exists(SYSTEMPATH.'Config/Routes.php')){
    require SYSTEMPATH.'Config/Routes.php';
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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->add('/Loginuser', 'Loginuser::index');
$routes->add('/Loginuser/register', 'Loginuser::register');
$routes->post('/Loginuser/simpan', 'Loginuser::simpan');
$routes->post('/Loginuser/cek', 'Loginuser::cek');
$routes->add('/Loginuser/exit', 'Loginuser::exit');

$routes->get('wisata','Wisata::index');
$routes->get('wisata/beranda','Wisata::beranda');
$routes->get('wisata/pesan/(:segment)','Wisata::pesan/$1');
$routes->post('wisata/pesan/cek','Wisata::cek');
$routes->post('wisata/pesan/bayar','Wisata::bayar');
$routes->get('wisata/pesan/setatus/(:segment)','Wisata::setatus/$1');

$routes->get('history','History::index');
$routes->get('history/historisetatus','History::historisetatus');
$routes->get('profile','Profile::index');
$routes->get('profile/edit','Profile::edit');
$routes->get('profile/update','Profile::update');



$routes->group('admin',function($routes){
$routes->add('login', 'Admin\Admin::login');
$routes->add('sukses', 'Admin\Admin::sukses');
$routes->add('logout', 'Admin\Admin::logout');

});

// $routes->get('loginuser', 'loginuser::index');
// $routes->get('/login/register', 'Admin\login::register');
// $routes->get('admin/register/simpan', 'Admin\Admin\Register::simpan');

$routes->add('wisata', 'Admin\article\wisata::index');
$routes->post('wisata/save', 'Admin\article\wisata::save');
$routes->get('wisata/edit/(:segment)', 'Admin\article\wisata::edit/$1');
$routes->post('wisata/update', 'Admin\article\wisata::update');
$routes->get('wisata/delete/(:segment)', 'Admin\article\wisata::delete/$1');

$routes->get('petugas','Admin\article\petugas::index');
$routes->get('petugas/add','Admin\article\petugas::add');
$routes->post('petugas/save','Admin\article\petugas::save');
$routes->get('petugas/delete/(:segment)','Admin\article\petugas::delete/$1');
$routes->get('petugas/edit/(:segment)','Admin\article\petugas::edit/$1');
$routes->post('petugas/update','Admin\article\petugas::update');

// $route['default_controller'] = 'login';

// $routes->get('login','Admin\login::index');


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

