<?php

require_once '../src/functions.php';
require_once '../src/autoload.php';

$url = isset($_GET['url']) ? $_GET['url'] : '';
$url = '/' . $url;

$routes = [
    'GET|/users' => 'App\Controllers\UsersController@index',
    'GET|/users/edit' => 'App\Controllers\UsersController@editForm',
    'POST|/users/edit' => 'App\Controllers\UsersController@doEdit',

    'GET|/login' => 'App\Controllers\LoginController@loginForm', // Somente se acessar com GET
    'POST|/login' => 'App\Controllers\LoginController@doLogin', // Somente se acessar com POST
];

// dd($_SERVER['REQUEST_METHOD'] .'|'. $url);

$fullUrl = $_SERVER['REQUEST_METHOD'] .'|'. $url;
dd($fullUrl);

// dd($fullUrl);

// if (!array_key_exists($fullUrl, $routes)) {
if (! isset($routes[$fullUrl])) {
    echo '404';
    http_response_code(404);
    exit();
}



$controllerData = explode('@', $routes[$fullUrl]);

$controllerClass = $controllerData[0];
$controllerMethod = $controllerData[1];

$controller = new $controllerClass();
$controller->{$controllerMethod}();

dd( 'PASSOU' );