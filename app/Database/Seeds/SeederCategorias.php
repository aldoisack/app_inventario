<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederCategorias extends Seeder
{
    public function run()
    {
        $data = [
            ['nombre_categoria' => 'TECLADO'],
            ['nombre_categoria' => 'ESTABILIZADOR'],
            ['nombre_categoria' => 'MONITOR'],
            ['nombre_categoria' => 'CPU'],
        ];
        $this->db->table('categorias')->insertBatch($data);
    }
}
