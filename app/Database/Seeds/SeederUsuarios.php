<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederUsuarios extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_rol' => '1',
                'nombre' => 'admin',
                'usuario' => 'admin',
                'contrasenia' => 'admin',
            ],
            [
                'id_rol' => '2',
                'nombre' => 'estandar',
                'usuario' => 'estandar',
                'contrasenia' => 'estandar',
            ],
        ];
        $this->db->table('usuarios')->insertBatch($data);
    }
}
