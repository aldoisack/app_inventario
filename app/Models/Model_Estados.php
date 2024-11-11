<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Estados extends Model
{
    protected $table      = 'estados';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id_estados';
    protected $allowedFields = ['nombre_estado'];

    public function obtener_registros()
    {
        return $this->findAll();
    }
    public function buscar()
    {
        return '1';
    }
}
