<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Oceny extends CI_Controller {

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
        $this->db->select('*');
        $this->db->from('oceny');
        $this->db->join('przedmiot', 'przedmiot.subjectId = oceny.subjectId');
        $this->db->join('wykladowca', 'wykladowca.teacherId = oceny.teacherId');
        $query = $this->db->get();
        $data['oceny'] = $query->result();

        $this->load->view('oceny',$data);
    } 
}
