<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_BienPatrimonial extends Model
{
    protected $table      = 'bienes';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id_bien';
    protected $allowedFields = [
        'id_categoria',
        'codigo',
        'id_estado',
        'oficina_actual',
        'fecha_hora_registro',
        'imagen',
    ];

    public function obtener_registros()
    {
        return $this->findAll();
    }
}
