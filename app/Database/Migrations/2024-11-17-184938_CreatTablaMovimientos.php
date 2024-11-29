<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatTablaMovimientos extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_movimiento' => [
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
            ],
            'id_bien' => [
                'type' => 'INT',
                'unsigned' => TRUE,
            ],
            'id_tipo_movimiento' => [
                'type' => 'INT',
                'unsigned' => TRUE,
            ],
            'oficina_origen' => [
                'type' => 'INT',
                'unsigned' => TRUE,
            ],
            'oficina_destino' => [
                'type' => 'INT',
                'unsigned' => TRUE,
            ],
            'fecha_hora_registro' => [
                'type' => 'DATETIME',
                'default' => new \CodeIgniter\Database\RawSql('CURRENT_TIMESTAMP'),
            ],
            'imagen' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'id_usuario' => [
                'type' => 'INT',
                'unsigned' => TRUE,
            ],
        ]);
        $this->forge->addKey('id_movimiento', TRUE);
        $this->forge->addForeignKey('id_bien', 'bienes', 'id_bien');
        $this->forge->addForeignKey('id_tipo_movimiento', 'tipos_movimientos', 'id_tipo_movimiento');
        $this->forge->addForeignKey('oficina_origen', 'oficinas', 'id_oficina');
        $this->forge->addForeignKey('oficina_destino', 'oficinas', 'id_oficina');
        $this->forge->addForeignKey('id_usuario', 'usuarios', 'id_usuario');
        $this->forge->createTable('movimientos');
    }

    public function down()
    {
        $this->forge->dropTable('movimientos');
    }
}
