<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Model_BienPatrimonial;
use App\Models\Model_Categorias;
use App\Models\Model_Estados;
use App\Models\Model_Movimientos;
use App\Models\Model_Oficinas;
use App\Models\Model_Bitacora;
use CodeIgniter\Model;

use function PHPSTORM_META\map;

class Controller_BienPatrimonial extends Controller
{
    public function listar()
    {
        $modelo = new Model_BienPatrimonial();
        $bienes['bienes'] = $modelo->obtener_bienes_con_categoria();
        return view('view_bienes_listar', $bienes);
    }

    // --------------------------------------------------
    // Sección "CREAR RÁPIDO"
    // --------------------------------------------------

    public function crear_rapido()
    {
        $modelo = new Model_Categorias();
        $categorias['categorias'] = $modelo->findAll();
        return view('view_bienes_crear_rapido', $categorias);
    }

    public function guardar_rapido()
    {
        // Captura los datos de los inputs como arrays
        $categorias = $this->request->getVar('categoria');
        $codigos    = $this->request->getVar('codigo');

        // Recorre el array y guarda en la base de datos
        foreach ($categorias as $index => $categorias) {
            $datos = [
                'id_categoria' => strtoupper(trim($categorias)),
                'codigo'       => strtoupper(trim($codigos[$index])),
                'imagen'       => '',
            ];
            $modelo = new Model_BienPatrimonial();
            $modelo->insert($datos);

            // ----- REGISTRANDO MOVIMIENTO -----

            $modelo_oficinas = new Model_Oficinas();
            $oficina = $modelo_oficinas->where('nombre_oficina', 'OTI')->first();
            $id_oficina = $oficina['id_oficina'];

            $sesion = session();
            $id_usuario = $sesion->get('id_usuario');

            $datos['id_bien']            = $modelo->getInsertID();
            $datos['id_tipo_movimiento'] = '1';
            $datos['oficina_origen']     = $id_oficina; // OTI
            $datos['oficina_destino']    = $id_oficina; // OTI
            $datos['id_usuario']         = $id_usuario;

            $modelo_movimientos = new Model_Movimientos();
            $modelo_movimientos->insert($datos);

            // ----- REGISTRANDO BITÁCORA ----

            // id_usuario
            $sesion = session();
            $id_usuario = $sesion->get('id_usuario');

            // Acción
            $accion = 'CREÓ';

            // Registro
            $registro = $modelo->getInsertID();

            // Tabla
            $tabla = 'bienes';

            // Insertando datos
            $datos = [
                'id_usuario' => $id_usuario,
                'accion' => $accion,
                'registro' => $registro,
                'tabla' => $tabla
            ];
            $modelo_bitacora = new Model_Bitacora();
            $modelo_bitacora->insert($datos);
        }

        // Redireccionando
        return $this->response->redirect(base_url('bienes/listar'));
    }

    // --------------------------------------------------
    // Sección "CREAR DETALLADO"
    // --------------------------------------------------

    public function crear_detallado()
    {
        $modelo_categorias = new Model_Categorias();
        $modelo_oficinas   = new Model_Oficinas();
        $modelo_estados    = new Model_Estados();

        $datos = [
            'categorias' => $modelo_categorias->findAll(),
            'oficinas'   => $modelo_oficinas->findAll(),
            'estados'    => $modelo_estados->findAll(),
        ];

        return view('view_bienes_crear_detallado', $datos);
    }

    public function guardar_detallado()
    {
        // ----- REGISTRANDO BIEN -----

        // Gestionando la imagen
        $archivo_imagen = $this->request->getFile('imagen');
        $nombre_imagen  = $archivo_imagen->getRandomName();
        $archivo_imagen->move('../public/uploads', $nombre_imagen);


        // Registrando datos
        $datos = [
            'id_categoria'       => $this->request->getVar('id_categoria'),
            'codigo'             => $this->request->getVar('codigo'),
            'oficina_actual'     => $this->request->getVar('oficina'),
            'id_estado'          => $this->request->getVar('estado'),
            'imagen'             => $nombre_imagen,
        ];

        $modelo = new Model_BienPatrimonial();
        $modelo->insert($datos);

        // ----- REGISTRANDO MOVIMIENTO -----

        $modelo_oficinas = new Model_Oficinas();
        $oficina = $modelo_oficinas->where('nombre_oficina', 'OTI')->first();
        $id_oficina = $oficina['id_oficina'];

        $sesion = session();
        $id_usuario = $sesion->get('id_usuario');

        $datos['id_bien']            = $modelo->getInsertID();
        $datos['id_tipo_movimiento'] = '1';
        $datos['oficina_origen']     = $this->request->getVar('oficina');
        $datos['oficina_destino']    = $id_oficina;
        $datos['id_usuario']         = $id_usuario;

        $modelo = new Model_Movimientos();
        $modelo->insert($datos);


        // Redireccionando
        return $this->response->redirect(base_url('bienes/listar'));
    }

    // --------------------------------------------------
    // Sección "DETALLE"
    // --------------------------------------------------

    public function detalle($id_bien)
    {
        $modelo = new Model_BienPatrimonial();
        $bien['bien'] = $modelo->obtener_detalle($id_bien);
        return view('view_bienes_detalle', $bien);
    }

    // --------------------------------------------------
    // Sección "EDITAR"
    // --------------------------------------------------

