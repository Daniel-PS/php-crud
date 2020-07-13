<?php

function my_autoloader($class) {
    $class = str_replace('App\\', '', $class);
    $file = SRC_FOLDER_PATH . '/' . $class . '.php';

    if (file_exists($file)) {
        include $file;
    }
}

spl_autoload_register('my_autoloader');