<?php

//new buffer

ob_start();

require_once('../tcpdf/tcpdf.php');
require_once('../FPDI-1.5.2/fpdi.php');

// initiate FPDI

$pdf = new FPDI();

// Removes default header and footer (black line)

$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);

// set document information

$pdf->SetCreator('URI');
$pdf->SetAuthor('URI');
$pdf->SetTitle('URI');
$pdf->SetSubject('URI');

// add a page

$pdf->AddPage();

// set the source

$pdf->setSourceFile('../template.pdf');

$pdf->SetFont("Times", "", 12);
$pdf->SetTextColor(0,0,0);

// Test Variable

$name = 'Name McNameyson';

// PAGE ONE TEXT

//$pdf->MultiCell(80, 3, strtoupper($_POST['name']) .,, 0, 'L', 0, 1, '24', '68', true);

$pdf->MultiCell(80, 3, strtoupper($name) .',', 0, 'L', 0, 1, '24', '68', true);

$pdf->MultiCell(58, 3, $_POST ['name'], 0, 'L', 0, 1, '126', '40.5', true);
$pdf->MultiCell(80, 3, $_POST ['name'] . ",", 0, 'L', 0, 1, '24', '68', true);
$pdf->MultiCell(80, 3, $_POST ['name'], 0, 'L', 0, 1, '101', '148', true);
$pdf->MultiCell(80, 3, $_POST ['name'], 0, 'L', 0, 1, '101', '164', true);
$pdf->MultiCell(80, 3, $_POST ['name'], 0, 'L', 0, 1, '101', '172', true);
$pdf->MultiCell(80, 3, $_POST ['name'] . ", " . $_POST ['name'] . " " .  $_POST ['name'], 0, 'L', 0, 1, '101', '180', true);
$pdf->MultiCell(80, 3, $_POST ['name'], 0, 'L', 0, 1, '101', '188', true);

// increment pages

$tplidx = $pdf->importPage(1);
for ($i = 1; $i < 4; $i++)
{ 
$tplidx = $pdf->ImportPage($i);

// choose page to write
 
$pdf->useTemplate($tplidx);
$pdf->AddPage();

// PAGE TWO TEXT

                     if ($i==1) {

$pdf->MultiCell(150, 3, "I, " . $_POST ['name'] . "string following variable", 1, 'L', 0, 1, '24', '36', true);

                     }
                     
// PAGE THREE TEXT

                     if ($i==2) {

$pdf->MultiCell(80, 3, strtoupper($_POST ['name']), 1, 'L', 0, 1, '25', '62', true);
$pdf->MultiCell(80, 3, strtoupper($_POST ['name']) . ", " . strtoupper($_POST ['name']) . " " .  strtoupper($_POST ['name']), 1, 'L', 0, 1, '25', '70', true);


                     }

}

// buffer

ob_end_clean();

// output

$pdf->Output('output.pdf', 'D');

?>