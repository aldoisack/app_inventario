<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_BienPatrimonial extends Model
{
    protected $table      = 'bienes';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id_bien';
    protected $allowedFields = [
        'oficina_origen',
        'modelo',
        'codigo_patrimonial',
        'id_categoria',
        'id_estado',
        'imagen',
    ];

    public function obtener_registros()
    {
        return $this
            ->select('bienes.codigo_patrimonial,categorias.nombre_categoria')
            ->join('categorias', 'bienes.id_categoria=categorias.id_categoria')
            ->findAll();
    }
}
