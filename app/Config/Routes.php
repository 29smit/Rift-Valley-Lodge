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

/*route group*/
$routes->group('',['filter' => 'auth'], function($routes)
{


$routes->get('/dashboard','Home::index');
$routes->get('/logout','Home::logout');
$routes->get('/new_voucher','Home::new_voucher');
$routes->post('/create','VoucherController::create_voucher');
$routes->post('/update/(:num)','VoucherController::update_voucher/$1');
$routes->get('/show','Home::show_voucher');
$routes->post('/delete','VoucherController::delete_voucher');
$routes->post('/revert','VoucherController::revert_voucher');
$routes->get('/get','VoucherController::get_voucher');
$routes->get('/update/(:num)','Home::update_voucher/$1');
$routes->get('/update_room/(:num)','Home::update_room/$1');
$routes->post('/delete_pack','PackageController::delete_pack');
$routes->get('/cancel','Home::show_cancel');
$routes->get('/cancel_voucher','VoucherController::cancel_voucher');
$routes->get('/print/(:num)','Home::print/$1');
$routes->get('/rooms','Home::rooms');
$routes->get('/add_charge','Home::add_charge');
$routes->post('/create_charge','PackageController::add_pack');
$routes->get('/paid','Home::paid');
$routes->get('/panding','Home::panding');
$routes->post('/email','EmailController::index');
$routes->get('/account','Home::account');
$routes->get('/password','Home::password');
$routes->get('/email','Home::email');
$routes->post('/change/(:num)','Home::update_acc/$1');
$routes->post('/change_email/(:num)','Home::update_email/$1');
$routes->post('/change_pass','Home::update_pass');
$routes->post('/update_charge/(:num)','Home::update_charge/$1');
$routes->post('/delete_charge','Home::delete_charge');
$routes->get('/get_charge','Home::get_charge');
$routes->post('/get_booking','Home::get_booking');
$routes->get('/history','Home::history');

   
});

$routes->group('',['filter' => 'logged_in'] ,function($routes)
{

$routes->get('/','LoginController::index');
$routes->get('/login', 'LoginController::index');
$routes->get('/register','RegisterController::index');
$routes->post('/admin','RegisterController::check');
$routes->post('/auth','LoginController::loginAuth');




});
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
