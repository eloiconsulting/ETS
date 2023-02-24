<?php include('template/dashboardheader.php');?>
<?php //echo "<pre>";print_r($lostdata);exit;
    $enqrecvddate= date('d-m-Y',strtotime($lostdata['enq_recv_date']));
    $rfqdate= date('d-m-Y',strtotime($lostdata['rfq_date']));
    $rfqsubmiteddate= date('d-m-Y',strtotime($lostdata['rfq_submited_date']));
    $porecdate= date('d-m-Y',strtotime($lostdata['po_rec_date']));
    $projectstartdate= date('d-m-Y',strtotime($lostdata['project_start_date']));
    $projectenddate= date('d-m-Y',strtotime($lostdata['project_end_date']));
    $rejectiondate = date('d-m-Y',strtotime($lostdata['rejection_date']));
    if($lostdata['project_status'] == 1)
    {
        $projecstatus = "Active";
    }else{
        $projecstatus = "InActive";
    }

    if($lostdata['opp_status'] == 1)
    {
        $opportunity_status = "Inprogress";
    }
    else if($lostdata['opp_status'] == 2)
    {
        $opportunity_status = "Won";
    }else{
        $opportunity_status = "Lost";
    }
    //echo "<pre>";print_r($enqcreateddate);exit;
?>
<section id="main-content">
     <section class="wrapper main-wrapper "> 
            
         <div>
         	<h1>Edit Lost Enquiry Details</h1>
         </div> 
         
      <div class="clearfix"></div> <!--**************clearfix**************-->
         
         <div class="col">              
              
              	<form name="enq" id="enq" method="post" action="<?php echo base_url();?>Dashboardctrl/Editlostlist">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <div class="row">
                                    <input type="hidden" name="wonid" id="wonid" value="<?php echo $lostdata['won_id'];?>">
                                    <div class="col-6">
                                      <label>Enq Received Date:</label>  
                                    </div>
                                    <div class="col-6">
                                        <input type="text" name="enqrecvdate" id="enqrecvdate"  value="<?php echo $enqrecvddate;?>" class="form-control">
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                      <label>Name:</label>  
                                    </div>
                                    <div class="col-6">
                                        <input type="text" name="name" id="name"  value="<?php echo $lostdata['name'];?>" class="form-control">
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                      <label>Company Name:</label>  
                                    </div>
                                    <div class="col-6">
                                        <input type="text" name="compname" id="compname" value="<?php echo $lostdata['comp_name'];?>" class="form-control" placeholder="Enter Company Name">
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <!-- <div class="col-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                      <label>Opportunity Desc:</label>  
                                    </div>
                                    <div class="col-6">
                                        <input type="text" name="oppdesc" id="oppdesc" value="<?php echo $lostdata['opp_desc'];?>" class="form-control"   placeholder="Enter Opportunity Description">
                                    </div>
                                </div>
                                
                            </div> 
                        </div> -->
                        <div class="col-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                      <label>Opportunity Services:</label>  
                                    </div>
                                    <div class="col-6">
                                        <select class="form-control" name="opp_serv" id="opp_serv">
                                            
                                            <?php
                                            if(isset($lostdata['opp_service'])){ 
                                                //echo"if";exit;
                                             $serv = $this->db->select('*')
                                            ->from('services')
                                            ->where('service_id',$lostdata['opp_service'])
                                            ->get()
                                            ->row_array();
                                            //echo "<pre>";print_r($asn);exit;
                                            
                                           ?>
                                           <option value="<?php echo $serv['service_id'];?>"><?php echo $serv['service_name'];?></option>
                                           <?php } else{
                                            //echo"else";exit;
                                            $serv = $this->db->select('*')
                                                    ->from('services')
                                                    ->get()
                                                    ->result_array();

                                                    foreach ($serv as $key => $value) {
                                                        ?>
                                                         <option value="<?php echo $value['service_id'];?>"><?php echo $value['service_name'];?></option>
                                                   <?php  }
                                           }
                                           //echo ($this->db->last_query());exit;
                                            ?>
                                           
                                            
                                            
                                        </select>
                                    </div>
                                </div>
                                
                            </div> 
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                      <label>RFQ Date:</label>  
                                    </div>
                                    <div class="col-6">
                                        <input type="Date" name="rfqdate" id="rfqdate" value="<?php echo $lostdata['rfq_date'];?>" class="form-control">
                                    </div>
                                </div>
                             </div> 
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                      <label>RFQ Submited Date:</label>  
                                    </div>
                                    <div class="col-6">
                                        <input type="Date" name="rfqsubmitedate" id="rfqsubmitedate" value="<?php echo $lostdata['rfq_submited_date'];?>" class="form-control">
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="po">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                      <label>PO Received Date:</label>  
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <input type="Date" name="porecvdate" id="porecvdate" class="form-control">
                                    </div>
                                </div>
                            </div> 
                        </div> 
                         <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="pos">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                      <label>Project Start Date:</label>  
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <input type="Date" name="projstartdate" id="projstartdate" class="form-control">
                                    </div>
                                </div>
                                
                            </div> 
                        </div>
                       
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="poe">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                      <label>Project End Date:</label>  
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <input type="Date" name="projenddate" id="projenddate" class="form-control">
                                    </div>
                                </div>
                                
                            </div> 
                        </div> 
                        <div class="col-6" id="rr">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                      <label>Reason For Rejection:</label>  
                                    </div>
                                    <div class="col-6">
                                        <input type="text" name="rejectreason" id="rejectreason" value="<?php echo $lostdata['rejection_reason'];?>" class="form-control">
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="col-6" id="rrd">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                      <label>Opportunity Rejection Date:</label>  
                                    </div>
                                    <div class="col-6">
                                        <input type="Date" name="rejectdate" id="rejectdate" value="<?php echo $rejectiondate;?>" class="form-control">
                                    </div>
                                </div>
                                
                            </div> 
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                      <label>Project Status:</label>  
                                    </div>
                                    <div class="col-6">
                                        <select class="form-control" name="prostatus" id="prostatus">
                                            <option value="<?php echo $lostdata['project_status'];?>"><?php echo$projecstatus;?></option>
                                            <option value="1">Active</option>
                                            <option value="2">InActive</option>
                                        </select>
                                    </div>
                                </div>
                                
                            </div> 
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                      <label>Opportunity Status:</label>  
                                    </div>
                                    <div class="col-6">
                                        <select class="form-control" name="oppstatus" id="oppstatus">
                                            <option value="<?php echo $lostdata['opp_status'];?>"><?php echo $opportunity_status;?></option>
                                            <option value="1">InProgress Opportunity</option>
                                            <option value="2">Won Opportunity</option>
                                            <option value="3">Lost Opportunity</option>
                                        </select>
                                    </div>
                                </div>
                                
                            </div> 
                        </div>
                        
                        <div class="col-12">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-3">
                                      <label>Comments:</label>
                                    </div>
                                    <div class="col-9">
                                        <textarea class="form-control" name="comments" id="comments"><?php echo $lostdata['comments'];?></textarea>
                                    </div>
                                </div>
                                
                                
                            </div> 
                        </div>
                         
                    </div>
                    <div class="form-group">
                           <button class="btn btn-success" type="add" style="width:20%">Submit</button>
                           <button class="btn btn-warning" type="cancel" id="cancel" style="width:20%">Cancel</button> 
                    </div>   
                    
                   
                </form>
              
         </div>
         
        </section>
    </section>
