<?php

class Jabatan_model extends CI_Model {
    
    public function __construct(){
       
        $this->table = 'jabatan';
        $this->tablero = 'roles';
        parent::__construct();
    }

    function getAll()
    {
        $this->db->select('jabatan.id, jabatan, role');
        $this->db->join('roles', 'roles.id = jabatan.role_id');
        
        $query = $this->db->get($this->table);
        return $query->result();
    }

    function get_AllRoles(){
        $query = $this->db->get($this->tablero);
        return $query->result();
    }


   function get_data($id)
    {
        $query = $this->db->get_where($this->table, array('id'=>$id));
        return $query->row();
    }

    function insert($data){
        $this->db->insert($this->table, $data);
    }

    function update($data, $id){
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }

    function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }

    // function edit($jabatan, $role_id){
    //     $hasil  = $this->db->query("UPDATE jabatan SET jabatan='$jabatan', role_id='$role_id' WHERE id='$id'")
    //     return $hsl;
    // }
}
