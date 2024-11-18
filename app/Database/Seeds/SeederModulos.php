<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederModulos extends Seeder
{
    public function run()
    {
        $data = [
            ['nombre_modulo' => 'Stock'],
            ['nombre_modulo' => 'Bienes'],
            ['nombre_modulo' => 'Movimientos'],
            ['nombre_modulo' => 'Bitacora'],
            ['nombre_modulo' => 'Oficinas'],
            ['nombre_modulo' => 'Usuarios'],
        ];
        $this->db->table('modulos')->insertBatch($data);
    }
}
