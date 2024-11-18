<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederEstados extends Seeder
{
    public function run()
    {
        $data = [
            ['nombre_estado' => 'Activo'],
            ['nombre_estado' => 'Baja'],
        ];
        $this->db->table('estados')->insertBatch($data);
    }
}
