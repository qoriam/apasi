<?php


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
// class MYPDF extends TCPDF {

//     //Page header
//     public function Header() {
//         // Logo
//         $image_file = image.'poliwangi.jpg';
//         $this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
//         // Set font
//         $this->SetFont('helvetica', 'B', 12);
//         // Title
// 		$this->Cell(0, 15, 'KEMENTRIAN RISET, TEKNOLOGI, DAN PENDIDIKAN TINGGI ', 0, false, 'C', 0, '', 0, false, 'M', 'M');
		
    

    

// create new PDF document
//$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// create new PDF document
 $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('Rekapitulasi');
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

// set some text to print


$judul = <<<EOD
<h3> REKAPITULASI $judul BULAN $bulan <br>TAHUN $tahun  </h3>
EOD;


$pdf->WriteHtmlCell(0, 0, '', '', $judul ,0, 1, 0, true, 'C', true);






$pdf->WriteHtmlCell(0, 0, '', '', $table2, 0, 1, 0, true, 'C', true);  


$table2 = '<table style = "solid #000; padding:6px; align=:"center"; ">';

$table2 .= '<br>
<tr > 
<th style = "border:1px solid #000; width:40px;  "> NO </th>
<th style = "border:1px solid #000; width:150px;"> NO SURAT </th>
<th style = "border:1px solid #000; width:150px; ">TANGGAL TERIMA</th>
<th style = "border:1px solid #000; width:150px; ">PENGIRIM</th>
<th style = "border:1px solid #000; width:150px;">TANGGAL SURAT </th>
</tr>';
$i =1;
foreach ($disposisi as $row ) {

	$table2 .= '<tr>
	<th style = "border:1px solid #000; width:40px;">'.$i++.'</th>
	<th style = "border:1px solid #000; width:150px;">'.$row->no_surat.'</th>
	<th style = "border:1px solid #000; width:150px; ">'.$row->tgl_terima.'</th>
	<th style = "border:1px solid #000; width:150px; ">'.$row->pengirim.'</th>
	<th style = "border:1px solid #000; width:150px;">'.$row->tgl_surat.'</th>
	
	</tr>';


}
$table2 .= '</table>';

$pdf->WriteHtmlCell(0, 0, '', '', $table2, 0, 1, 0, true, 'C', true); 








// move pointer to last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
//tambhkan fungsi ob_clean untuk menghapus output buffer
ob_clean();
$pdf->Output('SK PA', 'I');

//============================================================+
// END OF FILE
//============================================================+
