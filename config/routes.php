<?php

$routes = new Router;

$routes->get('/', 'PagesController@home');
$routes->get('divers', 'PagesController@divers');

$routes->set404('PagesController@http404');


if (isset($_SESSION['user'])) :

    $routes->get('conducteurs', 'ConducteursController@index');
    $routes->get('conducteurs/(\d+)', 'ConducteursController@show');
    $routes->get('conducteurs/(\d+)/delete', 'ConducteursController@delete');
    $routes->post('conducteurs/save', 'ConducteursController@save');

    $routes->get('associations', 'AssociationsController@index');
    $routes->get('associations/(\d+)', 'AssociationsController@show');
    $routes->get('associations/(\d+)/delete', 'AssociationsController@delete');
    $routes->post('associations/save', 'AssociationsController@save');

    $routes->get('vehicules', 'VehiculesController@index');
    $routes->get('vehicules/(\d+)', 'VehiculesController@show');
    $routes->get('vehicules/(\d+)/delete', 'VehiculesController@delete');
    $routes->post('vehicules/save', 'VehiculesController@save');

    $routes->get('logout', 'UsersController@logout');

else :

    $routes->get('login', 'UsersController@login');
    $routes->post('login', 'UsersController@login');

    $routes->get('signup', 'UsersController@signup');
    $routes->post('signup', 'UsersController@signup');

endif;


$routes->run();