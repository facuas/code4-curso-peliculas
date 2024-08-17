<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 *//*
$routes->get('/', 'Home::index');
$routes->get('/update/(:any)', 'Home::update/$1');
$routes->get('/update/(:any)/(:num)', 'Home::update/$1/$2');

/////////////////////////////////////////////////////////////////

$routes->get('pelicula','Pelicula::index');
$routes->get('pelicula/new','Pelicula::create');
$routes->get('pelicula/edit/(:num)','Pelicula::edit/$1');*/

$routes->presenter('pelicula');