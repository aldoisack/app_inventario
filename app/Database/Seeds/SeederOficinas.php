<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederOficinas extends Seeder
{
    public function run()
    {
        $data = [
            ['nombre_oficina' => 'TURISMO'],
            ['nombre_oficina' => 'RRHH'],
            ['nombre_oficina' => 'IMAGEN'],
            ['nombre_oficina' => 'OMAPED'],
            ['nombre_oficina' => 'OTI'],
        ];
        $this->db->table('oficinas')->insertBatch($data);
    }
}
