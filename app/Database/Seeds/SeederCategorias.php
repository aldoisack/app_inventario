<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederCategorias extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nombre_categoria' => 'TECLADO',
                'stock' => '0'
            ],
            [
                'nombre_categoria' => 'ESTABILIZADOR',
                'stock' => '0'
            ],
            [
                'nombre_categoria' => 'MONITOR',
                'stock' => '0'
            ],
            [
                'nombre_categoria' => 'CPU',
                'stock' => '0'
            ],
        ];
        $this->db->table('categorias')->insertBatch($data);
    }
}
