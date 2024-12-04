<?php

use CodeIgniter\Router\RouteCollection;

use function PHPSTORM_META\map;

/**
 * @var RouteCollection $routes
 */

$routes->get('main', 'Home::index', ['filter' => 'sesion']);


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
$routes->get('bienes/imprimir_movimientos/(:num)', 'Controller_BienPatrimonial::imprimir_movimientos/$1');
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

$routes->get('oficinas/editar/(:num)', 'Controller_Oficinas::editar/$1');
$routes->post('oficinas/actualizar', 'Controller_Oficinas::actualizar');

$routes->get('oficinas/detalle/(:num)/(:any)', 'Controller_Oficinas::detalle/$1/$2');

// ---------------------------------------------
// USUARIOS
// ---------------------------------------------

$routes->get('usuarios/listar', 'Controller_Usuarios::listar');

$routes->get('usuarios/crear', 'Controller_Usuarios::crear');
$routes->post('usuarios/guardar', 'Controller_Usuarios::guardar');

$routes->get('usuarios/editar/(:num)', 'Controller_Usuarios::editar/$1');
$routes->post('usuarios/actualizar', 'Controller_Usuarios::actualizar');

$routes->get('usuarios/restablecer_contrasenia/(:num)', 'Controller_Usuarios::restablecer_contrasenia/$1');
$routes->post('usuarios/actualizar_contrasenia/', 'Controller_Usuarios::actualizar_contrasenia');

// ---------------------------------------------
// EXTRA
// ---------------------------------------------

$routes->get('pdf/imprimir_movimientos/(:num)', 'Controller_Pdf::imprimir_movimientos/$1');
$routes->get('excel/exportar', 'Controller_Excel::exportar');
$routes->get('carousel', 'Controller_Carousel::index');
$routes->post('carousel/guardar', 'Controller_Carousel::guardar');
