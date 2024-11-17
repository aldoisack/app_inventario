<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CrearTablaBienes extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_bien' => [
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
            ],
            'id_categoria' => [
                'type' => 'INT',
                'unsigned' => TRUE,
            ],
            'codigo' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'id_estado' => [
                'type' => 'INT',
                'unsigned' => TRUE,
            ],
            'oficina_actual' => [
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
        ]);
        $this->forge->addKey('id_bien', TRUE);
        $this->forge->addForeignKey('id_categoria', 'categorias', 'id_categoria');
        $this->forge->addForeignKey('id_estado', 'estados', 'id_estado');
        $this->forge->addForeignKey('oficina_actual', 'oficinas', 'id_oficina');
        $this->forge->createTable('bienes');
    }

    public function down()
    {
        $this->forge->dropTable('bienes');
    }
}
