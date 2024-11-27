<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Movimientos extends Model
{
    protected $table      = 'movimientos';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id_movimiento';
    protected $allowedFields = [
        'id_categoria',
        'id_bien',
        'id_tipo_movimiento',
        'oficina_origen',
        'oficina_destino',
        'fecha_hora_registro',
        'imagen'
    ];

    public function listar_movimientos()
    {
        return $this->select('
                movimientos.id_movimiento,
                categorias.nombre_categoria,
                bienes.codigo,
                tipos_movimientos.nombre_tipo_movimiento,
                oficinas_origen.nombre_oficina AS oficina_origen,
                oficinas_destino.nombre_oficina AS oficina_destino,
                movimientos.fecha_hora_registro,
                movimientos.imagen
            ')
            ->join('categorias', 'movimientos.id_categoria = categorias.id_categoria')
            ->join('bienes', 'movimientos.id_bien = bienes.id_bien')
            ->join('tipos_movimientos', 'movimientos.id_tipo_movimiento = tipos_movimientos.id_tipo_movimiento')
            ->join('oficinas AS oficinas_origen', 'movimientos.oficina_origen = oficinas_origen.id_oficina', 'left')
            ->join('oficinas AS oficinas_destino', 'movimientos.oficina_destino = oficinas_destino.id_oficina', 'left')
            ->orderBy('movimientos.fecha_hora_registro', 'DESC')
            ->findAll();
    }
}
