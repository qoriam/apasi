<?php

class Disposisi extends CI_Controller {
    public  function __construct()
    {
        parent::__construct();
      
        $this->load->model('Disposisi_model'); 
        $this->load->model('User_model');
        $this->load->model('SuratMasuk_model');
        $this->load->model('Dashboard_model');
        $this->load->library('upload');
        $this->load->library('form_validation');

        date_default_timezone_set("Asia/Jakarta"); 
        $this->dateToday = date("Y-m-d H:i:s");
        is_login();
    }

	public function index()
	{
        $data['judul'] = "Surat Disposisi";
        // disposisi dari wadir ke pimpinan
        $querySurat = "SELECT `suratmasuk`.*, `dispo_wadir`.`pimpinan_id`
        from  `suratmasuk`
        join `dispo_wadir`
        where `suratmasuk`.`id` = `dispo_wadir`.`surat_masuk_id` 
        and `dispo_wadir`.`pimpinan_id` = ". $this->session->userdata['jabatan_id'] ." ORDER BY `suratmasuk`.`id` DESC ";
        $data['suratmasuk'] = $this->db->query($querySurat)->result();  
        
        // var_dump($data['suratmasuk']); die;
        // disposisi dari pimpinan ke pimpinan

        $data['no'] = "" ;
        
        $data['_view'] = 'pimpinan/disposisi/index';
        $this->load->view('templates/index',$data);
    }

    public function dispo_pimpinan($id)
    {
        $this->form_validation->set_rules('isi', 'Isi', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            redirect('pimpinan/disposisi/tambah/'.$id);
        }
        else
        {
            $data_insert = [
                "pimpinan_id" => $this->input->post('tujuan', true),
                "isi" => $this->input->post('isi', true),
                "tgl_kirim" => date("Y-m-d H:i:s"),
                "surat_masuk_id" => $id
            ];
            $this->db->insert('dispo_pimpinan', $data_insert);

            // jika dispo_wadir kosong maka dispo wadir id di isi, jika dispo_wadir tidak kosong, maka di isi dispo pimpinan

            // ambil data dari disposisi wadir / pimpinan
            $suratmasuk = $this->db->get_where('suratmasuk',['id' => $id])->row();
            if($suratmasuk->dispo_wadir_id == 0){

                 // ambil data dari disposisi wadir
                $pimpinan_id = $this->session->userdata('jabatan_id');
                $disposisi_wadir = $this->db->get_where('dispo_wadir', ['pimpinan_id' => $pimpinan_id, 'surat_masuk_id' => $id])->row();

                // update ke tabel dispo wadir
                $data_update = [
                    "status" => 1,
                ];
                $this->db->where('id', $disposisi_wadir->id);
                $this->db->update('dispo_wadir', $data_update);

                // update ke tabel suratmasuk
                $data_update = [
                    "status_pimpinan" => 1,
                    "keterangan" => "disposisi dr wadir ke pimpinan",
                    "dispo_wadir_id" => $disposisi_wadir->id,
                ];

                $this->db->where('id', $id);
                $this->db->update('suratmasuk', $data_update);

            }     

            $this->session->set_flashdata('flash',"Diubah");
            redirect('pimpinan/disposisi/tambah/'.$id);
        }   
    }

    public function approvepertama($id){
        // dari wadir ke pimpinan dan di approve pimpinan langsung
        $pimpinan_id = $this->session->userdata('jabatan_id');
        $dispo_wadir = $this->db->get_where('dispo_wadir', ['pimpinan_id' => $pimpinan_id, 'surat_masuk_id' => $id])->row();

        // update tabel dispo_pimpinan ke approve = 1
        $data_update1 = [
            "status" => 1,
            "approve" => 1,
        ];

        $this->db->where('id', $dispo_wadir->id);
        $this->db->update('dispo_wadir', $data_update1);

        // update ke tabel suratmasuk
        $data_update2 = [
            "status" => 1,
            "keterangan" => "disposisi dr wadir dilaksanankan oleh pimpinan",
        ];

        $this->db->where('id', $id);
        $this->db->update('suratmasuk', $data_update2);

        $this->session->set_flashdata('flash',"Diubah");
        redirect('pimpinan/disposisi/');
    }

