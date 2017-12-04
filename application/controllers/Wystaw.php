<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wystaw extends CI_Controller {

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
        $this->db->select('*');
        $this->db->from('oceny');
        $this->db->join('przedmiot', 'przedmiot.subjectId = oceny.subjectId');
        $this->db->join('student', 'student.userId=oceny.userId');
        $this->db->where('teacherId = '.$_SESSION['id'].' AND grade IS NULL');
        $query = $this->db->get();
        $data['dowystawienia'] = $query->result();

        $this->load->view('wystaw',$data);

    }

    public function wystawOcene(){
        $this->load->helper('date');

        $id = $this->input->post('id');
        $ocena = $this->input->post('ocena');


        $today = date("Y-m-d");

        $this->db->set('grade',$ocena);
        $this->db->set('date', $today);
        $this->db->where('gradeId',$id);
        $this->db->update('oceny');
        redirect(base_url() . 'wystaw');

    }
}
