<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->resource('deleteData', ['placeholder' => '(:uuid)']);

$routes->get('/', 'Home::index');
$routes->post('/signIn', 'SignInController::signIn');
$routes->post('/signUp', 'SignUpController::signUp');
$routes->delete('/signOut', 'AuthenticationController::tokenDelete');
$routes->get('/authToken', 'AuthenticationController::tokenValidate');
$routes->post('/addList', 'HomeController::addList');
$routes->post('/fetchData', 'HomeController::fetchData');
$routes->delete('/deleteData/(:segment)', 'HomeController::deleteData/$1');
$routes->post('/editData', 'HomeController::editData');
$routes->put('/updateData', 'HomeController::updateData');
