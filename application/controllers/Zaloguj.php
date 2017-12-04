<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Zaloguj extends CI_Controller {


      function __construct() {
         parent::__construct();
         $this->load->helper('url');
         $this->load->model('student_model', 'student_model');
         $this->load->model('teacher_model', 'teacher_model');
         $this->load->library('form_validation');
      } 
	
	public function index() {
       $this->load->view('zaloguj');
        $this->load->view('site_header');
        $this->load->view('sidebar_wrapper');
        $this->load->view('login_form');
        $this->load->view('footer');
    }

    public function login()
    {

            $id = $this->input->post('user');
            $password = $this->input->post('password');
            $role = $this->input->post('role');


            $this->form_validation->set_rules('user', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if($this->form_validation->run() == FALSE){

            }
            if($role == 2) {
                if ($this->student_model->checkLoginAndPassword($id, $password) != null) {
                    $data =$this->student_model->checkLoginAndPassword($id, $password);
                    $session_data = array(
                        'id'     =>    $id,
                        'name'     =>     $data[0]['name'],
                        'surname'     =>     $data[0]['surname'],
                        'roleId'     =>     $data[0]['roleId']
                    );
                    $this->session->set_userdata($session_data);
                    redirect(base_url() . 'home');
                }else{
                    redirect(base_url() . 'home');
                }
            }
            else{
                if ($this->teacher_model->checkLoginAndPassword($id, $password) != null) {
                    $data =$this->teacher_model->checkLoginAndPassword($id, $password);
                    $session_data = array(
                        'id'     =>    $id,
                        'name'     =>     $data[0]['name'],
                        'surname'     =>     $data[0]['surname'],
                        'roleId'     =>     $data[0]['roleId']
                    );
                    $this->session->set_userdata($session_data);
                    redirect(base_url() . 'home');
                }
                else{
                    redirect(base_url() . 'home');
                }
            }



    }


    function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('surname');
        redirect(base_url() . 'home');
    }
}
