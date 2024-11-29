<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Bitacora extends Model
{
    protected $table      = 'bitacora';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id_bitacora';
    protected $allowedFields = [
        'id_usuario',
        'accion',
        'registro',
        'tabla',
        'fecha_hora_registro'
    ];
}
