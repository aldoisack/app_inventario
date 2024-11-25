<?php

namespace App\Controllers;

use App\Models\Model_Usuarios;
use CodeIgniter\Controller;

class Controller_Login extends Controller
{
    public function index()
    {
        $sesion = session();
        $logueado = $sesion->get('logueado');

        if ($logueado) {
            return $this->response->redirect(base_url('main'));
        }

        return view('view_login');
    }

    public function login()
    {
        // Datos del formularios
        $dato_usuario     = $this->request->getVar('usuario');
        $dato_contrasenia = $this->request->getVar('contrasenia');

        // Acceso a la base de datos
        $modelo = new Model_Usuarios();
        $usuario_correcto = $modelo->verificar($dato_usuario, $dato_contrasenia);

        // Validando credenciales
        if ($usuario_correcto) {
            $this->iniciar_sesion($usuario_correcto);
            return $this->response->redirect(base_url('main'));
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
