<?php

class CetakDispo_model extends CI_model {
    function __construct()
	{
		parent::__construct();
    }
    
    

  function suratmasuk($id){

		$this->db->select(['a.*' , 'b.*']);
		$this->db->from('suratmasuk a');
		$this->db->join('dispo_direktur b ' , 'b.id = a.dispo_direktur_id' , 'left' );
		$this->db->where("a.id = '$id'");
        
		$return = $this->db->get();
		return $return->row();
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
		








}
