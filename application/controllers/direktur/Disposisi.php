<?php

class Disposisi extends CI_Controller {
    public  function __construct()
    {
        parent::__construct();
        $this->load->model('Disposisi_model'); 
        $this->load->model('User_model');
        $this->load->model('SuratMasuk_model');
        $this->load->model('Dashboard_model');

        date_default_timezone_set("Asia/Jakarta"); 
        $this->dateToday = date("Y-m-d H:i:s");

        is_login();

    }

	public function index()
	{
        $data['judul'] = "Surat Disposisi";
        $data['suratmasuk'] = $this->SuratMasuk_model->getAll();
        
        $data['_view'] = 'direktur/disposisi/index';
        $this->load->view('templates/index',$data);
    }

    public function detail($id)
	{
        $query = "SELECT `dispo_direktur`.* from `dispo_direktur`, `suratmasuk` where `dispo_direktur`.`surat_masuk_id` = `suratmasuk`.`id` and `suratmasuk`.`id` = $id";
        $data['dispo_direktur'] = $this->db->query($query)->result();

        $query = "SELECT * FROM `jabatan` where `role_id` = 3";
        $data['jabatan'] = $this->db->query($query)->result();
        $data['jenis_dispo']  = $this->SuratMasuk_model->getall_Jenis();
        $data['jumlahSuratmasuk'] = $this->Dashboard_model->jumlahSuratmasuk();
        $data['data']   = $this->SuratMasuk_model->get_data($id);
        $data['user'] = $this->User_model->getAll();
        $data['judul'] = "Detail Disposisi";
        $data['_view'] = 'direktur/disposisi/detail';
        $this->load->view('templates/index',$data);
    }

    public function tambah($id)
    {
        $query = "SELECT `dispo_direktur`.* from `dispo_direktur`, `suratmasuk` where `dispo_direktur`.`surat_masuk_id` = `suratmasuk`.`id` and `suratmasuk`.`id` = $id";
        $data['dispo_direktur'] = $this->db->query($query)->result();

        $query = "SELECT * FROM `jabatan` where `role_id` = 3";
        $data['jabatan'] = $this->db->query($query)->result();
        $data['jenis_dispo']  = $this->SuratMasuk_model->getall_Jenis();
        $data['jumlahSuratmasuk'] = $this->Dashboard_model->jumlahSuratmasuk();
        $data['data']   = $this->SuratMasuk_model->get_data($id);
        $data['user'] = $this->User_model->getAll();
        $data['judul'] = "Tambah Disposisi";
        $data['_view'] = 'direktur/disposisi/tambah';
        $this->load->view('templates/index',$data);
    }

    public function dispo_direktur($id)
    {
        $this->form_validation->set_rules('isi', 'Isi', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            redirect('direktur/disposisi/tambah/'.$id);
        }
        else
        {
            $data_insert = [
                "wadir_id" => $this->input->post('tujuan', true),
                "isi" => $this->input->post('isi', true),
                "tgl_kirim" => date("Y-m-d H:i:s"),
                "surat_masuk_id" => $id,
            ];
            $this->db->insert('dispo_direktur', $data_insert);

             // update ke tabel disposisi
             $data_update = [
                 "status" => 2,
                "keterangan" => "disposisi ke Wadir",
            ];
            $this->db->where('id', $id);
            $this->db->update('suratmasuk', $data_update);

            $this->session->set_flashdata('flash',"Diubah");
            redirect('direktur/disposisi/tambah/'.$id);
        }   
    }

    
}
