<?php

namespace App\Controllers;

use App\Models\Model_BienPatrimonial;
use CodeIgniter\CLI\Console;

class Home extends BaseController
{
    public function index(): string
    {
        return view('view_web_main');
    }
}
