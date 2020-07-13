<?php

namespace App\Controllers;

use App\Session;
use App\User;

class AuthController
{
    public function create()
    {
        $errors = Session::get('errors');

        Session::clear('errors');
        Session::clear('message');

        showView('login/signup.php', [
            'errors' => $errors
        ]);
    }

    public function store()
    {
        if ($_POST['password'] != $_POST['confirm_password']) {
            $errors = [];
            $errors['confirm_password'] = 'As senhas precisam coincidir.';
            $errors['password'] = 'As senhas precisam coincidir.';
            Session::set('errors', $errors);
            redirect('saints/signup');
        }

        $user = new User();
        $user->setName($_POST['name']);
        $user->setEmail($_POST['email']);
        $user->setPassword($_POST['password']);

        if (! $user->hasValidData()) {
            $errors = $user->getErrors();

            Session::set('errors', $errors);
            Session::set('old_input', $_POST);

            redirect('saints/signup');
            return;
        }

        $user->save();

        $user = User::getByEmail($user->getEmail());
        Session::set('user', $user);
                
        redirectWithMessage('saints', 'Cadastrado com sucesso.');
    }

    public function login()
    {
        if (Session::get('user')) {
            redirect('saints');
        }
        $errors = Session::get('errors');
        Session::clear('errors');

        showView('login/login.php', [
            'errors' => $errors,
        ]);
    }

    public function doLogin()
    {
        if (Session::get('user')) {
            redirect('saints');
        }

        // pegar user pelo email
        $user = User::getByEmail($_POST['email']);

        // se não existir, erro "dados inválidos"
        if (!$user) {
            // dados inválidos
            $this->handleInvalidLogin();
        }

        // se existir, verificar se senha do user é equivalente á digitada
        if (! password_verify($_POST['password'], $user->getPassword())) {
            // se não for, erro "dados inválidos"
            $this->handleInvalidLogin();
        }

        // se for, salvar dados do usuario na session
        Session::set('user', $user);
        Session::set('message', 'Bem-vindo de volta, ' . $user->getName() . '!');

        redirect('saints');
    }

    private function handleInvalidLogin()
    {
        Session::set('errors', [
            'login' => 'Dados inválidos'
        ]);

        redirect('saints/login');
    }

    public function logout()
    {
        Session::destroy();
        redirect('saints');
    }
}