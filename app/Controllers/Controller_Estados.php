<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Model_Estados;

class Controller_Estados extends Controller
{
    public function listar()
    {
        $datos = [
            'estados'     => (new Model_Estados())->obtener_registros(),
            'modal_crear' => view('view_estados_modal_crear'),
        ];
        return
            view('view_web_header') .
            view('view_estados_listar', $datos) .
            view('view_web_footer');
    }

    public function guardar()
    {
        $datos = [
            'nombre_estado' => $this->request->getVar('nombre_estado'),
        ];
        (new Model_Estados())->insert($datos);
        $this->response->redirect(base_url('estados/listar'));
    }
}
