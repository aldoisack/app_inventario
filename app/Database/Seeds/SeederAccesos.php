<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederAccesos extends Seeder
{
    public function run()
    {
        $data = [
            ['id_rol' => '1', 'id_modulo' => '1'],
            ['id_rol' => '1', 'id_modulo' => '2'],
            ['id_rol' => '1', 'id_modulo' => '3'],
            ['id_rol' => '1', 'id_modulo' => '4'],
            ['id_rol' => '1', 'id_modulo' => '5'],
            ['id_rol' => '2', 'id_modulo' => '1'],
            ['id_rol' => '2', 'id_modulo' => '2'],
            ['id_rol' => '2', 'id_modulo' => '4'],
        ];
        $this->db->table('accesos')->insertBatch($data);
    }
}
