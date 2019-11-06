<?php

class Jabatan extends CI_Controller {

    public  function __construct()
    {
        parent::__construct();
      
        $this->load->model('Jabatan_model');
        $this->load->model('User_model');

        is_login();
    }

	public function index()
	{
        $data['judul'] = "Jabatan";
        $data['jabatan'] = $this->Jabatan_model->getAll();
        $data['roles']  = $this->Jabatan_model->get_AllRoles();        
        $data['_view'] = 'admin/jabatan/index';
        $this->load->view('templates/index',$data);
    }

    public function add()
    {
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim|is_unique[jabatan.jabatan]', [
            'is_unique' => 'Jabatan sudah ada!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['judul']  = "User - Jabatan";
            $data['_view']  = 'admin/jabatan/tambah';
            $data['roles']  = $this->User_model->get_AllRoles();
            $this->load->view('templates/index', $data);
        } else {
            $data  = [
                'jabatan'   => htmlspecialchars($this->input->post('jabatan', true)),
                'role_id'   => htmlspecialchars($this->input->post('role_id', true))
            ];
            $this->Jabatan_model->insert($data,'jabatan');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" >Berhasil ditambahkan</div>');
            redirect('admin/jabatan');
        }
    }


    public function edit($id)
    {      

        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim|is_unique[jabatan.jabatan]', [
            'is_unique' => 'Jabatan sudah ada!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['data']   = $this->Jabatan_model->get_data($id);
            $data['_view']  = 'admin/jabatan/edit';
        }else{
            $id     = $this->input->post('id');
            $data  = [
                'jabatan'   => $this->input->post('jabatan'),
                'role_id'   => $this->input->post('role_id'),
            ];               
            $this->Jabatan_model->update($data, $id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" >Berhasil diubah</div>');
            redirect('admin/jabatan');
        }
    }

    public function update(){
       $jabatan     = $this->input->post('jabatan');
       $role_id     = $this->input->post('role_id');
        $this->User_model->update($data, $id);
        redirect('admin/jabatan');
    }

    public function delete($id)
    {
        $this->Jabatan_model->delete($id);
        redirect('admin/jabatan');
    }
}