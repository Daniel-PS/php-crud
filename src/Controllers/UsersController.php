<?php

namespace App\Controllers;

class UsersController {
    public function index()
    {
        dd('FUNCIONOU');
        $users = User::getAll();

        view('users/list.php', [
            'users' => $users
        ]);
    }
}