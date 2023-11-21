<?php
require 'conexao.php';
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$headerCells = ['A1', 'B1', 'C1', 'D1', 'E1', 'F1', 'G1', 'H1', 'I1'];
$headerNames = ['SOLICITAÇÃO', 'BLOCO', 'DESCRIÇÃO', 'DISPOSITIVO', 'ENVIO', 'STATUS', 'USUÁRIO', 'TÉCNICO', 'ADM'];

foreach ($headerCells as $index => $cell) {
    $sheet->setCellValue($cell, $headerNames[$index]);
    $sheet->getStyle($cell)->applyFromArray([
        'fill' => [
            'fillType' => Fill::FILL_SOLID,
            'color' => ['rgb' => 'D3D3D3']
        ],
        'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
        'font' => ['bold' => true]
    ]);
}

$sql = "SELECT * FROM `tb_chamados` ORDER BY tipo_problema ASC";
$busca = mysqli_query($conexao, $sql);

$row = 2;

while ($array = mysqli_fetch_array($busca)) {
    $sheet->setCellValue('A' . $row, $array['tipo_problema']);
    $sheet->setCellValue('B' . $row, $array['sala']);
    $sheet->setCellValue('C' . $row, $array['descricao']);
    $sheet->setCellValue('D' . $row, $array['iditem']);
    $sheet->setCellValue('E' . $row, $array['data_envio']);
    $sheet->setCellValue('F' . $row, $array['status']);
    $sheet->setCellValue('G' . $row, $array['iduser']);
    $sheet->setCellValue('H' . $row, $array['idtec']);
    $sheet->setCellValue('I' . $row, $array['iduser_adm']);

    foreach (range('A', 'I') as $column) {
        $sheet->getStyle($column . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    }

    $cellRange = 'A' . $row . ':I' . $row;
    $sheet->getStyle($cellRange)->applyFromArray([
        'borders' => [
            'allBorders' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                'color' => ['rgb' => '000000'],
            ],
        ],
        'font' => ['bold' => true],
    ]);

    $cellRange = 'A' . $row . ':I' . $row;
    if ($array['status'] == 'atendido') {
        $sheet->getStyle($cellRange)->applyFromArray([
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'color' => ['rgb' => 'C9FFC9']
            ]
        ]);
    } else {
        $sheet->getStyle($cellRange)->applyFromArray([
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'color' => ['rgb' => 'FFFF99']
            ]
        ]);
    }

    $row++;
}

foreach (range('A', 'I') as $column) {
    $sheet->getColumnDimension($column)->setAutoSize(true);
}

$writer = new Xlsx($spreadsheet);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="chamados.xlsx"');

$writer->save('php://output');
?>
