<?php include('template/dashboardheader.php');?>
<?php //echo "<pre>";print_r($newenqiry);exit;?>

<section id="main-content">
     <section class="wrapper main-wrapper "> 
           <?php if ($this->session->flashdata('category_error')) { ?>
            <div class="alert alert-danger"> <?= $this->session->flashdata('category_error') ?> </div> 
        <?php } ?>   
         <div>
         	<h1>New Enquiry List</h1>
         </div> 
         
      <div class="clearfix"></div> <!--**************clearfix**************-->
         
         <div class="col">              
              
              	<table id="example" class="table table-striped " style="width:100%">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Enquiry No</th>
                <th>Enquiry Recv Date</th>
                <th>Client Name</th>
                <th>Client Email</th>
                <th>Client Phone No</th>
                <th>Enquiry Desc</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody style="text-align: initial;">
            <?php if(isset($newenqiry))
            {
            $i=1;
                foreach ($newenqiry as $key => $value) {
                    // if($value['project_status'] == 1)
                    // {
                    //     $projectstatus = "Active";
                    // }else{
                    //     $projectstatus = "InActive";
                    // }

                    // if($value['opp_status'] == 1)
                    // {
                    //     $opportunity_status ="Inprogress";
                    // }elseif($value['opp_status'] == 2)
                    // {
                    //     $opportunity_status ="Won";
                    // }else{
                    //     $opportunity_status ="Lost";
                    // }

                    // if($value['enq_id'] == 'WEBENQ')
                    // {
                    //     $from ="Website";
                    // }else
                    // {
                    //     $from ="SMM";
                    // }
                    $enqrecdate = date('d-m-Y',strtotime($value['created_date']));
                    ?>

            <tr class="table-primary">
                <td><?php echo $i;?></td>
                <td id="enqno"><?php echo $value['enq_id'];?></td>
                <td><?php echo $enqrecdate;?></td>
                <td><?php echo $value['applied_fname'];?></td>
                <td><?php echo $value['applied_email'];?></td>
                <td><?php echo $value['applied_phone'];?></td>
                <td><?php echo $value['applied_cover'];?></td>
               <td> <a href="<?php echo base_url('Dashboardctrl/Taskassign').'/'.$value['applied_id'] .'/'.$value['enq_id'];?>"><i class="fa fa-pencil-square-o" aria-hidden="true" id="edit" ></i></a>&nbsp;
                <!-- <a href="<?php //echo base_url('Dashboardctrl/assignedtasklist').'/'.$value['applied_id'];?>"><i class="fa fa-eye" aria-hidden="true"></i></a> -->
                    
               
                    <!-- <a href="<?php //echo base_url('Dashboardctrl/deleteTaskassignview').'/'.$value['won_id'];?>"><i class="fa fa-trash" aria-hidden="true"></i></a>  -->

                </td> 
            </tr>
           <?php
           $i++;
                 }
             }
                 ?>
            
            </tbody>
        <!-- <tfoot>
            <tr>
                <th>S.No</th>
                <th>Enquiry No</th>
                <th>Enquiry Recv Date</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone No</th>
                <th>Enquiry Desc</th>
                <th>Action</th>
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
<script>
    $(document).ready(function() {
        $("#edit").on('click',function() {
            
            var enqno = $("#enqno").text();
            //alert(enqno);return false;
           $.ajax({
            type : 'post',
            url : '<?php echo base_url();?>DashboardCtrl/checkassigndata()',
            data : {enqno : enqno},
            success:function(data)
            {
                alert(data);
            }
           })
        })
    })
</script>
