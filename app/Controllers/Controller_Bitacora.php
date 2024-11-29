<?php

namespace App\Controllers;

use App\Models\Model_Bitacora;
use CodeIgniter\Controller;

class Controller_Bitacora extends Controller
{
    public function listar()
    {
        $modelo = new Model_Bitacora();
        $registros['bitacora'] = $modelo
            ->select('bitacora.*, usuarios.nombre')
            ->join('usuarios', 'bitacora.id_usuario = usuarios.id_usuario')
            ->findAll();
        return view('view_bitacora_listar', $registros);
    }
}
