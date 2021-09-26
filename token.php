<?php
require_once 'FPDF/fpdf.php';

include_once 'helpers/Format.php';
include_once 'classes/Appointment.php';
$app = new Appointment();
$fm = new Format();

Session::userSession();

$appid = $_GET['appid'];

$getApp = $app->getApp($appid);
$result = $getApp->fetch_assoc();

if (isset($result))
{
    $pdf = new FPDF('p', 'mm', 'a4');
    $pdf->AddPage();
    $pdf->Rect(5, 5, 200, 287, 'D');
    $pdf->SetFont('arial', 'b', '14');

    // Move to the right
    $pdf->Cell(80);
    // Title
    $pdf->Cell(30,10,'Online Appointment Token',0,0,'C');
    // Line break
    $pdf->Ln(30);
    $pdf->SetLeftMargin(20);

    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(55,10,'Appointment Information-',0,1);
    $pdf->SetFont('Arial', '', 12);

    $pdf->Cell(55, 8, 'Appointment Id', 0, 0);
    $pdf->Cell(55, 8, ':    #0120602'.$appid, 0, 1);

    $pdf->Cell(55, 8, 'Name', 0, 0);
    $pdf->Cell(55, 8, ':    '.$result['owner_name'], 0, 1);

    $pdf->Cell(55, 8, 'Appointment Date ', 0, 0);
    $pdf->Cell(58, 8, ':    '.$fm->formatDate($result['choose_date']), 0, 1);

    $pdf->Cell(55, 8, 'Appointment Time ', 0, 0);
    $pdf->Cell(58, 8, ':    '.$result['choose_time'], 0, 1);

    // Line break
    $pdf->Ln(10);
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(55,10,'Doctor Information-',0,1);
    $pdf->SetFont('Arial', '', 12);

    $pdf->Cell(55, 8, 'Doctor Name', 0, 0);
    $pdf->Cell(55, 8, ':    '.$result['choose_doctor'], 0, 1);

    $pdf->Line(10, 30, 200, 30);
    $pdf->Ln(10);




    $pdf->Output();
}

?>