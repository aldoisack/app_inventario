<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CrearTablaModulos extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_modulo'          => [
                'type'           => 'INT',
                'unsigned'       => TRUE,
                'auto_increment' => TRUE,
            ],
            'nombre_modulo'  => [
                'type'       => 'INT',
                'constraint' => '100',
            ],
        ]);
        $this->forge->addKey('id_modulo', TRUE);
        $this->forge->createTable('modulos');
    }

    public function down()
    {
        $this->forge->dropTable('modulos');
    }
}
