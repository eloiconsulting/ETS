<?php include('template/dashboardheader.php');?>
<?php //echo "<pre>";print_r($assigned);exit;?>
<section id="main-content">
     <section class="wrapper main-wrapper ">
     <?php if ($this->session->flashdata('category_error')) { ?>
    <div class="alert alert-danger"> <?= $this->session->flashdata('category_error') ?> </div>
    <?php 
    }else{?>
        <div class="alert alert-success"> <?= $this->session->flashdata('category_success') ?> </div>
    <?php } ?>
         <div>
         	<h1>Assigned Task List</h1>
         </div> 
         
      <div class="clearfix"></div> <!--**************clearfix**************-->
         
         <div class="col">              
             
              	<table id="example" class="table table-striped " style="width:100%">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Task No </th>
                <th>Rfq Date</th>
                <th>Task AssignedTo</th>
                <th>Task Assigned Date</th>
                <th>Task Assigned Status</th>
                <th>Task Status</th>
                <th>Comments</th>
                <th>Action</th>
              
            </tr>
        </thead>
        <tbody style="text-align: initial;">
            <?php if(isset($assigned))
            $i =1;
           
                foreach ($assigned as $key => $value) {
                   $asndate = date('d-m-Y',strtotime($value['created_at']));
                   if($value['is_assigned'] == 1)
                   {
                    $asnstatus = "Assigned";
                   }else{
                    $asnstatus = "Accepted";
                   }
                   if($value['is_status'] == 1)
                   {
                    $taskstatus = 'Inprogress';
                   }else if($value['is_status'] == 2){
                        $taskstatus = "Completed";
                    }else if($value['is_status'] == 3){
                        $taskstatus = "Lost";
                    }else
                    {
                       $taskstatus ="Pending";
                    }
                    ?>
                   
            <tr class="table-primary">
                <td><?php echo $i;?></td>
                <td><!--<a href = "#"  data-toggle="modal" data-target=".bd-example-modal-lg">--><?php echo $value['task_no'];?></a></td>
                <td><?php echo $value['rfq_date'];?></td>
                <td><?php echo $value['user_name'];?></td>
                <td><?php echo $asndate;?></td>
                <td><?php echo $asnstatus;?></td>
                <td><?php echo $taskstatus;?></td>
                <td><?php echo $value['comments'];?></td>
                
                <td>
                    <?php if($value['assign_to'] == 1  && $value['is_status'] == 0){
                        //echo"if";exit;
                        ?> 
                        <a href="<?php echo base_url('Dashboardctrl/admintaskasign').'/'.$value['task_no'];?>"><i class="fa fa-pencil-square-o" aria-hidden="true" id="edit"  enabled="enabled"></i></a>

                    <!-- <a href="<?php //echo base_url('Dashboardctrl/deleteTaskassignview').'/'.$value['won_id'];?>"><i class="fa fa-trash" aria-hidden="true"></i></a>  -->
                     <?php }  else{ 
                         //echo"else";exit;
                         ?>
                         <a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true" id="edit"  disabled="disabled"></i></a>

                     <?php } ?>
                </td>
           
            </tr>
           <?php
           $i++;
                 }
                 ?>
            
            </tbody>
      <!--   <tfoot>
            <tr>
               <th>S.No</th>
                <th>Task No </th>
                <th>Rfq Date</th>
                <th>Rfq Submited Date</th>
                <th>PO Received Date</th>
                <th>AssignedTo</th>
                <th>Status</th>
                 <th>Action</th>
            </tr>
        </tfoot>  -->
    </table>
              
         </div>
          <!-- Modal -->
       <div class="modal fade bd-example-modal-lg mt-5" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="modal-title" id="exampleModalLabel">Task Details</h5>
                        </div>
                        <div class="col-md-6 ">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true" style="margin-left:16rem">&times;</span>
                            </button>  
                        </div>
                    </div>
                </div>
              <div class="modal-body">
                <form>
                  <div class="form-group">
                    <label for="taskno" class="col-form-label">Task No:</label>
                    <input type="text" class="form-control" id="recipient-name">
                  </div>
                  <div class="form-group">
                    <label for="taskno" class="col-form-label">Task No:</label>
                    <input type="text" class="form-control" id="recipient-name">
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="col-form-label">Message:</label>
                    <textarea class="form-control" id="message-text"></textarea>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
<!-- Modal-->
         
        </section>
    </section>

   
<?php include('template/footer.php');?>
<script>
	$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'collection',
                className: 'custom-html-collection',
                buttons: [
                    'pdf',
                    'csv',
                    'excel',
                    
                ]
            }
        ]
    } );
} );
	</script>
    
