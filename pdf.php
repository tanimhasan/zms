<?php
require_once 'FPDF/fpdf.php';

include_once 'helpers/Format.php';
include_once 'classes/Ticket.php';
    $ticket = new Ticket();
    $fm = new Format();

Session::userSession();

$tic_id = $_GET['ticid'];

$getTic = $ticket->getTic($tic_id);
$result = $getTic->fetch_assoc();


if (isset($result))
{
    $pdf = new FPDF('p', 'mm', 'a4');
    $pdf->AddPage();
    $pdf->Rect(5, 5, 200, 287, 'D');
    $pdf->SetFont('arial', 'b', '14');

    // Move to the right
    $pdf->Cell(80);
    // Title
    $pdf->Cell(30,10,'Online Ticket',0,0,'C');
    // Line break
    $pdf->Ln(30);
    $pdf->SetLeftMargin(20);

    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(55,10,'Ticket Information-',0,1);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(55, 8, 'Ticket Id', 0, 0);
    $pdf->Cell(55, 8, ':    #0120602'.$tic_id, 0, 1);
    $pdf->Cell(55, 8, 'Name', 0, 0);
    $pdf->Cell(55, 8, ':    '.$result['name'], 0, 1);
    $pdf->Cell(55, 8, 'Number of Adult: ', 0, 0);
    $pdf->Cell(58, 8, ':    '.$result['adult_num'], 0, 1);
    $pdf->Cell(55, 8, 'Number of Child: ', 0, 0);
    $pdf->Cell(58, 8, ':    '.$result['child_num'], 0, 1);
    $pdf->Cell(55, 8, 'Visiting Date: ', 0, 0);
    $pdf->Cell(58, 8, ':    '.$fm->formatDate($result['booking_date']), 0, 1);
    $pdf->Line(10, 30, 200, 30);
    $pdf->Ln(10);




    $pdf->Output();
}

?>