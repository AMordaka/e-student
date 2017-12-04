<?php

class Uczelnia_model extends CI_Model
{

	public function __construct($idUczelni = null)
	{
		parent::__construct(); 
	}

	public function addAcademy($name, $street, $number, $postCode, $city, $year){
        $data = array(
            'name' => $name,
            'street' => $street,
            'number' => $number,
            'postCode' => $postCode,
            'city' => $city,
            'year' => $year,
        );
        $this->db->insert('uczelnia', $data);
    }

    public function deleteAcademy($id){
        $this->db->where('academyId', $id);
        $this->db->delete('uczelnia');
    }
	
}