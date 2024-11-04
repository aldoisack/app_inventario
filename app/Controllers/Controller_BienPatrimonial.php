<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Model_BienPatrimonial;
use App\Models\Model_Oficinas;

class Controller_BienPatrimonial extends Controller
{
    public function listar()
    {
        $oficinas['oficinas'] = (new Model_Oficinas())->obtener_registros();

        $data = [
            'bienes'                => (new Model_BienPatrimonial())->obtener_registros(),
            'modal_crear_rapido'    => view('view_bienes_modal_crear_rapido'),
            'modal_crear_detallado' => view('view_bienes_modal_crear_detallado', $oficinas),
            'modal_editar'          => view('view_bienes_modal_editar'),
            'modal_detalle'         => view('view_bienes_modal_detalle'),
            'modal_transferencia'   => view('view_bienes_modal_transferencia', $oficinas),
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

    public function guardar_detallado()
    {
        $datos = [
            'oficina_origen'     => $this->request->getVar('oficina_origen'),
            'modelo'             => $this->request->getVar('modelo'),
            'codigo_patrimonial' => $this->request->getVar('codigo_patrimonial'),
            'categoria'          => $this->request->getVar('categoria'),
            'estado'             => $this->request->getVar('estado'),
            'fecha'              => $this->request->getVar('fecha'),
            'hora'               => $this->request->getVar('hora'),
            'imagen'             => $this->request->getFile('imagen'),
        ];

        // (new Model_BienPatrimonial())->insert($datos);
        print_r($datos);
        // $this->response->redirect(base_url('bienes/listar'));
    }
}
