<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederRoles extends Seeder
{
    public function run()
    {
        $data = [
            ['nombre_rol' => 'Administrador'],
            ['nombre_rol' => 'Estándar'],
        ];
        $this->db->table('roles')->insertBatch($data);
    }
}
