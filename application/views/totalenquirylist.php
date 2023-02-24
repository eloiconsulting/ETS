<?php include('template/dashboardheader.php');?>
<?php //echo "<pre>";print_r($total);exit;?>

<section id="main-content">
     <section class="wrapper main-wrapper "> 
             
         <div>
            <h1>Total Enquiry List</h1>
         </div> 
         
      <div class="clearfix"></div> <!--**************clearfix**************-->
         
         <div class="col">              
              
        <table id="example" class="table table-striped " style="width:100%">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Enquiry No
                <th>Enquiry Date</th>
                <!-- <th>Enquiry Desc</th> -->
                <th>Enquiry platform</th>
                <th>Enquiry Status</th>
                <th>Task Status</th>
                <th>Comments</th>
            </tr>
        </thead>
        <tbody style="text-align: initial;">
            <?php if(isset($total))
            $i=1;
                foreach ($total as $key => $value) {
                    //echo "<pre>";print_r($value);
                    if($value['project_status'] == 1)
                    {
                        $projectstatus = "Active";
                    }else{
                        $projectstatus = "InActive";
                    }

                    if($value['opp_status'] == 1)
                    {
                        $opportunity_status ="Inprogress";
                    }elseif($value['opp_status'] == 2)
                    {
                        $opportunity_status ="Won";
                    }else{
                        $opportunity_status ="Lost";
                    }

                    if($value['enq_id'] == 'WEBENQ')
                    {
                        $from ="Website";
                    }else
                    {
                        $from ="SMM";
                    }
                    ?>

            <tr class="table-primary">
                <td><?php echo $i;?></td>
                <td><a href="#" data-toggle="modal" data-target="#myModal"><?php echo $value['enq_id'];?></a></td>
                <td><?php echo $value['enq_recv_date'];?></td>
                <!-- <td><?php //echo $value['opp_desc'];?></td> -->
                <td><?php echo $from;?></td>
                <td><?php echo $projectstatus;?></td>
                <td><?php echo $opportunity_status;?></td>
                <td><?php echo $value['comments'];?></td>
            </tr>
          
            <?php
           $i++;
                 }
                 ?>
            </tbody>
        <!-- <tfoot>
            <tr>
                <th>S.No</th>
                <th>Enquiry No
                <th>Enquiry Date</th>
                <th>Enquiry Desc</th>
                <th>Enquiry platform</th>
                <th>Status</th>
                <th>Opportunity</th>
                <th>Comments</th>
            </tr>
        </tfoot> -->
    </table>
              
         </div>
         
         <!-- Model popup -->
        
         
         <!-- End Here-->
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
