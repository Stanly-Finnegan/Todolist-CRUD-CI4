<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/signIn', 'SignInController::signIn');
$routes->post('/signUp', 'SignUpController::signUp');
$routes->post('/signOut', 'AuthenticationController::tokenDelete');
$routes->post('/authToken', 'AuthenticationController::tokenValidate');
$routes->post('/addList', 'HomeController::addList');
$routes->post('/fetchData', 'HomeController::fetchData');
$routes->post('/deleteData', 'HomeController::deleteData');
$routes->post('/editData', 'HomeController::editData');
