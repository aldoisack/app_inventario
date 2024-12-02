<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Dompdf\Dompdf;

class Controller_Pdf extends Controller
{
    public function generar()
    {
        // Contenido HTML para el PDF
        $html = '<h1>Hola, este es un PDF generado con Dompdf</h1>';

        // Crear instancia de Dompdf
        $dompdf = new Dompdf();

        // Cargar contenido HTML
        $dompdf->loadHtml($html);

        // Configurar tamaño y orientación del papel
        $dompdf->setPaper('A4', 'portrait'); // o 'landscape' para horizontal

        // Renderizar el PDF
        $dompdf->render();

        // Enviar el PDF al navegador
        return $this->response->setHeader('Content-Type', 'application/pdf')
            ->setBody($dompdf->output());
    }
}
