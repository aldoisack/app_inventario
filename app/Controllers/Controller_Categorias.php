<?php

namespace App\Controllers;

use App\Models\Model_BienPatrimonial;
use App\Models\Model_Bitacora;
use App\Models\Model_Categorias;
use App\Models\Model_Oficinas;
use App\Models\Model_Usuarios;
use CodeIgniter\Controller;

class Controller_Categorias extends Controller
{
    public function listar()
    {
        $modelo = new Model_Categorias();
        $categorias['categorias'] = $modelo->obtener_categorias_stock();
        return view('view_categorias_listar', $categorias);
    }

    // --------------------------------------------------
    // Sección AGREGAR / GUARDAR 
    // --------------------------------------------------

    public function crear()
    {
        return view('view_categorias_crear');
    }

    public function guardar()
    {
        $nombre_categoria['nombre_categoria'] = strtoupper(trim($this->request->getVar('nombre_categoria')));
        $modelo = new Model_Categorias();
        $modelo->insert($nombre_categoria);

        // ----- REGISTRANDO BITÁCORA ----

        // id_usuario
        $sesion = session();
        $id_usuario = $sesion->get('id_usuario');

        // Acción
        $accion = 'CREÓ';

        // Registro
        $registro = $modelo->getInsertID();

        // Tabla
        $tabla = 'categorias';

        // Insertando datos
        $datos = [
            'id_usuario' => $id_usuario,
            'accion' => $accion,
            'registro' => $registro,
            'tabla' => $tabla
        ];
        $modelo_bitacora = new Model_Bitacora();
        $modelo_bitacora->insert($datos);

        return $this->response->redirect(base_url('categorias/listar'));
    }

    // --------------------------------------------------
    // Sección EDITAR / ACTUALIZAR 
    // --------------------------------------------------

    public function editar($id_categoria)
    {
        $modelo = new Model_Categorias();
        $categoria['categoria'] = $modelo->find($id_categoria);
        return view('view_categorias_editar', $categoria);
    }

    public function actualizar()
    {
        $id_categoria = $this->request->getVar('id_categoria');
        $nombre_categoria['nombre_categoria'] = strtoupper(trim($this->request->getVar('nombre_categoria')));
        $modelo = new Model_Categorias();
        $modelo->update($id_categoria, $nombre_categoria);

        // ----- REGISTRANDO BITÁCORA ----

        // id_usuario
        $sesion = session();
        $id_usuario = $sesion->get('id_usuario');

        // Acción
        $accion = 'EDITÓ';

        // Registro
        $registro = $id_categoria;

        // Tabla
        $tabla = 'categorias';

        // Insertando datos
        $datos = [
            'id_usuario' => $id_usuario,
            'accion' => $accion,
            'registro' => $registro,
            'tabla' => $tabla
        ];
        $modelo_bitacora = new Model_Bitacora();
        $modelo_bitacora->insert($datos);

        return $this->response->redirect(base_url('categorias/listar'));
    }

    // --------------------------------------------------
    // Sección EXTRA
    // --------------------------------------------------

    public function detalle_categoria($id_categoria)
    {
        $modelo_categorias = new Model_Categorias();
        $modelo_oficinas   = new Model_Oficinas();
        $modelo_bienes     = new Model_BienPatrimonial();

        $categoria = $modelo_categorias->find($id_categoria);

        $oficina    = $modelo_oficinas->where('nombre_oficina', 'OTI')->first();
        $id_oficina = $oficina['id_oficina'];
        $oficinas   = $modelo_oficinas->findAll();

        $bienes = $modelo_bienes
            ->where('id_categoria', $id_categoria)
            ->where('oficina_actual', $id_oficina)
            ->findAll();

        $datos = [
            'categoria' => $categoria,
            'bienes'    => $bienes,
            'oficinas'  => $oficinas,
        ];

        return view('view_categorias_detalle', $datos);
    }

    public function transferir($id_bien, $id_categoria)
    {
        // Modelos para interactuar con la base de datos
        $modelo_bienes     = new Model_BienPatrimonial();
        $modelo_categorias = new Model_Categorias();
        $modelo_oficinas   = new Model_Oficinas();

        // Buscando los registros
        $datos = [
            'bien'      => $modelo_bienes->find($id_bien),
            'oficinas'  => $modelo_oficinas->findAll(),
            'categoria' => $modelo_categorias->find($id_categoria),
        ];

        return view('view_categorias_transferir', $datos);
        // return view('probando', $datos);
    }
}
