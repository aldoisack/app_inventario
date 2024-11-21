<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CrearTablaOficinas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_oficina' => [
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
            ],
            'nombre_oficina' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'stock' => [
                'type' => 'INT',
            ],
        ]);
        $this->forge->addKey('id_oficina', TRUE);
        $this->forge->createTable('oficinas');
    }

    public function down()
    {
        $this->forge->dropTable('oficinas');
    }
}
