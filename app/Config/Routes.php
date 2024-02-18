<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 $routes->get('/signup', 'SignupController::index', ['filter'  => 'guestFilter']);
 $routes->match(['get', 'post'], 'store', 'SignupController::store');
 $routes->match(['get', 'post'], 'UserController/loginAuth', 'UserController::loginAuth');
 $routes->get('/signin', 'UserController::index', ['filter'  => 'guestFilter']);
 $routes->get('/contact', 'ViewController::contact');
 $routes->get('/eligibility', 'ViewController::eligability');
 $routes->get('/about', 'ViewController::about');
 $routes->get('/rules', 'ViewController::rules');
 $routes->get('/services', 'ViewController::service');

 $routes->match(['GET', 'POST'],'UserController/register', 'UserController::save');
$routes->get('/logout', 'UserController::logout',['filter'  => 'authGuard']);


$routes->get('/signin', 'Home::try');
$routes->get('/', 'ViewController::home',  ['filter'  => 'guestFilter']);
$routes->get('/contact', 'ViewController::contact');
$routes->match(['GET', 'POST'],'ContactController/contact', 'ContactController::submit');
$routes->get('/eligibility', 'ViewController::eligability');
$routes->get('/about', 'ViewController::about', ['filter'  => 'authGuard']);
$routes->get('/rules', 'ViewController::rules', ['filter'  => 'authGuard']);
$routes->get('/services', 'ViewController::service', ['filter'  => 'authGuard']);
$routes->get('/products', 'ViewController::products', ['filter'  => 'guestFilter']);
$routes->match(['GET', 'POST'],'UserController/register', 'UserController::save');
$routes->get('/register', 'UserController::register');
$routes->get('/products', 'ProductsController::products', ['filter'  => 'authGuard']);
$routes->get('/dashboard', 'ViewController::dash', ['filter'  => 'authGuard']);
$routes->get('/search', 'ViewController::search');
$routes->get('/searchs', 'ViewController::searchs');
$routes->get('/rule', 'ViewController::rule');
$routes->get('/eligibility', 'ViewController::eligibility');
$routes->get('/aboutus', 'ViewController::aboutus');
$routes->get('/contactus', 'ViewController::contactus');
$routes->get('/reports', 'ViewController::reports');
$routes->get('/list', 'HomeController::index');
$routes->get('/create', 'ViewController::create');
$routes->post('/submit', 'ViewController::store');

$routes->get('/delete/(:num)', 'HomeController::delete/$1');
$routes->get('/adddetails', 'ViewController::adddetails');
$routes->get('/details', 'HomeController::details');
$routes->post('/submit', 'HomeController::store');
$routes->get('/manageservices', 'ViewController::manageservices');
$routes->get('/managescdetails', 'ViewController::managescdetails');
$routes->get('/unreadq', 'ViewController::unreadq');
$routes->get('/readenq', 'ViewController::readenq');
$routes->get('/manageproduct', 'ViewController::manageproduct');
$routes->get('/addproduct', 'ViewController::addproduct');
$routes->get('/editscdetails', 'ViewController::editscdetails');
$routes->get('/editproduct', 'ViewController::editproduct');
$routes->post('/save', 'NewController::save');
$routes->get('/test', 'NewController::test');
$routes->put('/update/(:num)', 'NewController::update/$1');
$routes->put('/submit', 'NewController::submit');
$routes->post('/update/(:num)', 'NewController::updates/$1');
$routes->get('/edit/(:num)', 'NewController::edit/$1');
$routes->get('/show', 'NewController::show');
$routes->post('/saved', 'NewController::saved');