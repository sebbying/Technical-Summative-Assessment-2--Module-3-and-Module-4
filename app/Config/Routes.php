<?php

use CodeIgniter\Config\Services;

$routes = Services::routes();
$routes->setDefaultNamespace('App\\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->setAutoRoute(false);

$routes->get('/', 'Home::index');
$routes->get('about', 'Home::about');
$routes->get('profile', 'Home::profile');
$routes->get('tasks', 'Tasks::index');
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::attempt');
$routes->post('logout', 'Auth::logout');

$routes->group('tasks', ['filter' => 'auth'], static function ($routes) {
    $routes->get('new', 'Tasks::new');
    $routes->post('', 'Tasks::create');
    $routes->get('(:num)/edit', 'Tasks::edit/$1');
    $routes->post('(:num)', 'Tasks::update/$1');
    $routes->post('(:num)/archive', 'Tasks::archive/$1');
});