<?php include('template/footer.php');?>
<script>
    $(document).ready(function() {
        
      
        $("#rr").show();
        $("#rrd").show();
        $("#po").hide();
        $("#pos").hide();
        $("#poe").hide();
    $("#oppstatus").on('change',function(){
        var oppstatus = $("#oppstatus").val();
        //alert(oppstatus)
        if(oppstatus == 2)
        {
        //alert("oppstatus");
        $("#rr").hide();
        $("#rrd").hide();
        $("#po").show();
        $("#pos").show();
        $("#poe").show();
        }else if(oppstatus == 1){
        $("#rr").hide();
        $("#rrd").hide();
        $("#po").hide();
        $("#pos").hide();
        $("#poe").hide();
        }else{
        $("#rr").show();
        $("#rrd").show();
        $("#po").hide();
        $("#pos").hide();
        $("#poe").hide();
        }
    });
        $("#cancel").on('click',function(){
        window.location.href ="<?php echo base_url();?>DashboardCtrl/lostopportunitylist";
        return false;
        });

    });
    </script>
<!-- <script>
	$(document).ready(function() {

    $("#enq").submit(function(e){
        e.preventdefault();
        alert("add");
        $.ajax({
            type : 'post',
            url :'<?php echo base_url();?>DashboardCtrl/Addenq',
            data : $('#enq').serialize(),
            //dataType:'json',
            success:function(data)
            {
                alert("data");
            }
        })
    })
} );
	</script> -->
