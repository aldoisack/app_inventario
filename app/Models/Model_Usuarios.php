<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Usuarios extends Model
{
    protected $table      = 'usuarios';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id_usuario';
    protected $allowedFields = ['id_rol', 'nombre', 'usuario', 'contrasenia'];

    public function verificar($usuario, $contrasenia)
    {
        return $this
            ->where('usuario', $usuario)
            ->where('contrasenia', $contrasenia)
            ->first();
    }

    public function obtener_modulos($id_rol)
    {
        return $this->db->table('accesos')
            ->join('modulos', 'accesos.id_modulo = modulos.id_modulo') // Realiza el JOIN entre accesos y modulos
            ->select('modulos.*') // Selecciona los campos de la tabla modulos (ajusta según tus necesidades)
            ->where('accesos.id_rol', $id_rol) // Filtra por id_rol
            ->get()
            ->getResultArray(); // Devuelve el resultado como un arreglo de objetos
    }
}
