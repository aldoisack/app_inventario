<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Model_Oficinas;

class Controller_Oficinas extends Controller
{
    public function listar()
    {
        $data = [
            'datos' => (new Model_Oficinas())->obtener_registros(),
        ];
        return
            view('view_web_header') .
            view('view_oficinas_listar') .
            view('view_web_footer');
    }
}