    public function editar($id_bien)
    {
        $modelo_bienes     = new Model_BienPatrimonial();
        $modelo_categorias = new Model_Categorias();
        $modelo_oficinas   = new Model_Oficinas();
        $modelo_estados    = new Model_Estados();

        $datos = [
            'bien'       => $modelo_bienes->obtener_detalle($id_bien),
            'categorias' => $modelo_categorias->findAll(),
            'oficinas'   => $modelo_oficinas->findAll(),
            'estados'    => $modelo_estados->findAll(),
        ];

        return view('view_bienes_editar', $datos);
    }

    public function actualizar()
    {
        // Gestionando la imagen
        if ($this->request->getFile('imagen')->isValid()) {
            $archivo_imagen = $this->request->getFile('imagen');
            $nombre_imagen  = $archivo_imagen->getRandomName();
            $archivo_imagen->move('../public/uploads', $nombre_imagen);
        } else {
            $nombre_imagen = '';
        }


        // Registrando datos
        $id_bien = $this->request->getVar('id_bien');
        $id_categoria = $this->request->getVar('id_categoria');
        $id_oficina   = $this->request->getVar('oficina_actual');
        $datos = [
            'id_categoria'        => $id_categoria,
            'codigo'              => $this->request->getVar('codigo'),
            'oficina_actual'      => $id_oficina,
            'id_estado'           => $this->request->getVar('estado'),
            'fecha_hora_registro' => $this->request->getVar('fecha') . ' ' . $this->request->getVar('hora') . date(':s'),
            'imagen'              => $nombre_imagen,
        ];


        $modelo = new Model_BienPatrimonial();
        $modelo->update($id_bien, $datos);

        // ----- REGISTRANDO BITÁCORA ----

        // id_usuario
        $sesion = session();
        $id_usuario = $sesion->get('id_usuario');

        // Acción
        $accion = 'EDITÓ';

        // Registro
        $registro = $id_bien;

        // Tabla
        $tabla = 'bienes';

        // Insertando datos
        $datos = [
            'id_usuario' => $id_usuario,
            'accion' => $accion,
            'registro' => $registro,
            'tabla' => $tabla
        ];
        $modelo_bitacora = new Model_Bitacora();
        $modelo_bitacora->insert($datos);

        // Redireccionando
        $this->response->redirect(base_url('bienes/listar'));
    }

    // --------------------------------------------------
    // Sección EXTRAS
    // --------------------------------------------------

    public function transferir()
    {
        $modelo = new Model_BienPatrimonial();

        // Gestionando la imagen (capturar y mover)
        $archivo_imagen = $this->request->getFile('imagen');
        $nombre_imagen  = $archivo_imagen->getRandomName();
        $archivo_imagen->move('../public/uploads', $nombre_imagen);

        // ID del bien a actualizar
        $id_bien = $this->request->getVar('id_bien');

        ##############################################################
        ###### Este código servirá para registrar el movimiento ######
        $bien           = $modelo->where('id_bien', $id_bien)->first();
        $oficina_origen = $bien['oficina_actual'];
        $id_usuario     = session()->get('id_usuario');
        ##############################################################

        $oficina_destino = $this->request->getVar('oficina');

        // Capturando los datos del formulario
        $oficina_actual['oficina_actual'] = $oficina_destino;
        $modelo->update($id_bien, $oficina_actual);

        // ----- REGISTRANDO MOVIMIENTO -----

        $datos = [
            'id_bien'            => $id_bien,
            'id_tipo_movimiento' => '2',
            'oficina_origen'     => $oficina_origen,
            'oficina_destino'    => $oficina_destino,
            'imagen'             => $nombre_imagen,
            'id_usuario'         => $id_usuario
        ];

        $modelo = new Model_Movimientos();
        $modelo->insert($datos);

        // ----- REGISTRANDO BITÁCORA ----

        // id_usuario
        $sesion = session();
        $id_usuario = $sesion->get('id_usuario');

        // Acción
        $accion = 'TRANSFIRIÓ';

        // Registro
        $registro = $id_bien;

        // Tabla
        $tabla = 'bienes';

        // Insertando datos
        $datos = [
            'id_usuario' => $id_usuario,
            'accion' => $accion,
            'registro' => $registro,
            'tabla' => $tabla
        ];
        $modelo_bitacora = new Model_Bitacora();
        $modelo_bitacora->insert($datos);

        // Redireccionando
        return $this->response->redirect(base_url('categorias/listar'));
    }

    public function movimientos($id_bien)
    {
        $modelo = new Model_Movimientos();
        $movimientos['movimientos'] = $modelo->obtener_movimientos($id_bien);
        return view('view_bienes_movimientos', $movimientos);
    }

    public function buscar_imagen($imagen)
    {
        // Ruta completa a la imagen en la carpeta public/uploads
        $path = FCPATH . 'uploads/' . $imagen;

        // Verificar si la imagen existe
        if (file_exists($path)) {
            // Obtener los detalles de la imagen
            $file = file_get_contents($path);

            // Establecer las cabeceras apropiadas para servir una imagen
            $this->response->setHeader('Content-Type', mime_content_type($path));

            // Devolver la imagen como respuesta
            return $this->response->setBody($file);
        } else {
            // Si la imagen no existe, devolver una respuesta 404
            return redirect()->to('/404');
        }
    }
}
