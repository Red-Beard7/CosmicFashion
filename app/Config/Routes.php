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
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override(function () {
    return view('errors/html/error');
});
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'HomeController::index', ['as' => 'home']);;

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

/*
 * Myth:Auth routes file.
 */
$routes->group('', ['namespace' => 'App\Controllers\Auth'], function ($route) {
    // Login/out
    $route->get('login', 'AuthController::login', ['as' => 'login']);
    $route->post('login', 'AuthController::attemptLogin');
    $route->get('logout', 'AuthController::logout');

    // Registration
    $route->get('register', 'AuthController::register', ['as' => 'register']);
    $route->post('register', 'AuthController::attemptRegister');

    // Activation
    $route->get('activate-account', 'AuthController::activateAccount', ['as' => 'activate-account']);
    $route->get('resend-activate-account', 'AuthController::resendActivateAccount', ['as' => 'resend-activate-account']);

    // Forgot/Resets
    $route->get('forgot', 'AuthController::forgotPassword', ['as' => 'forgot']);
    $route->post('forgot', 'AuthController::attemptForgot');
    $route->get('reset-password', 'AuthController::resetPassword', ['as' => 'reset-password']);
    $route->post('reset-password', 'AuthController::attemptReset');
});

$routes->get('/shop', 'ProductController::index');
$routes->get('/cart', 'ProductController::cart');

$routes->get('/help', 'HomeController::showContactUs', ['as' => 'contact_us']);

$routes->group('/user', function ($route) {
    $route->get('profile', 'UserController::index', ['as' => 'user.index']);
    $route->get('account', 'UserController::account', ['as' => 'user.account']);
});

$routes->get('/test', 'HomeController::test', ['as' => 'test']);