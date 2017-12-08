<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DodajWykladowce extends CI_Controller {

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
        $this->db->from('wykladowca');
        $this->db->join('wydzial', 'wydzial.departmentId = wykladowca.departmentId');
        $this->db->join('uczelnia', 'uczelnia.academyId = wydzial.academyId');
        $query = $this->db->get();
        $data['users'] = $query->result();

        $this->db->select('*');
        $this->db->from('wydzial');
        $query = $this->db->get();
        $data['departments'] = $query->result();

        $this->load->view('dodajwykladowce',$data);
    }

    public function addUser(){

        $this->load->model('Teacher_model');


        $departmentId = $this->input->post('departmentId');
        $name = $this->input->post('name');
        $surname = $this->input->post('surname');
        $title = $this->input->post('title');
        $street = $this->input->post('street');
        $number = $this->input->post('number');
        $postCode = $this->input->post('postCode');
        $city = $this->input->post('city');


        if($name != null && $street != null && $number != null && $city != null && $departmentId != null && $surname != null && $title != null){
            $this->Teacher_model->addUser($departmentId, $name, $surname,$title, $street, $number, $postCode, $city);
            redirect(base_url() . 'dodajwykladowce');
        }
        redirect(base_url() . 'dodajwykladowce');
    }
}
