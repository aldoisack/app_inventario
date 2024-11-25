<?php

namespace App\Controllers;

use App\Models\Model_BienPatrimonial;
use CodeIgniter\CLI\Console;

class Home extends BaseController
{
    public function index(): string
    {
        return view('view_web_main');
    }

    public function transferir()
    {
        // Gestionando la imagen (capturar y mover)
        $archivo_imagen = $this->request->getFile('imagen');
        $nombre_imagen  = $archivo_imagen->getRandomName();
        $archivo_imagen->move('../public/uploads', $nombre_imagen);

        // ID del bien a actualizar
        $id_bien = $this->request->getVar('id_bien');

        // Capturando los datos del formulario
        $datos = [
            'oficina_actual' => $this->request->getVar('oficina'),
        ];

        // Registrando la información en la base de datos
        $modelo = new Model_BienPatrimonial();
        $modelo->update($id_bien, $datos);

        //Aquí va el código para la tabla movimientos


        // Redireccionando
        return $this->response->redirect(base_url('movimientos/listar'));
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
