<?php
include_once "Alumno.php";
require_once "FPDF/fpdf.php";
$alumno=[];

$alumno[0]=new Alumno("Ana","martines artach",123456789,"Calle Ana",10);
$alumno[1]=new Alumno("Bea","martinez ramirez",123456789,"Calle Bea",9);
$alumno[2]=new Alumno("Clara","artacho sanchez",123456789,"Calle Clara",8);
$alumno[3]=new Alumno("Dani","gutierres melendez",2234234,"calle federico",7);
$alumno[4]=new Alumno("Elena","salcedo garrido",123456789,"Calle Elena",6);
$alumno[5]=new Alumno("Fernando","ramirez delgado",123456789,"Calle Fernando",5);

$pdf= new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);
$pdf->setXY(50,10);
$pdf->write(5,"2 DAW");
$pdf->SetFont('Arial','B',16);

$pdf->setXY(50, 20);
$pdf->Cell(100, 10, 'Grupo A', 1);
$pdf->Ln();
$pdf->SetFont('Arial', '', 10);

for ($i = 0; $i < count($alumno); $i++) {
    $y = 30 + $i * 10;
    $pdf->setXY(50, $y);
    $pdf->Cell(50, 10, "Nombre: " . $alumno[$i]->getNombre(), 1);
    $pdf->Cell(50, 10, "Apellidos: " . $alumno[$i]->getApellidos(), 1);
    $pdf->Ln();
}
$pdf->Image('Sin título.png',10,10,30,30,'PNG',"Sin título.png");
$pdf->output();