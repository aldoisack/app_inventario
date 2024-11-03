<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Oficinas extends Model
{
    protected $table      = 'oficinas';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id_oficina';
    protected $allowedFields = ['nombre'];

    public function obtener_registros()
    {
        return $this->findAll();
    }
}
