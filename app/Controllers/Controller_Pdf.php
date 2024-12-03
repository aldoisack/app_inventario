<?php

namespace App\Controllers;

use App\Models\Model_Movimientos;
use CodeIgniter\Controller;
use App\Libraries\dompdf\vendor\dompdf\dompdf\src\Dompdf;
use Dompdf\Cpdf;


class Controller_Pdf extends Controller
{
    public function imprimir_movimientos($id_bien)
    {
        $modelo_movimientos = new Model_Movimientos();
        $movimientos['movimientos'] = $modelo_movimientos->obtener_movimientos($id_bien);


        $vista = view('view_bienes_movimientos_imprimir', $movimientos);
        $html = view('view_web_pdf', ['vista' => $vista]);

        $dompdf = new Dompdf();
        $dompdf->set_option('isRemoteEnabled', true);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        return $this->response->setHeader('Content-Type', 'application/pdf')->setBody($dompdf->output());
    }
}
