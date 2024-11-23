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
        return $this
            ->select('categorias.*, COALESCE(COUNT(bienes.id_bien), 0) AS stock')
            ->join('bienes', 'bienes.id_categoria = categorias.id_categoria AND bienes.oficina_actual = 5', 'left')
            ->groupBy('categorias.id_categoria')
            ->get()
            ->getResultArray();
    }

    public function incrementarStock($id_categoria, $cantidad = 1)
    {
        return $this
            ->set('stock', "stock + $cantidad", false)
            ->where('id_categoria', $id_categoria)
            ->update();
    }
}
