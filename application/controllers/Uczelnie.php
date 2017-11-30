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
      } 
	
	public function index() {
       $this->load->helper('url');

        $query = $this->db->get("Uczelnia");
        $data['uczelnie'] = $query->result();

        $this->load->view('uczelnie',$data);
    }

    public function dodajUczelnie(){
        $name = $this->input->post('name');
        $street = $this->input->post('street');
        $number = $this->input->post('number');
        $postCode = $this->input->post('postCode');
        $city = $this->input->post('city');
        $year = $this->input->post('year');

        $data = array(
            'name' => $name,
            'street' => $street,
            'number' => $number,
            'postCode' => $postCode,
            'city' => $city,
            'year' => $year,
        );

        $this->db->insert('uczelnia', $data);

        redirect(base_url() . 'uczelnie');
    }
}
