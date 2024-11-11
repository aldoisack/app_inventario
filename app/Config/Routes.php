<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('probando', 'Probando::probando');
$routes->post('guardar', 'Probando::guardar');

// ▗▄▄▖ ▗▄▄▄▖▗▄▄▄▖▗▖  ▗▖▗▄▄▄▖ ▗▄▄▖
// ▐▌ ▐▌  █  ▐▌   ▐▛▚▖▐▌▐▌   ▐▌   
// ▐▛▀▚▖  █  ▐▛▀▀▘▐▌ ▝▜▌▐▛▀▀▘ ▝▀▚▖
// ▐▙▄▞▘▗▄█▄▖▐▙▄▄▖▐▌  ▐▌▐▙▄▄▖▗▄▄▞▘

$routes->get('bienes/listar', 'Controller_BienPatrimonial::listar');
$routes->post('bienes/guardar_rapido', 'Controller_BienPatrimonial::guardar_rapido');
$routes->post('bienes/guardar_detallado', 'Controller_BienPatrimonial::guardar_detallado');

// ▗▄▖ ▗▄▄▄▖▗▄▄▄▖ ▗▄▄▖▗▄▄▄▖▗▖  ▗▖ ▗▄▖  ▗▄▄▖
// ▐▌ ▐▌▐▌     █  ▐▌     █  ▐▛▚▖▐▌▐▌ ▐▌▐▌   
// ▐▌ ▐▌▐▛▀▀▘  █  ▐▌     █  ▐▌ ▝▜▌▐▛▀▜▌ ▝▀▚▖
// ▝▚▄▞▘▐▌   ▗▄█▄▖▝▚▄▄▖▗▄█▄▖▐▌  ▐▌▐▌ ▐▌▗▄▄▞▘

$routes->get('oficinas/listar', 'Controller_Oficinas::listar');
$routes->post('oficinas/guardar', 'Controller_Oficinas::guardar');

// ▗▄▄▖ ▗▄▖▗▄▄▄▖▗▄▄▄▖ ▗▄▄▖ ▗▄▖ ▗▄▄▖ ▗▄▄▄▖ ▗▄▖  ▗▄▄▖
// ▐▌   ▐▌ ▐▌ █  ▐▌   ▐▌   ▐▌ ▐▌▐▌ ▐▌  █  ▐▌ ▐▌▐▌   
// ▐▌   ▐▛▀▜▌ █  ▐▛▀▀▘▐▌▝▜▌▐▌ ▐▌▐▛▀▚▖  █  ▐▛▀▜▌ ▝▀▚▖
// ▝▚▄▄▖▐▌ ▐▌ █  ▐▙▄▄▖▝▚▄▞▘▝▚▄▞▘▐▌ ▐▌▗▄█▄▖▐▌ ▐▌▗▄▄▞▘

$routes->get('categorias/listar', 'Controller_Categorias::listar');
$routes->post('categorias/guardar', 'Controller_Categorias::guardar');

// ▗▄▄▄▖ ▗▄▄▖▗▄▄▄▖▗▄▖ ▗▄▄▄  ▗▄▖  ▗▄▄▖
// ▐▌   ▐▌     █ ▐▌ ▐▌▐▌  █▐▌ ▐▌▐▌   
// ▐▛▀▀▘ ▝▀▚▖  █ ▐▛▀▜▌▐▌  █▐▌ ▐▌ ▝▀▚▖
// ▐▙▄▄▖▗▄▄▞▘  █ ▐▌ ▐▌▐▙▄▄▀▝▚▄▞▘▗▄▄▞▘

$routes->get('estados/listar', 'Controller_Estados::listar');
$routes->post('estados/guardar', 'Controller_Estados::guardar');
