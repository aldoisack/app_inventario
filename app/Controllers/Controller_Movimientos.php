<?php

namespace App\Controllers;

use App\Models\Model_Movimientos;
use CodeIgniter\Controller;

class Controller_Movimientos extends Controller
{

    public function listar()
    {
        $modelo_movimientos = new Model_Movimientos();
        $movimientos['movimientos'] = $modelo_movimientos->listar_movimientos();

        return view('view_movimientos_listar', $movimientos);
    }
}
