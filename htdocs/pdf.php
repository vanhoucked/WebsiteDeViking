<?php

    //gebruik de TCPDF library
    include('tcpdf/tcpdf.php');

    //haal de naam uit het formulier en zet om naar upper case
    $naam = strtoupper($_POST['naam']);

    //past de fontgrootte aan naarmate het aantal lettertekens
    $lengte = strlen($naam);

    if ($lengte < 6) {
        $grootte = 160;
    } elseif ($lengte < 10) {
        $grootte = 90;
    } elseif ($lengte < 15) {
        $grootte = 80;
    } elseif ($lengte < 20) {
        $grootte = 70;
    } else {
        $grootte = 50;
    }

    //nieuwe pdf genereren zonder header of footer met één pagina
    $pdf = new TCPDF('l','px','A4');

    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);

    $pdf->addPage();

    //stel de font instellingen voor de volledige pdf in
    $fontname = TCPDF_FONTS::addTTFfont('Viking.ttf');
    $pdf->SetFont($fontname,20);

    //stel de achtergrond in
    $pdf->Image('background.png', 0, 30, 510, 368, 'PNG', '', '', false, 0, 'C', false, false, 0, false, false, false);

    //schrijf naam bovenop de achtergrond
    $pdf->SetFont ('', '', $grootte, '', 'default', true );
    $pdf->SetTextColor(255,255,255);
    $pdf->Write(450, $naam, '', 0, 'C', false, 0, false, false, 0);

    $pdf->Output();

?>