<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Controller_Movimientos extends Controller
{

    public function listar()
    {
        return
            view('view_web_header') .
            view('view_movimientos_listar') .
            view('view_web_footer');
    }
}
