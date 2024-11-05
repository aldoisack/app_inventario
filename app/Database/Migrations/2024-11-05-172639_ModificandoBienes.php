<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModificandoBienes extends Migration
{
    public function up()
    {
        $columnas = [
            'oficina_origen' => [
                'type'     => 'INT',
                'unsigned' => TRUE,
            ],
            'modelo' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'id_categoria' => [
                'type'     => 'INT',
                'unsigned' => TRUE,
            ],
            'id_estado' => [
                'type'     => 'INT',
                'unsigned' => TRUE,
            ],
        ];

        // Agregar las columnas a la tabla 'bienes'
        $this->forge->addColumn('bienes', $columnas);

        // Agregar las restricciones de claves foráneas
        $this->forge->addForeignKey('id_categoria', 'categorias', 'id_categoria', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_estado', 'estados', 'id_estado', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('oficina_origen', 'oficinas', 'id_oficina', 'CASCADE');
    }

    public function down()
    {
        // Eliminar las restricciones de claves foráneas

        // Eliminar las columnas agregadas
        $this->forge->dropColumn('bienes', ['oficina_origen', 'modelo', 'id_categoria', 'id_estado']);
    }
}
