<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Oficinas extends Model
{
    protected $table      = 'oficinas';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id_oficina';
    protected $allowedFields = ['nombre_oficina', 'stock'];

    public function obtener_registros()
    {
        return $this->findAll();
    }

    public function incrementarStock($id_oficina, $cantidad = 1)
    {
        return $this
            ->set('stock', "stock + $cantidad", false)
            ->where('id_oficina', $id_oficina)
            ->update();
    }
}
