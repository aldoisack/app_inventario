<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CrearTablaAccesos extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_acceso' => [
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
            ],
            'id_rol' => [
                'type' => 'INT',
                'unsigned' => TRUE,
            ],
            'id_modulo' => [
                'type' => 'INT',
                'unsigned' => TRUE,
            ],
        ]);
        $this->forge->addKey('id_acceso', TRUE);
        $this->forge->addForeignKey('id_rol', 'roles', 'id_rol');
        $this->forge->addForeignKey('id_modulo', 'modulos', 'id_modulo');
        $this->forge->createTable('accesos');
    }

    public function down()
    {
        $this->forge->dropTable('accesos');
    }
}
