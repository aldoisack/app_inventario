<?php

namespace App\Controllers;

use App\Models\Model_Bitacora;
use App\Models\Model_Roles;
use App\Models\Model_Usuarios;
use CodeIgniter\Controller;

class Controller_Usuarios extends Controller
{
    public function listar()
    {
        $modelo_usuarios = new Model_Usuarios();
        $usuarios['usuarios'] = $modelo_usuarios
            ->select('usuarios.*, roles.nombre_rol')
            ->join('roles', 'roles.id_rol = usuarios.id_rol')
            ->findAll();
        return view('view_usuarios_listar', $usuarios);
    }

    // --------------------------------------------------
    // Sección CREAR Y GUARDAR
    // --------------------------------------------------

    public function crear()
    {
        $modelo_roles = new Model_Roles();
        $roles['roles'] = $modelo_roles->findAll();
        return view('view_usuarios_crear', $roles);
    }

    public function guardar()
    {
        // Definir las reglas de validación
        $rules = [
            'nombre' => 'required|min_length[4]',
            'usuario' => 'required|min_length[4]',
            'contrasenia' => 'required|min_length[4]',
        ];

        // Mensajes personalizados opcionales
        $messages = [
            'nombre' => [
                'required' => 'El campo nombre es obligatorio.',
                'min_length' => '"Nombre" debe tener al menos 5 caracteres.',
            ],
            'usuario' => [
                'required' => 'El campo usuario es obligatorio.',
                'min_length' => '"Usuario" debe tener al menos 5 caracteres.',
            ],
            'contrasenia' => [
                'required' => 'El campo contraseña es obligatorio.',
                'min_length' => '"Contraseña" debe tener al menos 5 caracteres.',
            ],
        ];

        // Validar la entrada del usuario
        if (!$this->validate($rules, $messages)) {
            // Si falla la validación, redirige al formulario y muestra los errores
            $modelo_roles = new Model_Roles();
            $roles = $modelo_roles->findAll();
            return view('view_usuarios_crear', [
                'validation' => $this->validator,
                'roles' => $roles,
            ]);
        }

        // Si pasa la validación, guarda los datos
        $usuario = [
            'id_rol'      => $this->request->getVar('id_rol'),
            'nombre'      => $this->request->getVar('nombre'),
            'usuario'     => $this->request->getVar('usuario'),
            'contrasenia' => $this->request->getVar('contrasenia'),
        ];
        $modelo_usuarios = new Model_Usuarios();
        $modelo_usuarios->insert($usuario);

        // ----- REGISTRANDO BITÁCORA ----

        // id_usuario
        $sesion = session();
        $id_usuario = $sesion->get('id_usuario');

        // Acción
        $accion = 'CREÓ';

        // Registro
        $registro = $modelo_usuarios->getInsertID();

        // Tabla
        $tabla = 'usuarios';

        // Insertando datos
        $datos = [
            'id_usuario' => $id_usuario,
            'accion' => $accion,
            'registro' => $registro,
            'tabla' => $tabla
        ];
        $modelo_bitacora = new Model_Bitacora();
        $modelo_bitacora->insert($datos);

        // Redirigir al listado de usuarios
        return $this->response->redirect('usuarios/listar');
    }

    // --------------------------------------------------
    // Sección EDITAR Y ACTUALIZAR
    // --------------------------------------------------

    public function editar($id_usuario)
    {
        $modelo_usuarios = new Model_Usuarios();
        $modelo_roles = new Model_Roles();

        $usuario = $modelo_usuarios->where('id_usuario', $id_usuario)->first();
        $roles = $modelo_roles->findAll();

        $datos = [
            'usuario' => $usuario,
            'roles'   => $roles
        ];

        return view('view_usuarios_editar', $datos);
    }

    public function actualizar()
    {
        $id_usuario = $this->request->getVar('id_usuario');
        $datos = [
            'usuario' => $this->request->getVar('usuario'),
            'nombre' => $this->request->getVar('nombre'),
        ];
        $modelo_usuarios = new Model_Usuarios();
        $modelo_usuarios->update($id_usuario, $datos);

        // ----- REGISTRANDO BITÁCORA ----

        // id_usuario
        $sesion = session();
        $id_usuario = $sesion->get('id_usuario');

        // Acción
        $accion = 'EDITÓ';

        // Registro
        $registro = $id_usuario;

        // Tabla
        $tabla = 'usuarios';

        // Insertando datos
        $datos = [
            'id_usuario' => $id_usuario,
            'accion' => $accion,
            'registro' => $registro,
            'tabla' => $tabla
        ];
        $modelo_bitacora = new Model_Bitacora();
        $modelo_bitacora->insert($datos);

        return $this->response->redirect(base_url('usuarios/listar'));
    }

    // --------------------------------------------------
    // Sección RESTABLECER CONTRASEÑA
    // --------------------------------------------------

    public function restablecer_contrasenia($id_usuario)
    {

        $modelo_usuarios = new Model_Usuarios();
        $modelo_roles = new Model_Roles();

        $usuario = $modelo_usuarios->where('id_usuario', $id_usuario)->first();
        $roles = $modelo_roles->findAll();

        $datos = [
            'usuario' => $usuario,
            'roles'   => $roles
        ];

        return view('view_usuarios_restablecer_contrasenia', $datos);
    }

    public function actualizar_contrasenia()
    {
        $id_usuario = $this->request->getVar('id_usuario');
        $datos = [
            'contrasenia' => $this->request->getVar('usuario'),
        ];
        $modelo_usuarios = new Model_Usuarios();
        $modelo_usuarios->update($id_usuario, $datos);

        // ----- REGISTRANDO BITÁCORA ----

        // id_usuario
        $sesion = session();
        $id_usuario = $sesion->get('id_usuario');

        // Acción
        $accion = 'CAMBIÓ CONTRASEÑA';

        // Registro
        $registro = $id_usuario;

        // Tabla
        $tabla = 'usuarios';

        // Insertando datos
        $datos = [
            'id_usuario' => $id_usuario,
            'accion' => $accion,
            'registro' => $registro,
            'tabla' => $tabla
        ];
        $modelo_bitacora = new Model_Bitacora();
        $modelo_bitacora->insert($datos);

        return $this->response->redirect(base_url('usuarios/listar'));
    }
}
