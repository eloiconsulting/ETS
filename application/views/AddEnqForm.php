<?php include('template/dashboardheader.php');?>
<?php //echo "<pre>";print_r($enqdata);exit;
    $enqcreateddate= date('d-m-Y',strtotime($enqdata['created_date']));
    //echo "<pre>";print_r($enqcreateddate);exit;
?>
<section id="main-content">
     <section class="wrapper main-wrapper "> 
             
         <div>
         	<h1>Add Enquiry Details</h1>
         </div> 
         
      <div class="clearfix"></div> <!--**************clearfix**************-->
         
         <div class="col">              
              <section class="box">
              	<form name="enq" id="enq" method="post" action="<?php echo base_url();?>Dashboardctrl/Addenq">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <div class="row">
                                    <input type="hidden" name="enqid" id="enqid" value="<?php echo $enqdata['applied_id'];?>">
                                    <div class="col-6">
                                      <label>Enq Received Date:</label>  
                                    </div>
                                    <div class="col-6">
                                        <input type="text" name="enqrecvdate" id="enqrecvdate" value="<?php echo $enqcreateddate;?>" class="form-control">
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
                                        <input type="text" name="name" id="name"  value="<?php echo $enqdata['applied_fname'];?>"class="form-control">
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
                                        <input type="text" name="compname" id="compname" class="form-control" placeholder="Enter Company Name">
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                      <label>Opportunity Desc:</label>  
                                    </div>
                                    <div class="col-6">
                                        <input type="text" name="oppdesc" id="oppdesc" class="form-control"  value="<?php echo $enqdata['applied_cover'];?>" placeholder="Enter Opportunity Description">
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
                                        <input type="Date" name="rfqdate" id="rfqdate" class="form-control">
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
                                        <input type="Date" name="rfqsubmitedate" id="rfqsubmitedate" class="form-control">
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="col-6" id="po">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                      <label>PO Received Date:</label>  
                                    </div>
                                    <div class="col-6">
                                        <input type="Date" name="porecvdate" id="porecvdate" class="form-control">
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="col-6" id="pos">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                      <label>Project Start Date:</label>  
                                    </div>
                                    <div class="col-6">
                                        <input type="Date" name="projstartdate" id="projstartdate" class="form-control">
                                    </div>
                                </div>
                                
                            </div> 
                        </div>
                       
                        <div class="col-6" id="poe">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                      <label>Project End Date:</label>  
                                    </div>
                                    <div class="col-6">
                                        <input type="Date" name="projenddate" id="projenddate" class="form-control">
                                    </div>
                                </div>
                                
                            </div> 
                        </div>
                         <div class="col-6" id="lost">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                      <label>Reason For Rejection:</label>  
                                    </div>
                                    <div class="col-6">
                                        <input type="text" name="rejectreason" id="rejectreason" class="form-control">
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="col-6" id="lostr">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                      <label>Opportunity Rejection Date:</label>  
                                    </div>
                                    <div class="col-6">
                                        <input type="Date" name="rejectdate" id="rejectdate" class="form-control">
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
                                            <option value="">--Select--</option>
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
                                            <option value="">--Select--</option>
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
                                        <textarea class="form-control" name="comments" id="comments"></textarea>
                                    </div>
                                </div>
                                
                                
                            </div> 
                        </div>
                         
                    </div>
                    <div class="form-group">
                           <button class="btn btn-primary" type="add" style="width:20%">Add</button>
                           <button class="btn btn-danger" type="cancel" style="width:20%"><a href="<?php echo base_url();?>DashboardCtrl/websitenquiry">Cancel</a></button> 
                    </div>   
                    
                   
                </form>
              </section>
         </div>
         
        </section>
    </section>
<?php include('template/footer.php');?>
<script>
	$(document).ready(function() {
        $("#lost").hide();
        $("#lostr").hide();
        $("#po").show();
        $("#pos").show();
        $("#poe").show();
    $("#oppstatus").on('change',function(){
        var oppstatus = $("#oppstatus").val();
        if(oppstatus == 3)
        {
        //alert("oppstatus");
        $("#lost").show();
        $("#lostr").show();
        $("#po").hide();
        $("#pos").hide();
        $("#poe").hide();
        }else{
            $("#lost").hide();
        $("#lostr").hide();
        $("#po").show();
        $("#pos").show();
        $("#poe").show();
        }
    })
} );

   
	</script>
