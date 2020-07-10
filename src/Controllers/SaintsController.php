<?php

namespace App\Controllers;

use App\Saint;

class SaintsController
{
    public function index()
    {
        $saints = Saint::getAll();

        showView('/index.view.php', [
            'saints' => $saints,
        ]);
    }
}