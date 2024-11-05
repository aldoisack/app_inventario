<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Categorias extends Model
{
    protected $table      = 'categorias';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id_categoria';
    protected $allowedFields = ['nombre_categoria'];

    public function obtener_registros()
    {
        return $this->findAll();
    }
}
