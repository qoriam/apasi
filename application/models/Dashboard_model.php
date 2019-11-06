<?php

class Dashboard_model extends CI_model {

    function __construct()
	{
        $this->table = 'suratmasuk';
        parent::__construct();
        
    }

    public function jumlahSuratmasuk()
    {   
        $query = $this->db->get('suratmasuk');
        if($query->num_rows()>0)
        {
        return $query->num_rows();
        }
        else
        {
        return 0;
        }
    }

    public function jumlahUser()
    {   
        $query = $this->db->get('users');
        if($query->num_rows()>0)
        {
        return $query->num_rows();
        }
        else
        {
        return 0;
        }
    }

    public function jumlahjabatan()
    {   
        $query = $this->db->get('jabatan');
        if($query->num_rows()>0)
        {
        return $query->num_rows();
        }
        else
        {
        return 0;
        }
    }

    public function jumlahjenis()
    {   
        $query = $this->db->get('jenis_dispo');
        if($query->num_rows()>0)
        {
        return $query->num_rows();
        }
        else
        {
        return 0;
        }
    }
}