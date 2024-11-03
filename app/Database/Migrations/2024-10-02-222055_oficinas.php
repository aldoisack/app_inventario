<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Oficinas extends Migration
{
    public function up()
    {

        // Uncomment below if want config
        $this->forge->addField([
            'id_oficina'                  => [
                'type'           => 'INT',
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'nombre'               => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
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
