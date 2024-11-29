<?php

use CodeIgniter\Router\RouteCollection;

use function PHPSTORM_META\map;

/**
 * @var RouteCollection $routes
 */

$routes->get('main', 'Home::index', ['filter' => 'sesion']);
$routes->get('probando', 'Probando::probando');

// ---------------------------------------------
// SESIÓN
// ---------------------------------------------

$routes->get('/', 'Controller_Singin::index');
$routes->get('singin', 'Controller_Singin::index');
$routes->post('login', 'Controller_Singin::login');
$routes->get('logout', 'Controller_Singin::logout');

// ---------------------------------------------
// STOCK
// ---------------------------------------------

$routes->get('categorias/listar', 'Controller_Categorias::listar');

$routes->get('categorias/crear', 'Controller_Categorias::crear');
$routes->post('categorias/guardar', 'Controller_Categorias::guardar');

$routes->get('categorias/editar/(:num)', 'Controller_Categorias::editar/$1');
$routes->post('categorias/actualizar', 'Controller_Categorias::actualizar');

$routes->get('categorias/detalle/(:num)', 'Controller_Categorias::detalle_categoria/$1');
$routes->get('categorias/transferir/(:num)/(:any)', 'Controller_Categorias::transferir/$1/$2');

// ---------------------------------------------
// BIENES
// ---------------------------------------------

$routes->get('bienes/listar', 'Controller_BienPatrimonial::listar');

$routes->get('bienes/crear_rapido', 'Controller_BienPatrimonial::crear_rapido');
$routes->post('bienes/guardar_rapido', 'Controller_BienPatrimonial::guardar_rapido');

$routes->get('bienes/crear_detallado', 'Controller_BienPatrimonial::crear_detallado');
$routes->post('bienes/guardar_detallado', 'Controller_BienPatrimonial::guardar_detallado');

$routes->get('bienes/editar/(:num)', 'Controller_BienPatrimonial::editar/$1');
$routes->post('bienes/actualizar', 'Controller_BienPatrimonial::actualizar');

$routes->get('bienes/detalle/(:num)', 'Controller_BienPatrimonial::detalle/$1');
$routes->post('bienes/transferir', 'Controller_BienPatrimonial::transferir');
$routes->get('bienes/movimientos/(:num)', 'Controller_BienPatrimonial::movimientos/$1');

$routes->get('buscar_imagen/(:segment)', 'Controller_BienPatrimonial::buscar_imagen/$1');


// ---------------------------------------------
// BITÁCORA
// ---------------------------------------------

$routes->get('bitacora/listar', 'Controller_Bitacora::listar');

// ---------------------------------------------
// OFICINAS
// ---------------------------------------------
$routes->get('oficinas/listar', 'Controller_Oficinas::listar');

$routes->get('oficinas/crear', 'Controller_Oficinas::crear');
$routes->post('oficinas/guardar', 'Controller_Oficinas::guardar');

$routes->post('oficinas/actualizar', 'Controller_Oficinas::actualizar');

$routes->get('oficinas/detalle/(:num)/(:any)', 'Controller_Oficinas::detalle/$1/$2');

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
