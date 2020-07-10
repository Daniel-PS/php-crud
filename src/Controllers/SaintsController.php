<?php

namespace App\Controllers;

use App\Saint;
use App\Session;

class SaintsController
{
    public function index()
    {
        $saints = Saint::getAll();

        showView('saints/index.php', [
            'saints' => $saints,
        ]);
    }

    public function create()
    {
        $errors = Session::get('errors');

        Session::clear('errors');

        showView('saints/create.php', [
            'errors' => $errors,
        ]);
    }

    public function store() {

        $saint = new Saint();
        $saint->setPortrait($_POST['photo']);
        $saint->setCountry($_POST['country']);
        $saint->setBirthday($_POST['birthday']);
        $saint->setInfo($_POST['info']);

        if (! $saint->hasValidData()) {
            $errors = $saint->getErrors();

            Session::set('errors', $errors);

            redirect('saints/register');
            return;
        }

        $saint->save();
    }
}