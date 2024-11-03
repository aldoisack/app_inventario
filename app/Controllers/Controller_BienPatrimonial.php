<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Model_BienPatrimonial;

class Controller_BienPatrimonial extends Controller
{
    public function listar()
    {
        $data = [
            'bienes'                => (new Model_BienPatrimonial())->obtener_registros(),
            'modal_crear_rapido'    => view('view_bienes_modal_crear_rapido'),
            'modal_crear_detallado' => view('view_bienes_modal_crear_detallado'),
            'modal_editar'          => view('view_bienes_modal_editar'),
            'modal_detalle'         => view('view_bienes_modal_detalle'),
        ];

        return
            view('view_web_header') .
            view('view_bienes_listar', $data) .
            view('view_web_footer');
    }

    public function guardar()
    {
        $datos = [
            'descripcion' => $this->request->getVar('descripcion'),
            'codigo_patrimonial' => $this->request->getVar('codigo_patrimonial'),
        ];
        (new Model_BienPatrimonial())->insert($datos);
        $this->response->redirect(base_url('bienes/listar'));
    }
}
