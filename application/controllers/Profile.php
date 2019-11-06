<?php

class Profile extends CI_Controller {

    public  function __construct()
    {
        parent::__construct();

        $this->load->model('User_model');
        $this->load->model('Jabatan_model');
        $this->load->model('Pegawai_model');

        date_default_timezone_set("Asia/Jakarta"); 
        $this->dateToday = date("Y-m-d H:i:s");

        is_login();
    }

	public function index()
	{
        $data['judul'] = "Profile";
        $data['user'] = $this->User_model->getAll();
        // $data['pegawai']  = $this->Pegawai_model->get_All();
        // $data['jabatan']  = $this->Jabatan_model->get_All();
        $data['no'] = "" ;
        
        $data['_view'] = 'profil/index';
        $this->load->view('templates/index',$data);
    }
}