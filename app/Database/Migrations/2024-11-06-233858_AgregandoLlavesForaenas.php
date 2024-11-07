<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AgregandoLlavesForaenas extends Migration
{
    public function up()
    {
        $this->forge->addForeignKey('oficina_origen', 'oficinas', 'id_oficina', '', '', 'oficinasid_fk');
        $this->forge->addForeignKey('id_categoria', 'categorias', 'id_categoria', '', '', 'categoriasid_fk');
        $this->forge->addForeignKey('id_estado', 'estados', 'id_estado', '', '', 'estadosid_fk');
        $this->forge->processIndexes('bienes');
    }

    public function down()
    {
        $this->forge->dropForeignKey('bienes', 'oficinasid_fk');
        $this->forge->dropForeignKey('bienes', 'categoriasid_fk');
        $this->forge->dropForeignKey('bienes', 'estadosid_fk');
    }
}
