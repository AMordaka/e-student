<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uczelnie extends CI_Controller {

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
         $this->load->model('Uczelnia_model', 'Uczelnia_model');
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

        $query = $this->db->get("Uczelnia");
        $data['uczelnie'] = $query->result();
        $query2 = $this->db->get("Wydzial");
        $data['wydzial'] = $query2->result();
        $this->load->view('uczelnie',$data);

    }

    public function addAcademyForm(){
        $name = $this->input->post('name');
        $street = $this->input->post('street');
        $number = $this->input->post('number');
        $postCode = $this->input->post('postCode');
        $city = $this->input->post('city');
        $year = $this->input->post('year');


        if($name != null && $street != null && $number != null && $city != null){
            $this->Uczelnia_model->addAcademy($name, $street, $number, $postCode, $city, $year);
            redirect(base_url() . 'uczelnie');
        }
    }

    public function deleteAcademyForm(){
        $id = $this->input->post('id');
        $this->Uczelnia_model->deleteAcademy($id);
        redirect(base_url() . 'uczelnie');
    }
}
