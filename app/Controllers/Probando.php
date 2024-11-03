<?php

namespace App\Controllers;

use App\Models\Probando as ModelsProbando;
use CodeIgniter\Controller;

class Probando extends Controller
{

    public function probando()
    {
        $data['datos'] = (new ModelsProbando())->listar();
        return view("probando", $data);
    }

    public function guardar()
    {
        $registro['title'] = $this->request->getVar('title');

        $probando = new ModelsProbando();
        $probando->insert($registro);
    }
}
