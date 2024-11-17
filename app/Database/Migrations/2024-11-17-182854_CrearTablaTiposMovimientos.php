<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CrearTablaTiposMovimientos extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_tipo_movimiento' => [
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
            ],
            'nombre_tipo_movimiento' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);
        $this->forge->addKey('id_tipo_movimiento', TRUE);
        $this->forge->createTable('tipos_movimientos');
    }

    public function down()
    {
        $this->forge->dropTable('tipos_movimientos');
    }
}
