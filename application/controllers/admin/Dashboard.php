<?php

class Dashboard extends CI_Controller {

    public  function __construct()
    {
        parent::__construct();
        $this->load->model('Disposisi_model');
        $this->load->model('Dashboard_model');
        is_login();
    }

	public function index()
	{
        $data['judul'] = "Dashboard";
        $data['jumlahSuratmasuk'] = $this->Dashboard_model->jumlahSuratmasuk();
        $data['jumlahUser'] = $this->Dashboard_model->jumlahUser();
        $data['jumlahjabatan'] = $this->Dashboard_model->jumlahjabatan();
        $data['jumlahjenis'] = $this->Dashboard_model->jumlahjenis();
        $data['_view'] = 'admin/dashboard';
        $this->load->view('templates/index',$data);
    }
}

?>