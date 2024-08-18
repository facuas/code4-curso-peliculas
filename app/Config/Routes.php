<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
/*
$routes->get('/update/(:any)', 'Home::update/$1');
$routes->get('/update/(:any)/(:num)', 'Home::update/$1/$2');

/////////////////////////////////////////////////////////////////

$routes->get('pelicula','Pelicula::index');
$routes->get('pelicula/new','Pelicula::create');
$routes->get('pelicula/edit/(:num)','Pelicula::edit/$1');*/

$routes->group('dashboard',function($routes){
    $routes->presenter('pelicula',['controller' => 'Dashboard\Pelicula']);
    //$routes->presenter('pelicula', ['as' =>'peli']);
    //$routes->presenter('categoria');
    //$routes->presenter('categoria',['only'=>['index','new','creatre']]);
    $routes->presenter('categoria',['except'=>['show'],'controller' => 'Dashboard\Categoria' ]);
    //$routes->get('test','Pelicula::test',['as' =>'pelicula.test']);
    //$routes->get('test/(:num)/(:num)','Pelicula::test/$1/$2',['as' =>'test']);


});

