<?php

defined('BASEPATH') or exit('No direct script access allowed');

class LoginModel extends CI_Model{

	public function logincheck($data)
	{
		//echo "<pre>-->mod";print_r($data);exit;
		$query  = $this->db->select("user_id,user_name,password,permission_user_id")
					->from("user_login")
					->where("user_name",$data['username'])
					->where("password",$data['password'])
					->get()
					->row_array();

					//echo($this->db->last_query());
					//echo "<pre>";print_r($query);exit;

			if(isset($query)){
				$logindata = array(
				'userid'=> $query['user_id'],
				'username'=> $query['user_name'],
				'permission_user_id'=> $query['permission_user_id']

			); 
				$this->session->set_userdata($logindata);
				return true;
			}
			else
			{
				return false;
			}
	}



	public function addregister($data)
	{
		// echo "<pre>--mod";print_r($data);exit;

		$add = array(
			'user_name'=>$data['uname'],
			'email'=>$data['email'],
			'password'=>$data['password'],
			'created_at' => date('Y-m-d H:i:s')
		);
		$insert = $this->db->insert("user_register",$add);

		$insert_id = $this->db->insert_id();
			$addlogin = array(
				'user_id '=> $insert_id,
				'user_name'=> $add['email'],
				'password'=> $add['password'],
				'permission_user_id'=> 2
			);
			$logininsert = $this->db->insert("user_login",$addlogin);
		//echo($this->db->last_query());exit;
			if(isset($insert))
			{
				return true;
			}else
			{
				return false;
			}
			
	}

}