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

    public function obtener_bienes_con_categoria()
    {
        return $this
            ->select(
                '
                bienes.id_bien,
                bienes.codigo,
                categorias.nombre_categoria,
                oficinas.nombre_oficina
                '
            )
            ->join('categorias', 'categorias.id_categoria = bienes.id_categoria')
            ->join('oficinas', 'oficinas.id_oficina = bienes.oficina_actual')
            ->findAll();
    }

    public function obtener_detalle($id_bien)
    {
        return $this
            ->select(
                '
                bienes.id_bien,
                categorias.nombre_categoria, 
                bienes.codigo,
                oficinas.nombre_oficina, 
                estados.nombre_estado,
                bienes.fecha_hora_registro,
                bienes.imagen
                '
            )
            ->join('categorias', 'categorias.id_categoria = bienes.id_categoria')
            ->join('oficinas', 'oficinas.id_oficina = bienes.oficina_actual')
            ->join('estados', 'estados.id_estado = bienes.id_estado')
            ->where('bienes.id_bien', $id_bien)
            ->first();
    }
}
