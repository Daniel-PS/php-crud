<?php

use App\Session;

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
    exit();
}

function handleUploadedFile($file_key, $old_photo = '')
{
    if ($old_photo) {
        unlink(PUBLIC_UPLOADS_FOLDER_PATH . '/' . $old_photo);
    }

    $target_file = PUBLIC_UPLOADS_FOLDER_PATH . '/' . $_FILES[$file_key]['name'];
    move_uploaded_file($_FILES[$file_key]['tmp_name'], $target_file);
}

function deletePhoto($old_photo)
{
    unlink(PUBLIC_UPLOADS_FOLDER_PATH . '/' . $old_photo['photo']);
}

function h($name, $quotes = ENT_QUOTES)
{
    return htmlspecialchars($name, $quotes);
}

function dateFormat($value) {
    $new_date = DateTime::createFromFormat('Y-m-d', $value);
    return $value= $new_date->format('d/m/Y');
}

function redirectWithMessage($uri, $message) {
    Session::set('message', $message);
    redirect($uri);
}

function old($key) {
    $old_input = Session::get('old_input');

    if (empty($old_input[$key])) {
        return null;
    }
    return h($old_input[$key]);
}