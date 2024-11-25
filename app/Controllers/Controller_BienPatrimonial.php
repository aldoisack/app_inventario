<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Model_BienPatrimonial;
use App\Models\Model_Categorias;
use App\Models\Model_Estados;
use App\Models\Model_Oficinas;
use CodeIgniter\Model;

class Controller_BienPatrimonial extends Controller
{
    public function listar()
    {
        $listas = [
            'oficinas'   => (new Model_Oficinas())->obtener_registros(),
            'categorias' => (new Model_Categorias())->obtener_registros(),
            'estados'    => (new Model_Estados())->obtener_registros(),
        ];

        $data = [
            'bienes'                => (new Model_BienPatrimonial())->obtener_registros(),
            'modal_crear_rapido'    => view('view_bienes_modal_crear_rapido', $listas),
            'modal_crear_detallado' => view('view_bienes_modal_crear_detallado', $listas),
            'modal_detalle'         => view('view_bienes_modal_detalle'),
            'modal_editar'          => view('view_bienes_modal_editar'),
            'modal_transferencia'   => view('view_bienes_modal_transferencia', $listas),
        ];

        return
            view('view_web_header') .
            view('view_bienes_listar', $data) .
            view('view_web_footer');
    }

    public function guardar_rapido()
    {
        // Obtén los datos de los inputs como arrays
        $categorias            = $this->request->getVar('categoria');
        $codigos_patrimoniales = $this->request->getVar('codigo_patrimonial');

        // Recorre el array
        foreach ($categorias as $index => $categorias) {

            // Guarda los datos
            $datos = [
                'id_categoria' => $categorias,
                'codigo'       => $codigos_patrimoniales[$index],
                'imagen'       => '',
            ];
            $modelo = new Model_BienPatrimonial();
            $modelo->insert($datos);

            // Actualizando stock
            $modelo = new Model_Categorias();
            $modelo->incrementarStock($categorias);
            $modelo = new Model_Oficinas();
            $modelo->incrementarStock(5);

            // Redireccionando
            $this->response->redirect(base_url('bienes/listar'));
        }
    }


    public function guardar_detallado()
    {
        // Gestionando la imagen
        $archivo_imagen = $this->request->getFile('imagen');
        $nombre_imagen  = $archivo_imagen->getRandomName();
        $archivo_imagen->move('../public/uploads', $nombre_imagen);

        // Registrando datos
        $id_categoria = $this->request->getVar('id_categoria');
        $id_oficina   = $this->request->getVar('oficina');
        $datos = [
            'id_categoria'       => $id_categoria,
            'codigo'             => $this->request->getVar('codigo'),
            'oficina_actual'     => $id_oficina,
            'id_estado'          => $this->request->getVar('estado'),
            'imagen'             => $nombre_imagen,
        ];
        $modelo = new Model_BienPatrimonial();
        $modelo->insert($datos);

        // Actualizando stock
        $modelo = new Model_Categorias();
        $modelo->incrementarStock($id_categoria);
        $modelo = new Model_Oficinas();
        $modelo->incrementarStock($id_oficina);

        // Redireccionando
        $this->response->redirect(base_url('bienes/listar'));
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
        $id_categoria = $this->request->getVar('id_categoria');
        $id_oficina   = $this->request->getVar('oficina');
        $datos = [
            'id_bien'             => $this->request->getVar('id_bien'),
            'id_categoria'        => $id_categoria,
            'codigo'              => $this->request->getVar('codigo'),
            'oficina_actual'      => $id_oficina,
            'id_estado'           => $this->request->getVar('estado'),
            'fecha_hora_registro' => $this->request->getVar('fecha') . ' ' . $this->request->getVar('hora') . date(':s'),
            'imagen'              => $nombre_imagen,
        ];


        $modelo = new Model_BienPatrimonial();
        $modelo->replace($datos);



        // Redireccionando
        $this->response->redirect(base_url('bienes/listar'));
    }

    // --------------------------------------------------
    // Sección EXTRAS
    // --------------------------------------------------

    public function transferir($id_bien)
    {
        $modelo = new Model_Oficinas();
        $datos = [
            'id_bien' => $id_bien,
            'oficinas' => $modelo->findAll(),
        ];
        return view('view_transferir', $datos);
    }

    public function transferir_backup()
    {
        $archivo_imagen = $this->request->getFile('imagen');
        $nombre_imagen  = $archivo_imagen->getRandomName();
        $archivo_imagen->move('../public/uploads', $nombre_imagen);

        $id_bien = $this->request->getVar('id_bien');

        $datos = [
            'oficina_actual' => $this->request->getVar('oficina'),
            'imagen'         => $nombre_imagen,
        ];

        $modelo = new Model_BienPatrimonial();
        $modelo->update($id_bien, $datos);

        // Redireccionando
        $this->response->redirect(base_url('main'));
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
