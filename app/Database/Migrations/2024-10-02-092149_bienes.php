<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Bienes extends Migration
{
    public function up()
    {

        // Uncomment below if want config
        $this->forge->addField([
            'id_bien'            => [
                'type'           => 'INT',
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'codigo_patrimonial' => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'descripcion'        => [
                'type'           => 'VARCHAR',
                'constraint'     => '8',
            ]
        ]);
        $this->forge->addKey('id_bien', TRUE);
        $this->forge->createTable('bienes');
    }

    public function down()
    {
        $this->forge->dropTable('bienes');
    }
}
