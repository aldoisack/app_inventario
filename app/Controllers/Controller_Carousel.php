<?php

namespace App\Controllers;

use App\Models\Model_Carousel;
use CodeIgniter\Controller;

class Controller_Carousel extends Controller
{
    public function index()
    {
        $modelo_carousel = new Model_Carousel();
        $imagenes['imagenes'] = $modelo_carousel->findAll();
        return view('view_web_carousel', $imagenes);
        // return view('view_web_carousel');
    }

    public function guardar()
    {
        // Gestionando la imagen
        $archivo_imagen = $this->request->getFile('imagen');
        $nombre_imagen  = $archivo_imagen->getRandomName();
        $archivo_imagen->move('../public/oficina/', $nombre_imagen);

        $imagen['imagen'] = $nombre_imagen;

        $modelo_carousel = new Model_Carousel();
        $modelo_carousel->insert($imagen);

        return $this->response->redirect(base_url('singin'));
    }
}
