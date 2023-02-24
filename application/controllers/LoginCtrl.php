<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginCtrl extends CI_Controller {


	//Constructor Define
	function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('LoginModel');
    }


	public function index()
	{
		$this->load->view('Login');
	}

	public function Loginvalidation()
	{
		$data = $this->input->post();
		//echo "<pre>";print_r($data);exit;
		 echo json_encode($this->LoginModel->logincheck($data));
		 
		//$this->LoginModel->logincheck($data);
	}


	public function registration()
	{
		$this->load->view('Register');
	}

	public function addregisterdata()
	{
		//echo "<pre>";print_r($_POST);exit;

		$data = $this->input->post();
		//echo "<pre>";print_r($data);exit;
		if(isset($data))
		{
			//echo"if";exit;
			echo json_encode($this->LoginModel->addregister($data));
		}
		
		 
		// $this->LoginModel->addregister($data);
	}
}
