<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Categorias extends Model
{
    protected $table      = 'categorias';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id_categoria';
    protected $allowedFields = ['nombre_categoria', 'stock'];

    public function obtener_registros()
    {
        return $this->findAll();
    }

    public function incrementarStock($id_categoria, $cantidad = 1)
    {
        return $this
            ->set('stock', "stock + $cantidad", false)
            ->where('id_categoria', $id_categoria)
            ->update();
    }
}
