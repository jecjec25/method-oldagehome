<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 $routes->match(['GET', 'POST'], 'LoginController/loginAuth','LoginController::loginAuth');
 $routes->get('signin', 'LoginController::index');
 $routes->get('/', 'ViewController::home');
 $routes->get('/contact', 'ViewController::contact');
 $routes->get('/eligibility', 'ViewController::eligability');
 $routes->get('/about', 'ViewController::about');
 $routes->get('/rules', 'ViewController::rules');
 $routes->get('/services', 'ViewController::service');
 $routes->match(['GET', 'POST'],'UserController/register', 'UserController::save');
 $routes->get('/register', 'UserController::register');

$routes->get('/signin', 'Home::try');
$routes->get('/', 'ViewController::home');
$routes->get('/contact', 'ViewController::contact');
$routes->match(['GET', 'POST'],'ContactController/contact', 'ContactController::submit');
$routes->get('/eligibility', 'ViewController::eligability');
$routes->get('/about', 'ViewController::about');
$routes->get('/rules', 'ViewController::rules');
$routes->get('/services', 'ViewController::service');
$routes->get('/products', 'ViewController::products');
$routes->match(['GET', 'POST'],'UserController/register', 'UserController::save');
$routes->get('/register', 'UserController::register');
$routes->get('/products', 'ProductsController::products');
$routes->get('/dash', 'ViewController::dash');
$routes->get('/search', 'ViewController::search');
$routes->get('/rule', 'ViewController::rule');
$routes->get('/eligibility', 'ViewController::eligibility');
$routes->get('/aboutus', 'ViewController::aboutus');
$routes->get('/contactus', 'ViewController::contactus');
$routes->get('/reports', 'ViewController::reports');
$routes->get('/addservices', 'ViewController::addservices');
$routes->get('/manageservices', 'ViewController::manageservices');