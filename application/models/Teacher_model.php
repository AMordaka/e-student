<?php
/**
 * Created by PhpStorm.
 * User: Arek
 * Date: 26.11.2017
 * Time: 21:14
 */

class Teacher_model extends CI_Model
{

    private $teacherId;
    private $departmentId;
    private $roleId;
    private $name;
    private $surname;
    private $password;
    private $title;
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
        $this->teacherId = $user[0]['teacherId'];
        $this->departmentId = $user[0]['departmentId'];
        $this->roleId = $user[0]['roleId'];
        $this->name = $user[0]['name'];
        $this->surname = $user[0]['surname'];
        $this->password = $user[0]['password'];
        $this->title = $user[0]['title'];
        $this->street = $user[0]['street'];
        $this->number = $user[0]['number'];
        $this->postCode = $user[0]['postCode'];
        $this->city = $user[0]['city '];


        $this->load->model('Role_model');
        $this->role = new Role_model($user[0]['RoleId']);
    }


    public function checkLoginAndPassword($id, $password)
    {
        $this->db->from('wykladowca');
        $this->db->where('teacherId', $id);
        $this->db->where('password', $password);
        return $this->db->get()->result_array();
    }


    public function addUser($departmentId, $name, $surname,$title, $street, $number, $postCode, $city){
        $data = array(
            'departmentId' => $departmentId,
            'roleId' => 3,
            'name' => $name,
            'surname' => $surname,
            'password' => 'Qwerty123',
            'title' => $title,
            'street' => $street,
            'number' => $number,
            'postCode' => $postCode,
            'city' => $city
        );
        $this->db->insert('wykladowca', $data);
    }
}