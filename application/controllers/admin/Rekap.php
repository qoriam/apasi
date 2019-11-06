<?php

class Rekap extends CI_Controller {

    public  function __construct()
    {
        parent::__construct();

        $this->load->model('SuratMasuk_model');
        // $this->load->model('Jabatan_model');
        // $this->load->model('Pegawai_model');

        date_default_timezone_set("Asia/Jakarta"); 
        $this->dateToday = date("Y-m-d H:i:s");

        
         is_login();
    }

	public function approve()
	{
        $data['bulan'] = $this->input->post('bulan') ? $this->input->post('bulan') : date('m');
        $data['tahun'] = $this->input->post('tahun') ? $this->input->post('tahun') : date('Y');

        $data['suratditerima'] = $this->SuratMasuk_model->suratmasuk_approve($data['bulan'], $data['tahun']);

        $data['judul'] = "Rekapitulasi";
        $data['_view'] = 'rekap/approve';
        $this->load->view('templates/index',$data);
    }

    public function cetak($bulan,$tahun)
	{
        $data['suratditerima'] = $this->SuratMasuk_model->suratmasuk_approve($bulan,$tahun);

        $data['judul'] = "Rekapitulasi";
        $data['_view'] = 'rekap/approve';
        $this->load->view('templates/index',$data);
    }

    public function pending(){
        $data['bulan'] = $this->input->post('bulan') ? $this->input->post('bulan') : date('m');
        $data['tahun'] = $this->input->post('tahun') ? $this->input->post('tahun') : date('Y');

        $data['suratpending'] = $this->SuratMasuk_model->suratmasuk_pending($data['bulan'], $data['tahun']);

        $data['judul'] = "Rekapitulasi";
        $data['_view'] = 'rekap/pending';
        $this->load->view('templates/index',$data);
    }
}