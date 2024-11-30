<?php

namespace App\Controllers;

use App\Models\Model_BienPatrimonial;
use CodeIgniter\Controller;
use App\Models\Model_Oficinas;
use App\Models\Model_Bitacora;
use App\Models\Model_Usuarios;

use function PHPSTORM_META\map;

class Controller_Oficinas extends Controller
{
    public function listar()
    {
        $modelo = new Model_Oficinas();
        $oficinas['oficinas'] = $modelo->obtenerOficinasConTotales();
        return view('view_oficinas_listar', $oficinas);
    }

    // --------------------------------------------------
    // Sección CREAR Y GUARDAR
    // --------------------------------------------------

    public function crear()
    {
        return view('view_oficinas_crear');
    }

    public function guardar()
    {
        $datos['nombre_oficina'] = strtoupper(trim($this->request->getVar('nombre_oficina')));
        $modelo = new Model_Oficinas();
        $modelo->insert($datos);

        // ----- REGISTRANDO BITÁCORA ----

        // id_usuario
        $sesion = session();
        $id_usuario = $sesion->get('id_usuario');

        // Acción
        $accion = 'CREÓ';

        // Registro
        $registro = $modelo->getInsertID();

        // Tabla
        $tabla = 'oficinas';

        // Insertando datos
        $datos = [
            'id_usuario' => $id_usuario,
            'accion' => $accion,
            'registro' => $registro,
            'tabla' => $tabla
        ];
        $modelo_bitacora = new Model_Bitacora();
        $modelo_bitacora->insert($datos);

        $this->response->redirect(base_url('oficinas/listar'));
    }

    // --------------------------------------------------
    // Sección CREAR Y GUARDAR
    // --------------------------------------------------

    public function editar($id_oficina)
    {
        $modelo = new Model_Oficinas();
        $oficina['oficina'] = $modelo->where('id_oficina', $id_oficina)->first();
        return view('view_oficinas_editar', $oficina);
    }

    public function actualizar()
    {
        $datos = [
            'id_oficina'     => $this->request->getVar('id_oficina'),
            'nombre_oficina' => $this->request->getVar('nombre_oficina'),
        ];
        $modelo = new Model_Oficinas();
        $modelo->replace($datos);
        $this->response->redirect(base_url('oficinas/listar'));
    }

    // --------------------------------------------------
    // Sección EXTRA
    // --------------------------------------------------

    public function detalle($id_oficina, $nombre_oficina)
    {
        // Obteniendo los bienes que están en la oficina $id_oficina
        $modelo = new Model_BienPatrimonial();
        $datos['bienes'] = $modelo
            ->select('
            bienes.id_bien,
            bienes.codigo,
            categorias.nombre_categoria,
            bienes.imagen
        ')
            ->join('categorias', 'categorias.id_categoria = bienes.id_categoria') // Corrección del join
            ->where('bienes.oficina_actual', $id_oficina) // Condición correcta
            ->findAll();

        // Pasando el nombre de la oficina a la vista
        $datos['oficina'] = $nombre_oficina;

        // Cargando la vista
        return view('view_oficinas_detalle', $datos);
    }
}
