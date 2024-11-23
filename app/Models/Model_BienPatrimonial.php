<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_BienPatrimonial extends Model
{
    protected $table      = 'bienes';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id_bien';
    protected $allowedFields = [
        'id_categoria',
        'codigo',
        'id_estado',
        'oficina_actual',
        'fecha_hora_registro',
        'imagen',
    ];

    public function obtener_registros()
    {
        return $this
            ->select('bienes.*, categorias.nombre_categoria, oficinas.*')
            ->join('categorias', 'bienes.id_categoria = categorias.id_categoria')
            ->join('oficinas', 'bienes.oficina_actual = oficinas.id_oficina')
            ->get()
            ->getResultArray();
    }

    public function obtener_bienes_categoria($id_categoria)
    {
        return $this
            ->where('bienes.id_categoria', $id_categoria)
            ->where('bienes.oficina_actual', '5')
            ->findAll();
    }
}
