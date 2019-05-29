<?php

require('vendor/fpdf/fpdf/original/fpdf.php');
$array = array();

//Filling array
for($i = 0; $i < 10; $i++){
    $arr = array();
    for($j = 0; $j < 20; $j++){
        array_push($arr, rand(1, 100));
    }
    array_push($array, $arr);
}

ob_start();
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);
foreach ($array as $row){
    foreach ($row as $element){
        $pdf->Cell(9.5,6,$element,1);
    }
    $pdf->Ln();
}
$pdf->Output();
ob_end_flush();


