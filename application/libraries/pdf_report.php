<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//sisipkan file tcpdf di sini
require_once dirname(__file__).'/tcpdf/tcpdf.php';
class pdf_report extends TCPDF
{
    protected $ci;

    function __construct()
    {
        parent::__construct();

    }


}


