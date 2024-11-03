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

// ▗▄▖ ▗▄▄▄▖▗▄▄▄▖ ▗▄▄▖▗▄▄▄▖▗▖  ▗▖ ▗▄▖  ▗▄▄▖
// ▐▌ ▐▌▐▌     █  ▐▌     █  ▐▛▚▖▐▌▐▌ ▐▌▐▌   
// ▐▌ ▐▌▐▛▀▀▘  █  ▐▌     █  ▐▌ ▝▜▌▐▛▀▜▌ ▝▀▚▖
// ▝▚▄▞▘▐▌   ▗▄█▄▖▝▚▄▄▖▗▄█▄▖▐▌  ▐▌▐▌ ▐▌▗▄▄▞▘

$routes->get('oficinas/listar', 'Controller_Oficinas::listar');
