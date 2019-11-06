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
       
        $querySurat = "SELECT `suratmasuk`.*, `dispo_direktur`.`wadir_id` 
        from  `suratmasuk` 
        join `dispo_direktur` 
        where `suratmasuk`.`id` = `dispo_direktur`.`surat_masuk_id` 
        and `dispo_direktur`.`wadir_id` = ". $this->session->userdata['jabatan_id'] ." ORDER BY `suratmasuk`.`id` DESC ";
        

        $data['suratmasuk'] = $this->db->query($querySurat)->result();      

        $data['no'] = "" ;
        
        $data['_view'] = 'wadir/disposisi/index';
        $this->load->view('templates/index',$data);
    }

    public function tambah($id)
    {
        $query = "SELECT `dispo_wadir`.* from `dispo_wadir`, `suratmasuk` where `dispo_wadir`.`surat_masuk_id` = `suratmasuk`.`id` and `suratmasuk`.`id` = $id";

        $data['dispo_wadir'] = $this->db->query($query)->result();

        $query = "SELECT * FROM `jabatan` where `role_id` = 4";
        $data['jabatan'] = $this->db->query($query)->result();
        $data['jenis_dispo']  = $this->SuratMasuk_model->getall_Jenis();
        $data['jumlahSuratmasuk'] = $this->Dashboard_model->jumlahSuratmasuk();
        $data['data']   = $this->SuratMasuk_model->get_data($id);
        //$data['selectdispodirektur']   = $this->Disposisi_model->selectdispodirektur($id);
        // print_r($selectdispodirektur); die;

        $data['user'] = $this->User_model->getAll();
        $data['judul'] = "Tambah Disposisi";
        $data['_view'] = 'wadir/disposisi/tambah';
        $this->load->view('templates/index',$data);
    }

    public function dispo_wadir($id)
    {
        $this->form_validation->set_rules('isi', 'Isi', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            redirect('wadir/disposisi/tambah/'.$id);
        }
        else
        {
            // insert ke tabel dispo wadir
            $data_insert = [
                "pimpinan_id" => $this->input->post('tujuan', true),
                "isi" => $this->input->post('isi', true),
                "tgl_kirim" => date("Y-m-d H:i:s"),
                "status" => 0,
                "surat_masuk_id" => $id,
            ];
            $this->db->insert('dispo_wadir', $data_insert);

            // ambil data dari disposisi direktur
            $wadir_id = $this->session->userdata('jabatan_id');
            $disposisi_direktur = $this->db->get_where('dispo_direktur', ['wadir_id' => $wadir_id, 'surat_masuk_id' => $id])->row();

            // update ke tabel dispo direktur
            $data_update = [
                "status" => 1,
            ];
            $this->db->where('id', $disposisi_direktur->id);
            $this->db->update('dispo_direktur', $data_update);

            // update ke tabel suratmasuk
            $data_update2 = [
                "status_wadir" => 1,
                "keterangan" => "Disposisi ke Pimpinan",
                "dispo_direktur_id" => $disposisi_direktur->id,
            ];

            $this->db->where('id', $id);
            $this->db->update('suratmasuk', $data_update2);

            $this->session->set_flashdata('flash',"Diubah");
            redirect('wadir/disposisi/tambah/'.$id);
        }   
    }
    
    public function approve($id){
        // pimpinan ke pimpinan, dan di approve pimpinan ke 2
        $wadir_id = $this->session->userdata('jabatan_id');
        $disposisi_direktur = $this->db->get_where('dispo_direktur', ['wadir_id' => $wadir_id, 'surat_masuk_id' => $id])->row();

        // update tabel dispo_pimpinan ke approve / penerima = 1
        $data_update1 = [
            "approve" => 1,
        ];

        $this->db->where('id', $disposisi_direktur->id);
        $this->db->update('dispo_direktur', $data_update1);

        // update ke tabel suratmasuk
        $data_update2 = [
            "status" => 1,
            "status_wadir_approve" => 1,
            "keterangan" => "disposisi di approve wadir",
            "dispo_direktur_id" => $disposisi_direktur->id,
        ];

        $this->db->where('id', $id);
        $this->db->update('suratmasuk', $data_update2);

        $this->session->set_flashdata('flash',"Diubah");
        redirect('wadir/disposisi/');
    }

    public function edit()
    {
        $data['judul'] = "Disposisi";
        // $data['disposisi'] = $this->Disposisi_model->getAll();
        
        $data['_view'] = 'direktur/disposisi/edit';
        $this->load->view('templates/index',$data);
    }
    public function detail($id)
	{
        $query = "SELECT `dispo_wadir`.* 
        from `dispo_wadir`, `suratmasuk` 
        where `dispo_wadir`.`surat_masuk_id` = `suratmasuk`.`id` 
        and `suratmasuk`.`id` = $id";

        $data['dispo_wadir'] = $this->db->query($query)->result();

        $query = "SELECT * FROM `jabatan` where `role_id` = 4";
        $data['jabatan'] = $this->db->query($query)->result();
        $data['jenis_dispo']  = $this->SuratMasuk_model->getall_Jenis();
        $data['jumlahSuratmasuk'] = $this->Dashboard_model->jumlahSuratmasuk();
        $data['data']   = $this->SuratMasuk_model->get_data($id);
        $data['user'] = $this->User_model->getAll();
        $data['judul'] = "Detail Disposisi";
        $data['_view'] = 'wadir/disposisi/detail';
        $this->load->view('templates/index',$data);
    }

    



}
