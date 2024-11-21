<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederModulos extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nombre_modulo' => 'Stock',
                'ruta'          => 'categorias/listar',
            ],
            [
                'nombre_modulo' => 'Bienes',
                'ruta'          => 'bienes/listar',
            ],
            [
                'nombre_modulo' => 'Movimientos',
                'ruta'          => 'movimientos/listar',
            ],
            [
                'nombre_modulo' => 'Bitacora',
                'ruta'          => 'bitacora/listar',
            ],
            [
                'nombre_modulo' => 'Oficinas',
                'ruta'          => 'oficinas/listar',
            ],
            [
                'nombre_modulo' => 'Usuarios',
                'ruta'          => 'usuarios/listar',
            ],
        ];
        $this->db->table('modulos')->insertBatch($data);
    }
}
