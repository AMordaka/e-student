<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DodajStudenta extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
      function __construct() { 
         parent::__construct(); 
         $this->load->helper('url'); 
      } 
	
	public function index() { 
       $this->load->helper('url');
       $this->load->view('site_header');
       $this->load->view('sidebar_wrapper');
       $this->load->view('login_form');
       $this->loadData();
       $this->load->view('footer');
    }

    public function loadData(){
        $this->db->select('*');
        $this->db->from('student');
        $this->db->join('kierunek', 'kierunek.specializationId = student.specializationId');
        $this->db->join('wydzial', 'wydzial.departmentId = kierunek.departmentId');
        $this->db->join('uczelnia', 'uczelnia.academyId = wydzial.academyId');
        $query = $this->db->get();
        $data['users'] = $query->result();

        $this->db->select('*');
        $this->db->from('kierunek');
        $query = $this->db->get();
        $data['specializations'] = $query->result();

        $this->load->view('dodajstudenta',$data);
    }

    public function addUser(){

        $this->load->model('Student_model');

        $specializationId = $this->input->post('specializationId');
        $name = $this->input->post('name');
        $surname = $this->input->post('surname');
        $pesel = $this->input->post('pesel');
        $street = $this->input->post('street');
        $number = $this->input->post('number');
        $postCode = $this->input->post('postCode');
        $city = $this->input->post('city');


        if($name != null && $street != null && $number != null && $city != null && $specializationId != null && $surname != null && $pesel != null){
            $this->Student_model->addStudent($specializationId, $name, $surname,$pesel, $street, $number, $postCode, $city);
            redirect(base_url() . 'dodajstudenta');
        }
        redirect(base_url() . 'dodajstudenta');
    }
}
