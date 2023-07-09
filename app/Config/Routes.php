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

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->add('login', '\App\Controllers\login_test\loginTest::checkLogin');

$routes->get('/', 'login_test\loginTest::index');
$routes->get('/create_test', 'create_test\createTest::index');
$routes->get('/all_test', 'all_test\allTest::index');
$routes->get('/report_test', 'report_test\reportTest::index');
$routes->get('/daily_checklist', 'daily_checklist\dailyChecklist::index');
$routes->get('/user_profile', 'user\user::index');
$routes->get('/user_profile_edit', 'user\user::viewUserUpdate');
$routes->get('/logout', 'login_test\loginTest::logout');
//$routes->get('/all_test/test_detail/(:num)', 'all_test\allTest::getTestDetail/$1');

//$routes->post('/createTest', 'create_test\createTest::createTest');
//$routes->post('/activeTest', 'create_test\createTest::activeTest');
//$routes->post('/checkResultTest', 'create_test\createTest::checkResultTest');

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
