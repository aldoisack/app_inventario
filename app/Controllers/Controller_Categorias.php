<?php

namespace App\Controllers;

use App\Models\Model_Categorias;
use CodeIgniter\Controller;

class Controller_Categorias extends Controller
{
    public function listar()
    {
        $datos = [
            'categorias' => (new Model_Categorias())->obtener_registros(),
            'modal_crear' => view('view_categorias_modal_crear')
        ];
        return
            view('view_web_header') .
            view('view_categorias_listar', $datos) .
            view('view_web_footer');
    }

    public function guardar()
    {
        $datos = [
            'nombre_categoria' => $this->request->getVar('nombre_categoria'),
        ];
        (new Model_Categorias())->insert($datos);
        $this->response->redirect(base_url('categorias/listar'));
    }
}
