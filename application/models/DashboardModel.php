<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DashboardModel extends CI_Model{

	// public function GetwebList()
	// 	{
	// 		//echo "<pre>";print_r($_SESSION);exit;
	// 		//get a list values from 2nd database table
	// 		$getval = $this->db2->select("*")
	// 					->from("eloi_career")
	// 					->get()
	// 					->result_array();

	// 		//echo($this->db2->last_query());exit;
			
	// 					// $last_id = $this->db2->insert_id();
	// 					// echo "<pre>";print_r($last_id);exit;
	// 		//first database 
	// 					foreach ($getval as $key => $value) {
	// 						//echo "<pre>";print_r($value);
	// 						$applied_id = $value['applied_id'];
	// 						$enqdate = $value['created_date'];
	// 						$enqdes = $value['applied_cover'];
	// 						//echo "<pre>";print_r($enqdes);
	// 						$enqlist = array(
	// 									'web_id'=>$applied_id,
	// 									'Enq_date' => $enqdate,
	// 									'Enq_des' => $enqdes,
	// 									'status'=>'1',
	// 									'opportunity_status' => '2',
	// 									'Nxt_stp_fld_by' => '',
	// 									'comments'=>'',
	// 									'created_at' =>date('Y-m-d H:i:s'),
	// 									'created_by' => $_SESSION['userid']
	// 								);
	// 						//echo "<pre>";print_r($enqlist);
							

	// 						}//exit;
	// 						if(isset($enqlist['web_id']))
	// 						{
	// 						$webinsert = $this->db->insert('website_opportunity',$enqlist);
	// 						}
	// 						$disp = $this->db->select('*')
	// 								->from('website_opportunity')
	// 								->get()
	// 								->result_array();
	// 								//echo "<pre>";print_r($disp);exit;
	// 						return $disp;

			

			
				
	// 	}

	//Total List
	public function GettotalList()
		{
			if($_SESSION['userid'] =='1')
			{
			$tot = $this->db->select("*")
					->from("won_opportunity")
					->where(array('project_status !='=> 0,'opp_status !='=>0,'is_deleted'=>0))
					->get()
					->result_array();
				}else
				{
					$tot = $this->db->select("*")
					->from("won_opportunity")
					->where('created_by',$_SESSION['userid'])
					->get()
					->result_array();
				}
			//echo "<pre>";print_r($tot);exit;		
			return $tot;
		}	

	public function GetwebList()
		{
			
			//get a list values from 2nd database table
			$getval = $this->db->select("*")
						->from("eloi_career")
						->order_by('applied_id','DESC')
						->get()
						->result_array();
			//echo "<pre>";print_r($getval);exit;
			//echo($this->db2->last_query());exit;
				return $getval;
		}	


		public function GetEnqdata($id)
		{
			if(isset($id))
			{
				$getval = $this->db->select("enq_id")
						->from("won_opportunity")
						->where("enq_id",$id)
						->get();
						

				if($getval->num_rows() > 0)
				{
					return 0;
				}else{
					$getdata = $this->db2->select("*")
						->from("eloi_career")
						->where('applied_id',$id)
						->get()
						->row_array();

			//echo "<pre>";print_r($getdata);exit;		
						return $getdata;
				}
			}			
			
		}


		public function AddEnq($data)
		{
			//echo "<pre>mod--";print_r($data);exit; 
			$enqid = 'WEBENQ00'.$data['enqid'];
			//echo "<pre>mod--";print_r($enqid);exit;
			//echo "<pre>mod--";print_r($_SESSION);exit;
			// if(isset($data['enq_id']))
			// {
			$add = array(
				'enq_id '=> $enqid,
				'enq_recv_date'=>date('Y-m-d',strtotime($data['enqrecvdate'])),
				'name'=>$data['name'],
				'comp_name'=>$data['compname'],
				'opp_desc'=>$data['oppdesc'],
				'rfq_date'=>$data['rfqdate'],
				'rfq_submited_date'=>$data['rfqsubmitedate'],
				'po_rec_date'=>$data['porecvdate'],
				'project_start_date'=>$data['projstartdate'],
				'project_end_date'=>$data['projenddate'],
				'rejection_reason'=>$data['rejectreason'],
				'rejection_date'=>$data['rejectdate'],
				'project_status'=>$data['prostatus'],
				'opp_status'=>$data['oppstatus'],
				'comments'=>$data['comments'],
				'created_at' => date('Y-m-d H:i:s'),
				'created_by' => $_SESSION['userid']
				
			);
			// }else
			// {

			// }

			//echo "<pre>";print_r($add);exit;
			$insert = $this->db->insert('won_opportunity',$add);

			$website = array(
				'is_updated' => '1',
			);
			$updatewebsite = $this->db2->where('applied_id',$data['enqid'])
							->update('eloi_career',$website);
			return $insert;

		}


		//Manual entry Process
		public function Addnewenq($data)
		{
			//echo "<pre>mod--";print_r($data);exit; 
			$manenqid = 'MANENQ00'.$data['enqno'];
			//echo "<pre>mod--";print_r($manenqid);exit;
			//echo "<pre>mod--";print_r($_SESSION);exit;
			// if(isset($data['enq_id']))
			// {
			$addmanual = array(
				'enq_id '=> $manenqid,
				'enq_recv_date'=>date('Y-m-d',strtotime($data['enqrecvdate'])),
				'name'=>$data['name'],
				'comp_name'=>$data['compname'],
				'opp_desc'=>$data['oppdesc'],
				'rfq_date'=>$data['rfqdate'],
				'rfq_submited_date'=>$data['rfqsubmitedate'],
				'po_rec_date'=>$data['porecvdate'],
				'project_start_date'=>$data['projstartdate'],
				'project_end_date'=>$data['projenddate'],
				'rejection_reason'=>$data['assignTo'],
				'rejection_date'=>$data['assignBy'],
				'project_status'=>$data['prostatus'],
				'opp_status'=>$data['oppstatus'],
				'enq_rec_throug'=>$data['enqrcvthrough'],
				'comments'=>$data['comments'],
				'created_at' => date('Y-m-d H:i:s'),
				'created_by' => $_SESSION['userid']
				
			);
			
			//echo "<pre>";print_r($addmanual);exit;
			$insert = $this->db->insert('won_opportunity',$addmanual);

			
			return $insert;

		}

		//Get users List
		public function getuserlist()
		{
			$getuser = $this->db->select('reg_id,user_name,email')
						->from('user_register')
						->get()
						->result_array();

			return $getuser;
		}

		//Won Process

		public function GetWonList()
		{
			//echo "<pre>-mod";print_r($_SESSION);exit;
			if($_SESSION['userid'] == 1)
			{
			$getwon = $this->db->select('w.*,s.*')
						->from('won_opportunity w')
						->join('services s','s.service_id = w.opp_service','LEFT')
						->where(array('w.opp_status'=>2,'w.is_deleted'=>0))
						->get()
						->result_array();
			}
			else{
				$getwon = $this->db->select('w.*,s.*')
						->from('won_opportunity w')
						->join('services s','s.service_id = w.opp_service','LEFT')
						->where(array('w.opp_status'=>2,'w.is_deleted'=>0,'w.updated_by'=>$_SESSION['userid']))
						->get()
						->result_array();
			}
			//echo "<pre>";print_r($getwon);exit;
			return $getwon;
		}

		//Won Edit Process

		public function Wonedit($id)
		{
			// echo "<pre>";print_r($id);exit;
			$getwon = $this->db->select("*")
						->from("won_opportunity")
						->where('won_id',$id)
						->get()
						->row_array();

						//echo "<pre>";print_r($getwon);exit;
						return $getwon;
		}


		public function Woneditform($data)
		{
			//echo "<pre>-mod";print_r($data);exit;
			$update = array(
				
				'enq_recv_date'=>date('Y-m-d',strtotime($data['enqrecvdate'])),
				'name'=>$data['name'],
				'comp_name'=>$data['compname'],
				'opp_desc'=>$data['oppdesc'],
				'rfq_date'=>date('Y-m-d',strtotime($data['rfqdate'])),
				'rfq_submited_date'=>date('Y-m-d',strtotime($data['rfqsubmitedate'])),
				'po_rec_date'=>date('Y-m-d',strtotime($data['porecvdate'])),
				'project_start_date'=>date('Y-m-d',strtotime($data['projstartdate'])),
				'project_end_date'=>date('Y-m-d',strtotime($data['projenddate'])),
				'project_status'=>$data['prostatus'],
				'opp_status'=>$data['oppstatus'],
				'comments'=>$data['comments'],
				'updated_at' => date('Y-m-d H:i:s'),
				'updated_by' => $_SESSION['userid']
			);
			$updatewon = $this->db->where('won_id',$data['wonid'])
						->update('won_opportunity',$update);

			
						//echo($this->db->last_query());exit;

				return $updatewon;
		}


		//Delete won list opportunity

		public function deletewonlist($id)
		{
			$del = $this->db->where('won_id',$id)
					->set('is_deleted',1)
					->update('won_opportunity');

				//echo($this->db->last_query());exit;	
					return $del;
		}


		//Inprogress Opportunity Process
		public function GetInprogressList()
		{
			//echo "<pre>-mod";print_r($_SESSION);exit;
			if($_SESSION['userid'] != 1)
			{
			$getwon = $this->db->select('w.*,s.*')
						->from('won_opportunity w')
						->join('services s','s.service_id = w.opp_service','LEFT')
						->where(array('w.opp_status'=>1,'w.is_deleted'=>0,'w.updated_by'=>$_SESSION['userid']))
						->get()
						->result_array();
			}else
			{
				$getwon = $this->db->select('w.*,s.*')
						->from('won_opportunity w')
						->join('services s','s.service_id = w.opp_service','LEFT')
						->where(array('w.opp_status'=>1,'w.is_deleted'=>0))
						->get()
						->result_array();
			}
			//echo($this->db->last_query());exit;
			//echo "<pre>";print_r($getwon);exit;
			return $getwon;
		}

		public function Inprogressditform($data)
		{
			//echo "<pre>-mod";print_r($data);exit;
			$update = array(
				
				'enq_recv_date'=>date('Y-m-d',strtotime($data['enqrecvdate'])),
				'name'=>$data['name'],
				'comp_name'=>$data['compname'],
				'opp_desc'=>$data['oppdesc'],
				'opp_service'=>$data['opp_serv'],
				'rfq_date'=>date('Y-m-d',strtotime($data['rfqdate'])),
				'rfq_submited_date'=>date('Y-m-d',strtotime($data['rfqsubmitedate'])),
				'po_rec_date'=>date('Y-m-d',strtotime($data['porecvdate'])),
				'project_start_date'=>date('Y-m-d',strtotime($data['projstartdate'])),
				'project_end_date'=>date('Y-m-d',strtotime($data['projenddate'])),
				'rejection_reason'=>$data['rejectreason'],
				'rejection_date'=>date('Y-m-d',strtotime($data['rejectdate'])),
				'project_status'=>$data['prostatus'],
				'opp_status'=>$data['oppstatus'],
				'comments'=>$data['comments'],
				'updated_at' => date('Y-m-d H:i:s'),
				'updated_by' => $_SESSION['userid']
			);
			$updatewon = $this->db->where('won_id',$data['wonid'])
						->update('won_opportunity',$update);

			 if(isset($updatewon))
			{
				$taskupdate = array(
					'is_status' => $data['oppstatus'],
					'updated_by'=>$_SESSION['userid'],
					'updated_at'=>date('Y-m-d H:i:s')
				);
				$updatetask = $this->db->where('task_no',$data['enqno'])
									->update('task_assign',$taskupdate);
			}
						//echo($this->db->last_query());exit;

				return $updatewon;
		}


		//Delete won list opportunity

		public function deleteinprogresslist($id)
		{
			$del = $this->db->where('won_id',$id)
					->set('is_deleted',1)
					->update('won_opportunity');

				//echo($this->db->last_query());exit;	
					return $del;
		}

		//Lost Opportunity Process

		public function GetLostList()
		{
			//echo "<pre>-mod";print_r($_SESSION);exit;
			if($_SESSION['userid'] == 1)
			{
			$getwon = $this->db->select('w.*,s.*')
						->from('won_opportunity w')
						->join('services s','s.service_id = w.opp_service','LEFT')
						->where(array('w.opp_status'=>3,'w.is_deleted'=>0))
						->get()
						->result_array();
			}else{
				$getwon = $this->db->select('w.*,s.*')
						->from('won_opportunity w')
						->join('services s','s.service_id = w.opp_service','LEFT')
						->where(array('w.opp_status'=>3,'w.is_deleted'=>0,'w.updated_by'=>$_SESSION['userid']))
						->get()
						->result_array();
			}
			//echo "<pre>";print_r($getwon);exit;
			return $getwon;
		}


		//Lost Edit Process

		public function lostedit($id)
		{
			// echo "<pre>";print_r($id);exit;
			$getwon = $this->db->select("*")
						->from("won_opportunity")
						->where('won_id',$id)
						->get()
						->row_array();

						//echo "<pre>";print_r($getwon);exit;
						return $getwon;
		}


		public function loseditform($data)
		{
			//echo "<pre>-mod";print_r($data);exit;
			$update = array(
				
				'enq_recv_date'=>date('Y-m-d',strtotime($data['enqrecvdate'])),
				'name'=>$data['name'],
				'comp_name'=>$data['compname'],
				'opp_desc'=>$data['oppdesc'],
				'opp_service'=>$data['opp_serv'],
				'rfq_date'=>date('Y-m-d',strtotime($data['rfqdate'])),
				'rfq_submited_date'=>date('Y-m-d',strtotime($data['rfqsubmitedate'])),
				'po_rec_date'=>date('Y-m-d',strtotime($data['porecvdate'])),
				'project_start_date'=>date('Y-m-d',strtotime($data['projstartdate'])),
				'project_end_date'=>date('Y-m-d',strtotime($data['projenddate'])),
				'rejection_reason'=>$data['rejectreason'],
				'rejection_date'=>date('Y-m-d',strtotime($data['rejectdate'])),
				'project_status'=>$data['prostatus'],
				'opp_status'=>$data['oppstatus'],
				'comments'=>$data['comments'],
				'updated_at' => date('Y-m-d H:i:s'),
				'updated_by' => $_SESSION['userid']
			);
			//echo "<pre>-mod";print_r($update);exit;
			//echo($this->db->last_query());exit;
			$updatelost = $this->db->where('won_id',$data['wonid'])
						->update('won_opportunity',$update);

			if(isset($updatelost))
			{
				$taskupdate = array(
					'is_status' => $data['oppstatus'],
					'comments'=>$data['comments'],
					'updated_by'=>$_SESSION['userid'],
					'updated_at'=>date('Y-m-d H:i:s')
				);
				$updatetask = $this->db->where('task_no',$data['enqno'])
									->update('task_assign',$taskupdate);
			}

						//echo($this->db->last_query());exit;

				return $updatelost;
		}


		//Delete los list opportunity

		public function deletelostlist($id)
		{
			$del = $this->db->where('won_id',$id)
					->set('is_deleted',1)
					->update('won_opportunity');

				//echo($this->db->last_query());exit;	
					return $del;
		}


		public function GettotalListcounts()
		{
			$tot = $this->db->select('*')
					->from('won_opportunity')
					->where(array('project_status !='=> 0,'opp_status !='=>0,'is_deleted'=>0))
					->get();

				$totalcounts = $tot->num_rows();	
					return $totalcounts;
		}
		public function Gettotalusercounts()
		{
			$totuser = $this->db->select("*")
					->from('user_register')
					->get();
				$totalusercounts = $totuser->num_rows();	
					return $totalusercounts;
		}

		public function Getnewenqcounts()
		{

			$totnewenq = $this->db->select("E.*,A.*")
					->from("eloi_career E")
					->join("task_assign A","E.enq_id = A.task_no","LEFT")
					->where('E.is_updated !=',1)
					->get();
					//echo($this->db->last_query());exit;
				$totnewenqcounts = $totnewenq->num_rows();
				if(isset($totnewenqcounts))	
				{
					$_SESSION['newcounts'] = $totnewenqcounts;
					
				}
				return $totnewenqcounts;
		}

		public function Getusernewenqcounts()
		{

			$totusernewenq = $this->db->select("E.*,A.*")
					->from("eloi_career E")
					->join("task_assign A","E.enq_id = A.task_no","LEFT")
					->where(array('E.is_updated !='=> 1,"A.assign_to"=>$_SESSION['userid']))
					->get();
					//echo($this->db->last_query());exit;
				$totusernewenqcounts = $totusernewenq->num_rows();
				if(isset($totusernewenqcounts))	
				{
					$_SESSION['newcounts'] = $totusernewenqcounts;
					
				}
				return $totusernewenqcounts;
		}

		public function Gettotaluser()
		{
			$totuser = $this->db->select("*")
					->from('user_register')
					->get()
					->result_array();
				
					return $totuser;
		}

		public function Getuserbasedenquirycounts()
		{
			$userenq = $this->db->select("*")
					->from('won_opportunity')
					->where(array('project_status !='=> 0,'opp_status !='=>0,'is_deleted'=>0,'created_by'=>$_SESSION['userid']))
					->get();
					//echo($this->db->last_query());exit;
				$totaluserenqcounts = $userenq->num_rows();	
				//echo "<pre>";print_r($totaluserenqcounts);exit;
					return $totaluserenqcounts;
		}
		// public function Getuserlistcounts()
		// {
		// 	$tot = $this->db->select("*")
		// 			->from('won_opportunity')
		// 			->where(array('project_status !='=> 0,'opp_status !='=>0,'is_deleted'=>0,'created_at'=>$_SESSION['userid']))
		// 			->get();
		// 		$totalcounts = $tot->num_rows();	
		// 			return $totalcounts;
		// }

		public function GettotalinprogressListcounts()
		{
			$totin = $this->db->select("*")
					->from('won_opportunity')
					->where('opp_status',1)
					->get();
				$inprogresscount = $totin->num_rows(); 
					return $inprogresscount;
		}
		public function GetuserinprogressListcounts()
		{
			$totin = $this->db->select("*")
					->from('won_opportunity')
					->where(array('opp_status'=>1,'updated_by'=>$_SESSION['userid']))
					->get();
				$inprogresscount = $totin->num_rows(); 
					return $inprogresscount;
		}

		public function GettotalwonListcounts()
		{
			$totwon = $this->db->select("*")
					->from('won_opportunity')
					->where('opp_status',2)
					->get();
				$woncounts = $totwon->num_rows();
					return $woncounts;
		}
		public function GetuserwonListcounts()
		{
			$totwon = $this->db->select("*")
					->from('won_opportunity')
					->where(array('opp_status'=>2,'updated_by'=>$_SESSION['userid']))
					->get();
				$woncounts = $totwon->num_rows();
					return $woncounts;
		}
		public function GettotalLostListcounts()
		{
			$totlos = $this->db->select("*")
					->from('won_opportunity')
					->where(array('opp_status'=>3,'is_deleted!='=>1))
					->get();
				$lostcounts = $totlos->num_rows();
					return $lostcounts;
		}
		public function GetuserLostListcounts()
		{
			$totlos = $this->db->select("*")
					->from('won_opportunity')
					->where(array('opp_status'=>3,'is_deleted!='=>1,'updated_by'=>$_SESSION['userid']))
					->get();
				$lostcounts = $totlos->num_rows();
					return $lostcounts;
		}

		public function Getnotificounts()
		{
			$getnew = $this->db->select("*")
						->from("eloi_career")
						->where('is_updated',0)
						->get();
						
						
				// echo "<pre>";print_r($getnew);exit;
						$newcounts = $getnew->num_rows();
						if(isset($newcounts))
						{
							$_SESSION['notifi'] = $newcounts;
						}
						return $newcounts;

				// foreach ($getval as $key => $value) {
				// 	//echo "<pre>";print_r($value['applied_id']);
				// 	$id = $value['applied_id'];
				// 	$note = $this->db->select("enq_id")
				// 			->from('won_opportunity')
				// 			->where('enq_id',$id)
				// 			->get()
				// 			->result_array();
				// 			//echo "<pre>";print_r($note);
				// 			//$notes = implode(',', $note);
				// 	if(isset($note))
				// 	{

				// 		foreach ($note as $key => $cts) {
				// 			//echo "<pre>";print_r($cts);
				// 			$notes = $this->db->select("*")
				// 					->from('won_opportunity')
				// 					->where('enq_id',$cts['enq_id'])
				// 					->where(array('project_status' => 0,'opp_status' => 0))
				// 					->get()
				// 					->row_array();
				// 			$abc = is_array($notes) ? count($notes) : 0 ;
				// 			$_SESSION['notifi'] = $abc;
				// 			return  $abc;
				// 		}

				// 	}
				// }//exit;
			
				
		}

		public function Assigntaskcounts()
		{
			$asgntsk = $this->db->select('*')
						->from('task_assign')
						->where('is_assigned',1)
						->get();

			$agntskcounts = $asgntsk->num_rows();

			return $agntskcounts;
		}

		//Assign Process

		//Get Task List
		public function GetTaskList()
		{
			//echo "<pre>";print_r($_SESSION);exit;
			if($_SESSION['userid'] == 1)
			{
			$gettask = $this->db->select('*')
						->from('task_assign')
						->get()
						->result_array();			
			}else{
			$gettask = $this->db->select('t.*,u.*')
						->from('task_assign t')
						->join('user_login u','u.user_id = t.assign_by')
						->where('t.assign_to',$_SESSION['userid'])
						->get()
						->result_array();
					}
			 //echo($this->db->last_query());exit;
			return $gettask;
		}

		public function userTaskList()
		{
			//echo "<pre>";print_r($_SESSION);exit;
			if($_SESSION['userid'] == 1)
			{
			$usertask = $this->db->select('*')
						->from('task_assign')
						->get()
						->result_array();			
			}else{
			$usertask = $this->db->select('t.*,u.*')
						->from('task_assign t')
						->join('user_login u','u.user_id = t.assign_by')
						->where('t.assign_to',$_SESSION['userid'])
						->get()
						->result_array();
					}
			 //echo($this->db->last_query());exit;
			return $usertask;
		}

		public function getusernewtask()
		{
			$newtask = $this->db->select('t.*,u.*')
						->from('task_assign t')
						->join('user_login u','u.user_id = t.assign_by')
						->where(array('t.is_status'=> 0,'t.assign_to'=>$_SESSION['userid']))
						->get()
						->result_array();
						//echo ($this->db->last_query());exit;
						return $newtask;
		}

		public function usernewtaskcounts()
		{
			$newtaskcnt = $this->db->select('t.*,u.*')
						->from('task_assign t')
						->join('user_login u','u.user_id = t.assign_by')
						->where(array('t.is_status'=> 0,'t.assign_to'=>$_SESSION['userid']))
						->get();
				$newusertaskcounts = $newtaskcnt ->num_rows();
				if(isset($newusertaskcounts))
				{
					$_SESSION['newusertask'] = $newusertaskcounts;
						
				}
				return $newusertaskcounts;
		}

		public function GetAssignedtasks()
		{
			if($_SESSION['userid'] == 1)
			{
			$assigned = $this->db->select('t.*,u.*')
						->from('task_assign t')
						->join('user_login u','u.user_id = t.assign_to')
						->get()
						->result_array();
			}else{
			$assigned = $this->db->select('t.*,u.*')
						->from('task_assign t')
						->join('user_login u','u.user_id = t.assign_by')
						->where('t.assign_to',$_SESSION['userid'])
						->get()
						->result_array();
			}

			//echo($this->db->last_query());exit;
			return $assigned;
		}

		public function gettaskdata($id)
		{
			$gettaskview = $this->db->select("*")
							->from("won_opportunity")
							->where("won_id",$id)
							->get()
							->row_array();


					return $gettaskview;
		}
		public function getadmintaskdata($id)
		{
			$gettaskview = $this->db->select("*")
							->from("won_opportunity")
							->where("enq_id",$id)
							->get()
							->row_array();


					return $gettaskview;
		}

		public function getusertaskdata($id)
		{					

			
			$gettaskview =  $this->db->select('t.*,u.*')
							->from('task_assign t')
							->join('user_login u','u.user_id = t.assign_by')
							->where(array('t.assign_id'=>$id,'t.assign_to'=>$_SESSION['userid']))
							->get()
							->row_array();

				//echo"<pre>";print_r($gettaskview);exit;
					return $gettaskview;
		}

		public function Taskassign($id,$taskno)
		{
			if(isset($id))
			{
				$getdata = $this->db->select('task_no')
							->from('task_assign')
							->where('task_no',$taskno)
							->get();

					if($getdata->num_rows() > 0)
					{
						return 0;
					}
			else{
			$gettaskview = $this->db->select("*")
							->from("eloi_career")
							->where("applied_id",$id)
							->get()
							->row_array();


					return $gettaskview;
				}
			}
		}

		public function addassign($data)
		{
			//echo "<pre>-- MODs";print_r($data);exit;
			$enqrcdate = date('Y-m-d',strtotime($data['enqrecvdate'])) ;
			$assign = array(
				'task_no'=>$data['enqnoid'],
				'assign_by'=>$_SESSION['userid'],
				'assign_to'=>$data['assignTo'],
				'rfq_date'=>$data['rfqdate'],
				'rfq_submited_date'=>$data['rfqsubmitedate'],
				'client_phone'=>$data['phone'],
				'client_email'=>$data['email'],
				//'po_recv_date'=>$data['porecvdate'],
				'comments'=>$data['comments'],
				'is_assigned'=> '1',
				'created_at'=>date('Y-m-d H:i:s'),
				'created_by'=>$_SESSION['userid']
			);
			//echo "<pre>-- MODs";print_r($assign);exit;

			$insertassign = $this->db->insert('task_assign',$assign);

			if(isset($insertassign))
			{
				$addwonlist = array(

					'enq_id'=>$data['enqnoid'],
					'enq_recv_date'=>$enqrcdate,
					'name'=>$data['name'],
					'client_phone'=>$data['phone'],
					'client_email'=>$data['email'],
					'opp_desc'=>$data['comments'],
					'rfq_date'=>$data['rfqdate'],
					'rfq_submited_date'=>$data['rfqsubmitedate'],
					'assign_to'=>$data['assignTo'],
					'assign_by'=>$_SESSION['userid'],
					'comments'=>$data['comments'],
					'created_at'=>date('Y-m-d H:i:s'),
					'created_by'=>$_SESSION['userid']

				);

				$insert = $this->db->insert('won_opportunity',$addwonlist);
			}


			//echo "<pre>-- MODs";print_r($insertassign);exit;
			// if(isset($insertassign))
			// {
			// 	$updateassign = array(
			// 		'rfq_date'=>date('Y-m-d',strtotime($data['rfqdate'])),
			// 		'rfq_submited_date'=>date('Y-m-d',strtotime($data['rfqsubmitedate'])),
			// 		'po_rec_date'=>date('Y-m-d',strtotime($data['porecvdate'])),
			// 		'assign_to'=>$data['assignTo'],
			// 		'assign_by'=>$_SESSION['userid'],
			// 		'comments' =>$data['comments'],
			// 		'updated_at'=>date('Y-m-d H:i:s'),
			// 		'updated_by'=>$_SESSION['userid']
			// 	);

			// 	$update = $this->db->where('enq_id',$data['enqnoid'])
			// 				->update('won_opportunity',$updateassign);
			// }


			return $assign;

		}


		//Manual new enquiry Added function

		public function addmanualassign($data,$imgName)
		{
			//echo "<pre>-- MODs";print_r($data);exit;
			$manenqid = 'MANENQ00'.$data['enqno'];
			$enqrcdate = date('Y-m-d',strtotime($data['enqrecvdate'])) ;

			$addenq = array(

					'enq_id'=>$manenqid,
					'enq_recv_date'=>$enqrcdate,
					'name'=>$data['name'],
					'comp_name'=>$data['compname'],
					'client_phone'=>$data['phone'],
					'client_email'=>$data['email'],
					'opp_desc'=>$data['comments'],
					'opp_service'=>$data['opp_serv'],
					'rfq_date'=>$data['rfqdate'],
					'rfq_submited_date'=>$data['rfqsubmitedate'],
					'assign_to'=>$data['assignTo'],
					'assign_by'=>$_SESSION['userid'],
					'comments'=>$data['comments'],
					'document'=>$imgName,
					'opp_status'=>$data['oppstatus'],
					'created_at'=>date('Y-m-d H:i:s'),
					'created_by'=>$_SESSION['userid']

				);
			//echo "<pre>-- MODs";print_r($addenq);exit;
				$insert = $this->db->insert('won_opportunity',$addenq);
				if(isset($addenq))
				{
				//$manenqid = 'MANENQ00'.$data['enqno'];
			
				$assign = array(
					'task_no'=>$manenqid,
					'assign_by'=>$_SESSION['userid'],
					'assign_to'=>$data['assignTo'],
					'rfq_date'=>$data['rfqdate'],
					'rfq_submited_date'=>$data['rfqsubmitedate'],
					//'po_recv_date'=>$data['porecvdate'],
					'comments'=>$data['comments'],
					'is_assigned'=> '1',
					'created_at'=>date('Y-m-d H:i:s'),
					'created_by'=>$_SESSION['userid']
				);
				//echo "<pre>-- MODs";print_r($assign);exit;
				
				$insertassign = $this->db->insert('task_assign',$assign);
			}
			


			//echo "<pre>-- MODs";print_r($insertassign);exit;
			// if(isset($insertassign))
			// {
			// 	$updateassign = array(
			// 		'rfq_date'=>date('Y-m-d',strtotime($data['rfqdate'])),
			// 		'rfq_submited_date'=>date('Y-m-d',strtotime($data['rfqsubmitedate'])),
			// 		'po_rec_date'=>date('Y-m-d',strtotime($data['porecvdate'])),
			// 		'assign_to'=>$data['assignTo'],
			// 		'assign_by'=>$_SESSION['userid'],
			// 		'comments' =>$data['comments'],
			// 		'updated_at'=>date('Y-m-d H:i:s'),
			// 		'updated_by'=>$_SESSION['userid']
			// 	);

			// 	$update = $this->db->where('enq_id',$data['enqnoid'])
			// 				->update('won_opportunity',$updateassign);
			// }


			return $addenq;

		}



		public function getnewenqiries()
		{
			$newenq = $this->db->select('*')
						->from('eloi_career')
						->where('is_updated',0)
						->get()
						->result_array();

					
					return $newenq;	
		}


		public function editusertaskdata($data)
		{
			//echo "<pre>";print_r($data);exit;
			$update = array(
				'is_status'=>1,
				'is_assigned'=>2,
				'comments'=>$data['comments']
			);
			$taskupdate = $this->db->where('task_no',$data['enqnoid'])
							->update(' task_assign',$update);

		//echo "<pre>";print_r($taskupdate);exit;

			if(isset($taskupdate))
			{
				//echo"if";exit;
			$status = array(
				'is_updated'=>1
			);
			$enqstatusupdate = $this->db->where('enq_id',$data['enqnoid'])
							->update('eloi_career',$status);

				if(isset($enqstatusupdate))
			{
				$updatewon = array(
					'opp_status' => '1',
					'project_status' => '1',
					'comments'=>$data['comments'],
					'updated_by'=>$_SESSION['userid'],
					'updated_at'=>date('Y-m-d H:i:s')
				);
				$opportunityupdate = $this->db->where('enq_id',$data['enqnoid'])
							->update('won_opportunity',$updatewon);
						}
			}


			

			return $taskupdate;
		}
		


		//Total user task
		public function totaltask()
		{
			$tottask = $this->db->select('*')
						->from('task_assign')
						->where('assign_to',$_SESSION['userid'])
						->get();

				$tottaskcounts = $tottask->num_rows();
				if($tottaskcounts > 0)
				{
					$_SESSION['assigntask'] = $tottaskcounts;
				}
				return $tottaskcounts;
		}

}