<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CrearTablaBitacora extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_bitacora' => [
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
            ],
            'id_usuario' => [
                'type' => 'INT',
                'unsigned' => TRUE,
            ],
            'accion' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'registro' => [
                'type' => 'INT',
                'unsigned' => TRUE,
            ],
            'tabla' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'fecha_hora_registro' => [
                'type' => 'DATETIME',
                'default' => new \CodeIgniter\Database\RawSql('CURRENT_TIMESTAMP'),
            ],
        ]);
        $this->forge->addKey('id_bitacora', TRUE);
        $this->forge->addForeignKey('id_usuario', 'usuarios', 'id_usuario');
        $this->forge->createTable('bitacora');
    }

    public function down()
    {
        $this->forge->dropTable('bitacora');
    }
}
