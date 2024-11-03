<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_BienPatrimonial extends Model
{
    protected $table      = 'bienes';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id_bien';
    protected $allowedFields = ['codigo_patrimonial', 'descripcion'];

    public function obtener_registros()
    {
        return $this->findAll();
    }
}
