<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Przedmioty extends CI_Controller {

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
        $this->db->from('przedmiot');
        $query = $this->db->get();
        $data['subjects'] = $query->result();

        $this->db->select('*');
        $this->db->from('student');
        $query = $this->db->get();
        $data['students'] = $query->result();

        $this->db->select('*');
        $this->db->from('wykladowca');
        $query = $this->db->get();
        $data['teachers'] = $query->result();


        $this->load->view('przedmioty', $data);
}


    public function addSubjectForm(){
        $name = $this->input->post('nameSubject');

        if($name != null){
            $data = array(
                'nameSubject' => $name
            );
            $this->db->insert('przedmiot', $data);
            redirect(base_url() . 'przedmioty');
        }
        redirect(base_url() . 'przedmioty');
    }


    public  function addSubjectToStudent(){

        $subject = $this->input->post('subject');
        $teacher = $this->input->post('teacher');
        $student = $this->input->post('student');

        $data = array(
            'userId' => $student,
            'teacherId' => $teacher,
            'subjectId' => $subject
        );

        $this->db->insert('oceny',$data);
        redirect(base_url() . 'przedmioty');

    }

    public function deleteSubject(){
        $id = $this->input->post('id');
        $this->db->where('subjectId', $id);
        $this->db->delete('przedmiot');
        redirect(base_url() . 'przedmioty');
    }
}
