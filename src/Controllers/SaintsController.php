<?php

namespace App\Controllers;

use App\Connection;
use App\Saint;
use App\Session;

class SaintsController
{
    public function index()
    {
        $saints = Saint::getAll();
        $message = Session::get('message');
        Session::clear('message');

        showView('saints/index.php', [
            'saints' => $saints,
            'message' => $message,
        ]);
    }

    public function create()
    {
        $errors = Session::get('errors');
        $old_input = Session::get('old_input') ?? [];

        Session::clear('errors');
        Session::clear('old_input');

        showView('saints/create.php', [
            'errors' => $errors,
            'old_input' => $old_input
        ]);
    }

    public function store()
    {
        $saint = new Saint();
        $saint->setPhoto($_FILES['photo']['name'] ?? '');
        $saint->setName($_POST['name'] ?? '');
        $saint->setCountry($_POST['country'] ?? '');
        $saint->setBirthday($_POST['birthday'] ?? '');
        $saint->setInfo($_POST['info'] ?? '');


        // dd($saint->hasValidData());
        if (! $saint->hasValidData()) {
            $errors = $saint->getErrors();

            Session::set('errors', $errors);
            Session::set('old_input', $_POST);

            redirect('saints/register');
            return;
        }

        $saint->save();
        
        Session::set('message', 'Cadastrado com sucesso.');
        redirect('saints');
    }

    public function edit()
    {
        $id = $_GET['id'];
        $saint = Saint::getById($id);

        $errors = Session::get('errors');
        $old_input = Session::get('old_input');

        Session::clear('errors');
        Session::clear('old_input');

        showView('saints/edit.php', [
            'saint' => $saint,
            'errors' => $errors,
            'old_input' => $old_input
        ]);
        
    }

    public function update()
    {
        $updatedSaint = new Saint();

        $id = $_GET['id'];
        $updatedSaint->setPhoto($_FILES['edited_photo']['name'] ?? '');
        $updatedSaint->setName($_POST['edited_name'] ?? '');
        $updatedSaint->setCountry($_POST['edited_country'] ?? '');
        $updatedSaint->setBirthday($_POST['edited_birthday'] ?? '');
        $updatedSaint->setInfo($_POST['edited_info'] ?? '');
        // $updatedSaint->setOldPhoto($id);

        if (! $updatedSaint->hasValidData()) {
            $errors = $updatedSaint->getErrors();

            Session::set('errors', $errors);
            Session::set('old_input', $_POST);

            redirect('saints/edit?id=' . $id);
            return;
        }

        $updatedSaint->saveUpdate($id);

        Session::set('message', 'Editado com sucesso.');
        redirect('saints');
    }

    public function delete()
    {
        $id = $_GET['id'];
        Saint::delete($id);
        
        Session::set('message', 'Excluído com sucesso.');
        redirect('saints');
    }
}