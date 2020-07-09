<?php

function my_autoloader($class) {
    $class = str_replace('App\\', '', $class);
    
    $file = '../src/' . $class . '.php';

    if (file_exists($file)) {
        include $file;
    }
}

spl_autoload_register('my_autoloader');