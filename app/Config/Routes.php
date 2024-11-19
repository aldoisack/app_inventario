<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('probando', 'Controller_Probando::index');

$routes->get('/', 'Controller_Login::index');
$routes->post('login/autenticar', 'Controller_Login::autenticar');

// Stock
$routes->get('stock/listar', 'Controller_Categorias::listar');
$routes->post('stock/guardar', 'Controller_Categorias::guardar');

// Bienes
$routes->get('bienes/listar', 'Controller_BienPatrimonial::listar');
$routes->post('bienes/guardar_rapido', 'Controller_BienPatrimonial::guardar_rapido');
$routes->post('bienes/guardar_detallado', 'Controller_BienPatrimonial::guardar_detallado');

// ▗▄▖ ▗▄▄▄▖▗▄▄▄▖ ▗▄▄▖▗▄▄▄▖▗▖  ▗▖ ▗▄▖  ▗▄▄▖
// ▐▌ ▐▌▐▌     █  ▐▌     █  ▐▛▚▖▐▌▐▌ ▐▌▐▌   
// ▐▌ ▐▌▐▛▀▀▘  █  ▐▌     █  ▐▌ ▝▜▌▐▛▀▜▌ ▝▀▚▖
// ▝▚▄▞▘▐▌   ▗▄█▄▖▝▚▄▄▖▗▄█▄▖▐▌  ▐▌▐▌ ▐▌▗▄▄▞▘

$routes->get('oficinas/listar', 'Controller_Oficinas::listar');
$routes->post('oficinas/guardar', 'Controller_Oficinas::guardar');


// ▗▄▄▄▖ ▗▄▄▖▗▄▄▄▖▗▄▖ ▗▄▄▄  ▗▄▖  ▗▄▄▖
// ▐▌   ▐▌     █ ▐▌ ▐▌▐▌  █▐▌ ▐▌▐▌   
// ▐▛▀▀▘ ▝▀▚▖  █ ▐▛▀▜▌▐▌  █▐▌ ▐▌ ▝▀▚▖
// ▐▙▄▄▖▗▄▄▞▘  █ ▐▌ ▐▌▐▙▄▄▀▝▚▄▞▘▗▄▄▞▘

$routes->get('estados/listar', 'Controller_Estados::listar');
$routes->post('estados/guardar', 'Controller_Estados::guardar');
