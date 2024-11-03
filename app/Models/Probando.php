<?php

namespace App\Models;

use CodeIgniter\Model;

class Probando extends Model
{
    protected $table      = 'probando';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';
    protected $allowedFields = ['title'];

    public function listar()
    {
        return $this->findAll();
    }
}
