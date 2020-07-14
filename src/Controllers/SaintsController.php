<?php

namespace App\Controllers;

use App\Saint;
use App\Session;

class SaintsController
{
    public function index()
    {
        $user_id = Session::get('user');
        $user_name = (empty($user_id)) ? '' : $user_id->getName();
        $user_id = (empty($user_id)) ? '' : $user_id->getId();
        $saints = Saint::getAllPublic('public');
        $message = Session::get('message');
        Session::clear('message');

        showView('saints/index.php', [
            'saints' => $saints,
            'message' => $message,
            'user_id' => $user_id,
            'user_name' => $user_name
        ]);
    }

    public function show()
    {
        $user = Session::get('user');
        $saints = Saint::getByUser($user->getId());

        $message = Session::get('message');
        Session::clear('message');

        showView('saints/show.php', [
            'saints' => $saints,
            'message' => $message,
        ]);
    }

    public function create()
    {
        $errors = Session::get('errors');
        // $old_input = Session::get('old_input') ?? [];

        Session::clear('errors');

        showView('saints/create.php', [
            'errors' => $errors,
            // 'old_input' => $old_input
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
        $saint->setStatus($_POST['status'] ?? '');


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
        redirect('saints/show');
    }

    public function edit()
    {
        $saint_id = $_GET['id'];
        $user = Session::get('user');
        $saint = Saint::getById($saint_id);

        if (! $saint) {
            redirectWithMessage('saints/show', 'Santo não existe.');
        }

        if (! $user || $saint->getUserId() != $user->getId()){
            redirectWithMessage('saints/show', 'Você não tem permissões para editar este Santo.');
        }

        $errors = Session::get('errors');
        $old_input = Session::get('old_input');

        Session::clear('errors');

        showView('saints/edit.php', [
            'saint' => $saint,
            'errors' => $errors,
            'old_input' => $old_input
        ]);
        
    }

    public function update()
    {
        $saint_id = $_GET['id'];
        $saint = Saint::getById($saint_id);

        if (! $saint) {
            redirectWithMessage('saints/show', 'Santo não existe.');
        }
        
        $user = Session::get('user');
        
        if (! $user || ! $saint->getUserId() == $user->getId()){
            redirectWithMessage('saints/show', 'Você não tem permissões para editar este Santo.');
        }

        $saint->setOldPhoto($saint->getPhoto());
        $saint->setPhoto($_FILES['photo']['name'] ?? '');
        $saint->setName($_POST['name'] ?? '');
        $saint->setCountry($_POST['country'] ?? '');
        $saint->setBirthday($_POST['birthday'] ?? '');
        $saint->setInfo($_POST['info'] ?? '');
        $saint->setStatus($_POST['status'] ?? '');

        // $saint->setOldPhoto($user);
        

        if (! $saint->hasValidData()) {
            $errors = $saint->getErrors();

            Session::set('errors', $errors);
            Session::set('old_input', $_POST);

            redirect('saints/edit?id=' . $saint_id);
            return;
        }

        $saint->saveUpdate();

        redirectWithMessage('saints/show', 'Editado com sucesso.');
    }

    public function delete()
    {
        $id = $_GET['id'];

        $saint = Saint::getById($id);

        if (! $saint) {
            redirectWithMessage('saints/show', 'Santo não existe.');
        }

        $user = Session::get('user');

        if(!$user || $user->getId() != $saint->getUserId()) {
            redirectWithMessage('saints/show', 'Você não tem permissões para deletar este Santo.');
        }
        Saint::delete($id);
        redirectWithMessage('saints', 'Excluído com sucesso.');
    }
}