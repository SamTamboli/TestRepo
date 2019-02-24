<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_model extends CI_Model {

	 public function __construct(){
        
		parent::__construct();
        $this->load->database();
		
      }

// cverify mobile number for user and service provider
	public function employeelist()
	{

	  $this->db->select('emp_name,emp_id,emp_email,emp_mobile');
	  $this->db->from('employee');
	  $query=$this->db->get();
	 
	  if($query->num_rows()>0)	
	  {
		 $result=$query->result_array(); 
	    return $result;
	  }
	  else
	  {
		return false;
	  }
	}
	
	public function chkemplogin($uname,$pwd)
	{
		$this->db->select('emp_name,emp_id,emp_email,emp_mobile');
	    $this->db->from('employee');
		$this->db->where('user_name',$uname);
		$this->db->where('password',$pwd);
		$query=$this->db->get();
	 
	  if($query->num_rows()>0)	
	  {
		 $result=$query->result_array(); 
	    return $result;
	  }
	  else
	  {
		return false;
	  }
	}
	


}