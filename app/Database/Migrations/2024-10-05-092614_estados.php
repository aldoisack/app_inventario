<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Estados extends Migration
{
    public function up()
    {

        // Uncomment below if want config
        $this->forge->addField([
            'id_estado'          => [
                'type'           => 'INT',
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'nombre_estado'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
        ]);
        $this->forge->addKey('id_estado', TRUE);
        $this->forge->createTable('estados');
    }

    public function down()
    {
        $this->forge->dropTable('estados');
    }
}
