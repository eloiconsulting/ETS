<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardCtrl extends CI_Controller {


	//Constructor Define
	function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('DashboardModel');
        $this->db2 = $this->load->database('otherdb', TRUE);
    }


	public function index()
	{

		// $login = $this -> session -> userdata();
		 //echo "<pre>";print_r($_SESSION);exit;
		 if($_SESSION['userid'] == 1)
		 {
		$data['totalcounts'] = $this->DashboardModel->GettotalListcounts();
		$data['totalusercounts'] = $this->DashboardModel->Gettotalusercounts();
		$data['totnewenqcounts'] = $this->DashboardModel->Getnewenqcounts();
		$data['totalinprogresscounts'] = $this->DashboardModel->GettotalinprogressListcounts();
		$data['totalwoncounts'] = $this->DashboardModel->GettotalwonListcounts();
		$data['totallostcounts'] = $this->DashboardModel->GettotallostListcounts();
		$data['notificounts'] = $this->DashboardModel->Getnotificounts();
		$data['asntskcounts'] = $this->DashboardModel->Assigntaskcounts();
		//echo "<pre>";print_r($data['notificounts']);exit;
		
		}else
		{
		$data['totusernewenqcounts'] = $this->DashboardModel->Getusernewenqcounts();
		$data['totalcounts'] = $this->DashboardModel->Getuserbasedenquirycounts();
		$data['totalinprogresscounts'] = $this->DashboardModel->GetuserinprogressListcounts();
		$data['totalwoncounts'] = $this->DashboardModel->GetuserwonListcounts();
		$data['totallostcounts'] = $this->DashboardModel->GettotallostListcounts();
		$data['notificounts'] = $this->DashboardModel->Getnotificounts();
		$data['taskcounts'] = $this->DashboardModel->totaltask();
		$data['newusertaskcounts'] = $this->DashboardModel->usernewtaskcounts();
		}
		$this->load->view('Dashboard',$data);
	}

	public function GetTotalusers()
	{
		$data['user'] = $this->DashboardModel->Gettotaluser();
		$this->load->view('userlist',$data);
	}
	//Dashboards counts process
	// public function dashboardview()
	// {
	// 	$data['totalcounts'] = $this->DashboardModel->GettotalListcounts();
	// 	//echo "<pre>";print_r($data['totalcounts']);exit;
	// 	// $data['totalinprogresscounts'] = $this->DashboardModel->GettotalInprogressListcounts();
	// 	// echo "<pre>";print_r($data['totalinprogresscounts']);exit;
	// 	// $data['totalwoncounts'] = $this->DashboardModel->GettotalwonListcounts();
	// 	// echo "<pre>";print_r($data['totalwoncounts']);exit;
	// 	// $data['totallostcounts'] = $this->DashboardModel->GettotalLostListcounts();
	// 	return('DashboardCtrl/')

	// }


	public function totallist()
	{
		$data['total'] = $this->DashboardModel->GettotalList();
		//echo "<pre>";print_r($data);exit;
		$this->load->view('totalenquirylist',$data);
	}

	//New form
	public function newenq()
	{
		$this->load->view('newenqform');
	}

	public function newenquiries()
	{
		$data['newenqiry'] = $this->DashboardModel->getnewenqiries();
		
		$this->load->view('newenquirieslist',$data);
	}

	public function Taskassign($id,$taskno)
	{
		//echo "<pre>";print_r($taskno);exit;
		$data['newtask'] = $this->DashboardModel->Taskassign($id,$taskno);
		//echo "<pre>";print_r($data);exit;
		if($data['newtask'] == 0)
		{
			$this->session->set_flashdata('category_error', 'Task Already assigned!.');
			redirect('DashboardCtrl/newenquiries');
		}else{
		$this->load->view('newtaskasign',$data);
		}
	}


	//Assigning Task Process

	public function taskasign()
	{
		$this->load->view('taskasign');
	}



	//Website Enquiry Process
	public function websitenquiry()
	{
		$data['web'] = $this->DashboardModel->GetwebList();
		//echo "<pre>";print_r($data['web']);exit;
		$this->load->view('websiteopportunity',$data);
	}

	//Web enquiry List process
	public function getenquiry($id)
	{
		// echo "<pre>";print_r($id);exit;
		$data['enqdata'] = $this->DashboardModel->GetEnqdata($id);
		//echo "<pre>";print_r($data);exit;
		if($data['enqdata'] == 0)
		{
			$this->session->set_flashdata('category_error', 'Data Already Exist.');
			redirect('DashboardCtrl/websitenquiry');
		}else{
		$this->load->view('AddEnqForm',$data);
		}
	}

	// Website Enquiry Addprocess
	public function Addenq()
	{
		// echo "<pre>";print_r($_POST);exit;
		$data = $this->input->post();
		$this->DashboardModel->AddEnq($data);
		$this->session->set_flashdata('category_success', 'Websit Enquiry status changed Successfully!.');
		 redirect('DashboardCtrl/websitenquiry');
	}

	//Add New Manual Enquiry
	public function Addnewenq()
	{
		// echo "<pre>";print_r($_POST);exit;
		$data = $this->input->post();
		$this->DashboardModel->Addnewenq($data);
		$this->session->set_flashdata('category_success', 'Websit Enquiry status changed Successfully!.');
		 redirect('DashboardCtrl/websitenquiry');
	}



	//Won Opportunity Process
	public function wonopportunitylist()
	{
		$data['won'] =$this->DashboardModel->GetWonList();
		$this->load->view('wonlistview',$data);
	}

	//Won Edit Process
	public function viewEditwonlist($id)
	{
		// echo "<pre>";print_r($id);exit;
		$data['wondata'] = $this->DashboardModel->Wonedit($id);

		$this->load->view('EditwonForm',$data);
	}

	public function Editwonlist()
	{
		//echo "<pre>-mod";print_r($_SESSION);exit;
		$data = $this->input->post();
		$this->DashboardModel->Woneditform($data); 
		$this->session->set_flashdata('success', 'Won Opportunity List Edited Successfully!.');
		redirect('DashboardCtrl/wonopportunitylist'); 
	}

	public function wonopprtunitydelete($id)
	{
		//echo "<pre>";print_r($id);exit;
		$this->DashboardModel->deletewonlist($id);
		$this->session->set_flashdata('success', 'Won Opportunity List Deleted Successfully!.');
		redirect('DashboardCtrl/wonopportunitylist');
	}


	//Inprogress Opportunity process
	public function Inprogressopportunitylist()
	{
		$data['won'] =$this->DashboardModel->GetInprogressList();
		$this->load->view('inprogrss_list_view',$data);
	}

	//Inprogress Opportunity edit view process
	public function viewEditinprogresslist($id)
	{
		// echo "<pre>";print_r($id);exit;
		$data['wondata'] = $this->DashboardModel->Wonedit($id);

		$this->load->view('Inprogressform',$data);
	}


	//Inprogress Edit process
	public function Editinprogresslist()
	{
		//echo "<pre>-mod";print_r($_SESSION);exit;
		$data = $this->input->post();
		$this->DashboardModel->Inprogressditform($data); 
		$this->session->set_flashdata('success', 'Inprogress Opportunity List Edited Successfully!.');
		redirect('DashboardCtrl/Inprogressopportunitylist'); 
	}

	//Inprogress Delete process
	public function inprogressopprtunitydelete($id)
	{
		//echo "<pre>";print_r($id);exit;
		$this->DashboardModel->deleteinprogresslist($id);
		$this->session->set_flashdata('success', 'Inprogress Opportunity List Deleted Successfully!.');
		redirect('DashboardCtrl/Inprogressopportunitylist');
	}


	//Lost Opportunity Process

	public function lostopportunitylist()
	{
		$data['lost'] =$this->DashboardModel->GetLostList();
		$this->load->view('lostlistview',$data);
	}

	//Lost Edit process
	public function Editlostlist()
	{
		
		$data = $this->input->post();
		//echo "<pre>-mod";print_r($data);exit;
		$this->DashboardModel->loseditform($data);
		$this->session->set_flashdata('success', 'Lost Opportunity List Edited Successfully!.'); 
		redirect('DashboardCtrl/lostopportunitylist'); 
	}

	//View Lost list process
	public function viewEditlostlist($id)
	{
		// echo "<pre>";print_r($id);exit;
		$data['lostdata'] = $this->DashboardModel->lostedit($id);

		$this->load->view('lostform',$data);
	}

	//Los Delete process
	public function lostopprtunitydelete($id)
	{
		//echo "<pre>";print_r($id);exit;
		$this->DashboardModel->deletelostlist($id);
		$this->session->set_flashdata('success', 'Lost Opportunity List Deleted Successfully!.');
		redirect('DashboardCtrl/lostopportunitylist');
	}


	//Task assign List
	public function tasklist()
	{
		$data['task'] = $this->DashboardModel->GetTaskList();
		//echo "<pre>";print_r($data);exit;
		$this->load->view('tasklists',$data);
	}

	public function usertasklist()
	{
		$data['usertask'] = $this->DashboardModel->GetTaskList();
		//echo "<pre>";print_r($data);exit;
		$this->load->view('usertasklist',$data);
	}

	// User new task 

	public function usernewtask()
	{
		$data['usernewtask'] = $this->DashboardModel->getusernewtask();
		$this->load->view('usernewtasklist',$data);
	}
	//Task Assign view process
	public function GetTaskassignview($id)
	{
		//echo "<pre>";print_r($id);exit;
		$data['taskrow'] = $this->DashboardModel->gettaskdata($id);
		//echo "<pre>";print_r($data);exit;
		$this->load->view('taskasign',$data);
	}
	public function admintaskasign($id)
	{
		//echo "<pre>";print_r($taskno);exit;
		$data['admintaskrow'] = $this->DashboardModel->getadmintaskdata($id);
		//echo "<pre>";print_r($data);exit;
		$this->load->view('admintaskasign',$data);
	}

	public function GetuserTaskassignview($id)
	{
		//echo "<pre>";print_r($id);exit;
		$data['usertask'] = $this->DashboardModel->getusertaskdata($id);
		$this->load->view('usertaskasign',$data);
	}


	public function useredittask()
	{
		//echo "<pre>";print_r($_POST);exit;
		$data = $this->input->post();
		$this->DashboardModel->editusertaskdata($data);
		$this->session->set_flashdata('category_success', 'Task Status Changed Successfully! and notification sent to Admin!.');
		redirect('DashboardCtrl/usertasklist');
	}

    //Assigned task list
    	public function assignedtasklist()
    	{
    		$data['assigned'] = $this->DashboardModel->GetAssignedtasks();
    		$this->load->view('assignedtask',$data);
    	}
	//Task Assign Process
	public function Addassigntask()
	{
		 //echo "<pre>";print_r($_POST);exit;
		$email = $_SESSION['username'];
		//echo "<pre>";print_r($email);exit;
		$data = $this->input->post();
		//Mail send Process
		$this->load->library('email');
		$config = array(
		    'protocol'  => 'smtp',
		     'smtp_host' => 'smtp.gmail.com',
		    'smtp_crypto' => 'tls',
		    'smtp_port' => 587,
		    'smtp_user' => 'pkssharma66@gmail.com',
		    'smtp_pass' => 'ywcfugxexccvntxi',
		    'mailtype'  => 'html',
		    'charset'   => 'utf-8'
		);
		$this->email->initialize($config);
		$this->email->set_mailtype("html");
		$this->email->set_newline("\r\n");
		
		$taskno = $data['enqnoid'];
		$enqrecvdate = $data['enqrecvdate'];
		$clientname = $data['name'];
		$phone = $data['phone'];
		$email = $data['email'];
		$htmlContent = '<h1>Task Assigned Notification</h1>';
		$htmlContent .= '<p> Task No :'.$taskno.'</p>
		<p>Enquiry Recevied Date :'.$enqrecvdate.'</p>
		<p>Client Name : '.$clientname.'</p>
		<p>Client Phone No :'.$phone.'</p>
		<p>Client Email :'.$email.'</p>';
		$this->email->to('sharma.k@eloiconsulting.com');
		$this->email->bcc('pkssharma66@gmail.com');
		$this->email->from($email);
		$this->email->subject('Task Notification');
		$this->email->message($htmlContent);
		if($this->email->send()){
		$this->DashboardModel->addassign($data);
		$this->session->set_flashdata('category_success', 'Task Assign Successfully! and Notification Mail sent!');
		redirect('DashboardCtrl/assignedtasklist');
		}
	}

	public function Addmanualassigntask()
	{
		
		if(isset($_FILES))
		{		

			$target_dir = "upload/";
            $target_file = $target_dir . time().basename($_FILES["document"]["name"]);
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            $imgName = time().basename($_FILES["document"]["name"]);
            move_uploaded_file($_FILES["document"]["tmp_name"], $target_file);
            //echo "<pre>";print_r($imgName);exit;
		}
		$email = $_SESSION['username'];
		
		$data = $this->input->post();
		//echo "<pre>";print_r($data);exit;
		$this->DashboardModel->addmanualassign($data,$imgName);
		//Mail send Process
		$this->load->library('email');
		$config = array(
		    'protocol'  => 'smtp',
		     'smtp_host' => 'smtp.gmail.com',
		    'smtp_crypto' => 'tls',
		    'smtp_port' => 587,
		    'smtp_user' => 'pkssharma66@gmail.com',
		    'smtp_pass' => 'ywcfugxexccvntxi',
		    'mailtype'  => 'html',
		    'charset'   => 'utf-8'
		);
		$this->email->initialize($config);
		$this->email->set_mailtype("html");
		$this->email->set_newline("\r\n");
		
		$taskno = $data['enqnoid'];
		$enqrecvdate = $data['enqrecvdate'];
		$clientname = $data['name'];
		$clientcompname = $data['compname'];
		$comments = $data['comments'];
		$htmlContent = '<h1>Manual Task Assigned Notification</h1>';
		$htmlContent .= '<p> Task No : MANENQ00'.$taskno.'</p>
		<p>Enquiry Recevied Date :'.$enqrecvdate.'</p>
		<p>Client Name : '.$clientname.'</p>
		<p>Client Company Name : '.$clientcompname.'</p>
		<p>Comments : '.$comments.'</p>';
		$this->email->to('sharma.k@eloiconsulting.com');
		$this->email->bcc('pkssharma66@gmail.com');
		$this->email->from($email);
		$this->email->subject('Task Notification');
		$this->email->message($htmlContent);
		if($this->email->send()){
		
		
		$this->session->set_flashdata('category_success', 'Task Assign Successfully! and Notification Mail sent Successfully!...');
		redirect('DashboardCtrl/assignedtasklist');
		}
	}

	//Logout process

	public function logout($id)
	{
		//echo "<pre>";print_r($id);exit;
		if(isset($id))
		 {
		 $this->session->sess_destroy();
		 
		 $this->session->set_flashdata('success', 'User Logout Successfully!.');
        redirect('LoginCtrl/index');
    	}
	}

}
 