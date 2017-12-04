<?php

class Student_model extends CI_Model
{
	private $userid;
	private $specializationid;
	private $roleId;
	private $name;
	private $surname;
    private $password;
    private $pesel;
    private $street;
    private $number;
    private $postCode;
    private $city;
	
	
	public function __construct($id = null)
	{
		parent::__construct();
        if ($id != null)
        {
            $sql = "SELECT * FROM users WHERE UserId = ?";
            $user = $this->db->query($sql, $id)->result_array()[0];
            if(!empty($user))
            {
                $this->setStudent($user);
            }
        }
	}

    private function setStudent($user)
    {
        $this->userid = $user[0]['userId'];
        $this->specializationid = $user[0]['specializationId'];
        $this->roleId = $user[0]['roleId'];
        $this->name = $user[0]['name'];
        $this->surname = $user[0]['surname'];
        $this->password = $user[0]['password'];
        $this->pesel = $user[0]['pesel'];
        $this->street = $user[0]['street'];
        $this->number = $user[0]['number'];
        $this->postCode = $user[0]['postCode'];
        $this->city = $user[0]['city '];


        $this->load->model('Role_model');
        $this->role = new Role_model($user[0]['RoleId']);
    }



    public function checkLoginAndPassword($id, $password)
    {
        $this->db->from('student');
        $this->db->where('userId', $id);
        $this->db->where('password', $password);
        return $this->db->get()->result_array();
    }


    public function addStudent($specializationId, $name, $surname,$pesel, $street, $number, $postCode, $city){
        $data = array(
            'specializationId' => $specializationId,
            'roleId' => 2,
            'name' => $name,
            'surname' => $surname,
            'password' => 'Qwerty123',
            'pesel' => $pesel,
            'street' => $street,
            'number' => $number,
            'postCode' => $postCode,
            'city' => $city
        );
        $this->db->insert('student', $data);
    }
}