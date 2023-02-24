<?php include('template/dashboardheader.php');?>
<?php //echo "<pre>";print_r($user);exit;?>
<section id="main-content">
     <section class="wrapper main-wrapper ">
     
         <div>
         	<h1>Users List</h1>
         </div> 
         
      <div class="clearfix"></div> <!--**************clearfix**************-->
         
         <div class="col">              
              <section class="box">
              	<table id="example" class="table table-striped " style="width:100%">
        <thead>
            <tr>
                <th>S.No</th>
                <th>User Name </th>
                <th>Email</th>
               
            </tr>
        </thead>
        <tbody style="text-align: initial;">
            <?php if(isset($user))
            $i =1;

                foreach ($user as $key => $value) {
                    //echo "<pre>";print_r($value);
                    // if($value['is_status'] == 1)
                    // {
                    //     $status = 'Completed';
                    // }else{
                    //     $status = 'Pending';
                    // }
                    ?>
                   
            <tr class="table-primary">
                <td><?php echo $i;?></td>
                <td><?php echo $value['user_name'];?></td>
                <td><?php echo $value['email'];?></td>
               
                
               <!--  <td><a href="<?php echo base_url('Dashboardctrl/GetTaskassignview').'/'.$value['assign_id'];?>"><i class="fa fa-pencil-square-o" aria-hidden="true" id="edit"></i></a>&nbsp;
                    <a href="<?php echo base_url('Dashboardctrl/deleteTaskassignview').'/'.$value['assign_id'];?>"><i class="fa fa-trash" aria-hidden="true"></i></a> 
                </td> -->
            </tr>
           <?php
           $i++;
                 }//exit;
                 ?>
            
            </tbody>
      <!--   <tfoot>
            <tr>
                <th>S.No</th>
                <th>User Name </th>
                <th>Email</th> -->
                <!-- <th>Joined Date</th>
                 <th>Roll</th>
                <th>Status</th>
                <th>Action</th> 
            </tr>
        </tfoot> -->
    </table>
              </section>
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
    
