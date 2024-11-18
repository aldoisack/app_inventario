<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederPoblarTablas extends Seeder
{
    public function run()
    {
        $this->call('SeederRoles');
        $this->call('SeederModulos');
        $this->call('SeederAccesos');
        $this->call('SeederUsuarios');
        $this->call('SeederEstados');
        $this->call('SeederTiposMovimiento');
    }
}
