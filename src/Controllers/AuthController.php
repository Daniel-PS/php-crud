<?php

namespace App\Controllers;

use App\Session;
use App\User;

class AuthController
{
    public function login()
    {
        $errors = Session::get('errors');
        Session::clear('errors');

        showView('login/login.php', [
            'errors' => $errors,
        ]);
    }

    public function doLogin()
    {
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

        redirect('/saints');
    }

    private function handleInvalidLogin()
    {
        Session::set('errors', [
            'login' => 'Dados inválidos'
        ]);

        redirect('saints/login');
    }

    public function doRegister()
    {
        $user = new User();
        $user->setName($_POST['name']);
        $user->setEmail($_POST['email']);
        $user->setPassword($_POST['password']);

        $user->save();
    }
}