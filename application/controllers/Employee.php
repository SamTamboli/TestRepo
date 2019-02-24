<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

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

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('Employee_model');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
	}


	 public function index()
	{
		$this->load->view('login');
	}
	
	public function userlogin()
	{
		$uname=$this->input->post('uname');
		$pwd=$this->input->post('pwd');
		//echo $uname." ".$pwd;
		
		$chklogin=$this->Employee_model->chkemplogin($uname,$pwd);
//		print_r($chklogin);
		if($chklogin)
		{
				$this->session->set_userdata('user_name',$chklogin[0]['emp_name']);
				
				echo json_encode(array('status'=>'success'));
		}
		else
		{
				echo json_encode(array('status'=>'error','msg'=>'Invalid Login Credentials'));
		}
		
	}
	
	public function allemployee()
	{
		$data=array();
		$list=array();
		$uname=$this->session->userdata('user_name');
		if($uname)
		{
			$data['uname']=$uname;
		}
		$list=$this->Employee_model->employeelist();
		//print_r($list);
		
		if($list)
		{
			$data['employeelist']=$list;
		}
		
		$this->load->view('employee_list',$data);

	}
}
