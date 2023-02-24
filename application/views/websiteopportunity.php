<?php include('template/dashboardheader.php');?>
<?php //echo "<pre>";print_r($web);exit;?>
<section id="main-content">
     <section class="wrapper main-wrapper ">
     <?php if ($this->session->flashdata('category_error')) { ?>
    <div class="alert alert-danger"> <?= $this->session->flashdata('category_error') ?> </div>
    <?php 
    }else{?>
        <div class="alert alert-success"> <?= $this->session->flashdata('category_success') ?> </div>
    <?php } ?>
         <div>
         	<h1>Website Enquiry List</h1>
         </div> 
         
      <div class="clearfix"></div> <!--**************clearfix**************-->
         
         <div class="col">              
              <section class="box">
              	<table id="example" class="table table-striped " style="width:100%">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Enquiry Date</th>
                <th>Enquiry Desc</th>
                <th>Status</th>
                <th>Opportunity</th>
                <!-- <th>Next Step Followd By</th> -->
                <th>Comments</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if(isset($web))
                foreach ($web as $key => $value) {
                    //echo "<pre>";print_r($value);
                    ?>
                   
            <tr class="table-primary">
                <td><?php echo $value['applied_id'];?></td>
                <td><?php echo $value['created_date'];?></td>
                <td><?php echo $value['applied_cover'];?></td>
                <td>active</td>
                <td>inprogress</td>    
                <!-- <td>test@gmail.com</td> -->
                <td>testing</td>
                <td><a href="<?php echo base_url('Dashboardctrl/getenquiry').'/'.$value['applied_id'];?>"><i class="fa fa-pencil-square-o" aria-hidden="true" id="edit"></i></a>&nbsp;
                    <!-- <a href="<?php echo base_url('Dashboardctrl/deleteenq').'/'.$value['applied_id'];?>"><i class="fa fa-trash" aria-hidden="true"></i></a> -->
                </td>
            </tr>
           <?php
                 }//exit;
                 ?>
            
            </tbody>
        <!-- <tfoot>
            <tr>
                <th>S.No</th>
                <th>Enquiry Date</th>
                <th>Enquiry Desc</th>
                <th>Status</th>
                <th>Opportunity</th>
                <th>Next Step Followd By</th>
                <th>Comments</th>
                <th>Actions</th>
                
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
    
