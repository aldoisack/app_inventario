<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Categorias extends Model
{
    protected $table      = 'categorias';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id_categoria';
    protected $allowedFields = ['nombre_categoria'];

    public function obtener_categorias_stock()
    {
        return $this
            ->select('categorias.id_categoria, categorias.nombre_categoria, COUNT(bienes.id_bien) as stock')
            ->join('bienes', 'bienes.id_categoria = categorias.id_categoria AND bienes.oficina_actual = 5', 'left') // Unión con filtro de oficina
            ->groupBy('categorias.id_categoria') // Agrupar por categoría
            ->findAll(); // Obtener todos los registros
    }
}
