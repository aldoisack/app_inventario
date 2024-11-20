<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('probando', 'Controller_Probando::index');

// ---------------------------------------------
// LOGIN AND LOGOUT
// ---------------------------------------------

$routes->get('/', 'Controller_Login::index');
$routes->get('login', 'Controller_Login::index');
$routes->post('login/autenticar', 'Controller_Login::autenticar');
$routes->get('logout', 'Controller_Login::logout');

// ---------------------------------------------
// STOCK
// ---------------------------------------------

$routes->get(
    'stock/listar',
    'Controller_Categorias::listar',
    ['filter' => 'sesion']
);
$routes->post('stock/guardar', 'Controller_Categorias::guardar');

// ---------------------------------------------
// BIENES
// ---------------------------------------------

$routes->get(
    'bienes/listar',
    'Controller_BienPatrimonial::listar',
    ['filter' => 'sesion']
);
$routes->post('bienes/guardar_rapido', 'Controller_BienPatrimonial::guardar_rapido');
$routes->post('bienes/guardar_detallado', 'Controller_BienPatrimonial::guardar_detallado');

// ---------------------------------------------
// MOVIMIENTOS
// ---------------------------------------------

$routes->get(
    'movimientos/listar',
    'Controller_Movimientos::listar',
    ['filter' => 'sesion']
);

// ---------------------------------------------
// BITÁCORA
// ---------------------------------------------

$routes->get(
    'bitacora/listar',
    'Controller_Bitacora::listar',
    ['filter' => 'sesion']
);

// ---------------------------------------------
// OFICINAS
// ---------------------------------------------
$routes->get(
    'oficinas/listar',
    'Controller_Oficinas::listar',
    ['filter' => 'sesion'],
);
$routes->post('oficinas/guardar', 'Controller_Oficinas::guardar');

// ---------------------------------------------
// USUARIOS
// ---------------------------------------------

$routes->get(
    'usuarios/listar',
    'Controller_Usuarios::listar',
    ['filter' => 'sesion']
);
$routes->get(
    'perfil',
    'Controller_Usuarios::perfil',
    ['filter' => 'sesion']
);
