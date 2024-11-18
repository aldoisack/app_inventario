<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederTiposMovimiento extends Seeder
{
    public function run()
    {
        $data = [
            ['nombre_tipo_movimiento' => 'Entrada'],
            ['nombre_tipo_movimiento' => 'Salida'],
        ];
        $this->db->table('tipos_movimientos')->insertBatch($data);
    }
}
