<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Controller_Bitacora extends Controller
{
    public function listar()
    {
        return
            view('view_web_header') .
            view('view_bitacora_listar') .
            view('view_web_footer');
    }
}
