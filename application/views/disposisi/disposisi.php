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
$pdf->SetTitle('Disposisi');
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
<h3> DISPOSISI  </h3>
EOD;


$pdf->WriteHtmlCell(0, 0, '', '', $judul ,0, 1, 0, true, 'C', true);


$table2 = '<table style = "border:1px solid #000; padding:2px;  ">';

foreach ($surat as $row ) {
$table2 .= '<tr >
<th style = "border:1px solid #000; " align="left">Tanggal terima : '.$row->tgl_terima.' </th>
<th style = "border:1px solid #000;" align="left">Nomor Agenda : '.$row->id.'</th>

</tr>';
}

$table2 .= '</table>';
$pdf->WriteHtmlCell(0, 0, '', '', $table2, 0, 1, 0, true, 'C', true); 


// data surat masuk
$table2 = '<table style = " solid #FFFFFF; padding:5px; align=:"center"; ">';


foreach ($agenda as $row ) {

$table2 .= '<tr >
<th style = " solid #000; width:200px; " align="left"> Jenis Disposisi </th>
<th style = " solid #000; width:423px; " align="left"> Pengirim :  '.$row->pengirim.' </th>


</tr>';

$table2 .=
'<tr>
<td style = " solid #000; width:200px;" align="left">Rahasia</td>
<td style = " solid #000; width:423px;" align="left"> Nomor Surat 		: '.$row->no_surat.'</td>

</tr>';

$table2 .= '<tr >
<th style = " solid #000; width:200px; " align="left"> Penting </th>
<th style = " solid #000; width:423px; " align="left"> Tanggal Surat : '.$row->tgl_surat.'</th>
</tr>';

$table2 .= '<tr >
<th style = " solid #000; width:200px; " align="left"> Segera </th>
<th style = " solid #000; width:423px; " align="left"> Lampiran : '.$row->lampiran.' </th>

</tr>';$table2 .= '<tr >
<th style = " solid #000; width:200px; " align="left"> Biasa </th>
<th style = " solid #000; width:423px; " align="left"> Perihal Surat :'.$row->perihal.' </th>

</tr>';
}

$table2 .= '</table>';

$pdf->WriteHtmlCell(0, 0, '', '', $table2, 0, 1, 0, true, 'C', true);  


$table2 = '<table style = "solid #000; padding:6px; align=:"center"; ">';

$table2 .= '<br>
<tr > 
<th style = "border:1px solid #000; width:150px;  "> DARI </th>
<th style = "border:1px solid #000; width:150px;"> KEPADA </th>
<th style = "border:1px solid #000; width:230px; ">ISI DISPOSISI </th>
<th style = "border:1px solid #000; width:90px;">PARAF </th>
</tr>';

foreach ($dispo_dir as $row ) {
$table2 .= '<tr>
<th style = "border:1px solid #000; width:150px; height:70px "> '.$row->jabatan.' </th>
<th style = "border:1px solid #000; width:150px;">  </th>
<th style = "border:1px solid #000; width:230px; "> </th>
<th style = "border:1px solid #000; width:90px;"> </th>

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
