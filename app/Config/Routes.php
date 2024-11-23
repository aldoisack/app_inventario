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
    'categorias/listar',
    'Controller_Categorias::listar',
    ['filter' => 'sesion']
);
$routes->post('categorias/guardar', 'Controller_Categorias::guardar');
$routes->post('categorias/actualizar', 'Controller_Categorias::actualizar');
$routes->get('bienes_categoria/(:num)', 'Controller_Categorias::bienes_categoria/$1');

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
$routes->post('bienes/actualizar', 'Controller_BienPatrimonial::actualizar');
$routes->post('bienes/transferir', 'Controller_BienPatrimonial::transferir');

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
$routes->post('oficinas/actualizar', 'Controller_Oficinas::actualizar');

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
