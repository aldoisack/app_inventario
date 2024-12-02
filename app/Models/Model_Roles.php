<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Roles extends Model
{
    protected $table      = 'roles';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id_rol';
    protected $allowedFields = 'nombre_rol';
}
