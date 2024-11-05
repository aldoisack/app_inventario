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
$routes->post('bienes/guardar', 'Controller_BienPatrimonial::guardar');
$routes->post('bienes/guardar_detallado', 'Controller_BienPatrimonial::guardar_detallado');

// ▗▄▖ ▗▄▄▄▖▗▄▄▄▖ ▗▄▄▖▗▄▄▄▖▗▖  ▗▖ ▗▄▖  ▗▄▄▖
// ▐▌ ▐▌▐▌     █  ▐▌     █  ▐▛▚▖▐▌▐▌ ▐▌▐▌   
// ▐▌ ▐▌▐▛▀▀▘  █  ▐▌     █  ▐▌ ▝▜▌▐▛▀▜▌ ▝▀▚▖
// ▝▚▄▞▘▐▌   ▗▄█▄▖▝▚▄▄▖▗▄█▄▖▐▌  ▐▌▐▌ ▐▌▗▄▄▞▘

$routes->get('oficinas/listar', 'Controller_Oficinas::listar');
$routes->post('oficinas/guardar', 'Controller_Oficinas::guardar');
// Categorias
$routes->get('categorias/listar', 'Controller_Categorias::listar');
$routes->post('categorias/guardar', 'Controller_Categorias::guardar');
