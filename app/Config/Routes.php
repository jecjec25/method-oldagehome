<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/signin', 'Home::try');
$routes->get('/home', 'ViewController::home');
$routes->get('/contact', 'ViewController::contact');
$routes->get('/eligibility', 'ViewController::eligability');
$routes->get('/about', 'ViewController::about');
$routes->get('/rules', 'ViewController::rules');
$routes->get('/services', 'ViewController::service');
$routes->match(['GET', 'POST'],'UserController/register', 'UserController::save');
$routes->get('/register', 'UserController::register');