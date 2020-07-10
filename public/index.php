<?php

require_once '../src/functions.php';
require_once '../src/autoload.php';

define('VIEWS_FOLDER_PATH', realpath('../views'));


$url = isset($_GET['url']) ? $_GET['url'] : '';
$url = '/' . $url;

$routes = [
    'GET|/saints' => 'App\Controllers\SaintsController@index',
    'GET|/saints/show' => 'App\Controllers\SaintsController@show',

    'GET|/saints/register' => 'App\Controllers\SaintsController@create',
    'POST|/saints/register' => 'App\Controllers\SaintsController@store',
    
    'GET|/users/edit' => 'App\Controllers\SaintsController@edit',
    'POST|/users/edit' => 'App\Controllers\SaintsController@update',

    'GET|/saints/delete' => 'App\Controllers\SaintsController@delete',
];

// dd($_SERVER['REQUEST_METHOD'] .'|'. $url);

$fullUrl = $_SERVER['REQUEST_METHOD'] .'|'. $url;

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
