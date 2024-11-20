<?php

namespace App\Controllers;

use App\Models\Model_Usuarios;
use CodeIgniter\Controller;

class Controller_Login extends Controller
{
    public function index()
    {
        return view('view_login');
    }

    public function autenticar()
    {
        // Datos del formularios
        $usuario     = $this->request->getVar('usuario');
        $contrasenia = $this->request->getVar('contrasenia');

        // Acceso a la base de datos
        $modelo_usuarios = new Model_Usuarios();
        $usuario_correcto = $modelo_usuarios->verificar($usuario, $contrasenia);

        // Validando credenciales
        if ($usuario_correcto) {
            $this->iniciar_sesion($usuario_correcto);
            return $this->response->redirect(base_url('stock/listar'));
        } else {
            $this->mostrar_error('Usuario o contraseña incorrectos');
        }
    }

    public function logout()
    {
        session()->destroy();
        return $this->response->redirect(base_url('login'));
    }

    private function iniciar_sesion($usuario_correcto)
    {
        $sesion = session();
        $datos = [
            'id_usuario' => $usuario_correcto['id_usuario'],
            'id_rol' => $usuario_correcto['id_rol'],
            'logueado' => true,
        ];
        $sesion->set($datos);
    }

    private function mostrar_error($mensaje)
    {
        session()->setFlashdata('error', $mensaje);
        return $this->response->redirect(base_url());
    }
}
