<?php

namespace App\Controllers;

use App\Models\Model_Categorias;
use App\Models\Model_Usuarios;
use CodeIgniter\Controller;

class Controller_Categorias extends Controller
{
    public function listar()
    {
        $datos = [
            'categorias'    => (new Model_Categorias())->obtener_registros(),
            'modal_crear'   => view('view_categorias_modal_crear'),
            'modal_editar'  => view('view_categorias_modal_editar'),
            'modal_detalle' => view('view_categorias_modal_editar'),
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
            'stock' => '0',
        ];
        (new Model_Categorias())->insert($datos);
        $this->response->redirect(base_url('categorias/listar'));
    }
    public function actualizar()
    {
        $datos = [
            'id_categoria'     => $this->request->getVar('id_categoria'),
            'nombre_categoria' => $this->request->getVar('nombre_categoria'),
        ];
        $modelo = new Model_Categorias();
        $modelo->replace($datos);
        $this->response->redirect(base_url('categorias/listar'));
    }
}