    public function approve($id){
        // pimpinan ke pimpinan, dan di approve pimpinan ke 2
        $pimpinan_id = $this->session->userdata('jabatan_id');
        $disposisi_pimpinan = $this->db->get_where('dispo_pimpinan', ['pimpinan_id' => $pimpinan_id, 'surat_masuk_id' => $id])->row();

        // update tabel dispo_pimpinan ke approve / penerima = 1
        $data_update1 = [
            "status" => 1,
            "approve" => 1,
        ];

        $this->db->where('id', $disposisi_pimpinan->id);
        $this->db->update('dispo_pimpinan', $data_update1);

        // update ke tabel suratmasuk
        $data_update2 = [
            "status" => 1,
            "keterangan" => "disposisi dr pimpinan ke pimpinan",
            "dispo_pimpinan_id" => $disposisi_pimpinan->id,
        ];

        $this->db->where('id', $id);
        $this->db->update('suratmasuk', $data_update2);

        $this->session->set_flashdata('flash',"Diubah");
        redirect('pimpinan/disposisi/');
    }

    public function tambah($id)
    {
        $query = "SELECT `dispo_pimpinan`.* 
                from `dispo_pimpinan`, `suratmasuk` 
                where `dispo_pimpinan`.`surat_masuk_id` = `suratmasuk`.`id` 
                and `suratmasuk`.`id` = $id";
        $data['dispo_pimpinan'] = $this->db->query($query)->result();

        $query = "SELECT * FROM `jabatan` where `role_id` = 4";
        $data['jabatan'] = $this->db->query($query)->result();
        $data['jenis_dispo']  = $this->SuratMasuk_model->getall_Jenis();
        $data['jumlahSuratmasuk'] = $this->Dashboard_model->jumlahSuratmasuk();
        $data['data']   = $this->SuratMasuk_model->get_data($id);
        $data['user'] = $this->User_model->getAll();
        $data['judul'] = "Tambah Disposisi";
        $data['_view'] = 'pimpinan/disposisi/tambah';
        $this->load->view('templates/index',$data);
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
        $query = "SELECT `dispo_pimpinan`.* 
                from `dispo_pimpinan`, `suratmasuk` 
                where `dispo_pimpinan`.`surat_masuk_id` = `suratmasuk`.`id` 
                and `suratmasuk`.`id` = $id";
        $data['dispo_pimpinan'] = $this->db->query($query)->result();

        $query = "SELECT * FROM `jabatan` where `role_id` = 4";
        $data['jabatan'] = $this->db->query($query)->result();
        $data['jenis_dispo']  = $this->SuratMasuk_model->getall_Jenis();
        $data['jumlahSuratmasuk'] = $this->Dashboard_model->jumlahSuratmasuk();
        $data['data']   = $this->SuratMasuk_model->get_data($id);
        $data['user'] = $this->User_model->getAll();
        $data['judul'] = "Detail Disposisi";
        $data['_view'] = 'pimpinan/disposisi/detail';
        $this->load->view('templates/index',$data);
    }

    public function laporan($id)
    {     
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $query = "SELECT `dispo_pimpinan`.* 
            from `dispo_pimpinan`, `suratmasuk` 
            where `dispo_pimpinan`.`surat_masuk_id` = `suratmasuk`.`id` 
            and `suratmasuk`.`id` = `dispo_pimpinan`.`id`";

            $data['dispo_pimpinan'] = $this->db->query($query)->result();
            $query = "SELECT * FROM `jabatan` where `role_id` = 4";
            $data['jabatan'] = $this->db->query($query)->result();
            $data['jenis_dispo']  = $this->SuratMasuk_model->getall_Jenis();
            $data['jumlahSuratmasuk'] = $this->Dashboard_model->jumlahSuratmasuk();
            $data['data']   = $this->SuratMasuk_model->get_data($id);
            $data['user'] = $this->User_model->getAll();
            $data['judul'] = "Laporan";
            $data['_view'] = 'pimpinan/disposisi/laporan';
            $this->load->view('templates/index',$data);
        }
        else
        {
            $config['upload_path'] = './assets/laporan';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = '5048';  //4MB max
            $myFileName = str_replace(' ','-',strtolower($id)).'-'.date('d-m-Y');
            $config['file_name'] = $myFileName;

            $this->upload->initialize($config);
            if (!empty($_FILES['file']['name'])) {
                $this->upload->do_upload('file');
                $lampiran=$this->upload->data(); }
        

            $data_insert = [
                "keterangan" => $this->input->post('keterangan', true),
                "file" => $myFileName.'.pdf',
                "tgl_kirim" => date("Y-m-d H:i:s"),
                "suratmasuk_id" => $id
            ];
            $this->db->insert('laporan', $data_insert);

            // update ke tabel suratmasuk
            $data_update = [
                "keterangan" => "laporan diterima",
                "laporan_id" => $this->db->insert_id(),
            ];

            $this->db->where('id', $id);
            $this->db->update('suratmasuk', $data_update);

            $data_wadir = [
                "status" => 2,
            ];

            $this->db->where('surat_masuk_id', $id);
            $this->db->update('dispo_wadir', $data_wadir);

            redirect('pimpinan/disposisi');
        }
    
    } //end function laporan




} //end controller