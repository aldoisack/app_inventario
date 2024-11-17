<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CrearTablaRoles extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_rol' => [
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
            ],
            'nombre_rol' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);
        $this->forge->addKey('id_rol', TRUE);
        $this->forge->createTable('roles');
    }

    public function down()
    {
        $this->forge->dropTable('roles');
    }
}
