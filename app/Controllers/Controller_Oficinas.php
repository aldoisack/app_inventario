<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Model_Oficinas;

class Controller_Oficinas extends Controller
{
    public function listar()
    {
        $data = [
            'oficinas' => (new Model_Oficinas())->obtener_registros(),
            'modal_crear' => view('view_oficinas_modal_crear')
        ];
        return
            view('view_web_header') .
            view('view_oficinas_listar', $data) .
            view('view_web_footer');
    }

    public function guardar()
    {
        $datos = [
            'nombre' => $this->request->getVar('nombre')
        ];
        (new Model_Oficinas())->insert($datos);

        $es_externo = $this->request->getVar('externo');

        if (!$es_externo) { # "No es externo" = Forma parte de su formulario
            $this->response->redirect(base_url('oficinas/listar'));
        }
    }
}
