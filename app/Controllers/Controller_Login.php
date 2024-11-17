<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Controller_Login extends Controller
{
    public function index()
    {
        return view('view_login');
    }
}
