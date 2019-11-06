<?php

class Disposisi_model extends CI_model {

    public function getAll()
    {
        // return $this->db->get('disposisi')->result();
    }

    public function countAll()
    {
        $query = $this->db->get("disposisi");
        return $query->num_rows();
    }
     function get_data($id)
    {
        $query = $this->db->get_where($this->table, array('id'=>$id));
        return $query->row();
    }

    public function getPagination($limit, $start)
    {
        $this->db->select('*');
        $this->db->from('disposisi');
        $this->db->order_by("kode", "ASC");
        $this->db->limit($limit,$start);
        $query = $this->db->get();

        return $query->result();
    }

    public function get($id)
    {
        return $this->db->get_where('disposisi', ['id' => $id])->row();
    }

   

    public function insert()
    {
        $data = [
            "nomor_surat" => $this->input->post('nomor_surat', true),
            "asal" => $this->input->post('asal', true),
            "tanggal" => $this->input->post('tanggal', true),
            "perihal" => $this->input->post('perihal', true),
        ];
        $this->db->insert('disposisi', $data);
    }

    
    // public function selectdispodirektur($id)
    // {
        
    //     $this->db->select(
    //         ['a.*' , 'b.*', 'c*'
            
    //         ]);
    //     $this->db->from('suratmasuk a');
    //     $this->db->join('dispo_direktur b ' , 'b.id = a.dispo_direktur_id' , 'left' );
    //     $this->db->join('jabatan c', 'c.id = b.wadir_id', 'left');
    //     $this->db->where("a.id = '$id'");
         
    // }

    public function dispo_dir($suratmasuk_id,$jabatan_id)
    {
        $dispo_dir = "SELECT `dispo_direktur`.*, `jabatan`.`jabatan` 
        from  `dispo_direktur`, `jabatan` 
        where `dispo_direktur`.`wadir_id` = `jabatan`.`id` 
        and `dispo_direktur`.`surat_masuk_id` = $suratmasuk_id 
        and `dispo_direktur`.`wadir_id` = $jabatan_id";
        $result = $this->db->query($dispo_dir)->row();

        return $result;
    }

    public function dispo_wadir($suratmasuk_id,$jabatan_id)
    {
        $dispo_wadir = "SELECT `dispo_wadir`.*, `jabatan`.`jabatan` 
        from  `dispo_wadir`, `jabatan` 
        where `dispo_wadir`.`pimpinan_id` = `jabatan`.`id` 
        and `dispo_wadir`.`surat_masuk_id` = $suratmasuk_id 
        and `dispo_wadir`.`pimpinan_id` = $jabatan_id";
        $result = $this->db->query($dispo_wadir)->row();

        return $result;
    }

    public function dispo_pimpinan($suratmasuk_id,$jabatan_id)
    {
        $dispo_pimpinan = "SELECT `dispo_pimpinan`.*, `jabatan`.`jabatan` 
        from  `dispo_pimpinan`, `jabatan` 
        where `dispo_pimpinan`.`pimpinan_id` = `jabatan`.`id` 
        and `dispo_pimpinan`.`surat_masuk_id` = $suratmasuk_id 
        and `dispo_pimpinan`.`pimpinan_id` = $jabatan_id";
        $result = $this->db->query($dispo_pimpinan)->row();

        return $result;
    }
}