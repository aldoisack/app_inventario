<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DropDescripcionAddTimeImage extends Migration
{
    public function up()
    {
        // Eliminando columna "Descripcion"
        $this->forge->dropColumn('bienes', 'descripcion');

        // Agregando columnas
        $columnas = [
            'tiempo_ingreso' => [
                'type' => 'DATETIME',
                'default' => new \CodeIgniter\Database\RawSql('CURRENT_TIMESTAMP'),

            ],
            'imagen' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
        ];

        $this->forge->addColumn('bienes', $columnas);
    }

    public function down()
    {
        $columna = [
            'descripcion' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
        ];

        $this->forge->addColumn('bienes', $columna);
        $this->forge->dropColumn('bienes', ['tiempo_registro', 'imagen']);
    }
}
