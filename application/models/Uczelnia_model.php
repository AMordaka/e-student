<?php

class Uczelnia_model extends CI_Model
{
	private $idUczelni;
	private $nazwa;
	private $adres;
	private $rokZalozenia;
	
	
	public function __construct($idUczelni = null)
	{
		parent::__construct(); 
	}
	
      public function update($data,$old_roll_no) { 
         $this->db->set($data); 
         $this->db->where("idUczelni", $old_roll_no); 
         $this->db->update("Uczelnia_model", $data); 
      } 
	
	
	
}