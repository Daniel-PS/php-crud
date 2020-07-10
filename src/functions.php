<?php

function dd(...$args)
{
    echo '<pre>'; var_dump(...$args); exit();
}

function showView($view, $data = [])
{
    extract($data);

    require VIEWS_FOLDER_PATH . '/' . $view;
}

function redirect($uri)
{
    header('Location: /saints/public/' . $uri);
}