<?php

class SuratMasuk_model extends CI_model {

    public function __construct(){
       
        $this->table = 'suratmasuk';
        $this->tablesj = 'jenis_dispo';
        parent::__construct();
    }

    public function getAll()
    {
        $this->db->select('suratmasuk.id, no_surat, tgl_terima, pengirim, perihal, tgl_surat, lampiran, status, keterangan, nama_jenis, dispo_direktur_id, dispo_wadir_id');
        $this->db->join('jenis_dispo', 'jenis_dispo.id = suratmasuk.jenis_id');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get($this->table);
        return $query->result();
    }
    
    function suratmasuk_approve($bulan, $tahun) {
        $this->db->select('*');
        $this->db->from('suratmasuk');
        $this->db->where('month(tgl_surat)',$bulan);
        $this->db->where('year(tgl_surat)',$tahun);
        $this->db->where("status = '1'");
        $this->db->order_by('tgl_surat', 'ASC');
        
        $query = $this->db->get();
        return $query->result();
    }

    function suratmasuk_pending($bulan, $tahun) {
        $this->db->select('*');
        $this->db->from('suratmasuk');
        $this->db->where('month(tgl_surat)',$bulan);
        $this->db->where('year(tgl_surat)',$tahun);
        $this->db->where("status = '2'");
        $this->db->order_by('tgl_surat', 'ASC');
        
        $query = $this->db->get();
        return $query->result();
    }

    function getall_Jenis(){
        $query = $this->db->get($this->tablesj);
        return $query->result();
    }

    public function countAll()
    {
        $query = $this->db->get("suratmasuk");
        return $query->num_rows();
    }

    public function get_data($id)
    {
        $query = $this->db->get_where($this->table, array('id'=>$id));
        return $query->row();
    }

    public function insert($data)
    {
        $this->db->insert($this->table, $data);

    }

    public function update($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);

    }

    function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }


}