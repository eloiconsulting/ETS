<?php include('template/dashboardheader.php');?>
<?php //echo "<pre>";print_r($usertask);exit;?>
<section id="main-content">
     <section class="wrapper main-wrapper ">
     <?php if ($this->session->flashdata('category_error')) { ?>
    <div class="alert alert-danger"> <?= $this->session->flashdata('category_error') ?> </div>
    <?php 
    }else{?>
        <div class="alert alert-success"> <?= $this->session->flashdata('category_success') ?> </div>
    <?php } ?>
         <div>
         	<h1>Tasks List</h1>
         </div> 
         
      <div class="clearfix"></div> <!--**************clearfix**************-->
         
         <div class="col">              
              
              	<table id="example" class="table table-striped " style="width:100%">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Task No </th>
                <th>Rfq Date</th>
                <th>Task Assigned Date</th>
                 <?php if($_SESSION['userid'] != 1){?>
                <th>Client Phone</th>
                <th>Client Email</th>
                 <th>Task Assign By</th>
                 <!-- <th>Action</th> -->
                 <?php } ?>  
                <th>Task Assigned Status</th>
                <th>Task Status</th>
                
            </tr>
        </thead>
        <tbody style="text-align: initial;">
            <?php if(isset($usertask))
            $i =1;
           
                foreach ($usertask as $key => $value) {
                   $asndate = date('d-m-Y',strtotime($value['created_at']));
                   $rfqdate = date('d-m-Y',strtotime($value['rfq_date']));
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
                    $taskstatus = 'Completed';
                   }else{
                    $taskstatus = 'Pending';
                   }
                    ?>
                   
            <tr class="table-primary">
                <td><?php echo $i;?></td>
                <td><?php echo $value['task_no'];?></td>
                <td><?php echo $rfqdate;?></td>
                <td><?php echo $asndate;?></td>
                 <?php if($_SESSION['userid'] != 1){?>
                    <td><?php echo $value['client_phone'];?></td>  
                  <td><?php echo $value['client_email'];?></td>
                 <td><?php echo  $value['user_name'];?></td>
             <?php } ?>
                
                <td><?php echo $asnstatus;?></td>
                <td><?php echo $taskstatus;?></td>
                <?php if($_SESSION['userid'] != 1){?>
            
                 
                 <!-- <td>  <a href="<?php echo base_url('Dashboardctrl/GetuserTaskassignview').'/'.$value['assign_id'];?>"><i class="fa fa-pencil-square-o" aria-hidden="true" id="edit"></i></a>&nbsp;  -->
                  <!-- <a href="<?php echo base_url('Dashboardctrl/assignedtasklist').'/'.$value['won_id'];?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
                    -->
               
                    <!-- <a href="<?php //echo base_url('Dashboardctrl/deleteTaskassignview').'/'.$value['won_id'];?>"><i class="fa fa-trash" aria-hidden="true"></i></a>  -->
                 <?php } ?> 
                <!-- </td> -->
            </tr>
           <?php
           $i++;
                 }
                 ?>
            
            </tbody>
        <!-- <tfoot>
            <tr>
                <th>S.No</th>
                <th>Task No </th>
                <th>Rfq Date</th>
                <th>Rfq Submited Date</th>
                <th>PO Received Date</th>
                 <th>Status</th>
                <?php if($_SESSION['userid'] != 1){?>
                 <th>Task Assign By</th>
                 <th>Action</th>
                 <?php } ?>  
            </tr>
        </tfoot> -->
    </table>
              
         </div>
         
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
    
