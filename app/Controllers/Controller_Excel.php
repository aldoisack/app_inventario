<?php

namespace App\Controllers;

use App\Models\Model_BienPatrimonial;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Controller_Excel extends BaseController
{
    public function exportar()
    {
        $modelo = new Model_BienPatrimonial();
        $bienes = $modelo->listar_bienes();

        // Crear un nuevo archivo de Excel
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Establecer los encabezados de las columnas
        $columnNames = ['ID Bien', 'Código', 'Categoría', 'Oficina', 'Estado'];
        $columnLetters = ['A', 'B', 'C', 'D', 'E'];

        // Agregar encabezados
        foreach ($columnNames as $index => $columnName) {
            $sheet->setCellValue($columnLetters[$index] . '1', $columnName);
        }

        // Rellenar las filas con los datos de la base de datos
        $rowIndex = 2; // Comienza desde la segunda fila para los datos
        foreach ($bienes as $row) {
            $sheet->setCellValue('A' . $rowIndex, $row['id_bien']);
            $sheet->setCellValue('B' . $rowIndex, $row['codigo']);
            $sheet->setCellValue('C' . $rowIndex, $row['nombre_categoria']);
            $sheet->setCellValue('D' . $rowIndex, $row['nombre_oficina']);
            $sheet->setCellValue('E' . $rowIndex, $row['nombre_estado']);
            $rowIndex++;
        }

        // Crear el archivo Excel
        $writer = new Xlsx($spreadsheet);

        // Descargar el archivo
        $filename = 'datos_exportados.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit();
    }
}
