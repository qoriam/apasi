<?php

class CetakDisposisi extends CI_Controller{ 
  public  function __construct()
  {
    parent::__construct();
    $this->load->library('pdf_report');
    $this->load->model('SuratMasuk_model');
    $this->load->model('CetakDispo_model');
    $this->load->model('Disposisi_model');
    $this->load->model('Dashboard_model');
    $this->load->model('User_model');

    // is_login();

  }


public function suratmasuk($id)
{

  // $wadir = "SELECT `dispo_wadir`.* 
  //           from `dispo_wadir`, `suratmasuk` 
  //           where `dispo_wadir`.`surat_masuk_id` = `suratmasuk`.`id` 
  //           and `suratmasuk`.`id` = $id";

  // $data['dispo_wadir'] = $this->db->query($wadir)->result()
  // ;

  // $pimpinan = "SELECT `dispo_pimpinan`.* 
  //               from `dispo_pimpinan`, `suratmasuk` 
  //               where `dispo_pimpinan`.`surat_masuk_id` = `suratmasuk`.`id` 
  //               and `suratmasuk`.`id` = $id";
  // $data['dispo_pimpinan'] = $this->db->query($pimpinan)->result();


  // $query = "SELECT * FROM `jabatan` where `role_id` = 4";
  // $data['jabatan'] = $this->db->query($query)->result();
  // $data['jenis_dispo']  = $this->SuratMasuk_model->getall_Jenis();
  // $data['data']   = $this->SuratMasuk_model->get_data($id);
  // $data['surat'] = $this->CetakDispo_model->suratmasuk($id); 
  $data['agenda'] = $this->CetakDispo_model->jumlahSuratmasuk(); 

  $query = "SELECT `dispo_pimpinan`.* 
  from `dispo_pimpinan`, `suratmasuk` 
  where `dispo_pimpinan`.`surat_masuk_id` = `suratmasuk`.`id` 
  and `suratmasuk`.`id` = $id";
  $data['dispo_pimpinan'] = $this->db->query($query)->result();

  $query = "SELECT * FROM `jabatan` where `role_id` = 4";
  $data['jabatan'] = $this->db->query($query)->result();
  $data['jenis_dispo']  = $this->SuratMasuk_model->getall_Jenis();
  $data['data']   = $this->SuratMasuk_model->get_data($id);
  $data['user'] = $this->User_model->getAll();

  $this->load->library('pdf');

  // $customPaper = array(0,0,360,360);
  // $this->pdf->set_paper($customPaper);

  $this->pdf->setPaper('A4', 'potrait');
  $this->pdf->filename = "disposisi.pdf";
  // $this->pdf->load_view('pdf/suratmasuk', $data);
  $this->pdf->load_view('pdf/disposisi', $data);
}


function direktur($id){		
 

                                          

}



public function rekap($bulan,$tahun)
{

  $data['disposisi'] = $this->SuratMasuk_model->suratmasuk_approve($bulan,$tahun);
  $data['bulan'] = $this->namabulan($bulan);
  $data['tahun'] = $tahun;
  $data['judul'] = "DISPOSISI SELESAI";
  $this->load->view('disposisi/rekap', $data); 
}

public function rekappending($bulan,$tahun)
{

  $data['disposisi'] = $this->SuratMasuk_model->suratmasuk_pending($bulan,$tahun);
  $data['bulan'] = $this->namabulan($bulan);
  $data['tahun'] = $tahun;
  $data['judul'] = "DISPOSISI PENDING";
  $this->load->view('disposisi/rekap', $data); 
}

public function namabulan($bulan){
  if($bulan == 1){
    $namabulan = "Januari";
  } else if($bulan == 2){
    $namabulan = "Februari";
  } else if($bulan == 3){
    $namabulan = "Mei";
  } else if($bulan == 4){
    $namabulan = "April";
  }
  else if($bulan == 5){
    $namabulan = "Mei";
  }
  else if($bulan == 6){
    $namabulan = "Juni";
  }
  else if($bulan == 7){
    $namabulan = "Juli";
  }
  else if($bulan == 8){
    $namabulan = "Februari";
  }
  else if($bulan == 9){
    $namabulan = "Februari";
  }
  else if($bulan == 10){
    $namabulan = "Februari";
  }
  else if($bulan == 11){
    $namabulan = "Februari";
  }
  else if($bulan == 12){
    $namabulan = "Februari";
  }

  return $namabulan;

}



} 


