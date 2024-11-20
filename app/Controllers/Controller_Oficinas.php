<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Model_Oficinas;

class Controller_Oficinas extends Controller
{
    public function listar()
    {
        $datos = [
            'oficinas'     => (new Model_Oficinas())->obtener_registros(),
            'modal_crear'  => view('view_oficinas_modal_crear'),
            'modal_editar' => view('view_oficinas_modal_editar'),
        ];
        return
            view('view_web_header') .
            view('view_oficinas_listar', $datos) .
            view('view_web_footer');
    }

    public function guardar()
    {
        $datos['nombre_oficina'] = $this->request->getVar('nombre_oficina');
        (new Model_Oficinas())->insert($datos);
        $this->response->redirect(base_url('oficinas/listar'));
    }
}
