<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CrearTablaCarousel extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'unsigned'       => TRUE,
                'auto_increment' => TRUE,
            ],
            'imagen'  => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('carousel');
    }

    public function down()
    {
        $this->forge->dropTable('carousel');
    }
}
