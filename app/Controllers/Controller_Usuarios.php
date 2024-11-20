<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Controller_Usuarios extends Controller
{
    public function listar()
    {
        return
            view('view_web_header') .
            view('view_usuarios_listar') .
            view('view_web_footer');
    }

    public function perfil()
    {
        return
            view('view_web_header') .
            view('view_usuarios_perfil') .
            view('view_web_footer');
    }
}
