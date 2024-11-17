<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CrearTablaStock extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_stock' => [
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
            ],
            'id_categoria' => [
                'type' => 'INT',
                'unsigned' => TRUE,
            ],
            'total' => [
                'type' => 'INT',
            ],
        ]);
        $this->forge->addKey('id_stock', TRUE);
        $this->forge->addForeignKey('id_categoria', 'categorias', 'id_categoria');
        $this->forge->createTable('stocks');
    }

    public function down()
    {
        $this->forge->dropTable('stocks');
    }
}
