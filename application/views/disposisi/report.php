<?php
//============================================================+
// File name   : example_005.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 005 for TCPDF class
//               Multicell
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Multicell
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
//hilangkan fungsi required_once disini krna sudh sispkn file di library pdf repoprt
// require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('Sistem monitoring proyek akhir (SIMONIKA)');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
$pdf->SetFooterData( PDF_FOOTER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 10);

// add a page
$pdf->AddPage();

// set cell padding
$pdf->setCellPaddings(1, 1, 1, 1);

// set cell margins
$pdf->setCellMargins(1, 1, 1, 1);

// set color for background
$pdf->SetFillColor(255, 255, 127);

// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)
$judul = <<<EOD
<p align="right">  Kode Dokumen : Simonika-01</p><br>
<h3> KARTU KONTROL BIMBINGAN PROYEK AKHIR  </h3><br><br>
EOD;

$pdf->WriteHtmlCell(0, 0, '', '', $judul ,0, 1, 0, true, 'C', true);

$table = '<table style = " border:2px; padding:6px; ">';

foreach ($data as $row ) {
$table .= '<tr style="solid #000">
<th style = "border:1px solid #000 ; ">Nama Mahasiswa</th>
<td style = "border:1px solid #000;">'.$row->nama_mhs.'</td>
<td style = "solid #000;"></td>
</tr> 

<tr style="solid #000">
<th style = "border:1px solid #000;">Nim</th>
<td style = "border:1px solid #000;">'.$row->nim.'</td>
<td style = " solid #000;"></td>
</tr> 

<tr style="solid #000">
<th style = "border:1px solid #000;">Program Studi / Kelas</th>
<td style = "border:1px solid #000;">Teknik Informatika / '.$row->kelas.'</td>
<td style = " solid #000;"></td>
</tr> 

<tr style="solid #000">
<th style = "border:1px solid #000;">Dosen Pembimbing</th>
<td style = "border:1px solid #000;">1. '.$row->pembimbing1.' <br> 2. '.$row->pembimbing2.'</td>
<td style = "solid #000;"></td>
</tr> 

<tr style="solid #000">
<th style = "border:1px solid #000;">Judul PA</th>
<td style = "border:1px solid #000;">1. '.$row->judul.'</td>
<td style = " solid #000;"></td>
</tr> 


'; 


}

$table .= '</table> <br><br>';
$pdf->WriteHtmlCell(0, 0, '', '', $table, 0, 1, 0, true, 'C', true);

//tabel kedua

$table2 = '<table style = "border:1px solid #000; padding:6px;">';

$table2 .= '<tr style="background-color:#ccc">
<th style = "border:1px solid #000;">Hari & Tanggal </th>
<th style = "border:1px solid #000;">Catatan </th>
<th style = "border:1px solid #000;">Paraf Dosen Pembimbing </th>



</tr>';

$table2 .=
'<tr>
<td style = "border:1px solid #000; height:450px;"></td>
<td style = "border:1px solid #000;"></td>
<td style = "border:1px solid #000;"></td>

</tr>';


$table2 .= '</table>';

$pdf->WriteHtmlCell(0, 0, '', '', $table2, 0, 1, 0, true, 'C', true);

$foot = <<<EOD
<p align="left" text-style="italic">NB : Kartu ini digunakan untuk bimbingan secara offline, dan merupakan persyaratan pendaftaran seminar/sidang.</p>
EOD;
$pdf->WriteHtmlCell(0, 0, '', '', $foot, 0, 1, 0, true, 'C', true);

// move pointer to last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
//tambhkan fungsi ob_clean untuk menghapus output buffer
ob_clean();
$pdf->Output('Kartu Kendali Bimbingan.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
